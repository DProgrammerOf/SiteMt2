<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use \Carbon\Carbon;

use App\Cadastro;
use App\Jogadores;
use App\Imperios;
use App\Quests;
use App\Guilds;
use App\CadastroChave;
use App\RankingTop5;
use App\ItemDestaque;
use App\Eleicao;
use App\EleicaoCandidato;
use App\EleicaoResultado;

use Validator;
use Model;
use Cache;
use Mail;
use App;

class CadastroController extends Controller
{

     const RANKING_CACHE_EXPIRE = 10;
     const RANKING_EVENTO = 'rank_crianca';

    public function Downloads(request $request){
        return view('download', ['pagina' => 'download', 'title' => 'Mt2Live - Pagina de Downloads']);
    }
    
    public function Termos(request $request){
        return view('termos', ['title' => 'Mt2Live - Termos & Condições de Uso']);
    }

    public function Home(request $request){
        return "Site em manutenção";
    }

    public function Cadastro(request $request){
        return view('cadastro', ['pagina' => 'cadastro', 'title' => 'Mt2Live - Pagina de Cadastro']);
    }

    public function CadastroTeste(request $request){
        return view('cadastroteste', ['pagina' => 'cadastro', 'title' => 'Mt2Live - Pagina de Cadastro']);
    }

    public function Recuperar(request $request){
        return view('recuperar', ['title' => 'Mt2Live - Recuperar Senha']);
    }

    public function ConfirmarConta($contachave){
            $contachave = addslashes($contachave);
            $validator = Validator::make(['contachave' => $contachave], [
                'contachave'                 => 'required|regex:/^[a-zA-Z0-9]{25}$/i',
                ]);

            if($validator->fails())
                return "<script>
                                alert('A chave informada é inválida.');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";

            $contas = new Cadastro;
            $chaves = new CadastroChave;

            $Chave = $chaves->where('key_base64', base64_encode($contachave))->first();
            $Conta = $contas->find($Chave->account_id);

            if(is_null($Chave) || is_null($Conta))
                return "<script>
                                alert('Sua chave não foi encontrada.');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";

            if($Conta->auth_key == 1)
                return "<script>
                                alert('Sua conta já está confirmada.');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";

            $ConfirmarConta = $contas->where('id', $Chave->account_id)->update(['auth_key' => 1, 'status' => 'OK']);

            if($ConfirmarConta){
                $ConfirmarChave = $chaves
                ->where('account_id', $Chave->account_id)
                ->where('key_base64', base64_encode($contachave))
                ->update(['status' => 1]);

                if($ConfirmarChave)
                    return "<script>
                                alert('Sua conta foi confirmada com sucesso - Seja Bem-Vindo ao Metin2 Live.');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";
                else
                    return "<script>
                                alert('Sua conta foi confirmada com sucesso! - Seja Bem-Vindo ao Metin2 Live..');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";
            }else{
                return "<script>
                                alert('Problema ao autorizar sua conta.');
                            </script>
                        <script language='javaScript'>window.location.href='/'</script>";
            }
    }

    public function EnviarEmailRecuperar(request $request){
        if($request->all()){
            $EmailRecup = addslashes($request->input('email'));

            $validator = Validator::make($request->all(), [
                'email'                 => 'required|email',
                ]);

            if($validator->fails())
                return "<script>
                    alert('O E-mail informado é inválido.');
                </script>
            <script language='javaScript'>window.location.href='recuperar'</script>";

            $contas = new Cadastro;
            $ConsultaContas = $contas->where('email', $EmailRecup)->get();


            if(!is_null($ConsultaContas)){
                if($ConsultaContas->count() == 0)
                    return "<script>
                    alert('Não foi encontrado nenhuma conta cadastrada nesse E-mail.');
                </script>
            <script language='javaScript'>window.location.href='recuperar'</script>";
            
                $Mensagem = '<h1>CrazyGames - Recuperação de Senha Mt2Live<h1>
                <h2>Conforme solicitado a recuperação, abaixo será listado as contas cadastradas neste E-Mail.</h2><br><br>';
        
                foreach ($ConsultaContas as $conta) {
                    $SenhaNovaNormal = $this->GerarHash(10);
                    $SenhaNovaHash = $this->HashSenha($SenhaNovaNormal);
                    $conta->update(['password' => $SenhaNovaHash]);//, 'password_normal' => $SenhaNovaNormal]);
                    $Mensagem .= '<b>ID da Conta:</b>  '.$conta->login.'<br>';
                    $Mensagem .= '<b>Nova Senha:</b>  '.$SenhaNovaNormal.'<br><br>';
                }

                $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';
                
                Mail::send([], [], function ($message) use ($EmailRecup, $Mensagem) {
                    $message->from('metinplus2@gmail.com', 'Mt2Live');
                    $message->to($EmailRecup, 'Mt2Live');
                    $message->subject('CrazyGames - Recuperação de Senha Mt2Live');
                    $message->setBody($Mensagem, 'text/html');
                });

                return "<script>
                    alert('Uma mensagem foi enviada para seu e-mail contendo todas as informações requisitadas.');
                </script>
            <script language='javaScript'>window.location.href='recuperar'</script>";
            }else{
                return "<script>
                    alert('Não foi encontrado nenhuma conta cadastrada nesse E-mail.');
                </script>
            <script language='javaScript'>window.location.href='recuperar'</script>";
            }
        }
        return redirect()->to('/');
    }

    private function HashSenha($senha) {
        $cript_pass=sha1($senha,true);
        $cript_pass=sha1($cript_pass);
        return "*".strtoupper($cript_pass);
    }

    public function GerarHash($qtd){ 
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
        $Caracteres = 'abcdefghjklmnopqrstuvxwyzABCDEFGHIJKLMNOPQRSTUVXWYZ0123456789'; 
        $QuantidadeCaracteres = strlen($Caracteres); 
        $QuantidadeCaracteres--; 

        $Hash=NULL; 
            for($x=1;$x<=$qtd;$x++){ 
                $Posicao = rand(0,$QuantidadeCaracteres); 
                $Hash .= substr($Caracteres,$Posicao,1); 
            } 
        return $Hash;
    } 

    public function mailTeste($email, $msg)
    {   
         Mail::send([], [], function ($message) use ($email, $msg) {
            $message->from('Plus2@contato.com', 'Mt2Live');
            $message->to($email, 'Mt2Live');
            $message->subject('CrazyGames - Alteração de Senha Mt2Live');
            $message->setBody($msg, 'text/html');
        });
    }

    public function mudarSenhas(){
        $users = DB::table('account')
        ->get();

        foreach ($users as $conta) {
            $SenhaNovaNormal = $this->GerarHash(10);
            $SenhaNovaHash = $this->HashSenha($SenhaNovaNormal);
            DB::table('account')->where('id', $conta->id)->update(['password' => $SenhaNovaHash, 'password_normal' => $SenhaNovaNormal]);
        }
        return "Senhas alteradas!";
    }

     public function enviarEmails(){

        $users = DB::table('account')->get();

        $Emails = array();
        $ViewContas = '<h1>Contas Mt2Live</h1>';
        $i = 0;
        foreach ($users as $conta) {
            if(in_array($conta->email, $Emails) == false)
                array_push($Emails, $conta->email);
            
        }

        array_splice($Emails, 0, 556);
        
       
        dd($Emails);
       
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

        $ImperioNome[0] = '';
        $ImperioNome[1] = 'shinsoo';
        $ImperioNome[2] = 'fogo';
        $ImperioNome[3] = 'gelo';

        $IdImperio = $imperio->find($id);

       // dd($IdImperio);
        return array(
            'Nome' => $ClasseNome[$job], 
            'NomeImg' => $Raca[$job],
            'Imperio' => $ImperioNome[$IdImperio->empire], 
            'ImperioId' => $IdImperio->empire
        );
    }

