<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolControlller extends Controller
{
    public function index(){
        $role = Rol::all();
        return view('roles.index',compact('role'));
    }
    public function create(){
        return view('roles.create');
    }
    public function store(Request $request){
        $request->validate([
            'nombre'=>'required|string|max:255'
        ]);
        $role = request()->except('_token');
        Rol::insert($role);
        return redirect('roles')->with(['message'=>'Rol creado correctamente']);
    }
    public function show($id){
        $role=Rol::findOrFail($id);
        return view('roles.show',compact('role'));
    }
    public function edit($id){     

        $role=Rol::findOrFail($id);

        return view('roles.edit',compact('role'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nombre'=>'required|string|max:255'
        ]);
        $rol=request()->except(['_token','_method']);  
        Rol::where('id','=',$id)->update( $rol);
        $role=Rol::findOrFail($id);
        return view('roles.edit',compact('role'));    
    }
    public function destroy($id){
        Rol::destroy($id);
        return redirect('roles');
    }
}
