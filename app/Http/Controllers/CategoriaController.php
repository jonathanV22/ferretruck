<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){

        $categorias=Categoria::all();

        return view('categorias.index',compact('categorias'));

    }

    public function create(){

     return view('categorias.create');

    }

    public function store(Request $request){
        $categoria = request()->except('_token');
        Categoria::insert( $categoria);
        return redirect('categorias');

    }
    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit',compact('categoria'));

    }
    public function update(Request $request,$id){
        $category = request()->except('_token','_method');
        Categoria::where('id','=',$id)->update($category);
        $categoria=Categoria::findOrFail($id);
        return view('categorias.edit',compact('categoria'));
    }
    public function destroy($id){
        Categoria::destroy($id);
        return redirect('categorias');
    }
}
