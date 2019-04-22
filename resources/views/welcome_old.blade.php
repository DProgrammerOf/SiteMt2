@extends('layout.topo')
@push('layoutstilos')
<script>
$( document ).ready( function() {
  $('.responsive-slider').responsiveSlider({
    autoplay: true,
    interval: 5000,
    transitionTime: 300
  });
});
</script>

<style>
#slider {
  position: relative;
  overflow: visible;
  margin: 20px auto 0 auto;
  border-radius: 4px;

}

#slider p {
  float: left;
  margin: 3em 3em 3em 9em;
}

#slider ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 100px;
  list-style: none;
}

#slider ul li {
  position: relative;
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  width: 100em;
  height: 100px;
  text-align: center;
}

a.control_prev, a.control_next {
  position: absolute;
    top: 0%;
    z-index: 999;
    display: block;
    padding: 4.5% 4% 4% 2.5%;
    background: #2a2a2a;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 18px;
    /* opacity: 0.8; */
    cursor: pointer;
    width: 0px;
    height: 6.5em;
    margin-top: -0.5em;
    border-radius: 10% 0% 0% 10% !important;

}

a.control_prev:hover, a.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
   margin-left: -1em;
}

a.control_next {
  right: 0;
  margin-right: -1.1em;
  border-radius: 0% 10% 10% 0% !important;
}

#listaItensLI li {
  -webkit-transition: opacity 1s ease-in-out;
        -moz-transition: opacity 1s ease-in-out;
        -ms-transition: opacity 1s ease-in-out;
        -o-transition: opacity 1s ease-in-out;
        transition: opacity 1s ease-in-out;
        opacity: 1;
}

#listaItensLI p {
    -webkit-transition: opacity 1s ease-in-out;
        -moz-transition: opacity 1s ease-in-out;
        -ms-transition: opacity 1s ease-in-out;
        -o-transition: opacity 1s ease-in-out;
        transition: opacity 1s ease-in-out;
        opacity: 1;
}
</style>
<script>
  jQuery(document).ready(function ($) {
  
  var slideCount = $('#slider ul li').length;
  var slideWidth = $('#slider ul li').width();
  var slideHeight = $('#slider ul li').height();
  var sliderUlWidth = slideCount * slideWidth;
  
  $('#slider').css({ width: slideWidth, height: slideHeight });
  
  $('#slider ul').css({ width: sliderUlWidth, slideWidth });
  
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
       // $('#slider ul').animate({
        //    left: + slideWidth
        //}, 200, function () {
        //    $('#slider ul li:last-child').prependTo('#slider ul');
        //    $('#slider ul').css('left', '');
        //});
    };

    function moveRight() {
        //$('#slider ul').animate({
        //    left: - slideWidth
        //}, 200, function () {
        //    $('#slider ul li:first-child').appendTo('#slider ul');
        //    $('#slider ul').css('left', '');
        //});
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    }); 

});    
</script>
@endpush

