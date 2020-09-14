<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User\Files;
use Auth;
use App\Role;

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

        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'    => ['required', 'numeric'],
            'category'  => ['required'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // $file_extention = $data['file']->getClientOriginalExtension();
        // $file_name = time().rand(99,999).'file.'.$file_extention;
        // $file_path = $data['file']->storeAs('public/files', $file_name);

        // Custom Validate to add subcategory data
        $subcategory = null;

        if(!empty($data['gallery'])){
            $subcategory = $data['gallery'];
        }

        if(!empty($data['regional'])){
            $subcategory = $data['regional'];
        }

        if(!empty($data['special'])){
            $subcategory = $data['special'];
        }

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'mobile'    => $data['mobile'],
            'category'  => $data['category'],
            'subcategory'   => $subcategory,
            'password'  => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name', 'Artist')->first();

        $user->roles()->attach($role);

        return $user;
    }
}
