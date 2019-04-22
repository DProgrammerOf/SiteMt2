<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jogadores;
use App\Imperios;
use App\GuildMembros;
use App\Guilds;
use App\Quests;
use App\GuildCargo;

use Cache;
use App;
use DB;
use Validator;

class RankingController extends Controller
{

    const RANKING_CACHE_EXPIRE = 1;

    public function Ranking(request $request){
        return view('ranking', ['title' => 'Mt2 Live - Pagina de Ranking', 'rank' => 'personagens']);
    }

    public function InfoGuildas( $nome = null ){
        $nome = addslashes($nome);
        $validator = Validator::make(['nameguild' => $nome], [
                'nameguild'             => 'required|regex:/^[a-zA-Z]{4,15}$/i',
                ]);

            if($validator->fails()){
                return redirect()->to('/ranking');
            }

            $guilds = new Guilds;
            $Guilda = $guilds->where('name', $nome)->first();

            if(is_null($Guilda))
                return redirect()->to('/ranking');
            else
                {   
                    $Guild = Cache::remember('guilda.'.$nome, self::RANKING_CACHE_EXPIRE    , function() 
                     use($Guilda) {
                         $personagens = new Jogadores;
                         $DonoGuilda = $personagens->find($Guilda->master);

                         $GuildaInfos = collect([$Guilda])->map(function($guild) use ($DonoGuilda)  {
                            return new App\Guilds([
                                'GuildName'     => $guild->name,
                                'GuildDono'     => $DonoGuilda->name,
                                'Level'         => $guild->level,
                                'Experiencia'   => $guild->exp,
                                'Vitorias'      => $guild->win,
                                'Derrotas'      => $guild->loss,
                                'Empates'       => $guild->draw,
                                'Imperio'       => $this->GuildImperio($guild->master)['Imperio'],
                                'ImperioId'     => $this->GuildImperio($guild->master)['ImperioId'],
                                'ImperioCor'    => $this->GuildImperio($guild->master)['ImperioCor'],
                                'PtsRank'       => $guild->sp
                            ]);
                        });
                         return $GuildaInfos;
                    });
                    
                    $MembrosGuilda = Cache::remember('guild.'.$nome.'.membros', self::RANKING_CACHE_EXPIRE, function() use ($Guilda){

                        $membros = new GuildMembros;
                        $JogadoresMembros = $membros
                        ->where('guild_id', $Guilda->id)
                        ->join('player as jogador', function ($join) {
                            $join->on('guild_member.pid', '=', 'jogador.id')
                            ->where('jogador.name', 'NOT LIKE', '[%]%');
                        })
                        ->orderBy('grade', 'ASC')
                        ->orderBy('jogador.level', 'DESC')
                        ->orderBy('jogador.exp', 'DESC')
                        ->get();

                        $MembrosInfos = collect($JogadoresMembros->all())->map(function($jogador)   {
                            return new App\Jogadores([
                        'NickName'      => $jogador->name,
                        'Level'         => $jogador->level,
                        'Classe'        => $jogador->job,
                        'Cargo'         => $this->PersoCargo($jogador->grade),
                        'RacaClasse'    => $this->RacaClasse($jogador->skill_group, $jogador->job),
                        'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                        'ClasseImg'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['NomeImg'],
                        'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                        'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                        'ImperioCor'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioCor']
                            ]);
                        });
                         return $MembrosInfos;
                    });


                   // dd($Guild);
                return view('guilda', ['title' => 'Mt2 Live - Guilda', 'guilda' => $Guild, 'membros' => $MembrosGuilda]);
                }   

            return "Ok";
    }

    public function InfoPersonagens( $nome = null ){
        $nome = addslashes($nome);
        $validator = Validator::make(['nameperso' => $nome], [
                'nameperso'             => 'required|regex:/^[a-zA-Z0-9]{1,12}$/i',
                ]);

            if($validator->fails()){
                return redirect()->to('/ranking');
            }

            $jogadores = new Jogadores;
            $Personagem = $jogadores->where('name', $nome)->first();

            if(is_null($Personagem))
                return redirect()->to('/ranking');
            else
                {
                    $Jogador = Cache::remember('personagem.new2.'.$nome, self::RANKING_CACHE_EXPIRE, function() 
                     use($Personagem) {

                         $PersonagemInfos = collect([$Personagem])->map(function($jogador)   {
                            return new App\Jogadores([
                        'NickName'      => $jogador->name,
                        'Level'         => $jogador->level,
                        'Experiencia'   => $jogador->exp,
                        'Classe'        => $jogador->job,
                        'Guild'         => $this->PersoGuild($jogador->id)['GuildNome'],
                        'GuildLevel'    => $this->PersoGuild($jogador->id)['GuildLevel'],
                        'GuildVitorias' => $this->PersoGuild($jogador->id)['GuildVitorias'],
                        'RacaClasse'    => $this->RacaClasse($jogador->skill_group, $jogador->job),
                        'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                        'ClasseImg'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['NomeImgProfile'],
                        'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                        'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                        'ImperioCor'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioCor'],
                        'PtsKill'       => $jogador->kills
                            ]);
                        });
                         return $PersonagemInfos;
                    });

                return view('personagem', ['title' => 'Mt2 Live - Personagem', 'personagem' => $Jogador]);
                }   
    }