@section('conteudo')
<!-- Header -->
<?php //include("pt-br/topoindex.php"); ?>
<!------------>
<div id="content-wrapper-parent">
  <div id="content-wrapper">
    <div class="container">
      <div class="row">
        <div id="home-slider-wrapper">
          <div id="home-slider" class="responsive-slider hideControls" data-autoplay="true">
            <div class="slides" data-group="slides">
              <ul>
                <li>
                  <div class="slide-body" data-group="slide">
                    <a target="_blank" href="divulgacao/"><img src="screen/others/slide-image-1.jpg" alt=""></a>
                    <div class="caption header">
                        <div class="heading slideAppearRightToLeft animated" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <a href="#">                  
                            <span class="caption-content" style="color: #ea5210">
                              <span>Caverna das Aranhas</span><br>
                            </span>                  
                          </a>
                        </div>
                        <div class="content slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px; background-color: transparent !important;">
                          <span class="caption-content" style="color: #ea5210">&nbsp;&nbsp;</span>
                          <span class="caption-content" style="color: #ea5210"><br>
                            SERVIDOR LANÇADO :<span style="color: #ffffff"> 19 DE AGOSTO 2017</span>
                          </span>
                        </div>
                        <div class="caption1 slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="1000" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <span class="caption-content" style="color: #ffffff">
                            O veneno da Aranha Imperadora é capaz de corroer a alma dos mais corajosos guerreiros!
                          </span>
                        </div>
                        <div class="slide-price">
                          <span class="caption-content" style="color: #ea5210">
                            INFO
                          </span>
                          <a href="#">Confira mais detalhes...</a>
                        </div>
                      </div>
                  </div>
                </li>
                <li>
                  <div class="slide-body" data-group="slide">
                    <img src="screen/others/slide-image-2.jpg" alt="">
                    <div class="caption header"> 
                        <div class="heading slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="500" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <a href="#">
                            <span class="caption-content" style="color: #47cbde">
                              <span>Calabouço de Am-Heh</span><br>
                            </span>                  
                          </a>
                        </div>
                        <div class="content slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px; background-color: transparent !important;">
                          <span class="caption-content" style="color: #ea5210">&nbsp;&nbsp;</span>
                          <span class="caption-content" style="color: #ea5210"><br>
                            SERVIDOR LANÇADO :<span style="color: #ffffff"> 19 DE AGOSTO 2017</span>
                          </span>
                        </div>
                        <div class="caption1 slideAppearRightToLeft animated" data-animate="slideAppearRightToLeft" data-delay="1000" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <span class="caption-content" style="color: #ffffff">
                            O desejo de riqueza e poder que esses heróis possuíam os levou a 
                            despertar um mal há muito tempo adormecido.
                            Abaixo da superfície da terra... Reinava a guerra e o caos.
                            Somente os bravos heróis desse mundo representam alguma esperança!
                            Vai ficar fora dessa batalha ?
                          </span>
                        </div>
                        <div class="slide-price">
                          <span class="caption-content" style="color: #ea5210">
                            INFO
                          </span>
                          <a href="#">Confira mais detalhes...</a>
                        </div>
                      </div>
                  </div>
                </li>
                <li>
                  <div class="slide-body" data-group="slide">
                    <img src="screen/others/slide-image-3.jpg" alt="">
                    <div class="caption header">
                        <div class="heading slideAppearRightToLeft animated" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <a href="#">                  
                            <span class="caption-content" style="color: #ea5210">
                              <span>Torre de Nemere</span><br>
                            </span>                  
                          </a>
                        </div>
                        <div class="content slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300" style="opacity: 1; margin-left: 0px; margin-right: 0px; background-color: transparent !important;">
                          <span class="caption-content" style="color: #ea5210">&nbsp;&nbsp;</span>
                          <span class="caption-content" style="color: #ea5210"><br>
                            SERVIDOR LANÇADO :<span style="color: #ffffff"> 19 DE AGOSTO 2017</span>
                          </span>
                        </div>
                        <div class="caption1 slideAppearLeftToRight animated" data-animate="slideAppearLeftToRight" data-delay="1000" style="opacity: 1; margin-left: 0px; margin-right: 0px;">
                          <span class="caption-content" style="color: #ffffff">
                            Apenas os mais poderosos heróis podem entrar na Torre de Nemere 
                            e desafiá-lo para um combate!
                          </span>
                        </div>
                        <div class="slide-price">
                          <span class="caption-content" style="color: #ea5210">
                            INFO
                          </span>
                          <a href="#">Confira mais detalhes...</a>
                        </div>
                      </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="control-slideshow">
              <span class="control">
                <a class="slider-control fa fa-angle-left s-prev" href="javascript:" data-jump="prev">
                  <span class="sub-control"></span>
                  <span class="btn-label hidden-xs">PREV</span>
                </a>
                <a class="slider-control fa fa-angle-right s-next" href="javascript:" data-jump="next">
                  <span class="sub-control"></span>
                  <span class="btn-label hidden-xs">NEXT</span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="content" class="container clearfix">
      <section class="row content">
        <div id="col-main" class="clearfix" style="background-color: #f0f0f0;">
          <script type="text/javascript">
            jQuery(document).ready(function($){

              initTabActive();

              //  When user clicks on tab, this code will be executed
              $(".head_tabs").on(clickEv, function() {

              if(!$(this).parent().hasClass('active')) {
              //  First remove class "active" from currently active tab
              $(".head_tabs").parent().removeClass("active");

              //  Here we get the data-src(parent) value of the selected tab
              var $src_tab = $(this).attr("data-src");

              //  Now add class "active" to the selected/clicked tab
              $($src_tab).parent().addClass("active");

              //  Hide all tab content
              $(".content_tabs").hide();

              //  Here we get the href value of the selected tab
              var $selected_tab = $(this).attr("href");

              //  Show the selected tab content
              if(isMobile.any())
              $($selected_tab).show();
              else
              $($selected_tab).fadeIn();

              // Scroll to content
              $('html, body').animate({
              scrollTop: $($selected_tab).offset().top - 80
              },300);

              // re-call position quickshop
              positionQuickshop();

              //  Here we get the href value of the selected tab
              var $selected_carousel = $(this).attr("data-crs");

              }
              //  At the end, we add return false so that the click on the link is not executed
              return false;
              });

              /* Function: init item active */
              function initTabActive(){
              // Content
              jQuery('#tabs_content_container').find('.content_tabs').eq(0).show();
              jQuery('#tabs_content_container').find('.content_tabs').eq(0).prev().addClass('active');

              jQuery('#tabs_container #tabs').find('.head_tabs').eq(0).parent().addClass('active');

              }
            });
          </script><!--home-tabs-->

