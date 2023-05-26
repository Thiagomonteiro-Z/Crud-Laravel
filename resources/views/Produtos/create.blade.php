@extends('layouts.tela')
@section('content')

  <div class="card" style="margin:20px;">
    <div class="card-header">Cadastrar Novos Produtos!</div>
      <div class="card-body">
          <form action="{{ url('produtos') }}" method="post">
            {!! csrf_field() !!}
            <label>Categoria</label></br>
            <input type="text" name="letra_numero" id="letra_numero" class="form-control" placeholder="Inserir a categoria."></br>
            <label>Nome</label></br>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Inserir o nome do produto."></br>
            <label for="tipos_id">Tipos</label><br>
            <select name="tipos_id" id="tipos_id" class="form-control">
              <option value="{{ $tipo->id }}">Selecione o tipo</option>
              @foreach($tipos as $tipo)
              <option value="{{ $tipo->id }}"> {{ $tipo->tiponome }}</option>
              @endforeach
            </select><br>
            <label>Preço de Compra</label></br>
            <input type="number" name="preco_compra" id="preco_compra" class="form-control" placeholder="Inserir qual o preço de compra." step="0.01"></br>
            <label>Preço Estimado de Venda</label></br>
            <input type="number" name="preco_venda" id="preco_venda" class="form-control" placeholder="Inserir o possível preço de venda." step="0.01"></br>
            <label>Estoque</label></br>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Inserir a quantidade de estoque do produto."></br>
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
