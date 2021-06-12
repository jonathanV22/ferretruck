<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   public function index(){
       $users=User::paginate();
       return view('users.index',compact('users'));
   } 


   public function create(){
       $roles= Rol::all();
       return view('users.create',compact('roles'));
   }

    public function store(Request $request){

        //$usuario=request()->all();

        $usuario=request()->except('_token','password_confirmation');
        if($request->hasFile('foto')){
            $usuario['foto']=$request->file('foto')->store('uploads','public');
        }
       User::insert( $usuario);
        return redirect('users');
    }

    public function show($id){

    }

    public function edit($id){
        $user= User::findOrFail($id);
        $roles=Rol::all();
       // dd( $user);
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, $id){
      $usuario=request()->except(['_token','_method']);

      if($request->hasFile('foto')){
        $user= User::findOrFail($id);
        Storage::delete('public/'.$user->foto);
        $usuario['foto']=$request->file('foto')->store('uploads','public');
      } 

      User::where('id','=',$id)->update($usuario);     

      $user= User::findOrFail($id);

      $roles=Rol::all();

      return view('users.edit',compact('user','roles'));

    }

    public function destroy($id)
    {
         //return response()->json("hola");
        //
        //dd($id);
        User::destroy($id);
        return redirect('users');
    }
}
