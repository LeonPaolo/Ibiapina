 
  <div id="produtos" class='space-60'></div>
      <!--Campo de Pesquisa Manual-->
         
      <div class="search-bar" style="display: none;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <form>
                                <input type="text" class="form-control" placeholder="Escreva o nome do produto" id="busca">
                                <span class="search-close"><i class="fa fa-times"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
 <!--popular products-->
 <section class="featured-products">
                <div class="container">
                    <h2 class="section-heading">Produtos</h2>
                       
           
                    <div class="col-sm-3 input-field">
                        
                        <form action="" class="form form-inline" method="post">
                            <label for="pesquisa">Filtrar por: Marca</label>
                            <select name="nomeMarca"  id="marca" class="browser-defaut">
                                <option value="">Selecione</option>
                                @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-3 input-field">
                        <form action="" class="form form-inline" method="post">
                            <label for="pesquisa">Categorias</label>
                            <select name="nomeMarca"  id="categoria" class="browser-defaut">
                                <option value="">Selecione</option>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-3 input-field">
                        <form action="" class="form" method="post">
                            <label for="pesquisa">Mais Vendidos</label>
                            <input type="checkbox" aria-label="..." id="vendidos">
                            <label for="retirar">Retirar os filtros</label>
                            <input type="checkbox" aria-label="..." id="retirar">
                        </form>
                    </div>

                    <a href="javascript:void(0)" class="search-toggle"><i class="fa fa-search"></i>  Buscar</a>
                    <div class="space-60" id="filtros"></div>

                    <!-- Div de lista de produtos -->
                    @foreach($produtos as $produto) 
                    <div id='exemplo' class="col-sm-6 col-md-3 velho">
                        <div class="item_holder ">
                            @foreach ($produto->image as $item)                                
                                <a href="{{ route('detalhes', $produto->id ) }}"><img src="/storage/{{ $item->imagem }}" alt="" class="img-responsive"></a>
                            @endforeach
                            <div class="title">
                                <h4>{{ $produto->nome }}</h4>
                                <span class="price">{{ $produto->marca->nome }}</span>
                            </div>
                            <div class="space-15"></div> 
                            <a href="{{ route('detalhes', $produto->id ) }}" data-toggle="tooltip" data-placement="top" title="" class="btn btn-skin"
                                data-original-title="Ver Detalhes">Ver Detalhes</a>
                        </div>
                    </div>
                    @endforeach
                    <!--item holder-->
                </div>
                <!--col end-->
                </div>
                <!--row-->
                </div>
                </div>
            </section>