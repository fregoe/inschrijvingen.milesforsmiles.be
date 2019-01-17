<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserResetPasswordMail;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('front.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect(route('login'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $customer = Auth::guard('web')->user();

            return redirect(route('mijn-account.index'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNewUserForm()
    {
        return view('front.newuser');
    }

    public function newUser(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'     => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if(isset($user)) {
            // Generate a new reset password token
            $token = app('auth.password.broker')->createToken($user);
            $url   = route('password.reset')."?token=".$token;

            // Send email
            Mail::to($user->email)
                ->send(new UserResetPasswordMail($user,$url));

            return redirect()->back()->with('status','user_exists');
        }
        else {
            $user           = new User();
            $user->email    = $request->email;
            $user->save();
            $user->sendWelcomeEmail();

            return redirect()->back()->with('status','user_created');
        }
    }
}
