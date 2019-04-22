@extends('layout.topo')
@push('layoutstilos')
<link href="{{ asset('assets/stylesheets/ranking_profile.css') }}" rel="stylesheet" type="text/css" media="all">
@endpush

@section('conteudo')
<div id="content-wrapper-parent">
    <div id="content-wrapper">
      <div id="content" class="container clearfix">
        <div class="group_breadcrumb">
          <div id="breadcrumb" class="row breadcrumb">
		  </br></br></br></br>
            <div class="col-md-24">
              <a class="homepage-link">Home</a>
              <i class="angle-right">&gt;</i>
              <a href="/ranking" class="homepage-link">Ranking</a>
              <i class="angle-right">&gt;</i>
              <a href="#" class="homepage-link">Informações do Personagem</a>
              </div>
          </div>
        </div>
<section class="row content" style="background-color:#322818">
			
			@foreach( $personagem as $Perso )
					<article class="article-content">
							<div class="center-page-content profile-top-to-bottom">
							<div class="profile-page-content">
							<div class="profile-information-content">
							<div class="profile-flag-position kingdom-{{ $Perso->ImperioCor }}"></div>

							<div class="profile-information-content-box ns">
							<ul>
							<li>Reino:<b style="color: {{ $Perso->ImperioCor }}">{{ ucfirst($Perso->Imperio) }}</b></li>
							<li>Guilda:<b><a @if( $Perso->Guild != 'Sem Guild')
								href="{{ url('guilda/'.$Perso->Guild) }}" style="color:#ffb100;"
								@endif
								>{{ $Perso->Guild }}</a></b></li>
							<li>Classe:<b style="color:#f5ebd1">{{ $Perso->RacaClasse }}</b></li>
							<li>Tempo de jogo:<b style="color:#f5ebd1">0h</b></li>
							<li>Numero de Kills:<b style="color:lime">{{ $Perso->PtsKill }}</b></li>
							</ul>

							<div class="profile-archievement-btn"><a href=""></a></div>
							</div>
							</div>
							
							<div class="profile-center-content">
							
							@if( $Perso->Guild != 'Sem Guild')
           					<div class="profile-information-guild-box ns">
           						<span><h1><b>@</b>{{ $Perso->Guild }}</h1></span>

           						<font class="profile-honor-blue" style="color:#FEF092">
           						Vitórias: {{ $Perso->GuildVitorias }}</font>

           						<font class="profile-level">Level {{ $Perso->GuildLevel }}</font>
           					</div>
           					@endif

							<div class="profile-information-box ns">
							<span><h1> {{ $Perso->NickName }}</h1></span>
							<font class="profile-honor-blue"></font>
							<font class="profile-level">Level {{ $Perso->Level }}</font>
							</div>
							<div class="profile-class-render-{{ $Perso->ClasseImg}}"></div>
							</div></div></div>		
						</article>
			@endforeach
				
</section>
</div>
</div>
</div>

<div id="bottom"></div>

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
              <div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="{{asset('screen/products/video_img1.jpg')}}"></a>
                <h5 class="title"><a>Purgatório Ardente</a></h5>
                <span class="line"></span>
                <p class="desc">Prepare-se para uma batalha insana pelo fogo, o mestre das sombras ressurgiu.</p>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="300">
              <div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="{{asset('screen/products/video_img2.jpg')}}"></a>
                <h5 class="title"><a>Torre de Nemere</a></h5>
                <span class="line"></span>
                <p class="desc">A <strong>Torre de Vigia de Nemere</strong> é  composta por 9 pisos diferentes, para completa-la é necessário que passe por 9 desafios.</p>
              </div>
            </div>
            <div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="600">
              <div class="group">
                <img src="{{asset('screen/products/video_img3.jpg')}}">
                <h5 class="title"><a>Sua jornada começa aqui</a></h5>
                <span class="line"></span>
                <p class="desc">A escolha do seu reino é o início de tudo, ele poderá definir o quão longe você chegará.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="footer_bottom row">
          
        </div>
      </div>
    </div>
  </footer>
@endsection