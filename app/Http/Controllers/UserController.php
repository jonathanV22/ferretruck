<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'foto'=>'mimes:jpeg,png,jpg,JPEG,PNG,JPG',
            'rut'=> 'required|min:7|max:12|cl_rut',
            'email' => 'required|string|email|max:255|unique:users',
            'idTipoU'=> 'required',
            'telefono' =>'required|min:9|max:9',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $usuario=request()->except('_token','password_confirmation');
        if($request->hasFile('foto')){
            $usuario['foto']=$request->file('foto')->store('uploads','public');
        }
        $usuario['password']=Hash::make($request->password);
        return response()->json($usuario);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'foto'=>'mimes:jpeg,png,jpg,JPEG,PNG,JPG',
            'rut'=> 'required|min:7|max:12|cl_rut',
            'idTipoU'=> 'required',
            'telefono' =>'required|min:9|max:9',
        ]);

        $usuario=request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $user= User::findOrFail($id);
            Storage::delete('public/'.$user->foto);
            $usuario['foto']=$request->file('foto')->store('uploads','public');
        } 
        //return response()->json( $usuario);

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
