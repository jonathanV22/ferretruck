<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
   public function update(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'apellido'=> 'required|string|max:255',
        'rut'=> 'required|min:8|max:12',
        'email' => 'required|string|email|max:255',
        'telefono' =>'required|min:9|max:9',
    ]);
       auth()->user()->update($request->only('name','email','rut','apellido','direccion','telefono'));
       return redirect()->route('perfil')->with('message',__('perfil updated successfully'));
   }
}
