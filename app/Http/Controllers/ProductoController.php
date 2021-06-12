<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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
    public function destroy($ids){

        Producto::destroy($ids);
        return redirect('productos');
    }
    
}
