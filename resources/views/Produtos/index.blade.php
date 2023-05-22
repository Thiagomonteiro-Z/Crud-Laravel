@extends('layouts.tela')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 <h1>Cadastro de produtos</h1>
    <div class="container">
        <a href="javascript:void(0)" id="adicionar" class="btn btn-success btn-sm" title="Adicionar">Adicionar novo</a> 
        <br>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->letra_numero }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->getTipo->tiponome}}</td>
                            <td>
                                <a href="{{ url('/produtos/' . $item->id) }}" title="Vizualisar produtos"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Vizualizar</button></a>
                                <a href="javascript:void(0)" class="btn btn-success btn-sm editarbtn" data-id="{{$item->id}}" title="Editar produtos">Editar</a>
                                    <form method="POST" action="{{ route('produtos.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar produtos" onclick="return confirm('Você tem certeza que quer deletar?')"><i class="fa fa-trash-o" aria-hidden="true"></i>Deletar</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('Produtos.modalcreate')
    @include('Produtos.modaledit')

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.success("{{ Session::get('message') }}");
        </script>
    @endif
    <script type="text/javascript"> 
        $(document).ready(function() {
            $('#adicionar').click(function(){
            $('#adicionarprodutos').modal('show');});
            $('.editarbtn').on('click', function() {
            var id=$(this).attr('data-id');

            $.ajax({
                method: "get",
                url: "/produtos/edit/"+id,
                dataType: "json",
                contentType: "application/json",
                crossDomain: true,
                cache: false,
                success: function (data){
                    console.log(data);
                    $('#id_update').val(data.produto.id);
                    $('#letra_numero_update').val(data.produto.letra_numero);
                    $('#nome_update').val(data.produto.nome);
                    $('#tipos_id_update').val(data.produto.tipos_id).change();
                    $('#preco_compra_update').val(data.produto.preco_compra);
                    $('#preco_venda_update').val(data.produto.preco_venda);
                    $('#estoque_update').val(data.produto.estoque);
                    $('#editarProdutoForm').attr('action', 'produtos/'+data.produto.id);
                    $('#editarprodutosmodal').modal('show');
                },

            }); 
            });
            });
       
    </script>
@stop


               