<!--------------------------------------------Top 3 LvL, Status canais e Top 5 PvP-------------------------------------------------->
          

          <div id="tabs_content_container" class="col-md-24">
            
            <!--end home-tabs-->

<!-------------------------------------------------------GM RECOMENDA!!!--------------------------------------------------------------->
            <!--home-platforms-->
            <!-------------<div id="home-platforms">
              <div class="platforms-title text-center">
                <div class="sb-title">Itens Recomendados</div>
                <div>Acesse a nossa Loja, e usufrua dos itens premium.</div>
              </div>
              <div class="clearfix"></div>
            </div>

            <span class="line"></span>

            <div id="home-block">
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="150">
                <a class="image-1" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_1.png">
                </a>
              </div>
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="300">
                <a class="image-2" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_anel_xp.png">
                </a>
              </div>
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="450">
                <a class="image-3" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_3.png">
                </a>
              </div>
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="600">
                <a class="image-4" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_moeda_dourada.png">
                </a>
              </div>
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="750">
                <a class="image-5" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_5.png">
                </a>
              </div>
              <div class="block-image not-animated col-md-4" data-animate="bounceIn" data-delay="900">
                <a class="image-6" href="">
                  <img class="pulse" src="screen/products/itens_recomendado_defesa_dragao.png">
                </a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="container">
              <div class="row"></div>
            </div>--------------------->
          </div>

          <div class="clearfix"></div>
          <!--end home-block-->

          <!--feature product-->
          
<!---------------------------------------Top Grupo 4x4, Ranking PvP Classe!!!--------------------------------------->
          <div id="main_rank_grupo_4x4_pvp_classe" style="height: 315px;margin-top: -0.1em;">

            <div id="fundo_cor_grupo_4x4_pvp_classe">
              <div id="top_grupo_4x4">
                @if($RankTop5PvPGeral->isEmpty())     
                  <ul style="padding: 7.5rem;">
                    <li style="color: #fff; list-style-type:none;">Nenhum personagem</li>
                  </ul>
                @else
                @foreach( $RankTop5PvPGeral as $Jogador )
                
                  <div style='margin: 5.5em 4.5em 4.5em 3.0em;' class='rank_top_5lvl_{{ $Jogador->Posicao }}'>
                  <div class='nome_rank_top_5lvl_{{ $Jogador->Posicao }}' margin-'>
                  <a style='color: #fff;'' href='{{ url('personagem/'.$Jogador->NickName) }}'>{{ $Jogador->NickName }}</a>
                  </div>
                  <div class='block-image not-animated' data-animate='bounceIn' data-delay='150'>

                  <img src='images/perfil/{{ $Jogador->ClasseImg }}.png' class='classe_rank_top_5lvl_1 pulse' />
                  <img src='images/reino_{{ $Jogador->ImperioId }}.png' class='reino_rank_top_5lvl_1 pulse' />
                
                  </div>
                  </div>

                @endforeach
                @endif
              </div>
              <div id="top_pvp_classe1">
                <div id="top_pvp_classe1list">
                <div class="block-image not-animated" data-animate="bounceIn" data-delay="150">
                @if($RankTop5Guerreiros->isEmpty())     
                  <ul>
                    <li style="color: #fff; list-style-type:none;">Nenhum personagem</li>
                  </ul>
                @else
                 @foreach( $RankTop5Guerreiros as $Jogador )
                
                  <ul class="lista_top">
                    <li style="margin-top:-1.5em; color: #fff">{{ $Jogador->Posicao }}º.</li>
                    <li style="position:relative !important;right:15px !important; margin-top:-1.5em;"><a style="color: #fff;" href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></li> 
                    <li><img src='images/reino_{{ $Jogador->ImperioId }}.png' class='pulse'></li>
                    </ul>

                @endforeach
                @endif
                </div>
                </div>
              </div>
              <div id="top_pvp_classe2">
                <div id="top_pvp_classe2list">
                <div class="block-image not-animated" data-animate="bounceIn" data-delay="150">
                @if($RankTop5Ninjas->isEmpty())     
                  <ul>
                    <li style="color: #fff; list-style-type:none;">Nenhum personagem</li>
                  </ul>
                @else
                @foreach( $RankTop5Ninjas as $Jogador )
                
                  <ul class="lista_top">
                    <li style="margin-top:-1.5em; color: #fff">{{ $Jogador->Posicao }}º.</li>
                    <li style="position:relative !important;right:15px !important; margin-top:-1.5em;"><a style="color: #fff;" href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></li> 
                    <li><img src='images/reino_{{ $Jogador->ImperioId }}.png' class='pulse'></li>
                    </ul>

                @endforeach
                @endif
                </div>
                </div>
              </div>
              <div id="top_pvp_classe3">
                <div id="top_pvp_classe3list">
                <div class="block-image not-animated" data-animate="bounceIn" data-delay="150">
                 @if($RankTop5Shuras->isEmpty())     
                  <ul>
                    <li style="color: #fff; list-style-type:none;">Nenhum personagem</li>
                  </ul>
                @else
                @foreach( $RankTop5Shuras as $Jogador )
                
                  <ul class="lista_top">
                    <li style="margin-top:-1.5em; color: #fff">{{ $Jogador->Posicao }}º.</li>
                    <li style="position:relative !important;right:15px !important; margin-top:-1.5em;"><a style="color: #fff;" href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></li> 
                    <li><img src='images/reino_{{ $Jogador->ImperioId }}.png' class='pulse'></li>
                    </ul>

                @endforeach
                @endif
                </div>
                </div>
              </div>
              <div id="top_pvp_classe4">
                <div id="top_pvp_classe4list">
                <div class="block-image not-animated" data-animate="bounceIn" data-delay="150">
                @if($RankTop5Shamans->isEmpty())     
                  <ul>
                    <li style="color: #fff; list-style-type:none;">Nenhum personagem</li>
                  </ul>
                @else
                @foreach( $RankTop5Shamans as $Jogador )
                
                  <ul class="lista_top">
                    <li style="margin-top:-1.5em; color: #fff">{{ $Jogador->Posicao }}º.</li>
                    <li style="position:relative !important;right:15px !important; margin-top:-1.5em;"><a style="color: #fff;" href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></li> 
                    <li><img src='images/reino_{{ $Jogador->ImperioId }}.png' class='pulse'></li>
                    </ul>

                @endforeach
                @endif
                </div>
                </div>
              </div>
            </div>
          </div>
          <div id="tabs_container" class="visible-md visible-lg clearfix">
              <ul id="tabs" class="list-unstyled" >
                <li class="active">
                  <a class="head_tab2 head_tabs" href="#content_tab2" data-src=".head_tab2" data-crs="#carousel_tab2">Rank. Personagens</a>
                </li>
                <li>
                  <a class="head_tab7 head_tabs" href="#content_tab7" data-src=".head_tab7" data-crs="#carousel_tab7">Rank. Guild</a>
                </li>
                <li>
                  <a class="head_tab3 head_tabs" href="#content_tab3" data-src=".head_tab3" data-crs="#carousel_tab3">Top Evento</a>
                </li>
                <li>
                  <a class="head_tab4 head_tabs" href="#content_tab4" data-src=".head_tab4" data-crs="#carousel_tab4">Coliseu</a>
                </li>
                <li>
                  <a class="head_tab6 head_tabs" href="#content_tab6" data-src=".head_tab6" data-crs="#carousel_tab6">Matadores de Dragões</a>
                </li>
                <!--<li>
                  <a class="head_tab7 head_tabs" href="#content_tab7" data-src=".head_tab7" data-crs="#carousel_tab7">PSP</a>
                </li>
                <li>
                  <a class="head_tab8 head_tabs" href="#content_tab8" data-src=".head_tab8" data-crs="#carousel_tab8">PC</a>
                </li>-->
              </ul>
            </div>
            <!--<h3 class="hidden-md hidden-lg">
              <a class="head_tab7 head_tabs" href="#content_tab7" data-src=".head_tab7" data-crs="#carousel_tab7">PSP</a></h3>
                              <h3 class="hidden-md hidden-lg">
              <a class="head_tab8 head_tabs" href="#content_tab8" data-src=".head_tab8" data-crs="#carousel_tab8">PC</a></h3>-->
                            </div>
