<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $datos['productos']=Producto::all();
        return view('productos.index', $datos);
    }

    public function create(){

        return view('productos.create');
    }

    public function store(Request $request){

        $datos = request()->except('_token');

       if($request->hasFile('imagen')){
            $datos['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Producto::insert($datos);
        return redirect('productos');
    }
    public function show(){
        
    }
    public function edit($id){
        $producto=Producto::findOrFail($id);
        //return response()->json($producto);
        return view('productos.edit',compact('producto'));
    }

    public function update(Request $request,$id){

        $product=request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $producto= Producto::findOrFail($id);
            Storage::delete('public/'.$producto->foto);
            $product['imagen']=$request->file('imagen')->store('uploads','public');
        } 

        Producto::where('id','=',$id)->update($product);

        $producto= Producto::findOrFail($id);

        return view('productos.edit',compact('producto'));
    }

    public function destroy($id){

        Producto::destroy($id);
        return redirect('productos');
    }
    
}
