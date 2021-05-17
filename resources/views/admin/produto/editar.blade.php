          
@extends('adminlte::page')

@section('title', 'Adicionar Protudo')

@section('content_header')
    <div class="content-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="">Produto
                    </h4>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('Produtos.index')}}" class=" float-right ">
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
                <h3 class="card-title "> <i class="fas fa-pen-fancy "></i> Editar <small class="ml-3 "></small></h3>
              </div>
       
              <form role="form" id="form_produto" action="{{route('Produtos.update', $produto->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-lg-4">
                            <label for="produto"> Nome: </label>
                            <input type="text" id="produto"  name="nome" required class="form-control" value="{{ $produto->nome }}" >
                        </div> 
                        <div class="form-group col-lg-4">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" name="categoria" class="form-control" >
                                <option value="{{ $produto->categoria->id }}">{{ $produto->categoria->nome }} </option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}"> {{$categoria->nome}} </option>                     
                                    @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="marca">Marca:</label>
                            <select id="marca" name="marca" class="form-control" >
                                <option value="{{ $produto->marca->id }}">{{ $produto->marca->nome }}</option>
                                    @foreach($marcas as $marca)
                                    <option value="{{$marca->id}}"> {{$marca->nome}} </option>                     
                                    @endforeach
                            </select>                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <div class="callout callout-primary">
                                <label for="vendidos"> Produto mais vendido:</label> <br>
                                @if($produto->status == 's')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="v1" name="vendido" value="s" checked>
                                        <label class="custom-control-label acessibilidade" for="v1">Sim</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="v2" name="vendido" value="n" >
                                        <label class="custom-control-label acessibilidade" for="v2">Não</label>
                                    </div>
                                @else
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="v1" name="vendido" value="s" >
                                        <label class="custom-control-label acessibilidade" for="v1">Sim</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="v2" name="vendido" value="n" checked>
                                        <label class="custom-control-label acessibilidade" for="v2">Não</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                      <div class="form-group  col-lg-6">
                          <label for="descricao"> Descrição: </label>
                          <textarea name="descricao"  id="descricao" class="form-control" rows="1" placeholder="Descreva o produto.">{{ $produto->descricao }}</textarea>
                      </div>
                      <div class="col-lg-3 form-group">
                        <label for="foto">Anexe até três fotos:</label>
                        <div class="custom-file">
                          <img src="" class="img-thumbnail" style="height:200px; display: none;" id="img">
                            <input type="file" accept="image/*" id="foto" name="fotos[]" class="custom-file-input" aria-describedby="foto" multiple>                     
                            <label class="custom-file-label" for="foto" data-browse="Anexar">Selecione</label>
                        </div>
                        @error('foto')
                           <span class="invalid-feedback"></span>
                           <div class="alert text-danger">
                                <small>{{ $message }}  </small> 
                           </div>
                        @enderror
                    </div>
                    <div class="form-row" id="fotos">
                        @foreach ($produto->images as $image)
                            <img src="/storage/{{ $image->imagem }}" class='img-thumbnail' style='height:200px;'>
                        @endforeach
                    </div> 
                    </div>
                </div>
                
                <div class="card-footer">
                  <div class="col text-center">
                    <button type="submit" class="  btn btn-info btn-sm mr-4 col-3"  name="Cadastrar" value="Cadastrar">Salvar</button>
                    <button type="reset" id="reset" class=" btn btn-secondary btn-sm col-3 "  name="Limpar" value="Limpar" >Limpar</button>
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
        $("#produto, #descricao").keyup(function(e) {
            var str = $(this).val();
            str = str.replace(/(^|\s|$)(?!de|do|d$)(.)/g, (geral, match1, match2) => match1 + match2.toUpperCase());
            $(this).val(str);
        });
      </script>

    <script>
        $(document).ready(function () {
            $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
            }, 'O tamanho do arquivo deve ser menor que 2MB');
            $.validator.addMethod('filelength', function (value, element, param) {
            return this.optional(element) || (element.files.length <= param)
            }, 'Máximo de 3 arquivos');
            $.validator.addMethod( "extension", function( value, element, param ) {
                param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
                return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
            }, $.validator.format( "Insira um valor com uma extensão válida." ) );
            $('#form_produto').validate({
                rules: {
                nome: {
                    required: true,
                    minlength: 3,
                },
                "fotos[]": {
                    extension: "jpg|jpeg|png",
                    filesize: 2000000,
                    filelength: 3
                },
                descricao:{
                    required: true,
                    minlength: 3
                },
                marca:{
                    required: true
                },
                categoria:{
                    required: true
                },
                },
                messages: {
                nome:{
                    required: "Informe um nome para a produto",
                    minlength: "Mínimo de 3 letras",
                },
                "fotos[]": {
                    filesize: 2000000,
                    filelength: 'Selecione no máximo 3 arquivos'
                },
                descricao:{
                    required: "Informe uma descrição",
                    minlength: "Mínimo de 3 letras",
                },
                marca:{
                    required: "Selecione uma marca"
                },
                categoria:{
                    required: "Selecione uma categoria"
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
    <script>
        $("#reset").click(function(){
            $('#fotos').empty()
        });
         $('#form_produto').on("change", "#foto", function() {
            function readURL(input) {
                $('#fotos').empty()
                for(i = 0; i <= input.files.length; i++){
                    if (input.files && input.files[i]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#fotos').prepend("<img src='" + e.target.result + "' class='img-thumbnail' style='height:200px;'>")
                        }
                    reader.readAsDataURL(input.files[i]);
                    }
                }
            }
            readURL(this);
         });
    </script>
@stop

