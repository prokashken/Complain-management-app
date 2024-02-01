<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegistrationForm;
use App\Models\User;
use App\Rules\EmailRule;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        if ($request->subadmin == 'from subadmin') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'emp_id' => ['required', 'digits:5','unique:'.User::class],
                'designation' => ['required', 'max:255'],
                'phone' => ['required','numeric','digits:10','unique:'.User::class],
                'email' => ['required','string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required','max:15','min:10','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->emp_id = $request->emp_id;
            $user->designation = $request->designation;
            $user->phone = $request->phone;
            $user->is_admin = 1;
            $user->password = Hash::make($request->password);
            $user->save();

            $data = $request->all();
            $data['title'] = "New sub-admin registered, waiting for your confirmation";
            $admin = User::where('is_admin',0)->first();
            $admin_email = $admin->email;
            Mail::send('newSubadminMail',['data'=>$data],function($message) use ($data,$admin_email){
                $message->to($admin_email)->subject($data['title']);
            });
            return redirect()->back()->with('status', 'Account Created Successfully, Wait for Admin Review');
        }

        $regi_form = RegistrationForm::find(1);

        if ($regi_form->name_required == 'required') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
        }

        if ($regi_form->emp_id_required == 'required') {
            $request->validate([
                'emp_id' => ['required', 'digits:5','unique:'.User::class],
            ]);
        }
        if ($regi_form->department_required == 'required') {
            $request->validate([
                'department' => ['required', 'max:255'],
            ]);
        }
        if ($regi_form->designation_required == 'required') {
            $request->validate([
                'designation' => ['required', 'max:255'],
            ]);
        }
        if ($regi_form->phone_required == 'required') {
            $request->validate([
                'phone' => ['required','numeric','digits:10','unique:'.User::class],
            ]);
        }
        if ($regi_form->internal_no_required == 'required') {
            $request->validate([
                'internal_no' => ['required','numeric', 'digits:4','unique:'.User::class],
            ]);
        }
        if ($regi_form->building_location_required == 'required') {
            $request->validate([
                'building_location' => ['required','string'],
            ]);
        }
        if ($regi_form->floor_no_required == 'required') {
            $request->validate([
                'floor_no' => ['required','string'],
            ]);
        }
        if ($regi_form->room_no_required == 'required') {
            $request->validate([
                'room_no' => ['required','string'],
            ]);
        }

        $request->validate([
            'email' => ['required','string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','max:15','min:10','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#&]/', 'confirmed', Rules\Password::defaults()],
        ]);

        // ,new EmailRule
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->emp_id = $request->emp_id;
        $user->department = $request->department;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->internal_no = $request->internal_no;
        $user->building_location = $request->building_location;
        $user->floor_no = $request->floor_no;
        $user->room_no = $request->room_no;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("/verification/".$user->id);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
