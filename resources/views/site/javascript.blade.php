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

$('#marca, #categoria').change(function () {

    var marca = document.getElementById('marca');
    var cat = document.getElementById('categoria');

    marcaValor = marca.options[marca.selectedIndex].value;
    catValor = cat.options[cat.selectedIndex].value;

    $.get('/filtro', function(data){
        $('.novo').remove()
        $('.velho').hide()
        $.each(data, function(index, res){
            if(catValor != "" && marcaValor != ""){
                if(res.categoria.id == catValor && res.marca.id == marcaValor ){
                         $("#filtros").after(
                            "<div class='col-sm-6 col-md-3 novo'>" +
                                "<div class='item_holder'>" +
                                    "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                                    "<div class='title'>" +
                                        "<h4> " + res.nome + " </h4>" +
                                        "<span class='price'> " + res.marca.nome + " </span>" +
                                    "</div>" +
                                    "<div class='space-15'></div> </div>" +
                                    "<a href='detalhes/ " + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                                "</div>" +
                            "</div>"
                        )
                }
            }else if(catValor == "" && marcaValor != ""){
                if(res.marca.id == marcaValor ){
                         $("#filtros").after(
                            "<div class='col-sm-6 col-md-3 novo'>" +
                                "<div class='item_holder'>" +
                                    "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                                    "<div class='title'>" +
                                        "<h4> " + res.nome + " </h4>" +
                                        "<span class='price'> " + res.marca.nome + " </span>" +
                                    "</div>" +
                                    "<div class='space-15'></div> </div>" +
                                    "<a href='detalhes/ " + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                                "</div>" +
                            "</div>"
                        )
                }
            }else{
                if(res.categoria.id == catValor ){
                         $("#filtros").after(
                            "<div class='col-sm-6 col-md-3 novo'>" +
                                "<div class='item_holder'>" +
                                    "<a href='/produtos/detalhes/" + res.id + "'><img src='/storage/" + res.images[0].imagem + "' class='img-responsive'></a>" +
                                    "<div class='title'>" +
                                        "<h4> " + res.nome + " </h4>" +
                                        "<span class='price'> " + res.marca.nome + " </span>" +
                                    "</div>" +
                                    "<div class='space-15'></div> </div>" +
                                    "<a href='detalhes/ " + res.id + "' data-toggle='tooltip' data-placement='top' title='' class='btn btn-skin'  data-original-title='Ver Detalhes'>Ver Detalhes</a>" +
                                "</div>" +
                            "</div>"
                        )
                }
            }
        });
    });
});

});
</script>