<!--------------------------------------------Inicio Rankings Top4-------------------------------------------------->
        

          <div class="container" style="background-color: #f3f3f3;">
  <div id="tabs_content_container" class="col-md-24"> 
              <h3 class="hidden-md hidden-lg active">
              <a class="head_tab2 head_tabs" href="#content_tab2" data-src=".head_tab2" data-crs="#carousel_tab2">Rank. Personagens</a></h3>
                <div id="content_tab2" class="content_tabs list_carousel responsive" style="margin-top: -3em">
  <ul id="carousel_tab2" data-prev="#prev_tab2" data-next="#next_tab2" class="list-unstyled clearfix">
  
      @foreach( $RankTabGeral as $i => $Jogador )
      <li class="col-md-4 fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                            <a href="/" class="hoverBorder">
                                <span class="hoverBorderWrapper">
                                    <div class="block-image bounceIn animated" data-animate="bounceIn" data-delay="450">
                                      
                                        <img src="screen/products/ranktab{{ $Jogador->Classe }}.jpg" class="image-fly img-responsive">
                                        <img src="screen/products/{{ $Jogador->Imperio }}.jpg" class="image-fly img-responsive">
                                    </div>
                                </span>
                                <span class="sale_banner animated">
                                    <img class="pulse" src="assets/images/rank_{{$i+1}}_colocacao.png">
                                </span>
                            </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                            <div class="group_info">
                                <a class="title-5" href="{{ url('personagem/'.$Jogador->NickName) }}">Nome: {{ $Jogador->NickName }}</a>
                                <br>
                                <a class="col-title">Classe:  {{ $Jogador->ClasseNome }}</a>
                                <br>
                                <a class="col-title">Exp: {{ $Jogador->Experiencia }}</a>
                                <br>
                                <a class="col-title">Pontos: {{ $Jogador->PtsGeral }}</a>
                                <div class="product-price">
                                    <span class="price">
                                        <span class="money">Level: {{ $Jogador->Level }}</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </li>
        @endforeach
      </ul>
  <div class="line"></div>
  <div class="clearfix"></div>
