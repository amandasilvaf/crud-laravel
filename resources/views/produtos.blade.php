{{-- //Apenas lembrando extends('pasta.arquivo.blade.php') --}}
@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h1 class="text-center">Listar</h1>
                <table class="table table-ordered table-hover" id="tabelaProdutos">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                    
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        // Exibe o modal com os campos vazios para serem preenchidos
        function novoProduto(){
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#estoque').val('');
            $('#valor').val('');
            $('#modalProdutos').modal('show');
        }

        // Busca as categorias do banco e as insere no select do form
        function carregarCategorias(){
            $.getJSON('/api/categorias', function(data){
                console.log(data);
                for(i=0; i<data.length; i++){
                    opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>'; 
                    $('#categoria').append(opcao);
                }
            });
        }

        function carregarProdutos(){
            $.getJSON('/api/produtos', function(produtos){
                for(i=0; i<produtos.length; i++){
                    linha = montarLinha(produtos[i]);
                    $('#tabelaProdutos>tbody').append(linha);
                }
            });
        }

        function montarLinha(p){
            var linha = "<tr>" + 
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.valor_atual + "</td>" +
                "<td>" + p.categoria_id + "</td>" +
                "<td>" +
                    '<button class="btn btn-sm btn-warning m-1" onclick="editar(' + p.id + ')"> Editar </button>'+
                    '<button class="btn btn-sm btn-danger m-1" onclick="remover(' + p.id + ')"> Excluir </button>'+
                "</td>" +
                "</tr>";
            return linha;
        }

       
        function editar(id){
            $.getJSON('/api/produtos/'+id, function(data){
                console.log(data);
                $('#id').val(data.id);
                $('#nomeProduto').val(data.nome);
                $('#estoque').val(data.estoque);
                $('#valor').val(data.valor_atual);
                $('#categoria').val(data.categoria_id);
                $('#modalProdutos').modal('show');
            });
        }
        function salvarProduto(){
            prod = {
                id:           $('#id').val(),
                nome:         $('#nomeProduto').val(),
                valor_atual:  $('#valor').val(),
                estoque:      $('#estoque').val(),
                categoria_id: $('#categoria').val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + prod.id,
                context: this,
                data: prod,
                success: function(data){
                    prod = JSON.parse(data)
                    console.log('Salvou!')
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter( function(i, e){
                        return (e.cells[0].textContent == prod.id)
                    });
                    if(e){
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.nome;
                        e[0].cells[2].textContent = prod.estoque;
                        e[0].cells[3].textContent = prod.valor_atual;
                        e[0].cells[4].textContent = prod.categoria_id;
                    }
                },
                error: function(error){
                    console.log(error)
                }
            });
        }

        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function(){
                    console.log('Apagou!!')
                    linhas = $('#tabelaProdutos>tbody>tr');
                    e = linhas.filter( function(i, elemento){
                        return elemento.cells[0].textContent == id;
                    });
                    if (e)
                        e.remove();

                },
                error: function(error){
                    console.log(error)
                }
            });
        }

        function criarProduto(){
            prod = {
                nome:         $('#nomeProduto').val(),
                valor_atual:  $('#valor').val(),
                estoque:      $('#estoque').val(),
                categoria_id: $('#categoria').val()
            };
            $.post("/api/produtos", prod, function(data){
                console.log(data);
                produto = JSON.parse(data);
                linha = montarLinha(produto)
                $('#tabelaProdutos>tbody').append(linha);
            });

        }

        

        $('#formProduto').submit( function(event){
            event.preventDefault();
            if($("#id").val() != '')
                salvarProduto();
            else
                criarProduto();
            $("#modalProdutos").modal('hide');
        });


        $(function (){
            carregarCategorias();
            carregarProdutos();
        });
     
    </script>
    
@endsection