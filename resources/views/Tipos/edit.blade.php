@extends('layouts.tela')
@section('content')
  
  <div class="card" style="margin:20px;">
    <div class="card-header">Editar Tipos</div>
      @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
      @endif
    <div class="card-body">
      <form action="{{ url('tipos/' .$tipos->id) }}" method="post">
        {!! csrf_field() !!}
        @method('PUT')
        <input type="hidden" name="id" id="id" value="{{$tipos->id}}" id="id" />
        <label>Tipos</label></br>
        <input type="text" name="tiponome" id="tiponome" value="{{$tipos->tiponome}}" class="form-control"></br>
        <input type="submit" value="Atualizar" class="btn btn-success"></br></br>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
      </form>
    </div>
  </div>
  @if (session('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
  @endif
@stop

