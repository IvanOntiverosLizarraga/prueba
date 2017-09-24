<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:10|max:50',
            'address' => 'required|min:10|max:50',
            'user' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:3|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^[A-Za-z \t]*[0-9]*$/i|min:5|max:15|confirmed',
            'phone' => 'required|min:8|numeric',

        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'user' => $data['user'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }
}
