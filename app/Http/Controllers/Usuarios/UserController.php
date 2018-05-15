<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
      return view('usuarios.user.index')->with('users', User::orderBy('name', 'asc')->get());
    }

    public function create(){
      return view('usuarios.user.create');
    }


    public function store(Request $request){
      $request->validate([
        'name'       => 'required|string|max:255',
        'email'      => 'required|string|email|max:255|unique:users',
        'password'   => 'required|string|min:6|confirmed'
      ]);

      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->level = $request->input('level');
      $user->password = bcrypt($request->input('level'));
      return view('usuarios.users.create')->with('msg', 'Usuário adicionado com sucesso');
    }
}