    public function PersoCargo( $gradeid ){
        $cargos = new GuildCargo;
        $Cargo = $cargos->find($gradeid);

        if($Cargo)
                return $Cargo->name;
            else
                return "Indefinido";
            
    }

    public function PersoGuild( $pid ){
        $guildsmembro = new GuildMembros;

        $GuildRef = $guildsmembro->find($pid);

        if($GuildRef){
            $guilds = new Guilds;

            $Guild = $guilds->find($GuildRef->guild_id);

            if($Guild){
                return array('GuildNome'     => $Guild->name,
                             'GuildLevel'    => $Guild->level,
                             'GuildVitorias' => $Guild->win);
            }else{
                return array('GuildNome'     => 'Sem Guild',
                             'GuildLevel'    => 'Sem Guild',
                             'GuildVitorias' => 'Sem Guild');
            }

        }else{
            return array('GuildNome'     => 'Sem Guild',
                         'GuildLevel'    => 'Sem Guild',
                         'GuildVitorias' => 'Sem Guild');
        }

    }

    private function RacaClasse( $skillgroup, $raca ){
    $RacaClasse = '';
    switch ($skillgroup) {
         case 1:
             if( ($raca == 0) OR ($raca == 4) )
                $RacaClasse = "Guerreiro Arahan";

             if( ($raca == 1) OR ($raca == 5) )
                $RacaClasse = "Ninja Assassino";

             if( ($raca == 2) OR ($raca == 6) )
                $RacaClasse = "Shura Miragem";

             if( ($raca == 3) OR ($raca == 7) )
                $RacaClasse = "Shaman Drag찾o";
             break;

        case 2:
             if( ($raca == 0) OR ($raca == 4) )
                $RacaClasse = "Guerreiro Partizan";

             if( ($raca == 1) OR ($raca == 5) )
                $RacaClasse = "Ninja Arqueiro";

             if( ($raca == 2) OR ($raca == 6) )
                $RacaClasse = "Shura Black";

             if( ($raca == 3) OR ($raca == 7) )
                $RacaClasse = "Shaman Rel창mpago";
             break;
         
         default:
             if( ($raca == 0) OR ($raca == 4) )
                $RacaClasse = "Guerreiro";

             if( ($raca == 1) OR ($raca == 5) )
                $RacaClasse = "Ninja";

             if( ($raca == 2) OR ($raca == 6) )
                $RacaClasse = "Shura";

             if( ($raca == 3) OR ($raca == 7) )
                $RacaClasse = "Shaman";
             break;
     }

     return $RacaClasse;
    }

    private function NomeDaClasse($id, $job){
        $imperio = new Imperios;

        $ClasseNome[0] = 'Guerreiro';
        $ClasseNome[4] = 'Guerreiro';
        $ClasseNome[5] = 'Ninja';
        $ClasseNome[1] = 'Ninja';
        $ClasseNome[2] = 'Shura';
        $ClasseNome[6] = 'Shura';
        $ClasseNome[7] = 'Shaman';
        $ClasseNome[3] = 'Shaman';

        $Raca[0] = 'guerreiro_m';
        $Raca[4] = 'guerreiro_f';
        $Raca[5] = 'ninja_m';        
        $Raca[1] = 'ninja_f';
        $Raca[2] = 'shura_m';
        $Raca[6] = 'shura_f';
        $Raca[7] = 'shaman_m';
        $Raca[3] = 'shaman_f';

        $RacaProfile[0] = 'guerreiro-m';
        $RacaProfile[4] = 'guerreiro-f';
        $RacaProfile[5] = 'ninja-m';        
        $RacaProfile[1] = 'ninja-f';
        $RacaProfile[2] = 'shura-m';
        $RacaProfile[6] = 'shura-f';
        $RacaProfile[7] = 'shaman-m';
        $RacaProfile[3] = 'shaman-f';

        $ImperioNome[0] = '';
        $ImperioNome[1] = 'shinsoo';
        $ImperioNome[2] = 'fogo';
        $ImperioNome[3] = 'gelo';

        $ImperioCor[0] = '';
        $ImperioCor[1] = 'yellow';
        $ImperioCor[2] = 'red';
        $ImperioCor[3] = 'blue';

        $IdImperio = $imperio->find($id);

        //dd($id);
        return array(
            'Nome' => $ClasseNome[$job], 
            'NomeImg' => $Raca[$job],
            'NomeImgProfile' => $RacaProfile[$job],
            'Imperio' => $ImperioNome[$IdImperio->empire], 
            'ImperioId' => $IdImperio->empire,
            'ImperioCor' => $ImperioCor[$IdImperio->empire]
        );
    }

