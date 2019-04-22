@extends('layout.topo')
@push('layoutstilos')
<link href="{{ asset('assets/stylesheets/ranking_profile.css') }}" rel="stylesheet" type="text/css" media="all">
@endpush

@section('conteudo')
<div class="container">
     		

		<article class="article-content">
                <div class="center-page-content profile-top-to-bottom">
                  <div class="profile-page-content row">
                    <div class="profile-information-content col-12 col-md-4" style="height: 250px;">
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

                    <div class="guild-profile-center-content col-12 col-md-8">
                
               @foreach( $guilda as $Guild )
                      <div class="guild-profile-header row">
                        <div class="col-4 col-md-4" style="padding-top: 70px;
display: table-cell;vertical-align: middle;">
                          <h1>{{ $Guild->GuildName }}</h1>
                        </div>
                        <div class="guild-profile-information col-8 col-md-8" style="text-align: right;padding-top: 26px;">
                          <ul style="list-style: none;">
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

                        <table class="table">
                        </div>
                        <table class="table" style="table-layout: fixed;">
      <thead>
        <tr>
          <th style="text-align: center;">#</th>
          <th style="text-align: center;">Personagem</th>
          <th style="text-align: center;">Classe</th>
          <th style="text-align: center;">Nível</th>
          <th style="text-align: center;">Hierarquia</th>
          <th style="text-align: center;">Reino</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $membros as $Key => $Jogador )
         @if( ( $Key + 1 ) == 1)
               <tr class="top-1">
               @elseif( ($Key + 1) == 2)
               <tr class="top-2">
               @elseif( ($Key + 1) == 3)
               <tr class="top-3">
               @else
               <tr class="">
          @endif
          <td class="txt_n">{{ $Key+1 }}</td>
                    <td align="center"><a href="{{ url('personagem/'.$Jogador->NickName )}}">{{ $Jogador->NickName }}</a></td>
                    <td align="center" class="class simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                      <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                    </td>
                    <td align="center">{{ $Jogador->Level }}</td>
                    <td align="center">{{ $Jogador->Cargo }}</td>
                    <td align="center" class="kingdom simptip-position-top" data-tooltip="{{ ucfirst($Jogador->Imperio) }}">
                      <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                    </td>
        </tr>
        @endforeach

    </tbody>
    </table>

                          <!-- Paginação -->
                          <div class="paginate ns" id="paginate"> 
    </div>
                        </div>
                      </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><p></p>
                          </article>
				


</div>
@endsection