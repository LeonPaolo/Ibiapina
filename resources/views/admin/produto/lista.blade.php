          
@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <div class="content-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="">Lista de produtos
                    </h4>
                </div>
                <div class="col-sm-6">
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
            <table class="table table-hover text-nowrap table-sm acessibilidade">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do produto</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produtos as $produto)                         
                <tr>
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
            <div class="p-1 d-flex justify-content-center" style="border-top: 1px solid #ddd;">
            {{$produtos->links()}}
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
    <script src="{{ asset('/Site/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
@stop

