<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'foto'=>'required|mimes:jpeg,png,jpg,JPEG,PNG,JPG',
            'rut'=> 'required|min:7|max:12|cl_rut',
            'email' => 'required|string|email|max:255|unique:users',
            'idTipoU'=> 'required',
            'telefono' =>'required|min:9|max:9',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $usuario=request()->except('_token','password_confirmation');
        if($request->hasFile('foto')){
            $usuario['foto'] = $request->file('foto')->store('uploads','public');
        }
        $usuario['password']=Hash::make($request->password);

        $user = User::create( $usuario);
        

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
