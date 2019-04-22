@extends('layout.topo')
@push('layoutstilos')
<link href="{{ asset('assets/stylesheets/ranking_profile.css') }}" rel="stylesheet" type="text/css" media="all">
@endpush

@section('conteudo')
<div class="container">
			
			@foreach( $personagem as $Perso )
					<article class="article-content" style="height: 1800px;">
							<div class="center-page-content profile-top-to-bottom">
							<div class="profile-page-content row">
							<div class="profile-information-content col-12 col-md-4">
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
							
							<div class="profile-center-content col-12 col-md-8">
  							
                <div class="row"> 
                  <div class="col-6 col-md-6">
    							@if( $Perso->Guild != 'Sem Guild')
               					<div class="profile-information-guild-box ns">
               						<span><h1><b>@</b>{{ $Perso->Guild }}</h1></span>

               						<font class="profile-honor-blue" style="color:#FEF092">
               						Vitórias: {{ $Perso->GuildVitorias }}</font>

               						<font class="profile-level">Level {{ $Perso->GuildLevel }}</font>
               					</div>
               					@endif
                  </div>

                  <div class="col-6 col-md-6">
      							<div class="profile-information-box ns">
        							<span><h1> {{ $Perso->NickName }}</h1></span>
        							<font class="profile-honor-blue"></font>
        							<font class="profile-level">Level {{ $Perso->Level }}</font>
      							</div>
                  </div>    

                </div>

  							<div class="profile-class-render profile-class-render-{{ $Perso->ClasseImg}}"></div>

							</div></div></div>		
						</article>
			@endforeach
</div>
@endsection