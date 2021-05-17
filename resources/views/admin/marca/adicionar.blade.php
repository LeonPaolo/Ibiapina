          
@extends('adminlte::page')

@section('title', 'Adicionar Marca')

@section('content_header')
    <div class="content-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="">Marca
                    </h4>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('Marcas.index')}}" class=" float-right ">
                    <div class="p-2 ">
                        <button class="btn  btn-primary btn-sm " style="width: 100px;">
                            Listar
                        </button>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
@include('flash::message')
<div class="content">
    <div class="container-fluid">
       <div class="row">  
          <div class="col-lg-12">   
            <div class="card card-primary ">
              <div class="card-header bg-info">
                <h3 class="card-title "> <i class="fas fa-pen-fancy "></i> Adicionar <small class="ml-3 "></small></h3>
              </div>
       
              <form role="form" id="form_marca" action="{{route('Marcas.store')}}" method="post" accept-charset="utf-8" >
                @csrf
                <div class="card-body">
                    <div class="form-row">
                      <div class="form-group  col-lg-12">
                          <label for="marca" class=""> Nome: </label>
                          <input type="text" id="marca"  name="nome" required class="form-control" placeholder="Nome da marca" >
                      </div>                       
                    </div>
                </div>
                
                <div class="card-footer">
                  <div class="col text-center">
                    <button type="submit" class="  btn btn-info btn-sm mr-4 col-3"  name="Cadastrar" value="Cadastrar">Salvar</button>
                    <button type="reset" class=" btn btn-secondary btn-sm col-3 "  name="Limpar" value="Limpar" >Limpar</button>
                  </div>
              </div>
            </form>
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
    <script src="{{ asset('/validation/jquery.validate.min.js') }}"></script>
    <script>
        $("#marca").keyup(function(e) {
            var str = $(this).val();
            str = str.replace(/(^|\s|$)(?!de|do|d$)(.)/g, (geral, match1, match2) => match1 + match2.toUpperCase());
            $(this).val(str);
        });
      </script>

    <script>
        $(document).ready(function () {
            $('#form_marca').validate({
                rules: {
                nome: {
                    required: true,
                    minlength: 3,
                }
                },
                messages: {
                nome:{
                    required: "Informe um nome para a marca",
                    minlength: "Mínimo de 3 letras",
                },   
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                }
            });
        
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

@stop

