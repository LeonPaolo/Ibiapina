          
@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <div class="content-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <h4 class="">Lista de produtos
                    </h4>
                </div>
                <div class="col-sm-2 ">
                    <label for="marca">Filtrar por: Marca</label>
                    <select name="nomeMarca"  id="marca" class="form-control">
                        <option value="">Selecione</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 ">
                    <label for="categoria">Categorias</label>
                    <select name="nomeMarca"  id="categoria" class="form-control">
                        <option value="">Selecione</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 ">
                    <input type="checkbox" class="form-check-input"  id="vendidos">
                        <label class="form-check-label" for="pesquisa">Mais Vendidos</label>
                </div>
                <div class="col-sm-2 ">
                    <input type="checkbox" class="form-check-input"  id="retirar">
                    <label class="form-check-label" for="retirar">Retirar os filtros</label>
            </div>
                <div class="col-sm-2">
                    <a href="{{route('Produtos.create')}}" class=" float-right ">
                    <div class="p-2 ">
                        <button class="btn  btn-primary btn-sm " style="width: 100px;">
                            Cadastrar
                        </button>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="card  col-lg-12 card-outline card-info">
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-sm acessibilidade" id="produtos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do produto</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody id="table">
                @forelse ($produtos as $produto)                         
                <tr class="tabela">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->categoria->nome}}</td>
                    <td>{{$produto->marca->nome}}</td>
                    <td>
                        @if($produto->deleted_at == null)
                            <form action="{{route('Produtos.destroy', $produto->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="acessibilidade mr-2 btn btn-info btn-sm" href="{{route('Produtos.edit', $produto->id)}}" > <i class="fas fa-edit"></i> Editar</a>
                                <input class="btn btn-danger btn-sm" type="submit" value="Desativar" style="width: 80px;">  
                            </form>
                        @else
                            <form action="{{route('Produto.ativa', $produto->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <a class="acessibilidade mr-2 btn btn-secondary btn-sm" href="#" > <i class="fas fa-edit"></i> Editar</a>
                                <input class="btn btn-success btn-sm" type="submit" value="Ativar" style="width: 80px;">  
                            </form>
                        @endif
                    </td>
                </tr>  
                @empty
                    <table class="acessibilidade ml-4 mt-2"><tr><td class="font-weight-normal" style="color: #999900;"><i class="fas fa-exclamation-circle"></i> Nenhum registro encontrado</td></tr></table>
                @endforelse
            </tbody>
            </table>
            <div class="p-1 d-flex justify-content-center" style="border-top: 1px solid #ddd;" id="links">
            {{$produtos->links()}}
            </div>
            <div class="text-center container">
                <nav aria-label="..." id="paginationNav">
                  <ul class="pagination row d-flex justify-content-center pagination-sm">
                    <!-- Receber o pagination do filtro -->
                  </ul>
                  
                </nav>
              </div>            
        </div>
        </div>
        </div>
    </div>
@stop
@section('footer')
    <strong>Copyright &copy; {{ date('Y')}} <a href="#">Ibiapina Descartáveis</a>.</strong>
