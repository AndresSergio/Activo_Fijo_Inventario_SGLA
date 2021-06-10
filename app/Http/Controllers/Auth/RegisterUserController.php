<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
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
    
    function create(Request $request) /* metodo  que registra un nuevo usuario */
    {    
        $this->validator($request->all())->validate();
        $data=$request;
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


        return ['mensaje'=>'Registrado Correctamente',
                'estado'=>true];
    }
    public function show()
    {
        return view('auth.register');
    }
    
}
