@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Painel Administrativo</h1>
@stop

@section('content')
<div class="row acessibilidade d-flex justify-content-center">
    <div class="col-lg-3 col-6 acessibilidade">
      <!-- small box -->
      <div class="small-box bg-success acessibilidade">
        <div class="inner acessibilidade">
          <p class="acessibilidade">Total de Produtos</p>
          <h3 class="acessibilidade">{{ $produtos->count() }}</h3>
        </div>
        <div class="icon acessibilidade">
          <i class=" fas fa-clipboard-list  "></i>
        </div>
        <a href="{{ route('Produtos.index') }}" class="small-box-footer">Gerenciar <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6 acessibilidade">
      <!-- small box -->
      <div class="small-box bg-info acessibilidade">
        <div class="inner acessibilidade">
          <p class="acessibilidade">Total de Marcas</p>
          <h3 class="acessibilidade">{{ $marcas->count() }}</h3>
        </div>
        <div class="icon acessibilidade">
          <i class=" fas fa-clipboard-list  "></i>
        </div>
        <a href="{{ route('Marcas.index') }}" class="small-box-footer">Gerenciar <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6 acessibilidade">
      <!-- small box -->
      <div class="small-box bg-warning acessibilidade">
        <div class="inner acessibilidade">
          <p class="acessibilidade">Total de Categoria</p>
          <h3 class="acessibilidade">{{ $categorias->count() }}</h3>
        </div>
        <div class="icon acessibilidade">
          <i class=" fas fa-clipboard-list  "></i>
        </div>
        <a href="{{ route('Categorias.index') }}" class="small-box-footer">Gerenciar <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>
@stop
@section('footer')
    <strong>Copyright &copy; {{ date('Y')}} <a href="#">Ibiapina Descartáveis</a>.</strong>
Todos os direitos reservados.
@endsection


@section('js')
    
@stop
