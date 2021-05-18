 
  <div id="produtos" class='space-60'></div>
      <!--Campo de Pesquisa Manual-->
         
      <div class="search-bar" style="display: none;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <form>
                                <input type="text" class="form-control" placeholder="Escreva sua busca">
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
                            <select name="nomeMarca"  id="idMarca" class="browser-defaut">
                                <option value="">Selecione</option>
                                <option value="marca">Plaszom</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-3 input-field">
                        <form action="" class="form form-inline" method="post">
                            <label for="pesquisa">Categorias</label>
                            <select name="nomeMarca" onChange="carregaUsuario()" id="idMarca" class="browser-defaut">
                                <option value="">Selecione</option>
                                <option value="marca">Descartaveis</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-3 input-field">
                        <form action="" class="form" method="post">
                            <label for="pesquisa">Mais Vendidos</label>
                            <input type="checkbox" aria-label="...">
                        </form>
                    </div>

                    <a href="javascript:void(0)" class="search-toggle"><i class="fa fa-search"></i>  Buscar</a>
                    <div class="space-60"></div>

                    <!-- Div de lista de produtos -->
                    <div id='exemplo' class="col-sm-6 col-md-3 ">
                        <div class="item_holder ">
                            <a href="#"><img src="/Site/images/produtos/plaszon.png" alt="" class="img-responsive"></a>
                            <div class="title">
                                <h4>Sacolas Plasticas</h4>
                                <span class="price">Plaszom</span>
                            </div>
                            <div class="space-15"></div> 
                            <a href="{{'produtos/detalhes'}}" data-toggle="tooltip" data-placement="top" title="" class="btn btn-skin"
                                data-original-title="Ver Detalhes">Ver Detalhes</a>
                        </div>
                    </div>
                    <!--item holder-->
                </div>
                <!--col end-->
                </div>
                <!--row-->
                </div>
                </div>
            </section>