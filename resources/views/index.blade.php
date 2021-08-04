@extends('layout.app')

@section('body')

    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="car-title">Cadastro de Produtos</h5>
                        <p class="card=text">Texto do card</p>
                        <a href="/produtos" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="car-title">Cadastro de Categorias</h5>
                        <p class="card=text">Texto do card</p>
                        <a href="/produtos" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection