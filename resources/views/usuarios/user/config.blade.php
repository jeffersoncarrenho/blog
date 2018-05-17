@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Minhas Configurações</h4></li>
    <li class="list-group-item">
      <a href="{!! url('/painel') !!}">Painel</a> -> Configurações
    </li>
</ul>

<!-- Mensagem para confirmação -->
@if (session('msg'))
    <div class="alert alert-success">
      {{ session('msg')}}
    </div>
@endif

<!-- Mensagem do validate -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li></li>
          @endforeach
        </ul>
    </div>
@endif

<!-- Mensagem para erros -->
@if(session('erro'))
  <div class="alert alert-danger"> {{ session('erro') }} </div>
@endif

<div class="row">
  <!--Alterar Avatar-->
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="http://via.placeholder.com/350x350" alt="..." class="img-responsive img-circle">
    </div>
    Salvar Alteração do Avatar ->
    <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
  </div>

  <!--Alterar N.E.D-->
  <div class="col-md-8">
    <div class="form-group">
      <label>Nome: </label>
      <input type="text" class="form-control" placeholder="Nome...">
    </div>

    <div class="form-group">
      <label>Email: </label>
      <input type="email" class="form-control" placeholder="Email...">
    </div>

    <div class="form-group">
      <label>Descrição: </label>
      <textarea type="text" class="form-control" placeholder="Descrição..."></textarea>
    </div>
    Salvar Alteração de Nome, Email e Descrição ->
    <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
  </div>

  <!--Alterar Senha-->
  <form class="" action="{!! url()->current() !!}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="tipo" value="senha">

    <div class="col-md-12">
      <p></p>
      <div class="form-group">
        <label>Senha Atual: </label>
        <input type="text" class="form-control" name="senha_atual" placeholder="Senha Atual...">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Nova Senha: </label>
        <input type="text" class="form-control" name=password placeholder="Nova Senha...">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Confirme a Nova Senha: </label>
        <input type="text" class="form-control" name="password_confirmation" placeholder="Confirme a Nova Senha...">
      </div>
    </div>

    <div class="col-md-12">
      Salvar Alteração de Senha ->
      <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
    </div>
  </form>
</div>

@endsection