<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function register(Request $request)
    {


        //--- Validation Section

        $rules = [
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        $gs = Generalsetting::findOrFail(1);
        $user = new User;
        $input = $request->all();
        if ($input['type'] == "0") {
            $input['company_name'] = null;
            $input['cvr_number']   = null;
        }
        $input['customer_number']  = Str::random(8);
        $input['password'] = bcrypt($request['password']);
        $token = md5(time() . $request->name . $request->email);
        $input['verification_link'] = $token;
        $input['affilate_code'] = md5($request->name . $request->email);
        $user->fill($input)->save();

        if ($gs->is_verification_email == 1) {
            $to = $request->email;
            $subject = 'Verify your email address.';
            $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=" . url('user/register/verify/' . $token) . ">Simply click here to verify. </a>";
            //Sending Email To Customer
            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            } else {
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }
            return response()->json('We need to verify your email address. We have sent an email to ' . $to . ' to verify your email address. Please click link in that email to continue.');
        } else {

            $user->email_verified = 'Yes';
            $user->update();
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();



            $gs = Generalsetting::find(1);
            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $user->email,
                    'type' => "welcome_email",
                    'cname' => $user->name,
                    'amount' => '',
                    'aname' => "",
                    'aemail' => "",
                    'wtitle' => $gs->title,
                    'cnumber' => $user->customer_number,
                    'cemail' => $user->email,
                    'cpass' => $request['password']
                ];

                $mailer = new GeniusMailer();
                $mailer->sendAutoMail($data);
            } else {
                $to = $user->email;
                $subject = "Welcome to NEM-Auktioner ApS";
                $msg = "Hello " . $user->name . ",\nWelcome to " . $gs->title . ",\nCustomer Number: " . $user->customer_number . ",\nUsername: " . $user->name . ",\nPassword: " . $request['password'] . ".";
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }



            if (Session::has('affilate')) {
                $referral = User::findOrFail(Session::get('affilate'));
                $user->referral_id = $referral->id;
                $user->update();
            }
            Auth::guard('web')->login($user);
            $data[0] = 1;
            $data[1] = route('user.dashboard');
            return response()->json($data);
        }
    }

    public function token($token)
    {
        if ($gs->is_verification_email == 0) {
            $user = User::where('verification_link', '=', $token)->first();
            if (isset($user)) {
                $user->email_verified = 'Yes';
                $user->update();

                if (Session::has('affilate')) {
                    $referral = User::findOrFail(Session::get('affilate'));
                    $user->referral_id = $referral->id;
                    $user->update();
                }


                $notification = new Notification;
                $notification->user_id = $user->id;
                $notification->save();
                Auth::guard('web')->login($user);

                $gs = Generalsetting::find(1);
                if ($gs->is_smtp == 1) {
                    $data = [
                        'to' => $user->email,
                        'type' => "welcome_email",
                        'cname' => $user->name,
                        'amount' => '',
                        'aname' => "",
                        'aemail' => "",
                        'wtitle' => $gs->title,
                        'cnumber' => $user->customer_number,
                        'cemail' => $user->email,
                        'cpass' => $user->password
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendAutoMail($data);
                } else {
                    $to = $user->email;
                    $subject = "Welcome to NEM-Auktioner ApS";
                    $msg = "Hello " . $user->name . ",\nWelcome to " . $gs->title . ",\nCustomer Number: " . $user->customer_number . ",\nUsername: " . $user->name . ",\nPassword: " . $user->password . ".";
                    $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }

                return redirect()->route('user.dashboard')->with('success', 'Email Verified Successfully');
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Renders registration view
     *
     * @return view
     */
    public function showRegisterForm()
    {
        return view('user.register');
    }

    /**
     * Registers user
     *
     * @param Request $request
     * @return void
     */
    public function registerSync(Request $request)
    {
        //--- Validation Section
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);
        //--- Validation Section Ends


        $gs = Generalsetting::findOrFail(1);
        $user = new User;
        $input = $request->all();

        if ($input['type'] == "0") {
            $input['company_name'] = null;
            $input['cvr_number']   = null;
        }

        $input['customer_number']  = Str::random(8);
        $input['password'] = bcrypt($request['password']);
        $token = md5(time() . $request->name . $request->email);
        $input['verification_link'] = $token;
        $input['affilate_code'] = md5($request->name . $request->email);
        $user->fill($input)->save();

        if ($gs->is_verification_email == 1) {
            $to = $request->email;
            $subject = 'Verify your email address.';
            $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=" . url('user/register/verify/' . $token) . ">Simply click here to verify. </a>";
            //Sending Email To Customer
            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            } else {
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }

            return redirect()->back()->with('status', 'We need to verify your email address. We have sent an email to ' . $to . ' to verify your email address. Please click link in that email to continue.');
        } else {

            $user->email_verified = 'Yes';
            $user->update();
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();

            $gs = Generalsetting::find(1);
            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $user->email,
                    'type' => "welcome_email",
                    'cname' => $user->name,
                    'amount' => '',
                    'aname' => "",
                    'aemail' => "",
                    'wtitle' => $gs->title,
                    'cnumber' => $user->customer_number,
                    'cemail' => $user->email,
                    'cpass' => $request['password']
                ];

                $mailer = new GeniusMailer();
                $mailer->sendAutoMail($data);
            } else {
                $to = $user->email;
                $subject = "Welcome to NEM-Auktioner ApS";
                $msg = "Hello " . $user->name . ",\nWelcome to " . $gs->title . ",\nCustomer Number: " . $user->customer_number . ",\nUsername: " . $user->name . ",\nPassword: " . $request['password'] . ".";
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }

            if (Session::has('affilate')) {
                $referral = User::findOrFail(Session::get('affilate'));
                $user->referral_id = $referral->id;
                $user->update();
            }

            Auth::guard('web')->login($user);
            $data[0] = 1;
            $data[1] = route('user.dashboard');

            return redirect()->route('user.dashboard');
        }
    }
}