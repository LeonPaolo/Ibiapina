          
@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <div class="content-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="">Atualizar meus dados
                    </h4>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')
    <form action="{{ route('User.update', auth()->user()->id) }}" method="POST" id="form_dados">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $user->name }}">
            </div>

            <div class="form-group col-md-6">
                <label>Endereço de email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="mt-3">
        <div class="col text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-danger "  data-toggle="modal" data-target="#modalSenha">
            <i class=" fas fa-user-lock"> </i>
            Atualizar senha
            </button>
        </div>
        </div>
    </form>
    <!-- Modal alteração de senha-->
    <div class="modal fade" id="modalSenha">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Atualização de senha</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('Senha.update',  auth()->user()->id) }}" role="form" method="post" id="form_senha"  accept-charset="utf-8">
            @csrf
            @method('PUT')
            <div class="form-group input-group mb-3">
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a nova senha" required="true">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="far fa-eye" onclick="verSenha()"></span>
                </div>  
            </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" style="width: 45%;">Fechar</button>
            <button type="submit" name="Enviar" class="btn btn-success btn-sm" style="width: 45%;">Salvar</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    </div>
    <!-- Fim Modal -->
@stop
@section('footer')
    <strong>Copyright &copy; {{ date('Y')}} <a href="#">Ibiapina Descartáveis</a>.</strong>
Todos os direitos reservados.
@endsection
@section('js')
    <script src="{{ asset('/Site/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/validation/jquery.validate.min.js') }}"></script>
    <script>
        function verSenha() {
            var x = document.getElementById("senha");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#form_dados').validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 3,
                    },
                    email:{
                        required: true,
                        email: true
                    },
                },
                messages: {
                nome:{
                    required: "Digite seu nome",
                    minlength: "Mínimo de 3 letras",
                },
                email:{
                    required: "Digite um email válido",
                    email: "Digite um email válido"
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
        $(document).ready(function () {
            $('#form_senha').validate({
                rules: {
                    senha: {
                        required: true,
                        minlength: 5,
                    }
                },
                messages: {
                senha:{
                    required: "Digite sua nova senha",
                    minlength: "Mínimo de 8 Dígitos",
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

