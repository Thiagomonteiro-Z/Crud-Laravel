@extends('layouts.tela')
@section('content')
  
  <div class="card" style="margin:20px;">
    <div class="card-header">Cadastrar Novos Tipos</div>
      <div class="card-body">
          
          <form action="{{ url('tipos') }}" method="post">
            {!! csrf_field() !!}
            <label>Categoria</label></br>
            <input type="text" name="tiponome" id="tiponome" class="form-control" placeholder="Inserira o tipo."></br>
            <input type="submit" value="Adicionar" class="btn btn-success"></br>
          </form>
            
      </div>
  </div>
  @if (session('flash_message'))
      <div class="alert alert-success">
          {{ session('flash_message') }}
      </div>
  @endif
@stop