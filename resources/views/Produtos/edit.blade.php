@extends('layouts.telatipo')
@section('content')
  <div class="card" style="margin:20px;">
    <div class="card-header">Editar Produto</div>
      @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
      @endif
        <div class="card-body">
          <form action="{{ url('produtos/' .$produtos->id) }}" method="post">
            {!! csrf_field() !!}
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$produtos->id}}">
            <label>Categoria</label></br>
            <input type="text" name="letra_numero" id="letra_numero" value="{{$produtos->letra_numero}}" class="form-control"></br>
            <label>Nome</label></br>
            <input type="text" name="nome" id="nome" value="{{$produtos->nome}}" class="form-control"></br>
            <label for="tipos_id">Tipos</label><br>
            <select name="tipos_id" id="tipos_id" class="form-control">
              <option value="">Selecione o tipo</option>
              @foreach($tipos as $tipo)
              <option value="{{ $tipo->id }}" @if ($produtos->tipos_id == $tipo->id) selected @endif>{{ $tipo->tiponome }}</option>@endforeach
            </select><br>
            <label>Preço de Compra</label></br>
            <input type="number" name="preco_compra" id="preco_compra" value="{{$produtos->preco_compra}}" class="form-control" step="0.01"></br>
            <label>Preço Estimado de Venda</label></br>
            <input type="number" name="preco_venda" id="preco_venda" value="{{$produtos->preco_venda}}" class="form-control" step="0.01"></br>
            <label>Estoque</label></br>
            <input type="number" name="estoque" id="estoque" value="{{$produtos->estoque}}" class="form-control"></br>
            <input type="submit" value="Atualizar" class="btn btn-success"></br>
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