    private function GuildImperio( $masterid ){
        $personagens = new Jogadores;
        $Master = $personagens->find($masterid);

        return array(
            'Imperio'       => $this->NomeDaClasse($Master->account_id, $Master->job)['Imperio'],
            'ImperioId'     => $this->NomeDaClasse($Master->account_id, $Master->job)['ImperioId'],
            'ImperioCor'    => $this->NomeDaClasse($Master->account_id, $Master->job)['ImperioCor']
        );
    }

    private function PtslValue( $pid ){
        $quests = new Quests;
        $Perso = $quests
        ->where('dwPID', $pid)
        ->where('szState', 'dragon_slayer')
        ->first();

        return array(
        'PontosDragao'    =>  $Perso->lValue  
                );
    }

    public function RankingPersonagens( $rank = 'personagens', $classe = 'todas', $reino = 'todos', request $request ){

        switch ($classe) {
            case 'todas':
                $classes = [0, 1, 2, 3, 4, 5, 6, 7];
                break;
            case 'guerreiros':
                $classes = [0, 4];
                break;
            case 'ninjas':
                $classes = [1, 5];
                break;
            case 'shuras':
                $classes = [2, 6];
                break;
            case 'shamans':
                $classes = [7, 3];
                break;
            default:
                $classes = [0, 1, 2, 3, 4, 5, 6, 7];
                break;
        }

        switch ($reino) {
            case 'todos':
                $reinos = [1, 2, 3];
                break;
                
            case 'shinsoo':
                $reinos = [1];
                break;

            case 'chunjo':
                $reinos = [2];
                break;

            case 'jinno':
                $reinos = [3];
                break;
            
            default:
                $reinos = [1, 2, 3];
                break;
        }

        $personagens = new Jogadores;
        $imperios = new Imperios;

        switch ($rank) {
            case 'personagens':
                $OrderBy1 = 'level';
                $OrderBy2 = 'exp';
                $OrderBy3 = 'pontos_ranking_geral';
                break;

            case 'killers':
                $OrderBy1 = 'kills';
                $OrderBy2 = 'pontos_ranking_mensal';
                $OrderBy3 = 'level';
                break;

            case 'insignia':
                $OrderBy1 = 'insignia';
                $OrderBy2 = 'level';
                $OrderBy3 = 'exp';
                break;

            case 'guildas':
                $OrderBy1 = 'win';
                $OrderBy2 = 'loss';
                $OrderBy3 = 'draw';
                break;

            case 'encruzilhada':
                $OrderBy1 = 'encruzilhada';
                $OrderBy2 = 'level';
                $OrderBy3 = 'exp';
                break;
            
            default:
                $OrderBy1 = 'level';
                $OrderBy2 = 'exp';
                $OrderBy3 = 'pontos_ranking_geral';
                break;
        }
        $page = $request->has('page') ? $request->query('page') : 1;

        $JogadoresTop = Cache::remember('ranking.new5.'.$rank.'.'.$classe.".".$reino.".".$page, self::RANKING_CACHE_EXPIRE, function() 
            use($rank, $personagens, $classes, $imperios, $reinos, $OrderBy1, $OrderBy2, $OrderBy3) {


            

            if($rank == 'guildas'){
                $guilds = new Guilds;
                //dd($imperios->take(10)->get());

                $Consulta = $guilds
                ->select('guild.*')
                ->join('player as jogador', function ($join) {
                    $join->on('guild.master', '=', 'jogador.id')
                    ->where('jogador.name', 'NOT LIKE', '[%]%');
                })
                ->join('player_index as imperios', function ($join) use ($reinos) {
                    $join->on('jogador.account_id', '=', 'imperios.id')
                    ->whereIn('imperios.empire', $reinos);
                })
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'ASC')
                ->orderBy($OrderBy3, 'DESC')
                ->paginate(15);
            }/*elseif($rank == 'dragao'){
                $Consulta = $personagens
                ->select('player.*')
                ->where('name', 'NOT LIKE', '[%]%')
                ->whereIn('job', $classes)
                ->join('quest', function ($join) {
                    $join->on('player.id', '=', 'quest.dwPID')
                    ->where('szState', 'dragon_slayer')
                    ->where('lValue', 'NOT LIKE', '0%');
                })
                ->join('player_index as imperios', function ($join) use ($reinos) {
                    $join->on('player.account_id', '=', 'imperios.id')
                    ->whereIn('imperios.empire', $reinos);
                })
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->paginate(15);
            }*/else{
                $Consulta = $personagens
                ->select('player.*')
                ->where('name', 'NOT LIKE', '[%]%')
                ->whereIn('job', $classes)
                ->join('player_index', function ($join) use ($reinos) {
                    $join->on('player.account_id', '=', 'player_index.id')
                    ->whereIn('player_index.empire', $reinos);
                })
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->paginate(15);
            }

            if($rank == 'guildas')
                $ListaRanking = collect($Consulta->all())->map(function($guild)    {
                
                return new App\Guilds([
                    'GuildName'     => $guild->name,
                    'Level'         => $guild->level,
                    'Experiencia'   => $guild->exp,
                    'Vitorias'      => $guild->win,
                    'Derrotas'      => $guild->loss,
                    'Empates'       => $guild->draw,
                    'Imperio'       => $this->GuildImperio($guild->master)['Imperio'],
                    'ImperioId'     => $this->GuildImperio($guild->master)['ImperioId'],
                    'PtsRank'       => $guild->sp
                ]);
            });
           elseif($rank == 'encruzilhada')
                $ListaRanking = collect($Consulta->all())->map(function($jogador)  {
                
                return new App\Jogadores([
                    'NickName'      => $jogador->name,
                    'Level'         => $jogador->level,
                    'Experiencia'   => $jogador->exp,
                    'Classe'        => $jogador->job,
                    'Guild'         => $this->PersoGuild($jogador->id)['GuildNome'],
                    'RacaClasse'    => $this->RacaClasse($jogador->skill_group, $jogador->job),
                    'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                    'ClasseImg'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['NomeImg'],
                    'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                    'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                    'PtsKill'       => $jogador->kills,
                    'PtsColiseu'    => $jogador->insignia,
                    'PtsGeral'      => $jogador->pontos_ranking_geral,
                    'PtsDragao'     => $jogador->encruzilhada,
                ]);
            });
           else
                $ListaRanking = collect($Consulta->all())->map(function($jogador)   {
                
                return new App\Jogadores([
                    'NickName'      => $jogador->name,
                    'Level'         => $jogador->level,
                    'Experiencia'   => $jogador->exp,
                    'Classe'        => $jogador->job,
                    'Guild'         => $this->PersoGuild($jogador->id)['GuildNome'],
                    'RacaClasse'    => $this->RacaClasse($jogador->skill_group, $jogador->job),
                    'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                    'ClasseImg'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['NomeImg'],
                    'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                    'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                    'PtsKill'       => $jogador->kills,
                    'PtsColiseu'    => $jogador->insignia,
                    'PtsGeral'      => $jogador->pontos_ranking_geral
                    ]);
                });

                return $ListaRanking;
            });

