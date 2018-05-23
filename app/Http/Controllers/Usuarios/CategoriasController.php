<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;

class CategoriasController extends Controller
{
    public function index(){
      return view('usuarios.categorias.index')->with('categorias', Categorias::all());
    }

    public function store(Request $request){
      $categoria = new Categorias;
      $categoria->name = $request->input('name');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('name'));
      $categoria->save();
      return redirect('painel/categorias')->with('msg', 'Categoria incluída com sucesso');
    }

    public function update(Request $request){
      Categorias::find($request->input('id'));
      $categoria = new Categorias;
      $categoria->name = $request->input('name');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('name'));
      $categoria->save();
      return redirect('painel/categorias')->with('msg', 'Categoria atualizada com sucesso');
    }

    public function destroy($id){
      Categorias::find($id)->delete();
      return redirect('painel/categorias')->with('msg', 'Categoria excluída com sucesso');
    }
}
