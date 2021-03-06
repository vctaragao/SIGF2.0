<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/Home';

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
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'profile'   => 'required|url|active_url',
            'cpf'       => 'required|unique:users',
            'phone'     => 'required|string|min:14|max:16',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {   

        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'sex'       => $data['sex'],
            'phone'     => $data['phone'],
            'cpf'       => $data['cpf'],
            'course'    => $data['course'],
            'profile'   => $data['profile'],
            'colar'     => $data['colar'],
        ]);
    }

    public function messages()
{
    return [
        'cpf.required' => 'É necessário informar um CPF',
        'cpf.unique:users' => 'CPF já cadastrado',
        'cpf.digits:11' => 'CPF deve conter 11 digitos',
        'body.required'  => 'A message is required',
    ];
}

}
