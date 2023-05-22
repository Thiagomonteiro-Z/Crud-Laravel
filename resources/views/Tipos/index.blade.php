@extends('layouts.telatipo')
@section('content')

 <h1>Cadastro de tipos</h1>
    <div class="container">
        <a href="{{ url('/tipos/create') }}" class="btn btn-success btn-sm" title="Adicionar">Adicionar novo</a> 
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tiponome}}</td>
                            <td>
                                <a href="{{ url('/tipos/' . $item->id) }}" title="Vizualisar tipos"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Vizualizar</button></a>
                                <a href="{{ url('/tipos/' . $item->id . '/edit') }}" title="Editar tipos"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                <form method="POST" action="{{ url('/tipos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Deletar tipos" onclick="return confirm('Você tem certeza que quer deletar?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
@stop
               