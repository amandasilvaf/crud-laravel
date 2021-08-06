{{-- //Apenas lembrando extends('pasta.arquivo.blade.php') --}}
@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h1 class="text-center">Listar</h1>
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Qtde</th>
                            <th>Valor</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     
            
                    </tbody>
                </table>
        </div> {{--card-body--}}
        <div class="card-footer">
            <button class="btn btn-primary" role="button" onClick="novoProduto()">Novo Produto</button>
        </div>
    </div>{{--card--}}

    <div class="modal" tabindex="-1" role="dialog" id="modalProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="moda-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-lable">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estoque" class="control-lable">Qtde Estoque</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="estoque">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor" class="control-lable">Valor</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="valor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="control-lable">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="categoria"></select>
        
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dissmiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">
        function novoProduto(){
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#estoque').val('');
            $('#valor').val('');
            $('#modalProdutos').modal('show')
        }
    </script>
@endsection