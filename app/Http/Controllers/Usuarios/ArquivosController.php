<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Arquivos;

class ArquivosController extends Controller
{
    public function index(){
      return view('usuarios.arquivos.index')->with('arquivos', Arquivos::all());
    }

    public function store(Request $request){
      $request->validate([
        'arquivo' => 'required'
      ]);

      $arquivo = new Arquivos;

      if (is_null($request->input('name'))) {
        $arquivo->name = str_replace('.' . $request->arquivo->extension(),'', $request->arquivo->getClientOriginalName());
      } else {
        $arquivo->name = $request->input('name');
      }

      $arquivo->tamanho = $request->arquivo->getClientSize();
      $arquivo->tipo = $request->arquivo->extension();
      $arquivo->caminho = 'assets/arquivos/' . $request->arquivo->storeAs('', str_slug($arquivo->name) . '.' . $arquivo->tipo, 'upl_arquivos');
      $arquivo->save();
      return back()->with('mensagem', 'Upload do arquivo '. $arquivo->name . ' realizado com sucesso');
    }

    
}