     public function Registrar(Request $request, Cadastro $cadastro){
        if($request->all()){
            $login = addslashes($request->input('login'));
            $senha = addslashes($request->input('senha'));
            $email = addslashes($request->input('email'));
            $codperso = addslashes($request->input('codperso'));
            $nome = addslashes($request->input('nome'));
            
   // dd($request->all());
            if( ($nome == NULL) || ($login == NULL)
            || ($senha == NULL)
            || ($email == NULL)
            || ($codperso == NULL) )
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";

            $validator = Validator::make($request->all(), [
            'nome'                  => 'required|min:3|max:16|alpha',
            'senha'                 => 'required|min:10|max:16',
            'senhaconf'             => 'required|min:10|max:16',
            'email'                 => 'required|email',
            'login'                 => 'required|min:5|max:30|alpha_num',
           // 'g-recaptcha-response'  => 'recaptcha',
            'codperso'              => 'required|digits:7',
            ]);

            /*if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";
            
            
            $data = [

                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $request->input('g-recaptcha-response')
            
            ];
            
            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            
            $response = curl_exec($curl);
            $response = json_decode($response, true);
            
            if ($response['success'] === false) {
               return "<script>
                    alert('reCaptcha inválido.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";
            
            }*/
            
           

            if(DB::table('admin_bans')->where('email', $email)->count() > 0)
                return "<script>
                    alert('E-mail banido.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";

            if(DB::table('account')->where('login', $login)->count() > 0)
                return "<script>
                    alert('Ja existe um usuário cadastrado com esse Login.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";

            if(DB::table('account')->where('email', $email)->count() >= 6)
                return "<script>
                    alert('Apenas 6 contas por e-mail é permitido.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";

            $StCadastro = $cadastro->create([
                'login'                     =>      $login,
                'password'                  =>      $this->HashSenha($senha),
                //'password_normal'           =>      $senha,
                'real_name'                 =>      $nome,
                'social_id'                 =>      $codperso,
                'email'                     =>      $email,
                'status'                    =>      'WEBBLK'
            ]);

            

            if($StCadastro){
                $ContaChave = $this->GerarHash(25);
                $Chaves = new CadastroChave;
                $KeyCadastro = $Chaves->create([
                    'account_id'    =>  $StCadastro->id,
                    'key'           =>  $ContaChave,
                    'key_base64'    =>  base64_encode($ContaChave),
                ]);

                if($KeyCadastro){
                    $Mensagem = '<h1>CrazyGames - Confirmação de Cadastro Mt2 Live<h1>
                    <h2>O cadastro de sua conta foi realizado com sucesso, para poder utiliza-lá é necessário que você confirme ela clicando no link abaixo.</h2><br><br>';

                    $Mensagem .= '<a href="http://www.mt2live.net/confirmacao/'.$ContaChave.'">CONFIRME SUA CONTA</a>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';
                
                Mail::send([], [], function ($message) use ($email, $Mensagem) {
                    $message->from('metinplus2@gmail.com', 'Live');
                    $message->to($email, 'Live');
                    $message->subject('Metin2Live - Confirmação de Cadastro');
                    $message->setBody($Mensagem, 'text/html');
                });
                return "<script>
                    alert('Uma mensagem foi enviada em seu E-mail para a confirmação, Att. Mt2 Live.');
                </script>
            <script language='javaScript'>window.location.href='/'</script>";
                }else{
                    return "<script>
                    alert('Problema no cadastro, informe ao administrador.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";
                }
                
            }else{ 
                return "<script>
                    alert('Cadastro não pode ser realizado.');
                </script>
            <script language='javaScript'>window.location.href='/cadastro'</script>";
            }
        }
    }

    private function PontosRanking( $id, $tipo ){
        $quests = new Quests;

        if($tipo == 2)
            $Consulta = $quests->where('szState', self::RANKING_EVENTO)->find($id);
        else if($tipo == 5)
            $Consulta = $quests->where('szState', 'dragon_slayer')->find($id);

        //dd($Consulta);
        
        return $Consulta->lValue;
    }

    public function RankingIndexTabs($tipo)
    {   
        $jogadores = new Jogadores;
        $quests = new Quests;
        $guilds = new Guilds;

        $rankespecial = self::RANKING_EVENTO;

        switch ($tipo) {
            case 1: //Rank. Persongem
                $OrderBy1 = 'kills';
                $OrderBy2 = 'level';
                $OrderBy3 = 'pontos_ranking_geral';
                break;

            case 2: //Rank. Evento
                $OrderBy1 = 'level';
                $OrderBy2 = 'exp';
                $OrderBy3 = 'name';
                $rankespecial = self::RANKING_EVENTO;
                break;

            case 3: //Rank. Insignia
                $OrderBy1 = 'insignia';
                $OrderBy2 = 'level';
                $OrderBy3 = 'exp';
                break;

            case 4: //Rank. Guilds
                $OrderBy1 = 'win';
                $OrderBy2 = 'loss';
                $OrderBy3 = 'draw';
                break;

            case 5: //Rank. Dragoes
                $OrderBy1 = 'encruzilhada';
                $OrderBy2 = 'level';
                $OrderBy3 = 'exp';
                $rankespecial = 'dragon_slayer';
                break;
            
            default:
                $OrderBy1 = 'level';
                $OrderBy2 = 'exp';
                $OrderBy3 = 'pontos_ranking_geral';
                break;
        }

        $JogadoresTop = Cache::remember('ranking.indextab.tempnew12'.$tipo, self::RANKING_CACHE_EXPIRE, function() 
            use($OrderBy1, $OrderBy2, $OrderBy3, $jogadores, $quests, $guilds, $tipo, $rankespecial) {
            
            if($tipo == 2)
                $ConsultaId = $quests
                ->where('szState', self::RANKING_EVENTO)
                ->where('lValue', 'NOT LIKE', '0%')
                ->take(6)
                ->get();
            else if($tipo == 5)
                $Consulta = $jogadores
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->take(6)
                ->get();
            else if($tipo == 4)
                $Consulta = $guilds
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'ASC')
                ->orderBy($OrderBy3, 'DESC')
                ->take(6)
                ->get();
            else
                $Consulta = $jogadores
                ->where('name', 'NOT LIKE', '[%]%')
                ->orderBy($OrderBy1, 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->take(6)
                ->get();

            if(($tipo == 2))// || ($tipo == 5))
                $Consulta = $jogadores
                ->select('player.*')
                ->join('quest as jogador', function ($join) use($rankespecial) {
                            $join->on('player.id', '=', 'jogador.dwPID')
                            ->where('jogador.lValue', 'NOT LIKE', '0%')
                            ->where('jogador.szState', $rankespecial);
                        })
                ->where('name', 'NOT LIKE', '[%]%')
                ->orderBy('jogador.lValue', 'DESC')
                ->orderBy($OrderBy2, 'DESC')
                ->orderBy($OrderBy3, 'DESC')
                ->take(6)
                ->get();

            if(($tipo == 2))
            $ListaRanking = collect($Consulta)->map(function($jogador) use ($tipo)  {
                
                return new App\Jogadores([
                    'NickName'      => $jogador->name,
                    'Level'         => $jogador->level,
                    'Experiencia'   => $jogador->exp,
                    'Classe'        => $jogador->job,
                    'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                    'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                    'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                    'PtsGeral'      => $jogador->pontos_ranking_geral,
                    'PtsColiseu'    => $jogador->insignia,
                    'PtsDragao'     => $jogador->encruzilhada,
                    //'PtsRank'         => $this->PontosRanking($jogador->id, $tipo)
                ]);
            });
           else if($tipo == 5)
           $ListaRanking = collect($Consulta)->map(function($jogador) use ($tipo)   {
                
                return new App\Jogadores([
                    'NickName'      => $jogador->name,
                    'Level'         => $jogador->level,
                    'Experiencia'   => $jogador->exp,
                    'Classe'        => $jogador->job,
                    'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                    'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                    'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                    'PtsGeral'      => $jogador->pontos_ranking_geral,
                    'PtsColiseu'    => $jogador->insignia,
                    'PtsDragao'     => $jogador->encruzilhada
                ]);
            });
           else if($tipo == 4)
            $ListaRanking = collect($Consulta)->map(function($guild)    {
                
                return new App\Guilds([
                    'GuildName'     => $guild->name,
                    'Level'         => $guild->level,
                    'Experiencia'   => $guild->exp,
                    'Vitorias'      => $guild->win,
                    'Derrotas'      => $guild->loss,
                    'PtsRank'       => $guild->sp
                ]);
            });
           else
            $ListaRanking = collect($Consulta)->map(function($jogador)  {
                
                return new App\Jogadores([
                    'NickName'      => $jogador->name,
                    'Level'         => $jogador->level,
                    'Experiencia'   => $jogador->exp,
                    'Classe'        => $jogador->job,
                    'ClasseNome'    => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Nome'],
                    'Imperio'       => $this->NomeDaClasse($jogador->account_id, $jogador->job)['Imperio'],
                    'ImperioId'     => $this->NomeDaClasse($jogador->account_id, $jogador->job)['ImperioId'],
                    'PtsGeral'      => $jogador->pontos_ranking_geral,
                    'PtsKill'       => $jogador->kills,
                    'PtsColiseu'    => $jogador->insignia,
                    'PtsDragao'     => $jogador->encruzilhada
                ]);
            });

            return $ListaRanking;
        });

        return $JogadoresTop;
    }

    private function PersonagemPorPID( $pid ){
        $jogadores = new Jogadores;

        $Consulta = $jogadores->where('id', $pid)->first();
        
        if($Consulta)
                return array(
                    'NickName'  => $Consulta->name,
                    'ClasseImg' => $this->NomeDaClasse($Consulta->account_id, $Consulta->job)['NomeImg'],
                    'ImperioId' => $this->NomeDaClasse($Consulta->account_id, $Consulta->job)['ImperioId'],
                    'ContaId'   => $Consulta->account_id

                );
            else
                return array(
                    'NickName'  => 'Não encontrado!',
                    'ClasseImg' => 'x',
                    'ImperioId' => 'x',
                    'ContaId'   => 100
                );
            
    }

    public function RankingTop5( $tipo ){
        $JogadoresTop5 = Cache::remember('ranking.indextop5.tempneww233'.$tipo, 0, function() 
            use($tipo) {

                $toppers5 = new RankingTop5;

                $Consulta = $toppers5
                ->where('ranking', $tipo)
                ->orderBy('posicao', 'ASC')
                ->take(5)
                ->get();

                if(!$Consulta)
                    return null;

                $ListaRanking = collect($Consulta)->map(function($jogador)  {
                $JogadorInfo = Jogadores::where('name', $jogador->NickName)->first();

                if($JogadorInfo == null){
                    $jogador->delete();
                    return true;
                }
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                return new App\RankingTop5([
                    'NickName'      => $JogadorInfo->name,
                    'ClasseImg'     => $JogadorInfo->job,
                    'ImperioId'     => $jogador->ImperioId,
                    'Posicao'       => $jogador->Posicao
                ]);
            });

                return $ListaRanking;

            });

        return $JogadoresTop5;
    }


    public static function UsuarioPersonagem($id) { 
        $Personagem = Jogadores::find($id);

            return $Personagem;
    }

    public function Site(request $request){
        //return 'Em manutenção...';
       /* $RankTabGeral = $this->RankingIndexTabs(1);
        $RankTabKills = $this->RankingIndexTabs(2);
        $RankTabColiseu = $this->RankingIndexTabs(3);
        $RankTabGuilds = $this->RankingIndexTabs(4);
        $RankTabDragoes = $this->RankingIndexTabs(5);

        $Top5_Guerreiros = $this->RankingTop5('top_guerreiro');
        $Top5_Ninjas = $this->RankingTop5('top_ninja');
        $Top5_Shuras = $this->RankingTop5('top_shura');
        $Top5_Shamans = $this->RankingTop5('top_shaman');
        $Top5_PvPGeral = $this->RankingTop5('top_pvpgeral');

        //if(in_array($_SERVER['REMOTE_ADDR'], array('189.7.125.236')))
            //dd($Top5_Guerreiros);
        //dd($RankTabKills);
        
        $ItemDestaque = new ItemDestaque;
        $DateHoje = Carbon::now('America/Sao_Paulo');

        if($DateHoje->dayOfWeek == Carbon::SUNDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 7)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::MONDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 1)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::TUESDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 2)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::WEDNESDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 3)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::THURSDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 4)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::FRIDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 5)->where('visivel', 1)->get();
        elseif($DateHoje->dayOfWeek == Carbon::SATURDAY)
            $ItemDestaque = ItemDestaque::where('id_lista', 6)->where('visivel', 1)->get();


         $Eleicao = Eleicao::where('data_inicio', '<=', $DateHoje)->where('data_termino', '>=', $DateHoje)->first();
       // dd($Eleicao->id);
        $CandidatoFogo = '';
        $CandidatoGelo = '';
        $CandidatoShinsoo = '';
        if($Eleicao){
            $CandidatoFogo      = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 1)->orderBy('votos', 'DESC')->take(3)->get();
            $CandidatoGelo      = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 3)->orderBy('votos', 'DESC')->take(3)->get();
            $CandidatoShinsoo   = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 2)->orderBy('votos', 'DESC')->take(3)->get();

            $CandidatoFogo = collect($CandidatoFogo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });

        $CandidatoGelo = collect($CandidatoGelo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });

        $CandidatoShinsoo = collect($CandidatoShinsoo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });
        }

        $EleicaoResultado = EleicaoResultado::orderBy('id_reino', 'DESC')->get();

        if($EleicaoResultado->count() < 1){
            $EleicaoResultado = '';
        }else{
            $Eleicao = Eleicao::where('visivel', 1)->first();
            $EleicaoResultado = collect($EleicaoResultado)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoResultado([
                    'id_player'     => $jogador->id_player,
                    'nickname'      => $jogador->nickname,
                    'votos'         => $jogador->votos,
                    'id_reino'      => $jogador->id_reino
                ]);
            });
            if($Eleicao){
            $CandidatoFogo      = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 1)->orderBy('votos', 'DESC')->take(3)->get();
            $CandidatoGelo      = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 3)->orderBy('votos', 'DESC')->take(3)->get();
            $CandidatoShinsoo   = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', 2)->orderBy('votos', 'DESC')->take(3)->get();

            $CandidatoFogo = collect($CandidatoFogo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });

        $CandidatoGelo = collect($CandidatoGelo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });

        $CandidatoShinsoo = collect($CandidatoShinsoo)->map(function($jogador)  {
                $JogadorInfo = Jogadores::find($jogador->id_player);
               // $JogadorInfo = $this->PersonagemPorPID($jogador->pid);

                if(!$JogadorInfo)
                    $jogador->delete();

                return new App\EleicaoCandidato([
                    'votos'         => $jogador->votos,
                    'id_player'     => $jogador->id_player,
                    'id_reino'      => $jogador->id_reino
                ]);
            });
            }
        }
            */


       // dd($EleicaoResultado);

        return view('welcome', [
            'title' => 'Mt2Live - Pagina Inicial', 
            'pagina' => 'home',
           /* 'RankTabGeral' => $RankTabGeral,
            'RankTabKills' => $RankTabKills,
            'RankTabColiseu' => $RankTabColiseu,
            'RankTabGuilds' => $RankTabGuilds,
            'RankTabDragoes' => $RankTabDragoes,
            'RankTop5Guerreiros' => $Top5_Guerreiros,
            'RankTop5Ninjas' => $Top5_Ninjas,
            'RankTop5Shuras' => $Top5_Shuras,
            'RankTop5Shamans' => $Top5_Shamans,
            'RankTop5PvPGeral' => $Top5_PvPGeral,
            'ItemDestaque'  =>$ItemDestaque,
            'CandidatoFogo'       =>$CandidatoFogo,
            'CandidatoGelo'       =>$CandidatoGelo,
            'CandidatoShinsoo'       =>$CandidatoShinsoo,
            'EleicaoResultado'  => $EleicaoResultado*/
        ]);
    }

    public function Balanca(){
        return view('balanca');
    }
    
    public function SiteTemp(request $request){
        //return 'Em manutenção...';
        $RankTabGeral = $this->RankingIndexTabs(1);
        $RankTabKills = $this->RankingIndexTabs(2);
        $RankTabColiseu = $this->RankingIndexTabs(3);
        $RankTabGuilds = $this->RankingIndexTabs(4);
        $RankTabDragoes = $this->RankingIndexTabs(5);

        $Top5_Guerreiros = $this->RankingTop5('top_guerreiro');
        $Top5_Ninjas = $this->RankingTop5('top_ninja');
        $Top5_Shuras = $this->RankingTop5('top_shura');
        $Top5_Shamans = $this->RankingTop5('top_shaman');
        $Top5_PvPGeral = $this->RankingTop5('top_pvpgeral');

        //if(in_array($_SERVER['REMOTE_ADDR'], array('189.7.125.236')))
            //dd($Top5_Guerreiros);
        //dd($RankTabKills);

        return view('welcome', [
            'title' => 'Mt2Live - Pagina Inicial', 
            'RankTabGeral' => $RankTabGeral,
            'RankTabKills' => $RankTabKills,
            'RankTabColiseu' => $RankTabColiseu,
            'RankTabGuilds' => $RankTabGuilds,
            'RankTabDragoes' => $RankTabDragoes,
            'RankTop5Guerreiros' => $Top5_Guerreiros,
            'RankTop5Ninjas' => $Top5_Ninjas,
            'RankTop5Shuras' => $Top5_Shuras,
            'RankTop5Shamans' => $Top5_Shamans,
            'RankTop5PvPGeral' => $Top5_PvPGeral
        ]);
    }

}
