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

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="/Site/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="/Site/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @yield('conteudo')
        @yield('javascript')
    </body>
</html>