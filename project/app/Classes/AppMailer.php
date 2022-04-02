<?php

namespace App\Classes;

use Config;
use App\Models\EmailTemplate;
use App\Models\Generalsetting;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;

class AppMailer
{
    private $mail     = null;
    private $settings = null;

    public function __construct()
    {
        $this->settings = Generalsetting::find(1);

        Config::set('mail.mailer', 'smtp');
        Config::set('mail.host', $this->settings->smtp_host);
        Config::set('mail.port', $this->settings->smtp_port);
        Config::set('mail.encryption', 'tls');
        Config::set('mail.username', $this->settings->smtp_user);
        Config::set('mail.password', $this->settings->smtp_pass);

        // Instantiate PHPMailer
        $this->mail = new PHPMailer(true);

        try {
            // Email server configuration
            $this->mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                ]
            ];

            $this->mail->SMTPDebug = 2;
            $this->mail->isSMTP();
            $this->mail->Host       = Config::get('mail.host');
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = Config::get('mail.username');
            $this->mail->Password   = Config::get('mail.password');
            $this->mail->SMTPSecure = Config::get('mail.encryption');
            $this->mail->Port       = Config::get('mail.port');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Creates message and sends mail
     *
     * @param array $data
     * @return void
     */
    public function send(array $data)
    {
        $this->mail->isHTML(true);
        $this->compose($data);
        $this->mail->send();
    }

    /**
     * Composes e-mail
     *
     * @param string $type
     * @return void
     */
    private function compose(array $data)
    {
        $template     = EmailTemplate::where('email_type', '=', $data['email_type'])->first();
        $replace      = str_replace('{customer_name}', $data['recipient_name'], $template->email_body);
        $emailBody    = htmlspecialchars_decode($replace) ?? '';
        $emailBody   .= $data['body'] ?? '';
        $siteName     = $this->settings->title;
        $body         = view('mail.index', compact('emailBody', 'siteName'))->render();
        $from         = $data['from'] ?? null;
        $fromName     = $data['from_name'] ?? null;

        $this->mail->setFrom($from ?? $this->settings->from_email, $fromName ?? $this->settings->from_name);
        $this->mail->addAddress($data['recipient']);
        $this->mail->Subject = $template->email_subject;
        $this->mail->Body    = $body;
    }
}