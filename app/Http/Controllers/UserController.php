<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class UserController extends Controller
{
    public function index()
    {
        $ticketList = Ticket::where('status','!=',3)->where('emp_id',Auth::user()->emp_id)->where('emp_name',Auth::user()->name)->get(); 
        return view('user.home',compact('ticketList'));
    }

    public function closedTicket()
    {
        $ticketList = Ticket::where('status','=',3)
        ->where('emp_id',Auth::user()->emp_id)
        ->where('emp_name',Auth::user()->name)
        ->paginate(100); 
        return view('user.closed',compact('ticketList'));
    }

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

    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/dashboard');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (1801+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                event(new Registered($user));
                Auth::login($user);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
                
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (1801+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }

    public function getInfo($id)
    {
        $user = User::where('id',$id)->get();
        return response()->json($user);
    }
}
