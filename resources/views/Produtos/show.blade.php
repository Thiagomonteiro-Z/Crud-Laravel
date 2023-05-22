@extends('layouts.telatipo')
@section('content')
  
  <div class="card" style="margin:20px;">
    <div class="card-header"><strong>Vizualizar - Produtos</strong>
    </div>
      <div class="card-body">
        <div class="card-body">
          <h5 class="card-title">Categoria : {{ $produtos->letra_numero }}</h5>
          <p class="card-text">Nome : {{ $produtos->nome }}</p>
          <p class="card-text">Tipo : {{ \App\Models\Tipos::find($produtos->tipos_id)->tiponome }}</p>
          <p class="card-text">Preço de Compra : {{ $produtos->preco_compra }}</p>
          <p class="card-text">Preço Estimado de Venda : {{ $produtos->preco_venda }}</p>
          <p class="card-text">Estoque : {{ $produtos->estoque }}</p>
          <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
        </div>
      </div>
  </div>
@stop