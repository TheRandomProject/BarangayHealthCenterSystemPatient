<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // custom validation messages
        $messages = [
            'first_name.required' => 'Please enter your Firstname.',
            'first_name.min' => 'Your name must be at least 3 characters.',
            'first_name.max' => 'Your name must be less than 255 characters.',
            'last_name.required' => 'Please enter your Lastname.',
            'last_name.min' => 'Your name must be at least 3 characters.',
            'last_name.max' => 'Your name must be less than 255 characters.',
            'birthday.required' => 'Please enter your Birthday.',
            'birthday.date' => 'Please enter a valid Birthday.',
            'birthday.before' => 'You must be 11.',
            'birthday.after' => 'You must be 19.',
            'mobile_number.required' => 'Please enter your Mobile Number.',
            'mobile_number.digits' => 'Your Mobile Number must be 10 digits.',
            'mobile_number.unique' => 'Your Mobile Number is already registered.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'That email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Your password must be at least 6 characters.',
            'password.max' => 'Your password must be less than 255 characters.',
            'password_confirmation.required' => 'Please confirm your password.',
            'password_confirmation.same' => 'Your passwords do not match.',
        ];

        // validation rules
        return Validator::make($data, [
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'mobile_number'     => 'required|regex:/[0-9]{11}/|max:11|unique:patients',
            'birthday'          => ['required', 'date', 'before:'.Carbon::now()->subYears(11)->toDateString(), 'after:'.Carbon::now()->subYears(19)->toDateString()],
            'gender'            => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // get the year of today with the format y
        $year = date('y');

        // find patient_id like 'PATIENT-%' and add 1
        $patient_id = Patient::where('patient_id', 'like', 'PATIENT-'. $year . '%')->orderBy('patient_id', 'desc')->first();

        // if patient_id is null, then add 1 to the first patient_id
        if ($patient_id == null) {
            $patient_id = 'PATIENT-'. $year . '0001';
        } else {
            // if patient_id is not null, then add 1 to the last patient_id
            $patient_id = $patient_id->patient_id;
            $patient_id = substr($patient_id, -4);
            $patient_id = 'PATIENT-'. $year . sprintf('%04d', $patient_id + 1);
        }

        return Patient::create([
            'patient_id'        => $patient_id,
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'mobile_number'     => $data['mobile_number'],
            'birthday'          => $data['birthday'],
            'gender'            => $data['gender'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
        ]);
    }
}
