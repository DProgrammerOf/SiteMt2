@extends('layout.topo')
@push('layoutstilos')
<link href="{{ asset('assets/stylesheets/ranking.css') }}" rel="stylesheet" type="text/css" media="all">
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
			

		<article class="article-content">
                <div class="center-page-content profile-top-to-bottom">
                  <div class="profile-page-content">
                    <div class="profile-information-content">
              @foreach( $guilda as $Guild )
                      <div class="profile-flag-position kingdom-{{ $Guild->ImperioCor }}"></div>
                      <div class="profile-information-content-box ns">
                        <ul>
                          <li>Vitórias:<b style="color:lime;">{{ $Guild->Vitorias }}</b></li>
                          <li>Empates:<b style="color:blue;">{{ $Guild->Empates }}</b></li>
                          <li>Derrotas:<b style="color:red;">{{ $Guild->Derrotas }}</b></li>
                        </ul>
                      </div>
              @endforeach
                    </div>
                    <div class="guild-profile-center-content">

               @foreach( $guilda as $Guild )
                      <div class="guild-profile-header ns">
                        <h1>{{ $Guild->GuildName }}</h1>
                        <div class="guild-profile-information">
                          <ul>
                            <li>Dono: <span>{{ $Guild->GuildDono }}</span></li>
                            <li>Level: <span>{{ $Guild->Level }}</span></li>
                            <li>Membros: <span>{{ count($membros) }}</span></li>
                          </ul>
                        </div>
                      </div>
                @endforeach

                      <!-- Loading do ranking -->
                      <div class="loader loader-guild" id="loader" style="display: none;"><div class="throbbers_page"><div class="throbber throbber_large"></div></div></div>
                      <!-- Área do ranking -->
                      <input class="input-hidden" value="1" id="g_id">
                      <div class="wc_list_area" id="members_content">

<table class="wc_list">
  <thead>
    <tr>
      <th scope="col" class="first"><div align="center">Posição</div></th>
      <th scope="col"><div align="center">Personagem</div></th>
      <th scope="col"><div align="center">Classe</div></th>
      <th scope="col"><div align="center">Nível</div></th>
      <th scope="col"><div align="center">Hierarquia</div></th>
      <th scope="col" class="last"><div align="center">Reino</div></th>
    </tr>
  </thead>
  <tbody class="ranking" style="background-color: #f1f1f1;">
    @foreach ( $membros as $Key => $Jogador )
     @if( ( $Key + 1 ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($Key + 1) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($Key + 1) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
      @endif
      <td class="txt_n">{{ $Key+1 }}</td>
                <td><a href="{{ url('personagem/'.$Jogador->NickName )}}">{{ $Jogador->NickName }}</a></td>
                <td class="class simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                  <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td class="txt_n">{{ $Jogador->Level }}</td>
                <td class="txt_n">{{ $Jogador->Cargo }}</td>
                <td class="kingdom simptip-position-top" data-tooltip="{{ ucfirst($Jogador->Imperio) }}">
                  <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
    </tr>
    @endforeach

</tbody>
</table>

</div>
                      <!-- Paginação -->
                      <div class="paginate ns" id="paginate"> 
</div>
                    </div>
                  </div>
                </div>
                <br><br><br><br><br><br><br><br><br><br><p></p>
                          </article>
				
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