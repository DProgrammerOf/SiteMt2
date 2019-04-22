@extends('layout.topo')
@push('layoutstilos')

	<link href="{{ asset('assets/stylesheets/ranking.css') }}" rel="stylesheet" type="text/css" media="all">
  <style type="text/css">
    table.table thead tr th {
      text-align: center;
    }

    .btn-dark {
      color: #ccc;
      background-color: #343a40;
      border-color: #343a40;
    }

    .btn-dark:hover {
        color: #fff;
        background-color: #23272b;
        border-color: #1d2124;
    }
  .btn:focus, .btn:hover {
      text-decoration: none;
  }

  .btn-dark:not(:disabled):not(.disabled).active, .btn-dark:not(:disabled):not(.disabled):active, .show > .btn-dark.dropdown-toggle {
    color: #fff;
    background-color: #1d2124;
    border-color: #171a1d;
}

  .btn-dark.focus, .btn-dark:focus {
      box-shadow: 0 0 0 .1rem rgba(52,58,64,.5);
  }
  </style>
@endpush

@section('conteudo')
   <div class="container" style="padding-top: 20px"><h3>Ranking</h3>
       
       <div class="row">
        <div class="col-12 @if($rank != 'guildas')col-md-4 @else col-md-6 @endif" style="text-align: center; margin-bottom: 1em;">
                          <strong class="title-3">CATEGORIA: </strong>

                        <div class="btn-group">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ ucfirst(trans($rank)) }}
    </button>
    <div class="dropdown-menu">
     <a class="dropdown-item" href="{{ url('ranking/personagens/'.$classe.'/'.$reino) }}">Personagens</a>
                              <a class="dropdown-item" href="{{ url('ranking/guildas/todas/'.$reino) }}">Guildas</a>
                              <a class="dropdown-item" href="{{ url('ranking/killers/'.$classe.'/'.$reino) }}">Killers</a>
                              <a class="dropdown-item" href="{{ url('ranking/insignia/'.$classe.'/'.$reino) }}">Insignias</a>
                              <a class="dropdown-item" href="{{ url('ranking/encruzilhada/'.$classe.'/'.$reino) }}">Encruzilhada</a>
    </div>
  </div>
    </div>
                          
                       @if($rank != 'guildas')
                                          
<div class="col-12 col-md-4" style="text-align: center; margin-bottom: 1em;">
   <strong class="title-3">CLASSE: </strong>
                            <div class="btn-group">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ ucfirst(trans($classe)) }}
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/todas/'.$reino) }}">Todas</a>
                                <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/guerreiros/'.$reino) }}">Guerreiros</a>
                                <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/ninjas/'.$reino) }}">Ninjas</a>
                                <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/shuras/'.$reino) }}">Shuras</a>
                                <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/shamans/'.$reino) }}">Shamans</a>
    </div>
  </div>
</div>
                        @endif

<div class="col-12 @if($rank != 'guildas')col-md-4 @else col-md-6 @endif" style="text-align: center; margin-bottom: 1em;">
   <strong class="title-3">REINO: </strong>
                          <div class="btn-group">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ ucfirst(trans($reino)) }}
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/'.$classe.'/todos') }}">Todos</a>
                              <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/'.$classe.'/shinsoo') }}">Shinsoo</a>
                              <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/'.$classe.'/chunjo') }}">Chunjo</a>
                              <a class="dropdown-item" href="{{ url('ranking/'.$rank.'/'.$classe.'/jinno') }}">Jinno</a>
    </div>
  </div>
</div>

<div class="col-12 col-md-12" style="text-align: center;">
  <font color="#d00"><i>*Os Rankings são atualizados a cada 15 minutos.</i></font>
</div>
</div>
    <table class="table" >
                            <thead>
                            <tr>

                                 @if($rank == 'guildas')
                  <th>#</th>
                  <th>Guilda</th>
                  <th>Level</th>
                  <th>Vitórias</th>
                  <th>Derrotas</th>
                  <th>Pontos</th>
                @elseif($rank == 'killers')
                <th>#</th>
                <th>Personagem</th>
                <th>Guilda</th>
                <th>Classe</th>
                <th>Nível</th>
                <th>Kills</th>
                @elseif($rank == 'insignia')
                <th>#</th>
                <th>Personagem</th>
                <th>Guilda</th>
                <th>Classe</th>
                <th>Nível</th>
                <th>Insignias</th>
                @elseif($rank == 'encruzilhada')
                <th>#</th>
                <th>Personagem</th>
                <th>Guilda</th>
                <th>Classe</th>
                <th>Nível</th>
                <th>Kill</th>
                @else
                <th>#</th>
                <th>Personagem</th>
                <th>Guilda</th>
                <th>Classe</th>
                <th>Nível</th>
                <th>Experiência</th>
                @endif
                            </tr>
                            </thead>
                            <tbody>

                                  @php
           $PosicaoBase = ($paginacao->currentPage()-1) * 15;
           @endphp

        @if($rank == 'personagens')
           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td align="center">{{ $i + 1 + $PosicaoBase}}</td>

                <td align="center" ><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a> 
                  <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>

                <td align="center">

                  <a @if($Jogador->Guild != 'Sem Guild')href="{{ url('guilda/'.$Jogador->Guild) }}"@endif><font color="#09F">{{ $Jogador->Guild }}</font></a></td>

                <td align="center" class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>

                <td align="center" class="align-0">{{ $Jogador->Level }}</td>

                <td align="center">{{ $Jogador->Experiencia }}</td>
            </tr>
           @endforeach
          @elseif($rank == 'insignia')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td  align="center" >{{ $i + 1 + $PosicaoBase}}</td>
                <td  align="center" ><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a> <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>
                <td  align="center" ><a @if($Jogador->Guild != 'Sem Guild')href="{{ url('guilda/'.$Jogador->Guild) }}"@endif><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td  align="center" class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td  align="center" class="level txt_n">{{ $Jogador->Level }}</td>
                <td  align="center" class="score txt_n">{{ $Jogador->PtsColiseu }}</td>
            </tr>
           @endforeach

        @elseif($rank == 'killers')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td  align="center" >{{ $i + 1 + $PosicaoBase}}</td>
                <td  align="center" ><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a> 
                  <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>
                <td  align="center" ><a @if($Jogador->Guild != 'Sem Guild')href="{{ url('guilda/'.$Jogador->Guild) }}"@endif><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td  align="center" class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td  align="center" class="level txt_n">{{ $Jogador->Level }}</td>
                <td  align="center" class="score txt_n">{{ $Jogador->PtsKill }}</td>
            </tr>
           @endforeach

      @elseif($rank == 'guildas')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td  align="center">{{ $i + 1 + $PosicaoBase}}</td>
                <td align="center"><a href="{{ url('guilda/'.$Jogador->GuildName) }}">{{ $Jogador->GuildName }}</a>
                  <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>
                <td align="center" class="level txt_n">{{ $Jogador->Level }}</td>
                <td align="center" ><font color="#0c0">{{ $Jogador->Vitorias }}</font></td>
                <td align="center" ><font color="#c00">{{ $Jogador->Derrotas }}</font></td>
                <td align="center" class="score txt_n">{{ $Jogador->PtsRank }}</td>
            </tr>
           @endforeach

        @elseif($rank == 'encruzilhada')

            @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td align="center" >{{ $i + 1 + $PosicaoBase}}</td>
                <td align="center" ><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a>
                 <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>
                <td align="center" ><a @if($Jogador->Guild != 'Sem Guild')href="{{ url('guilda/'.$Jogador->Guild) }}"@endif><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td align="center"  class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td align="center"  class="level txt_n">{{ $Jogador->Level }}</td>
                <td align="center"  class="score txt_n">{{ $Jogador->PtsDragao }}</td>
            </tr>
           @endforeach

        @elseif($rank == 'dragao')

           @foreach( $jogadores as $i => $Jogador)
           
           @if( ( $i + 1 + $PosicaoBase ) == 1)
           <tr class="top-1">
           @elseif( ($i + 1 + $PosicaoBase) == 2)
           <tr class="top-2">
           @elseif( ($i + 1 + $PosicaoBase) == 3)
           <tr class="top-3">
           @else
           <tr class="">
           @endif

                <td align="center" >{{ $i + 1 + $PosicaoBase}}</td>
                <td align="center" ><a href="{{ url('personagem/'.$Jogador->NickName) }}">{{ $Jogador->NickName }}</a>
                 <img src="{{ asset('images/reino_'.$Jogador->ImperioId.'.png') }}" class="pulse"></td>
                <td align="center" ><a @if($Jogador->Guild != 'Sem Guild')href="{{ url('guilda/'.$Jogador->Guild) }}"@endif><font color="#09F">{{ $Jogador->Guild }}</font></a></td>
                <td align="center"  class="simptip-position-top" data-tooltip="{{ $Jogador->RacaClasse }}">
                    <div class="job-icon classe_{{ $Jogador->ClasseImg }}"></div>
                </td>
                <td align="center"  class="level txt_n">{{ $Jogador->Level }}</td>
                <td align="center"  class="score txt_n">{{ $Jogador->PtsDragao }}</td>
            </tr>
           @endforeach

        @endif

                            </tbody>
                        </table></div>

                        <div id="pages">
{!! $paginacao->links() !!}

                        </div>    
</div>

  
    </div>
  </div>

@endsection