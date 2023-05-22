@extends('layouts.tela')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header"><strong>Vizualizar - Tipos</strong></div>
    <div class="card-body">
          <div class="card-body">
            <h5 class="card-title">Tipo : {{ $tipos->tiponome }}</h5>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>

          </div>
    </div>
</div>
@stop