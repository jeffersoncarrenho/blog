<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;

class TagsController extends Controller
{
    public function index(){
      return view('usuarios.tags.index')->with('tags', Tags::get());
    }

    public function store(Request $request){

      $request->validate([
          'tags' => 'required|min:1',
      ]);

      if(is_null($request->input('tags'))){ return back();}
      $temp_tags = explode(',' , $request->input('tags'));
      foreach ($temp_tags as $key => $tag) {
        $nova_tag = new Tags;
        $nova_tag->name = $tag;
        $nova_tag->slug = str_slug('tag');
        $nova_tag->save();
      }
      return back()->with('mensagem', 'Tags criada com sucesso.');
    }

    public function update(Request $request){

      $request->validate([
          'tag' => 'required|min:1',
      ]);
      $tag = Tags::find($request->input('id'));
      $tag->name = $request->input('tag');
      $tag->save();

      return back()->with('mensagem', 'Tags editada com sucesso.');
    }

    public function destroy($id){
      Tags::find($id)->delete();
      return back()->with('mensagem', 'Tags deletada com sucesso.');
    }

}