</div>              <h3 class="hidden-md hidden-lg">
              <a class="head_tab3 head_tabs" href="#content_tab3" data-src=".head_tab3" data-crs="#carousel_tab3">Top Evento</a></h3>
                <div id="content_tab3" class="content_tabs list_carousel responsive" style="display: none; margin-top: -3em;">
  <ul id="carousel_tab3" data-prev="#prev_tab3" data-next="#next_tab3" class="list-unstyled clearfix">
       @foreach( $RankTabKills as $i => $Jogador )
      <li class="col-md-4 fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                            <a href="/" class="hoverBorder">
                                <span class="hoverBorderWrapper">
                                    <div class="block-image bounceIn animated" data-animate="bounceIn" data-delay="450">
                                      
                                        <img src="screen/products/ranktab{{ $Jogador->Classe }}.jpg" class="image-fly img-responsive">
                                        <img src="screen/products/{{ $Jogador->Imperio }}.jpg" class="image-fly img-responsive">
                                    </div>
                                </span>
                                <span class="sale_banner animated">
                                    <img class="pulse" src="assets/images/rank_{{$i+1}}_colocacao.png">
                                </span>
                            </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                            <div class="group_info">
                                <a class="title-5" href="{{ url('personagem/'.$Jogador->NickName) }}">Nome: {{ $Jogador->NickName }}</a>
                                <br>
                                <a class="col-title">Classe:  {{ $Jogador->ClasseNome }}</a>
                                <br>
                                <a class="col-title">Level: {{ $Jogador->Level }}</a>
                                <div class="product-price">
                                    <span class="price">
                                        <span class="money">Pontos: {{ $Jogador->PtsRank }}</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </li>
        @endforeach
     
      </ul>
  <div class="line"></div>
  <div class="clearfix"></div>
</div>              <h3 class="hidden-md hidden-lg">
              <a class="head_tab4 head_tabs" href="#content_tab4" data-src=".head_tab4" data-crs="#carousel_tab4">Coliseu</a></h3>
                <div id="content_tab4" class="content_tabs list_carousel responsive" style="display:none; margin-top: -3em;">
  <ul id="carousel_tab4" data-prev="#prev_tab4" data-next="#next_tab4" class="list-unstyled clearfix">
         @foreach( $RankTabColiseu as $i => $Jogador )
      <li class="col-md-4 fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                            <a href="/" class="hoverBorder">
                                <span class="hoverBorderWrapper">
                                    <div class="block-image bounceIn animated" data-animate="bounceIn" data-delay="450">
                                      
                                        <img src="screen/products/ranktab{{ $Jogador->Classe }}.jpg" class="image-fly img-responsive">
                                        <img src="screen/products/{{ $Jogador->Imperio }}.jpg" class="image-fly img-responsive">
                                    </div>
                                </span>
                                <span class="sale_banner animated">
                                    <img class="pulse" src="assets/images/rank_{{$i+1}}_colocacao.png">
                                </span>
                            </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                            <div class="group_info">
                                <a class="title-5" href="{{ url('personagem/'.$Jogador->NickName) }}">Nome: {{ $Jogador->NickName }}</a>
                                <br>
                                <a class="col-title">Classe:  {{ $Jogador->ClasseNome }}</a>
                                <br>
                                <a class="col-title">Level: {{ $Jogador->Level }}</a>
                                <div class="product-price">
                                    <span class="price">
                                        <span class="money">Pontos: {{ $Jogador->PtsColiseu }}</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </li>
        @endforeach
    
      </ul>
  <div class="line"></div>
  <div class="clearfix"></div>
