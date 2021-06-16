<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'ci' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
       /*  dd($data['nombre']); */
        switch ($data['tipo_resp_id']) {
            case '1':
                $data['sector_id']=1;
                $data['turno_id']=1;
                break;
            case '2':
                $data['turno_id']=1;
                break;
            default:
                break;
        }
        User::create([
   
            'nombre' => strtoupper($data['nombre']),
            'apellido' => strtoupper($data['apellido']),
            'email' => $data['email'],
            'ci' => $data['ci'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'tipo_resp' => $data['tipo_resp_id'],
            'id_sector' => $data['sector_id'],
            'id_turno' => $data['turno_id'],
            'estado' => 1,
            'password' => Hash::make($data['password']),
        ]);


        return back()->with('nuevo_miembro', 'Registrado exitosamente!');
    }
}
