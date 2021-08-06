{{-- //Apenas lembrando extends('pasta.arquivo.blade.php') --}}
@extends('layout.app', ["current" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h1 class="text-center">Listar</h1>
            @if (count($cats) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->nome}}</td>
                            <td>
                                <a href="/categorias/editar/{{$c->id}}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/categorias/deletar/{{$c->id}}" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2>Não há categorias cadastradas para serem listadas.</h2>
            @endif
        </div> {{--card-body--}}
        <div class="card-footer">
            <a href="/categorias/novo" class="btn btn-primary">Nova Categoria</a>
        </div>
    </div>{{--card--}}
@endsection