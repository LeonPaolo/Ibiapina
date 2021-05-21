  <!--breadcrumb start-->
    <div class="breadcrumb-wrapper">
   
    <div class="container">
                <h1>Detalhes do Produto</h1>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="space-60"></div>
        <div class="container">
        <a class="btn btn-skin btn-lg" href="/produtos"> Voltar </a>
        <div class="space-60"></div>
            <div class="row single-product">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 margin-b-30">
                            <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                                @foreach($produto->images as $imgs)
                                <div class="item">
                                    <a href="/Site/images/produtos/plaszon.png" data-lightbox="roadtrip"> <img src="/storage/{{ $imgs->imagem }}" alt="Product image" class="img-responsive"></a>                              
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-detail-desc">
                                <h3 class="title"><a href="#">{{ $produto->nome }} - {{ $produto->marca->nome }}</a></h3>
                              
                              
                                <p style='text-align:justify;'>
                                    Venda no Atacado de Varejo.
                                </p>
                             
                                <div class="add-buttons">
                                   
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart" class="btn btn-skin btn-lg"><i class="fa fa-shopping-cart"></i> Falar com vendedor</a>
                                </div>
                            </div>
                        </div>
                    </div><!--single product details end-->
                    <div class="space-40"></div>
                    <div class="row">
                        <div class="col-md-12 item-more-info">
                            <div>

                                <!-- Nav tabs -->
                                <ul class="nav nav-justified" role="tablist">
                                    <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Descrição</a></li>
                                   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="desc">
                                       <p style='text-align:justify;'>
                                            {{ $produto->descricao }}
                                        </p>
                                    </div> 
                                   
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

</div>
        <div class="space-60"></div>
            <div class="similar-products">
                <h2 class="section-heading">Produtos Similares</h2>
                 <!-- Div de lista de produtos -->
                 @foreach($produtos as $produto)
                 <div id='exemplo' class="col-sm-6 col-md-3 ">
                     <div class="item_holder ">
                        @foreach($produto->image as $imagem )
                         <a href="#"><img src="/storage/{{ $imagem->imagem }}" alt="" class="img-responsive"></a>
                        @endforeach
                         <div class="title">
                             <h4>{{ $produto->nome }}</h4>
                             <span class="price">{{ $produto->categoria->nome }}</span>
                         </div>
                         <div class="space-15"></div> 
                         <a href="{{ route('detalhes', $produto->id ) }}" data-toggle="tooltip" data-placement="top" title="" class="btn btn-skin"
                             data-original-title="Ver Detalhes">Ver Detalhes</a>
                     </div>
                 </div>
                 @endforeach
                 <!--item holder-->
            </div><!--similar products-->
        </div>
        <div class="space-60"></div>
       


