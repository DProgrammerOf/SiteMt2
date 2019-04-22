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
              <span class="page-title">Rankings</span></div>
          </div>
        </div>
        <section class="row content">
          <div id="col-main" class="col-md-24 normal-page clearfix">
          
            <div class="page about-us">
              <p><ul class="list-inline text-center">
                        <li class="sortBy">
                          <strong class="title-3">RANKING: </strong>
                          <div id="sortButtonWarper" class="dropdown-toggle" data-toggle="dropdown">
                            <button id="sortButton">
                              <span class="name1"><font color="black" size="2">{{ $rank }}</font></span><i class="fa fa-caret-down"></i>
                            </button>
                            <i class="sub-dropdown1"></i>
                            <i class="sub-dropdown"></i>
                          </div>
                          <div id="sortBox" class="control-container dropdown-menu" style="overflow: hidden; display: none;">
                            <ul id="sortForm" class="list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                              <a href="{{ url('ranking/personagens/'.$classe.'/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Personagens</li></a>
                              <a href="{{ url('ranking/guildas/todas/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Guildas</li></a>
                              <a href="{{ url('ranking/killers/'.$classe.'/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Killers</li></a>
                              <a href="{{ url('ranking/coliseu/'.$classe.'/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Coliseu</li></a>
                              <a href="{{ url('ranking/dragao/'.$classe.'/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Matador de Dragão</li></a>
                            </ul>
                          </div>
                        </li>
                                                 
                        @if($rank != 'guildas')
                                                  <li class="sortBy">
                            <strong class="title-3">CLASSE: </strong>
                            <div id="sortButtonWarper" class="dropdown-toggle" data-toggle="dropdown">
                              <button id="sortButton">
                                <span class="name2"><font color="black" size="2">{{ $classe }}</font></span><i class="fa fa-caret-down"></i>
                              </button>
                              <i class="sub-dropdown1"></i>
                              <i class="sub-dropdown"></i>
                            </div>
                            <div id="sortBox" class="control-container dropdown-menu" style="overflow: hidden; display: none;">
                              <ul id="sortForm" class="list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                                <a href="{{ url('ranking/'.$rank.'/todas/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Todas</li></a>
                                <a href="{{ url('ranking/'.$rank.'/guerreiros/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Guerreiros</li></a>
                                <a href="{{ url('ranking/'.$rank.'/ninjas/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Ninjas</li></a>
                                <a href="{{ url('ranking/'.$rank.'/shuras/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Shuras</li></a>
                                <a href="{{ url('ranking/'.$rank.'/shamans/'.$reino) }}"><li class="sort" data-option-value="name" data-order="asc">Shamans</li></a>
                              </ul>
                            </div>
                          </li>

                        @endif
                                                <li class="sortBy">
                          <strong class="title-3">REINO: </strong>
                          <div id="sortButtonWarper" class="dropdown-toggle" data-toggle="dropdown">
                            <button id="sortButton">
                              <span class="name3"><font color="black" size="2">{{ $reino }}</font></span><i class="fa fa-caret-down"></i>
                            </button>
                            <i class="sub-dropdown1"></i>
                            <i class="sub-dropdown"></i>
                          </div>
                          <div id="sortBox" class="control-container dropdown-menu" style="overflow: hidden; display: none;">
                            <ul id="sortForm" class="list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                              <a href="{{ url('ranking/'.$rank.'/'.$classe.'/todos') }}"><li class="sort" data-option-value="name" data-order="asc">Todos</li></a>
                              <a href="{{ url('ranking/'.$rank.'/'.$classe.'/chunjo') }}"><li class="sort" data-option-value="name" data-order="asc">Chunjo</li></a>
                              <a href="{{ url('ranking/'.$rank.'/'.$classe.'/jinno') }}"><li class="sort" data-option-value="name" data-order="asc">Jinno</li></a>
                              <a href="{{ url('ranking/'.$rank.'/'.$classe.'/shinsoo') }}"><li class="sort" data-option-value="name" data-order="asc">Shinsoo</li></a>
                            </ul>
                          </div>
                        </li>
                      </ul>
                      </p>
                      <p><center><div id="options" class="container-nav clearfix">
  <ul class="list-inline">
    <li class="sortBy">
      <form id="header-search" class="search-form" action="" method="POST">
        <input value="" id="id" type="text" class="input-block-level" name="id" maxlength="20" size="35" placeholder="Nome do Personagem">
        <button id="id" type="submit" class="search-submit" title="Search"><i class="fa fa-search"></i></button>
      </form>
    </li>
  </ul>
</div>
<font color="#d00"><i>*Os Rankings são atualizados a cada 15 minutos.</i></font>
</center></p>
              <p>&nbsp;</p>
<div class="wc_list_area" id="members_content">
      <table class="wc_list">
        <thead>
          <tr>
            @if($rank == 'guildas')
            <th scope="col" class="first">Posição</th>
            <th scope="col">Guilda</th>
            <th scope="col">Level</th>
            <th scope="col">Vitórias</th>
            <th scope="col">Derrotas</th>
            <th scope="col">Pontos</th>
            <th scope="col" class="last">Reino</th>
            @elseif($rank == 'killers')
            <th scope="col" class="first">Posição</th>
            <th scope="col">Personagem</th>
            <th scope="col">Guilda</th>
            <th scope="col">Classe</th>
            <th scope="col">Nível</th>
            <th scope="col">Kills</th>
            <th scope="col" class="last">Reino</th>
            @elseif($rank == 'coliseu')
            <th scope="col" class="first">Posição</th>
            <th scope="col">Personagem</th>
            <th scope="col">Guilda</th>
            <th scope="col">Classe</th>
            <th scope="col">Nível</th>
            <th scope="col">Pontos Coliseu</th>
            <th scope="col" class="last">Reino</th>
            @elseif($rank == 'dragao')
            <th scope="col" class="first">Posição</th>
            <th scope="col">Personagem</th>
            <th scope="col">Guilda</th>
            <th scope="col">Classe</th>
            <th scope="col">Nível</th>
            <th scope="col">Dragões</th>
            <th scope="col" class="last">Reino</th>
            @else
            <th scope="col" class="first">Posição</th>
            <th scope="col">Personagem</th>
            <th scope="col">Guilda</th>
            <th scope="col">Classe</th>
            <th scope="col">Nível</th>
            <th scope="col">Experiência</th>
            <th scope="col" class="last">Reino</th>
            @endif
          </tr>
        </thead>
        <tbody class="ranking">


           @php
           $PosicaoBase = ($paginacao->currentPage()-1) * 15;
           @endphp

        @if($rank == 'personagens')
           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
           @endif

                <td class="num txt_n">{{ $i + 1 + $PosicaoBase}}</td>
                <td class="nick_name"><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></td>
                <td class="nick_name"><a href="{{ url('guilda/'.$Jogador->Guild) }}"><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td class="level txt_n">{{ $Jogador->Level }}</td>
                <td class="score txt_n">{{ $Jogador->Experiencia }}</td>
                <td class="kingdom simptip-position-top">
                    <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
            </tr>
           @endforeach

        @elseif($rank == 'coliseu')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
           @endif

                <td class="num txt_n">{{ $i + 1 + $PosicaoBase}}</td>
                <td class="nick_name"><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></td>
                <td class="nick_name"><a href="{{ url('guilda/'.$Jogador->Guild) }}"><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td class="level txt_n">{{ $Jogador->Level }}</td>
                <td class="score txt_n">{{ $Jogador->PtsColiseu }}</td>
                <td class="kingdom simptip-position-top">
                    <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
            </tr>
           @endforeach

        @elseif($rank == 'killers')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
           @endif

                <td class="num txt_n">{{ $i + 1 + $PosicaoBase}}</td>
                <td class="nick_name"><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></td>
                <td class="nick_name"><a href="{{ url('guilda/'.$Jogador->Guild) }}"><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td class="level txt_n">{{ $Jogador->Level }}</td>
                <td class="score txt_n">{{ $Jogador->PtsKill }}</td>
                <td class="kingdom simptip-position-top">
                    <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
            </tr>
           @endforeach

        @elseif($rank == 'guildas')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
           @endif

                <td class="num txt_n">{{ $i + 1 + $PosicaoBase}}</td>
                <td class="nick_name"><a href="{{ url('guilda/'.$Jogador->GuildName) }}">{{ $Jogador->GuildName }}</a></td>
                <td class="level txt_n">{{ $Jogador->Level }}</td>
                <td class="nick_name"><font color="#0c0">{{ $Jogador->Vitorias }}</font></td>
                <td class="nick_name"><font color="#c00">{{ $Jogador->Derrotas }}</font></td>
                <td class="score txt_n">{{ $Jogador->PtsRank }}</td>
                <td class="kingdom simptip-position-top">
                    <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
            </tr>
           @endforeach

        @elseif($rank == 'dragao')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="rank_top_1 top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="rank_top_2 top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="rank_top_3 top-3">
           @else
           <tr class="">
           @endif

                <td class="num txt_n">{{ $i + 1 + $PosicaoBase}}</td>
                <td class="nick_name"><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a></td>
                <td class="nick_name"><a href="{{ url('guilda/'.$Jogador->Guild) }}"><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td class="level txt_n">{{ $Jogador->Level }}</td>
                <td class="score txt_n">{{ $Jogador->PtsDragao }}</td>
                <td class="kingdom simptip-position-top">
                    <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse">
                </td>
            </tr>
           @endforeach

        @endif
      </tbody>

    </table>
<div style="margin-left: 25%;">
{!! $paginacao->links() !!}
</div>
  </div>
			 
            
              
              <div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection