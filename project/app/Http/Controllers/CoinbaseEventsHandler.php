<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Order;
use App\Models\Auction;
use App\Classes\AppMailer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Classes\CoinbasePayment;

class CoinbaseEventsHandler extends Controller
{
    // Status constants
    const STATUS_FAILED    = 'declined';
    const STATUS_PENDING   = 'pending';
    const STATUS_COMPLETED = 'completed';

    public function listen(Request $request)
    {
        $settings         = Generalsetting::findOrFail(1)->first();
        $rawBody          = @file_get_contents("php://input");
        $webhookSignature = $_SERVER['HTTP_X_CC_WEBHOOK_SIGNATURE'] ?? '';
        $agent            = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $sharedSecret     = $settings->coinbase_shared_secret;
        $payload          = json_decode($rawBody);
        $verifySignature  = CoinbasePayment::verifySignature($webhookSignature, $rawBody, $sharedSecret);
        $verifyAgent      = CoinbasePayment::verifyUSerAgent($agent);
        $appMailer        = new AppMailer();
        // $test = json_decode(file_get_contents('payload.json'));

        if (!$verifyAgent || !$verifySignature) {
            error_log("ERROR: Unauthorized request. userAgent: {$verifyAgent} signature: {$verifySignature}");
            return;
        }

        if ($payload) {

            $type          = $payload->event->type;
            $data          = $payload->event->data;
            $id            = $data->id;
            $code          = $data->code;
            $name          = $data->name;
            $description   = $data->description;
            $customerId    = $data->metadata->customer_id;
            $customerName  = $data->metadata->customer_name;
            $customerEmail = $data->metadata->customer_email;
            $orderNumber   = $data->metadata->order_number;

            $order     = Order::where('user_id', $customerId)->where('coinbase_charge_id', $id)->first();
            $orderType = Str::ucfirst($order->type);

            if ('charge:failed' === $type) {
                $order->status         = self::STATUS_FAILED;
                $order->payment_status = self::STATUS_FAILED;

                // Send mail
                if ($settings->is_smtp == 1) {
                    $data = [
                        'email_type'     => 'payment_failed',
                        'recipient'      => $customerEmail,
                        'recipient_name' => $customerName,
                        'body'           => ''
                    ];

                    $appMailer->send($data);
                    $appMailer->send([
                        'from'           => 'notifications@auction.onlineurbusiness.com',
                        'from_name'      => 'Payment Failed',
                        'email_type'     => '',
                        'recipient_name' => '',
                        'recipient'      => $settings->from_email,
                        'email_type'     => '<p>Hello Admin, <br> A customer\'s payment has failed or expired.</p>'
                    ]);
                } else {
                    $to = $customerEmail;
                    $subject = "Your Payment Failed";
                    $msg = "<p>Dear {$customerName}, your payment has failed.</p><p> It seems you did not initiate a payment, or we couldn't verify it.</p>";
                    $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }
            }

            if ('charge:pending' === $type) {
                $order->status         = self::STATUS_PENDING;
                $order->payment_status = self::STATUS_PENDING;

                // Send mail
                if ($settings->is_smtp == 1) {
                    $data = [
                        'email_type'     => 'payment_pending',
                        'recipient'      => $customerEmail,
                        'recipient_name' => $customerName,
                        'body'           => ''
                    ];

                    $appMailer->send($data);
                    $appMailer->send([
                        'from'           => 'notifications@auction.onlineurbusiness.com',
                        'from_name'      => 'Payment Pending',
                        'email_type'     => '',
                        'recipient_name' => '',
                        'recipient'      => $settings->from_email,
                        'email_type'     => '<p>Hello Admin, <br> A customer has initiated a payment, but it\'s yet to be confirmed.</p>'
                    ]);
                } else {
                    $to = $customerEmail;
                    $subject = "Your Payment is Pending";
                    $msg = "<p>Dear {$customerName}, your payment status is pending.</p> <p>We'll notify you once confirmed.</p>";
                    $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }
            }

            if ('charge:confirmed' === $type) {
                $order->status         = self::STATUS_COMPLETED;
                $order->payment_status = self::STATUS_COMPLETED;

                // Find and update auction if order type is Auction
                if ($orderType == 'Auction') {
                    $auction = Auction::findOrFail($order->auction_id);
                    $auction->payment_status = self::STATUS_COMPLETED;
                    $auction->is_approve = 1;
                    $auction->status = 1;
                    $auction->update();
                }

                // Find and update bid if order type is Bid
                if ($orderType == 'Bid') {
                    $bid = Bid::findOrFail($order->bid_id);
                    $bid->status = 1;
                    $bid->update();
                }

                // Send mail
                if ($settings->is_smtp == 1) {
                    $data = [
                        'email_type'     => 'payment_confirm',
                        'recipient'      => $customerEmail,
                        'recipient_name' => $customerName,
                        'body'           => ''
                    ];

                    $appMailer->send($data);
                    $appMailer->send([
                        'from'           => 'notifications@auction.onlineurbusiness.com',
                        'from_name'      => 'Payment Completed',
                        'email_type'     => '',
                        'recipient_name' => '',
                        'recipient'      => $settings->from_email,
                        'email_type'     => '<p>Hello Admin, <br> A customer\'s payment has just been confirmed.</p>'
                    ]);
                } else {
                    $to = $customerEmail;
                    $subject = "Your Payment Completed Successfully";
                    $msg = "Hello " . $customerName . "!\nYour Payment Completed Successfully";
                    $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }
            }

            // Update order
            $order->update();

            // Log create/update log file
            $d = 'date';
            file_put_contents('coinbase_log', "Code: {$code} Type: {$type} Datetime: {$d('Y-M-d H:i:s')}\r\n", FILE_APPEND);
        }
    }
}