</div>              
                <h3 class="hidden-md hidden-lg">
              <a class="head_tab6 head_tabs" href="#content_tab6" data-src=".head_tab6" data-crs="#carousel_tab6">Matadores de Dragões</a></h3>
                <div id="content_tab6" class="content_tabs list_carousel responsive" style="display:none; margin-top: -3em;">
  <ul id="carousel_tab6" data-prev="#prev_tab6" data-next="#next_tab6" class="list-unstyled clearfix">
         @foreach( $RankTabDragoes as $i => $Jogador )
      <li class="col-md-4 fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                            <a href="/" class="hoverBorder">
                                <span class="hoverBorderWrapper">
                                    <div class="block-image bounceIn animated" data-animate="bounceIn" data-delay="450">
                                      
                                        <img src="screen/products/ranktab{{ $Jogador->Classe }}.jpg" class="image-fly img-responsive">
                                        <img src="screen/products/{{ $Jogador->Imperio }}.jpg" class="image-fly img-responsive">
                                    </div>
                                </span>
                                <span class="sale_banner animated">
                                    <img class="pulse" src="assets/images/rank_{{$i+1}}_colocacao.png">
                                </span>
                            </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                            <div class="group_info">
                                <a class="title-5" href="{{ url('personagem/'.$Jogador->NickName) }}">Nome: {{ $Jogador->NickName }}</a>
                                <br>
                                <a class="col-title">Classe:  {{ $Jogador->ClasseNome }}</a>
                                <br>
                                <a class="col-title">Level: {{ $Jogador->Level }}</a>
                                <div class="product-price">
                                    <span class="price">
                                        <span class="money">Dragões: {{ $Jogador->PtsRank }}</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </li>
        @endforeach
     
      </ul>
  <div class="line"></div>
  <div class="clearfix"></div>
</div>    
<h3 class="hidden-md hidden-lg">
              <a class="head_tab7 head_tabs" href="#content_tab7" data-src=".head_tab7" data-crs="#carousel_tab7">Rank. Guilds</a></h3>
                <div id="content_tab7" class="content_tabs list_carousel responsive" style="display:none; margin-top: -3em;">
  <ul id="carousel_tab7" data-prev="#prev_tab7" data-next="#next_tab7" class="list-unstyled clearfix">
   @foreach( $RankTabGuilds as $i => $Guild )
        <li class="col-md-4 fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <ul class="row-container list-unstyled clearfix">
                        <li class="row-left">
                            <a href="index.php" class="hoverBorder">
                                <span class="hoverBorderWrapper">
                                    <div class="block-image bounceIn animated" data-animate="bounceIn" data-delay="450">
                                      
                                        <img src="screen/products/guilda_top_{{$i+1}}.jpg" width="157" height="156" class="image-fly img-responsive">
                                    </div>
                                </span>
                                <span class="sale_banner animated">
                                    <img class="pulse" src="assets/images/rank_{{$i+1}}_colocacao.png">
                                </span>
                            </a>
                        </li>
                        <li class="row-right text-left parent-fly animMix">
                            <div class="group_info">
                                <a class="title-5" href="{{ url('guilda/'.$Guild->GuildName) }}">Nome: {{ $Guild->GuildName }}</a>
                                <br>
                                <a class="col-title">SP: {{ $Guild->PtsRank }}</a>
                                <div class="product-price">
                                    <span class="price">
                                        <span class="money">Level: {{ $Guild->Level }}</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </li>
            @endforeach
      </ul>
  <div class="line"></div>
  <div class="clearfix"></div>
</div>  

            <div>
<br><br><br>

<br><br>
  



  
</div>

  </div>
            </div>
          </div><!--end feature product-->
        </div>
      </section>
    </div>
  </div>
</div>

