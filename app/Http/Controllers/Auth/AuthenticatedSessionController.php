<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\EmailVerification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

     public function sendOtp($user)
     {
         $otp = rand(100000,999999);
         $time = time();
 
         EmailVerification::updateOrCreate(
             ['email' => $user->email],
             [
             'email' => $user->email,
             'otp' => $otp,
             'created_at' => $time
             ]
         );
 
         $data['email'] = $user->email;
         $data['title'] = 'Mail Verification';
 
         $data['body'] = 'Your OTP is:- '.$otp;
 
         Mail::send('mailVerification',['data'=>$data],function($message) use ($data){
             $message->to($data['email'])->subject($data['title']);
         });
     }

    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $request->session()->regenerate();

        if (Auth::user()->is_admin != 2) {
            if ((Auth::user()->is_admin == 1) && (Auth::user()->role == null)) {
                Auth::guard('web')->logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
                return redirect()->back()->with('status', 'Wait for Admin Review');
            }
            return redirect('/adhome');
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
        else{
            $userCredential = $request->only('email','password');
            $userData = User::where('email',$request->email)->first();
            // otp
            if($userData && $userData->is_verified == 0){
                Auth::guard('web')->logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
                return redirect("/verification/".$userData->id);
            }
            else if(Auth::attempt($userCredential)){
                return redirect('/dashboard');
            }
            else{
                return back()->with('error','Username & Password is incorrect');
            }
            // otp
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
