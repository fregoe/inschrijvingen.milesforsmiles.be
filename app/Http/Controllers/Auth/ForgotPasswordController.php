<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserResetPasswordMail;
use App\Mail\UserWelcomeMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForgetPage()
    {
        return view('front.password-reset');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        //Get user for e-mail
        $user = User::where('email',$request->email)->first();
        if(isset($user)) {
            // Generate a new reset password token
            $token = app('auth.password.broker')->createToken($user);
            $url   = route('password.reset')."?token=".$token;

            // Send email
            Mail::to($user->email)
                ->send(new UserResetPasswordMail($user,$url));

            return redirect()->back()->with('status','ok');
        }
        else {
            return redirect()->back()->with('status','error');
        }

    }
}