<div id="bottom">
    <div class="container">
      <div id="bottom-content" class="row">
        <div class="clearfix">
          <div id="widget-partners">
            <div class="widget-wrapper text-center">  
            <h2>PROMOÇÕES DA SEMANA</h2>
              <div id="slider">
  <!--<a  class="control_next" onclick="mudarItensProx()">>></a>
  <a  class="control_prev" onclick="mudarItensProx()"><<</a>!-->
  <ul id="listaItensLI" style="background: #ccc">
   
    
 <li>
      @foreach($ItemDestaqueLista1 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
  </li>



  </ul>  
</div><br>


<!--
<div id="lista1Itens" style="display: none;">
  <li>
      @foreach($ItemDestaqueLista1 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
  </li>
</div>

<div id="lista2Itens" style="display: none;">
 <li>
      @foreach($ItemDestaqueLista2 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
  </li>
</div>

<div id="lista3Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista3 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista4Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista4 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista5Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista5 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista6Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista6 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista7Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista7 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista8Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista8 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>

<div id="lista9Itens" style="display: none;">
<li>
      @foreach($ItemDestaqueLista9 as $Item)
      <p><span>
        <img class="pulse" data-html="true" data-toggle="tooltip" data-placement="top" title="
        {{$Item->texto}}" src="images/itens/{{$Item->img}}" width="40" height="40" alt=""> 
      </span></p>

      @endforeach
</li>
</div>
!-->


  
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <footer id="footer">
    <div class="container">
      <div id="footer-content">
        <div class="row widget-blog" id="widget-blog">
          <div class="widget-header f_title text-center">
            <h4>Vídeos e Temas</h4>
            <span>Acompanhe nossos vídeos e fique por dentros de nossos temas, em breve...</span>
          </div>
          <div class="wrap_item">
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="0">
              <div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="screen/products/video_img1.jpg"></a>
                <h5 class="title"><a>Purgatório Ardente</a></h5>
                <span class="line"></span>
                <p class="desc">Prepare-se para uma batalha insana pelo fogo, o mestre das sombras ressurgiu.</p>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="300">
              <div class="group">
                <img src="screen/products/video_img3.jpg">
                <h5 class="title"><a>Sua jornada começa aqui</a></h5>
                <span class="line"></span>
                <p class="desc">A escolha do seu reino é o início de tudo, ele poderá definir o quão longe você chegará.</p>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="600">
              <div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="screen/products/video_img2.jpg"></a>
                <h5 class="title"><a>Torre de Nemere</a></h5>
                <span class="line"></span>
                <p class="desc">A <strong>Torre de Vigia de Nemere</strong> é  composta por 9 pisos diferentes, para completa-la é necessário que passe por 9 desafios.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="footer_bottom row">
          <?php //include ("pt-br/footer.php"); ?>
        </div>
      </div>
    </div>
  </footer>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!-- script>
  function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

  function mudarItensProx(){
    var listaItens = 1;

    if ( typeof mudarItensProx.counter == 'undefined' ) {
        mudarItensProx.counter = 1;
      }

        if(mudarItensProx.counter == 1){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
          mudarItensProx.counter++;
          document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista2Itens' ).innerHTML;
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });

      }

      @forelse($ItemDestaqueLista2 as $Item)
        else if(mudarItensProx.counter == 2){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {

          @forelse($ItemDestaqueLista3 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista3Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse

          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista3 as $Item)
        else if(mudarItensProx.counter == 3){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista4 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista4Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista4 as $Item)
        else if(mudarItensProx.counter == 4){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista5 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista5Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista5 as $Item)
        else if(mudarItensProx.counter == 5){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista6 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista6Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista6 as $Item)
        else if(mudarItensProx.counter == 6){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista7 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista7Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista7 as $Item)
        else if(mudarItensProx.counter == 7){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista8 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista8Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista8 as $Item)
        else if(mudarItensProx.counter == 8){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
         @forelse($ItemDestaqueLista9 as $Item)
            mudarItensProx.counter++;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista9Itens' ).innerHTML;
            @break
          @empty
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
          @endforelse
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      @forelse($ItemDestaqueLista9 as $Item)
        else if(mudarItensProx.counter == 9){
        var lista = document.getElementById( 'listaItensLI' );
        var lis = lista.getElementsByTagName('li');
      for (var i = 0; i < lis.length; i++) {
          lis[i].style.opacity = 0;
      }
        sleep(1000).then(() => {
            mudarItensProx.counter = 1;
            document.getElementById( 'listaItensLI' ).innerHTML = document.getElementById( 'lista1Itens' ).innerHTML;
            @break
          $('[data-toggle="tooltip"]').tooltip();  
          document.getElementById( 'listaItensLI' ).style.opacity = 1;
      });
      }
      @break
      @empty
      @endforelse

      
  }
</script !-->

@endsection