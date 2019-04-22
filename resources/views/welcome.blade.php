@php
use \App\Http\Controllers\CadastroController;
@endphp
@extends('layout.topo')

@push('layoutstilos')


@endpush

@section('conteudo')
<!-- Header -->
<?php //include("pt-br/topoindex.php"); ?>

<!-- START: Rev Slider -->
<div class="mnt-80">
    <div id="rev_slider_50_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="photography-carousel48" style="padding:0;">
        <div id="rev_slider_50_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
            <ul>
                
                        <!-- SLIDE  -->
                        <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('ayora/img/gallery/DOBLECASH.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        </li>
                    
                        <!-- SLIDE  -->
                        <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('ayora/img/gallery/PURGATORIO.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        </li>
                    
                        <!-- SLIDE  -->
                        <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('ayora/img/gallery/TORRE.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        </li>
                    
                        <!-- SLIDE  -->
                        <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('ayora/img/gallery/CALENDARIO.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        </li>
                    
                        <!-- SLIDE  -->
                        <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('ayora/img/gallery/CAVERNA.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        </li>
                                </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</div>
<!-- END: Rev Slider -->
<div class="nk-gap-4"></div>
<!-- START: Features -->
<div class="container">
    <div class="nk-gap-6"></div>
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap lg-gap">
        <div class="col-md-4">
            <div class="nk-ibox">
                <div class="nk-ibox-icon nk-ibox-icon-circle">
                    <span class="ion-ios-game-controller-b"></span>
                </div>
                <div class="nk-ibox-cont">
                    <h2 class="nk-ibox-title">Informações Gerais</h2>
                    <div style="text-align: justify;margin: 0 auto 0 auto;width: 200px;">
                    ✪ 1 Canal<br>
                    ✪ Level Máximo: 99<br>
                    ✪ Servidor 50% PvM - 50% PvP<br>
                    ✪ 3 Dungeon's em diferentes níveis<br>
                    ✪ Inicia level 1 com set level 0 +9.<br>
                    ✪ + Pônei e Caixa do Aprendiz.<br>
                    ✪ Obtenção de Skills M1 ATÉ P Com Cristal Divino.<br>
                    ✪ Torneio Oficiais: Premiações em dinheiro.<br>
                    ✪ Add's 1-5 estilo Br.<br>
                    ✪ Add's 6-7 estilo Br.<br>
                    ✪ Servidor: NewSchool.<br>
                    ✪ Servidor com Pot Cash.
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="nk-ibox">
                <div class="nk-ibox-icon nk-ibox-icon-circle">
                    <span class="ion-fireball"></span>
                </div>
                <div class="nk-ibox-cont">
                    <h2 class="nk-ibox-title">As características especiais</h2>
                              Desenvolvemos um mundo repletos de aventuras e emoções, com um olhar de aprendizado no passado mas com uma perspectiva de futuro, buscamos trazer a todos os jogadores um up agradável e um player vs player equilibrado.
                              <br>
                              Em nossas arenas o jogador será testado em tempo real, onde avaliaremos se vocês é um jogador raiz ou um nutela. 
                              <br>
                              Além de todo esse contexto de Guerras e Batalhas, também contamos com vários mecanismos de segurança onde oferecemos a nossos jogadores uma experiência segura e dinâmica. 
                              <br>Contamos também com novos sistemas de caráter exclusivo desenvolvido pela equipe CrazyGames.

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="nk-ibox">
                <div class="nk-ibox-icon nk-ibox-icon-circle">
                    <span class="ion-ribbon-a"></span>
                </div>
                <div class="nk-ibox-cont">
                    <h2 class="nk-ibox-title">Torneios - Eventos - Guerras</h2>
                    <div style="text-align: justify;margin: 0 18% 0 auto;width: 179px;">
                    ✪ Torneio PvP Classe.<br>
                    ✪ Torneio PvP Geral.<br>
                    ✪ Torneio 4x4.<br>
                    ✪ Torneio de GvG.<br>
                    ✪ Evento Loja 1 Gold.<br>
                    ✪ Evento Puzzle.<br>
                    ✪ Evento Ox.<br>
                    ✪ Evento Quíz.<br>
                    ✪ Evento Esconde Esconde.<br>
                    ✪ Evento Invasão Tanaka.<br>
                    ✪ Guerra da Encruzilhada<br>
                    ✪ Guerra da Tocha.<br>
                    ✪ Guerra da Insígnia.<br>
                    ✪ Guerra Imperial.<br>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-gap-2"></div>
    <div class="nk-gap-6"></div>
</div>


<script>
 $(document).ready(function(){
  
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
@endsection