        if($rank == 'guildas'){
            $guilds = new Guilds;
            $Consulta2 = $guilds
                ->select('guild.*')
                ->join('player as jogador', function ($join) {
                    $join->on('guild.master', '=', 'jogador.id')
                    ->where('jogador.name', 'NOT LIKE', '[%]%');
                })
                ->join('player_index as imperios', function ($join) use ($reinos) {
                    $join->on('jogador.account_id', '=', 'imperios.id')
                    ->whereIn('imperios.empire', $reinos);
                })
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->paginate(15);
        }
        elseif($rank == 'encruzilhada')
            $Consulta2 = $personagens
                ->select('player.*')
                ->where('name', 'NOT LIKE', '[%]%')
                ->whereIn('job', $classes)
                ->join('quest', function ($join) {
                    $join->on('player.id', '=', 'quest.dwPID')
                    ->where('szState', 'dragon_slayer')
                    ->where('lValue', 'NOT LIKE', '0%');
                })
                ->join('player_index as imperios', function ($join) use ($reinos) {
                    $join->on('player.account_id', '=', 'imperios.id')
                    ->whereIn('imperios.empire', $reinos);
                })
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->paginate(15);
        else
           $Consulta2 = $personagens
                ->select('player.*')
                ->where('name', 'NOT LIKE', '[%]%')
                ->whereIn('job', $classes)
                ->join('player_index', function ($join) use ($reinos) {
                    $join->on('player.account_id', '=', 'player_index.id')
                    ->whereIn('player_index.empire', $reinos);
                })
                ->orderBy('level', 'DESC')
                ->orderBy('exp', 'DESC')
                ->orderBy('pontos_ranking_geral', 'DESC')
                ->paginate(15);

        return view('ranking', [
            'title' => 'Mt2 Live - Pagina de Ranking',
            'pagina' => 'ranking',
            'rank' => $rank,
            'classe' => $classe,
            'reino' => $reino,
            'jogadores' => $JogadoresTop,
            'paginacao' => $Consulta2
            ]);
    }
}
