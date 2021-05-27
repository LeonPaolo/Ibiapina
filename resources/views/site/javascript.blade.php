<script src="/Site/assets/bower_components/jquery/dist/jquery.min.js"></script>
 <!--js plugins-->
 <script src="/Site/js/landing.custom.js"></script>
 <script src="/Site/https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
 <script src="/Site/js/Plugins/plugins.js"></script>
 <script src="/Site/bower_components/jquery/dist/jquery.min.js"></script>  
 <script src="/Site/js/jquery-migrate.min.js" type="text/javascript"></script>
 <script src="/Site/js/jquery.easing.1.3.min.js" type="text/javascript"></script>
 <script src="/Site/bootstrap/js/bootstrap.min.js"></script>       
 <script src="/Site/js/jquery.sticky.js" type="text/javascript"></script>
 <script src="/Site/js/bootstrap-hover-dropdown.min.js"></script>
 <script src="/Site/js/jquery.mousewheel.min.js" type="text/javascript"></script>
 <script src="/Site/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
 <script src="/Site/bower_components/flexslider/jquery.flexslider-min.js"></script>
 <script src="/Site/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
 <script src="/Site/js/tweetie.min.js" type="text/javascript"></script>
 <script src="/Site/js/custom.js" type="text/javascript"></script>
 <!--revolution slider extentions-->
 <script type="text/javascript" src="/Site/revolution/js/jquery.themepunch.revolution.min.js"></script>
 <script type="text/javascript" src="/Site/revolution/js/jquery.themepunch.tools.min.js"></script>
 <!--revolution slider extentions-->
 <script type="text/javascript" src="/Site/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
 <script type="text/javascript" src="/Site/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
 <script type="text/javascript" src="/Site/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
 <!--contat-me-->
 <script src="/Site/js/contact_me.js" type="text/javascript"></script>
 <script src="/Site/js/jqBootstrapValidation.js" type="text/javascript"></script>
 <script>
     /******************************************
      -	PREPARE PLACEHOLDER FOR SLIDER	-
      ******************************************/

     var revapi;
     jQuery(document).ready(function () {
         revapi = jQuery("#rev_slider").revolution({
             sliderType: "standard",
             sliderLayout: "auto",
             delay: 9000,
             navigation: {
                 arrows: {enable: true}
             },
             gridwidth: 1230,
             gridheight: 500
         });
     });	/*ready*/
 </script>	
 <script>
    $(document).ready(function () {
    $('#vendidos').val(this.checked);
    $('#retirar').val(this.checked);
    $("#retirar").change(function(){
        var retirar = $('#retirar').is(":checked");
        if(retirar == true){
            $("#marca").val( $('option:contains("")').val() );
            $("#categoria").val( $('option:contains("")').val() );
            $('#vendidos, #retirar').each(function () {
                if (this.checked) this.checked = false;
                $('.velho').show()
                $('.novo').remove()
                $('.nada').remove()
            })
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
        $.get('/maisVendido/s', function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }else if(vendido == true && catValor == "" && marcaValor != ""){
        $.get('/maisVendidoMarca/s/' + marcaValor, function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }else if(vendido == true && catValor != "" && marcaValor == ""){
        $.get('/maisVendidoCategoria/s/' + catValor, function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }else if(vendido == true && catValor != "" && marcaValor != ""){
        $.get('/maisVendidoCategoriaMarca/s/' + catValor + '/' + marcaValor, function(data){
        if(data.length > 0){
            $('.novo').remove()
            $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
        }else{
            $('.novo').remove()
            $('.nada').remove()
            $("#filtros").after(
                "<div class='col-sm-6 col-md-3 nada'>" +
                        "<div class='item_holder'>" +
                            "<div class='title'>" +
                                "<h4> Nada encontrado </h4>" +
                            "</div>" +
                            "<div class='space-15'></div>" +
                        "</div>" +
                "</div>"
            )
        }
        });
    }
    //filtros normais
    else if(vendido == false && catValor != "" && marcaValor == ""){
        $.get('/FiltroCategoria/' + catValor, function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }else if(vendido == false && catValor == "" && marcaValor != ""){
        $.get('/FiltroMarca/' + marcaValor, function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }else if(vendido == false && catValor != "" && marcaValor != ""){
        $.get('/FiltroMarcaCategoria/' + marcaValor + '/' + catValor, function(data){
            if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
        });
    }
});

});
$(document).ready(function(){
  $("#busca").on("keyup", function() {
    var value = $(this).val();
    $.get('/busca/' + value, function(data){
        if(data.length > 0){
                $('.novo').remove()
                $('.nada').remove()
            $.each(data, function(index, res){
                $('.velho').hide()
                $("#filtros").after(
                "<div class='col-sm-6 col-md-3 novo'>" +
                    "<div class='item_holder'>" +
                        "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                        "<div class='title'>" +
                            "<h4> " + res.nome + " </h4>" +
                            "<span class='price'> " + res.marca.nome + " </span>" +
                        "</div>" +
                        "<div class='space-15'></div>" +
                        "<a href='/produtos/detalhes/" + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                    "</div>" +
                "</div>"
                )
            });
            }else{
                $('.velho').hide()
                $('.novo').remove()
                $('.nada').remove()
                $("#filtros").after(
                    "<div class='col-sm-6 col-md-3 nada'>" +
                            "<div class='item_holder'>" +
                                "<div class='title'>" +
                                    "<h4> Nada encontrado </h4>" +
                                "</div>" +
                                "<div class='space-15'></div>" +
                            "</div>" +
                    "</div>"
                )
            }
    });
  });
});
</script>