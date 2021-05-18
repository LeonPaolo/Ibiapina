<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('titulo')</title>

        <!-- Bootstrap --> 
        <link href="{{ asset('/Site/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
        <!--plugins-->
        <link href="{{ asset('/Site/bower_components/font-awesome/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/bower_components/flexslider/flexslider.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/owl-carousel/assets/owl.carousel.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/owl-carousel/assets/owl.theme.default.css') }}" type="text/css"  rel="stylesheet">
        
        <link href="{{ asset('/Site/pe-icons/Pe-icon-7-stroke.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/custom-scrollbar/jquery.mCustomScrollbar.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/css/yamm.css') }}" rel="stylesheet">

        <!--revolution css-->
        <link href="{{ asset('/Site/revolution/css/navigation.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/revolution/css/layers.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('/Site/revolution/css/settings.css') }}" type="text/css" rel="stylesheet">
        <!--custom css file-->
        <link href="{{ asset('/Site/css/style.css') }}" type="text/css" rel="stylesheet">
        <link rel="icon" href="{{ asset('/Site/images/ico.png') }}" type="image/gif" sizes="16x16">

     
    </head>
            <!--navigation -->
        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="/Site/images/logotransparente.png"
                            alt="ASSAN"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right scroll-to">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#sobre">Sobre</a></li>
                        <li><a href="#produtos">Produtos</a></li>
                        <li><a href="#contact">Contato</a></li>

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--container-->
        </div>
        <!--navbar-default-->
        </header>

    <body>
        @yield('conteudo')
        @yield('javascript')        
    </body>
    <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 margin-b-30">
                                <h3>Sobre</h3>
                                <p style="text-align: justify;">
                                    "Ibiapina Descartáveis e Variedades, uma loja completa no ramo de descartáveis,
                                    produtos para Delivery, Higiene Pessoal, Produtos de Beleza, Produtos de Limpeza,
                                    Acessórios para Lar e Escritórios. Melhor atendimento e o menor preço. Trabalhamos
                                    no Atacado e Varejo." </p>
                                <ul class="list-inline social-footer">
                                    <li><a href="https://www.facebook.com/IbiapinaDescartaveis"
                                            data-toggle="tooltip" data-placement="top" target="_blank"
                                            data-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/ibiapinadescartaveis_/" target="_blank"
                                            data-toggle="tooltip" data-placement="top" data-title="Instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://api.whatsapp.com/send?phone=5596981373836&text="
                                            data-toggle="tooltip" data-placement="top" target="_blank"
                                            data-title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>

                                </ul>
                            </div>


                            <div class="col-md-4 margin-b-30">
                                <h3>Meta Tags </h3>
                                <div class="tags clearfix">
                                    <a href="#">Descartáveis</a>
                                    <a href="#">Variedades</a>
                                    <a href="#">Produtos de Limpeza</a>
                                    <a href="#">Acessórios</a>
                                    <a href="#">Casa</a>
                                    <a href="#">Escritórios</a>
                                    <a href="#">Atacado</a>
                                    <a href="#">Varejo</a>
                                    <a href="#">Delivery</a>
                                </div>
                            </div>
                            <div class="col-md-4 margin-b-30">
                                <h3>Contato</h3>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">96 98137-3836</h4>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Av: Felipe Camarão 1508 - Buritizal - Macapá/Ap</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="footer-bottom">
                    <div class="container text-center">
                        <h3><a href="#"><img src="/Site/images/logotransparente.png" width="150px"
                                    alt=""></a></h3>
                        <ul class="list-inline">
                            <li><a href="#">Home</a></li>
                            <li><a href="#sobre">Sobre</a></li>
                            <li><a href="#produtos">Produtos</a></li>
                            <li><a href="#contact">Contato</a></li>
                        </ul>

                        <span class="copyright">&copy; Copyright {{ date('Y') }}, Todos os direitos reservados a Ibiapina
                            Descartáveis e Variedades.</span>
                    </div>
                    <div class="container text-center">
                        <span class="copyright">Desenvolvido por </span>
                        <h3><a href=https://agenciawds.com.br target="_blank"> <img src="/Site/images/wds.png"
                                    width="80px" alt=""></a></h3>
                    </div>
                </div>
                <!--footer end-->
</html>