Todos os direitos reservados.
@endsection
@section('js')
    <script>        
        $(document).ready(function () {
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $('#vendidos').val(this.checked);
            $('#retirar').val(this.checked);
            $("#retirar").change(function(){
                var retirar = $('#retirar').is(":checked");
                if(retirar == true){
                    document.location.reload(true);
                }
            })
            $('#marca, #categoria, #vendidos').change(function () {
                var marca = document.getElementById('marca');
                var cat = document.getElementById('categoria');
                var vendido = $('#vendidos').is(":checked");
                marcaValor = marca.options[marca.selectedIndex].value;
                catValor = cat.options[cat.selectedIndex].value;
                //filtros com mais vendidos igual a true
                if(vendido == true && catValor == "" && marcaValor == ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminMaisVendido/s',{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                    
                }else if(vendido == true && catValor == "" && marcaValor != ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminMaisVendidoMarca/s/' + marcaValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }else if(vendido == true && catValor != "" && marcaValor == ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminMaisVendidoCategoria/s/' + catValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }else if(vendido == true && catValor != "" && marcaValor != ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminMaisVendidoCategoriaMarca/s/' + catValor + '/' + marcaValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }
                // filtros sem mais vendidos
                else if(vendido == false && catValor != "" && marcaValor == ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminFiltroCategoria/' + catValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }else if(vendido == false && catValor == "" && marcaValor != ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminFiltroMarca/' + marcaValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }else if(vendido == false && catValor != "" && marcaValor != ""){
                    carregarProdutos(1);
                    function carregarProdutos(pagina){
                        $.get('/AdminFiltroMarcaCategoria/' + marcaValor + '/' + catValor,{page: pagina}, function(data){
                            if(data.data.length > 0){
                                $('.limpo').empty()
                                montarTabela(data.data)
                                montarPaginator(data);
                                $("#paginationNav>ul>li>a").click(function(){
                                    carregarProdutos($(this).attr('pagina'));
                                })
                                $(".dados>td>input[desativar]").click(function(){
                                    id = $(this).attr('acao')
                                    desativarProduto(_token, id)
                                    carregarProdutos(data.current_page)
                                })
                                $(".dados>td>input[active]").click(function(){
                                    id = $(this).attr('ativar')
                                    ativarProduto(_token, id)                                   
                                    carregarProdutos(data.current_page)
                                })
                            }else{
                                NadaEncontrado()
                            }
                    });    
                    }
                }else{
                    $('.limpo').empty()
                    $(".tabela").show()
                    $("#links>nav").show()
                    $('.dados').empty()
                    $("#paginationNav>ul>li").remove();
                }

            });
            function montarTabela(data){
                $(".tabela").hide()
                $("#links>nav").hide()
                $('.dados').empty()
                for(i=0;i<data.length;i++) {
                    $("#produtos>tbody").append(
                        montarLinha(data[i])
                    );
                }
            }
            function montarLinha(produto) {
                if(produto.deleted_at == null){
                    return "<tr class='dados'>" +
                    '  <th >' + (i + 1) + '</th>' +
                    '  <td>' + produto.nome + '</td>' +
                    '  <td>' + produto.categoria.nome + '</td>' +
                    '  <td>' + produto.marca.nome + '</td>' +
                    '  <td><a class="acessibilidade mr-2 btn btn-info btn-sm" href="Produtos/'+ produto.id+'/edit" > <i class="fas fa-edit"></i> Editar</a>' +
                    '  <input class="btn btn-danger btn-sm" desativar acao="'+ produto.id +'" type="submit" value="Desativar" style="width: 80px;"></td>' +
                    '</tr>';
                }else{
                    return "<tr class='dados'>" +
                    '  <th >' + (i + 1) + '</th>' +
                    '  <td>' + produto.nome + '</td>' +
                    '  <td>' + produto.categoria.nome + '</td>' +
                    '  <td>' + produto.marca.nome + '</td>' +
                    '  <td><a class="acessibilidade mr-2 btn btn-secondary btn-sm" href="Produtos/'+ produto.id+'/edit" > <i class="fas fa-edit"></i> Editar</a>' +
                    '  <input class="btn btn-success btn-sm" active ativar="'+ produto.id +'" type="submit" value="Ativar" style="width: 80px;"></td>' +
                    '</tr>';
                }              
            }
            function montarPaginator(data) {
                $("#paginationNav>ul>li").remove();

                $("#paginationNav>ul").append(
                    getPreviousItem(data)
                );
                if(data.last_page < 10)
                        n = data.last_page;
                else
                    n = 10
                
                if (data.current_page - n/2 <= 1)
                    inicio = 1;
                else if (data.last_page - data.current_page < n)
                    inicio = data.last_page - n + 1;
                else 
                    inicio = data.current_page - n/2;
                
                fim = inicio + n-1;

                for (i=inicio;i<=fim;i++) {
                    $("#paginationNav>ul").append(
                        getItem(data,i)
                    );
                }
                $("#paginationNav>ul").append(
                    getNextItem(data)
                );
            }
            function getItem(data, i) {
                if (data.current_page == i) 
                    s = '<li class="page-item active">';
                else
                    s = '<li class="page-item">';
                s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">' + i + '</a></li>';
                return s;
            }
            function getPreviousItem(data) {
                i = data.current_page-1;
                if (data.current_page == 1) 
                    s = '<li class="page-item disabled">';
                else
                    s = '<li class="page-item">';
                s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Anterior</a></li>';
                return s;
            }
            function getNextItem(data) {
                i = data.current_page+1;
                if (data.current_page == data.last_page) 
                    s = '<li class="page-item disabled">';
                else
                    s = '<li class="page-item">';
                s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Próximo</a></li>';
                return s;
            }
            function NadaEncontrado(){
                $("#paginationNav>ul>li").remove();
                $(".dados").remove()
                $('.limpo').empty()
                $('#table').append("<tr class='limpo'><td class='font-weight-normal' style='color: red;'><i class='fas fa-exclamation-circle'></i> Nenhum registro encontrado</td></tr>")
                $("#paginationNav>ul>li").remove();
            }
            function desativarProduto(_token, id){
                $.ajax({
                    url: "/Produtos/"+ id,
                    type:"POST",
                    data:{
                    _token: _token,
                    _method: "DELETE"
                    },
                });
            }
            function ativarProduto(_token, id){
                $.ajax({
                    url: "/Produto/"+ id,
                    type:"POST",
                    data:{
                    _token: _token,
                    _method: "PUT"
                    },
                });
            }
            });
    </script>
@stop

