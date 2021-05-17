<script src="{{ asset('/Site/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
 
        
<!--js plugins-->
<script src="{{ asset('/Site/js/landing.custom.js') }}"></script>
<script src="{{ asset('/Site/https://cdn.lightwidget.com/widgets/lightwidget.js') }}"></script>
<script src="{{ asset('/Site/js/Plugins/plugins.js') }}"></script>
<script src="{{ asset('/Site/bower_components/jquery/dist/jquery.min.js') }}"></script>  
<script src="{{ asset('/Site/js/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/js/jquery.easing.1.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/bootstrap/js/bootstrap.min.js') }}"></script>       
<script src="{{ asset('/Site/js/jquery.sticky.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('/Site/js/jquery.mousewheel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/bower_components/flexslider/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('/Site/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/js/tweetie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/js/custom.js') }}" type="text/javascript"></script>
<!--revolution slider extentions-->
<script type="text/javascript" src="{{ asset('/Site/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Site/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<!--revolution slider extentions-->
<script type="text/javascript" src="{{ asset('/Site/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Site/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Site/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<!--contat-me-->
<script src="{{ asset('/Site/js/contact_me.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Site/js/jqBootstrapValidation.js" type="text/javascript') }}"></script>
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