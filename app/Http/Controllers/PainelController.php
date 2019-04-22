<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cadastro;
use App\Armazem;
use App\Jogadores;
use App\Imperios;
use App\GerencContaChave;
use App\Doacao;
use App\Eleicao;
use App\EleicaoCandidato;
use App\EleicaoVotos;
use App\CodigoPersonagem;
use App\CodigoArmazem;

use \Carbon\Carbon;

use Validator;
use Mail;

class PainelController extends Controller
{
    private function HashSenha($senha) {
        $cript_pass=sha1($senha,true);
        $cript_pass=sha1($cript_pass);
        return "*".strtoupper($cript_pass);
    }

    public function UsuarioHomeView(request $request){
        if(Auth::guest())
            return redirect('/');
        
        return view('painel.usuario', ['title' => 'Mt2Live - Painel do Usuário']);
    }

    public function UsuarioMudarSenhaView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        return view('painel.mudarsenha', ['title' => 'Mt2Live - Alterar Senha']);
    }

    public function UsuarioMudarNomeView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        return view('painel.mudarnome', ['title' => 'Mt2Live - Alterar Nome']);
    }

    public function UsuarioMudarEmailView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        return view('painel.mudaremail', ['title' => 'Mt2Live - Alterar Email']);
    }

    public function UsuarioArmazemView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        return view('painel.armazem', ['title' => 'Mt2Live - Painel Armazem']);
    }

    public function UsuarioCodigoPessoalView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        return view('painel.codigopessoal', ['title' => 'Mt2Live - Painel Código Pessoal']);
    }
    
    public function UsuarioEleicaoView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        $Imperio = Imperios::find(Auth::user()->id);
        
        $DateHoje = Carbon::now('America/Sao_Paulo');
        
        $Eleicao = '';
        $Candidato = '';
        $CandidatoVoto = '';
        $KillsConta = 0;
        $DiasConta = 0;
    
        if($Imperio) {
        $Eleicao = Eleicao::where('data_inicio', '<=', $DateHoje)->where('data_termino', '>=', $DateHoje)->first();
       // dd($Eleicao->id);
        

        if($Eleicao){
            $Candidato = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->where('id_reino', $Imperio->empire)->get();

            $CandidatoVoto = EleicaoVotos::where('id_eleicao', $Eleicao->id)->where('id_conta', Auth::user()->id)->first();

            $Personagem = Jogadores::where('account_id', Auth::user()->id)->get();

            if($Personagem->count() > 0){
                foreach($Personagem as $Perso){
                    $KillsConta += $Perso->kills;
                    if($Perso->playtime >= $DiasConta)
                        $DiasConta = $Perso->playtime;
                }
            }
        }
        }

        //dd(EleicaoCandidato::where('id_get());
        //dd($Eleicao);
        return view('painel.eleicao', ['title' => 'Mt2Live - Painel de Eleições', 'Imperio' => $Imperio, 'candidatos' => $Candidato, 'candidatovotado' => $CandidatoVoto, 'eleicao' => $Eleicao, 'kills' => $KillsConta, 'tempojogando' => $DiasConta]);
    }

    public static function UsuarioPersonagem($id) { 
        $Personagem = Jogadores::findOrFail($id);

        return $Personagem;
    }

    public function UsuarioVotar(request $request){
        if(Auth::guest())
            return redirect('/');
            
        if($request->all()){
            $validatedData = $this->validate($request, [
                    'id_cand'                           => 'required|integer|min:1|max:99999999999',
                ]);
            //return "TUDO CERTO";


            $EleicaoCandidato = EleicaoCandidato::find($request->input('id_cand'));

            if(!$EleicaoCandidato)
                return "<script>
                    alert('Não encontramos o candidato que você quer votar, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";

            $Eleicao = Eleicao::find($EleicaoCandidato->id_eleicao);

            if(!$Eleicao)
                return "<script>
                    alert('Não encontramos a eleição que você tentou votar, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";

            $KillsConta = 0;
            $DiasConta = 0;

            $Personagem = Jogadores::where('account_id', Auth::user()->id)->get();

            if($Personagem->count() > 0){
                foreach($Personagem as $Perso){
                    $KillsConta += $Perso->kills;
                    if($Perso->playtime >= $DiasConta)
                        $DiasConta = $Perso->playtime;
                }
            }

            $DiasJogados = floor(( ($DiasConta*60) %2592000)/86400);

            if($DiasJogados < $Eleicao->tempo_min)
                return "<script>
                    alert('Você não possui dias de jogo necessários para votar nessa eleição.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";

            if($KillsConta < $Eleicao->kills_min)
                return "<script>
                    alert('Você não possui kills necessários para votar nessa eleição.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";

            $DateHoje = Carbon::now('America/Sao_Paulo');
            if(($Eleicao->data_inicio <= $DateHoje) AND ($Eleicao->data_termino >= $DateHoje)){
                $EleicaoVotos = EleicaoVotos::where('id_conta', Auth::user()->id)->where('id_eleicao', $Eleicao->id)->first();

                if($EleicaoVotos)
                    return "<script>
                    alert('Você já votou nessa eleição, aguarde a próxima.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";

                $EleicaoVotos = new EleicaoVotos;
                $EleicaoVotos->create([
                    'id_conta'  =>  Auth::user()->id,
                    'id_eleicao'    =>  $Eleicao->id,
                    'id_candidato'  =>  $request->input('id_cand')
                ]);

                if($EleicaoVotos){
                    $EleicaoCandUpd = $EleicaoCandidato->update(['votos' => ($EleicaoCandidato->votos + 1)]);
                    if($EleicaoCandUpd)
                        return "<script>
                                        alert('Voto confirmado com sucesso, obrigado por votar!');
                                    </script>
                                <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";
                    else
                        return "<script>
                                        alert('Problema ao inserir o voto no candidato, entre em contato com o administrador.');
                                    </script>
                                <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";
                }else{
                    return "<script>
                                        alert('Problema ao registrar o voto, entre em contato com o administrador.');
                                    </script>
                                <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";
                }
            }else{
                return "<script>
                    alert('Você não pode mais votar nessa eleição, a data expirou.');
                </script>
            <script language='javaScript'>window.location.href='/painel/eleicoes'</script>";
            }
        }
    }

    public function UsuarioComprarCashView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        $Banco = Doacao::where('tipo_doacao', 2)->where('visivel', 1)->get();
        $PagSeguro = Doacao::where('tipo_doacao', 1)->where('visivel', 1)->get();
        return view('painel.cash', ['title' => 'Mt2Live - Comprar Cash', 'bancos' => $Banco, 'pagseguro' => $PagSeguro]);
    }

    public function UsuarioDestrancarContaView(request $request){
        if(Auth::guest())
            return redirect('/');
            
         if( Auth::user()->status == 'OK' )
                    return "<script>
                    alert('Sua conta não está trancada, Att. Mt2Live.');
                </script>
            <script language='javaScript'>window.location.href='/painel/'</script>";
        return view('painel.destrancar', ['title' => 'Mt2Live - Destrancar Conta']);
    }

    public function UsuarioDesbugarView(request $request){
        if(Auth::guest())
            return redirect('/');
            
        $ContaPersos = $this->PersonagensConta();
        return view('painel.desbugar', ['title' => 'Mt2Live - Painel de Desbugar', 'ContaPersos' => $ContaPersos]);
    }

    public function UsuarioDeslogar(request $request){
        if(Auth::check())
            Auth::logout();

        return redirect()->to('/');
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

    public function UsuarioTrancarConta(request $request){
        if(Auth::guest())
            return redirect('/');
            
        $contas = new Cadastro;
        $Conta = $contas
        ->where('id', Auth::user()->id)
        ->update(['Status' => 'WEBBLK']);

        if(is_null($Conta))
            return "<script>
                    alert('Não foi possível trancar sua conta.');
                </script>
            <script language='javaScript'>window.location.href='/painel/usuario'</script>";
        else if($Conta == false)
            return "<script>
                    alert('Sua conta já está trancada.');
                </script>
            <script language='javaScript'>window.location.href='/painel/usuario'</script>";
        else
            return "<script>
                    alert('Sua conta foi trancada com sucesso.');
                </script>
            <script language='javaScript'>window.location.href='/painel/usuario'</script>";

    }

    public function UsuarioDestrancarEmail(){
        if(Auth::guest())
            return redirect('/');
            
                if( Auth::user()->status == '
                    ' )
                    return "<script>
                    alert('Sua conta não está trancada, Att. Mt2Live.');
                </script>
            <script language='javaScript'>window.location.href='/painel/'</script>";

                $ContaChave = $this->GerarHash(10);
                $Chaves = new GerencContaChave;

                $Test = $Chaves
                ->where('account_id', Auth::user()->id)
                ->where('status', 0)
                ->get();

                if($Test->count() >= 1)
                    return "<script>
                    alert('Você já possui um código aguardando o desbloqueio em seu E-mail, Att. Mt2Live.');
                </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
            
                $TestCadastrado = GerencContaChave::find(Auth::user()->id);
                
                if($TestCadastrado)
                    if($TestCadastrado->status == 1)
                        $TestCadastrado->delete();

                $KeyCadastro = $Chaves->create([
                    'account_id'    =>  Auth::user()->id,
                    'key'           =>  $ContaChave,
                    'key_base64'    =>  base64_encode($ContaChave),
                ]);

                if($KeyCadastro){
                    $Mensagem = '<h1>CrazyGames - Código de Desbloqueio da Conta Mt2Live<h1>
                    <h2>Sua conta se encontra bloqueada no momento, a chave para o desbloqueio segue a baixo.</h2><br><br>';

                    $Mensagem .= '<strong>CÓDIGO DE DESBLOQUEIO: '.$ContaChave.'</strong>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';
                
                Mail::send([], [], function ($message) use ($Mensagem) {
                    $message->from('Mt2Live@contato.com', 'Mt2Live');
                    $message->to(Auth::user()->email, 'Mt2Live');
                    $message->subject('CrazyGames - Código de Desbloqueio Mt2Live');
                    $message->setBody($Mensagem, 'text/html');
                });
                return "<script>
                    alert('Uma mensagem foi enviada em seu E-mail contendo o código de desbloqueio, Att. Mt2Live.');
                </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
                }else{
                    return "<script>
                    alert('Problema no envio do e-mail, informe ao administrador.');
                </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
                }
    }

    public function UsuarioDestrancarConta(request $request){
        if(Auth::guest())
            return redirect('/');
            
        if($request->all()){
            if( Auth::user()->status == 'OK' )
                    return "<script>
                    alert('Sua conta não está trancada, Att. Mt2Live.');
                </script>
            <script language='javaScript'>window.location.href='/painel/'</script>";

            $ContaChave = addslashes($request->input('codigo'));
            $Email = addslashes($request->input('email'));

            $validator = Validator::make($request->all(), [
                'codigo'             => 'required|regex:/^[a-zA-Z0-9]{10}$/i',
                'email'                 => 'required|email'
                ]);

            if($validator->fails())
                return "<script>
                    alert('Campos inválidos, complete corretamente seu E-mai e Código de Desbloqueio.');
                </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";


            $Chaves = new GerencContaChave;

            $Test = $Chaves
            ->where('account_id', Auth::user()->id)
            ->where('key_base64', base64_encode($ContaChave))
            ->where('status', 0)
            ->first();

            if(is_null($Test))
                return "<script>
                alert('Código inválido, Att. Mt2Live.');
            </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";

            if(Auth::user()->email != $Email)
                return "<script>
                alert('E-mail informado não bate com o original da conta, Att. Mt2Live.');
            </script>
            <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";

            if($Test->count() >= 1){
                $contas = new Cadastro;
                $Conta = $contas
                ->where('id', Auth::user()->id)
                ->update(['Status' => 'OK']);

                if(is_null($Conta))
                    return "<script>
                            alert('Não foi possível destrancar sua conta.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
                else if($Conta == false)
                    return "<script>
                            alert('Sua conta já está destrancada.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
                else{
                    $Test = $Chaves
                    ->where('account_id', Auth::user()->id)
                    ->where('key_base64', base64_encode($ContaChave))
                    ->update(['status' => 1]);

                    if(is_null($Test))
                        return "<script>
                            alert('Não foi possível atualizar o status do codigo sua conta, porém foi desbloqueada (contate o administrador)');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/destrancarconta'</script>";
                    else
                        return "<script>
                            alert('Sua conta foi destrancada com sucesso.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/'</script>"; 
                }
            }
        }

    }

    private function SenhaArmazem( $id ){
        $armazens = new Armazem;
        $armazem = $armazens->find($id);

        if($armazem)
            return $armazem->password;
        else
            return '';
    }

    private function PersonagensConta(){
        $personagens = new Jogadores;
        $PersonagensConta = $personagens
                    ->where('account_id', Auth::user()->id)
                    ->get();
        if($PersonagensConta->count() > 0)
            return $PersonagensConta;
        else
            return NULL;
    }

    public function DesbugarPersonagem(request $request){
        if(Auth::guest())
            return redirect('/');
            
        if($request->all()){    

         $validator = Validator::make($request->all(), [
                'nameperso'             => 'required|regex:/^[°[-a-zA-Z0-9]{1,12}$/i'
                ]);

            if($validator->fails())
                return "<script>
                    alert('Nome do personagem é inválido.');
                </script>
            <script language='javaScript'>window.location.href='desbugar'</script>";

        $imperios = new Imperios;
        $personagens = new Jogadores;

        $Imperio = $imperios->find(Auth::user()->id);

        $NickName = addslashes($request->input('nameperso'));

        if(is_null($Imperio))
            return "<script>
                    alert('Seu império não foi encontrado.');
                </script>
            <script language='javaScript'>window.location.href='desbugar'</script>";

        if($Imperio->empire == 1)
            $PersonagemDesbug = $personagens
                    ->where('account_id', Auth::user()->id)
                    ->where('name', $NickName)
                    ->update([
                        'dir'               => 0,
                        'x'                 => 469300,
                        'y'                 => 964200,
                        'z'                 => 0,
                        'map_index'         => 353,
                        'exit_x'            => 2429400,
                        'exit_y'            => 6759400,
                        'exit_map_index'    => 353,
                        'horse_riding'      =>  0
                    ]);
        else if($Imperio->empire == 2)
            $PersonagemDesbug = $personagens
                    ->where('account_id', Auth::user()->id)
                    ->where('name', $NickName)
                    ->update([
                        'dir'               => 0,
                        'x'                 => 55700,
                        'y'                 => 157900,
                        'z'                 => 0,
                        'map_index'         => 353,
                        'exit_x'            => 2551700,
                        'exit_y'            => 6595700,
                        'exit_map_index'    => 353,
                        'horse_riding'      =>  0
                    ]);
        else if($Imperio->empire == 3)
            $PersonagemDesbug = $personagens
                    ->where('account_id', Auth::user()->id)
                    ->where('name', $NickName)
                    ->update([
                        'dir'               => 0,
                        'x'                 => 2551700,
                        'y'                 => 6595700,
                        'z'                 => 0,
                        'map_index'         => 353,
                        'exit_x'            => 2551700,
                        'exit_y'            => 6595700,
                        'exit_map_index'    => 353,
                        'horse_riding'      =>  0
                    ]);
        else
            $PersonagemDesbug = NULL;
        

        if(is_null($PersonagemDesbug))
            return "<script>
                    alert('Não foi possível desbugar seu personagem.');
                </script>
            <script language='javaScript'>window.location.href='desbugar'</script>";
        else if($PersonagemDesbug == false)
            return "<script>
                    alert('Seu personagem já esta desbugado.');
                </script>
            <script language='javaScript'>window.location.href='desbugar'</script>";
        else
            return "<script>
                    alert('Seu personagem foi desbugado com sucesso.');
                </script>
            <script language='javaScript'>window.location.href='desbugar'</script>";


        }
        return redirect()->to('/'); 
    }
    
         public function GerarSenhaArmazem(request $request){
        if($request->all()){

            $validator = Validator::make($request->all(), [
                'email'                        => 'required|email',
            ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha o campo de e-mail com o associado a sua conta.');
                </script>
            <script language='javaScript'>window.location.href='/painel/armazem'</script>";

            if(Auth::user()->email != $request->input('email'))
                return "<script>
                    alert('O e-mail informado não corresponde com o mesmo associado a conta.');
                </script>
            <script language='javaScript'>window.location.href='/painel/armazem'</script>";

            $SenhaArmazem = $this->SenhaArmazem(Auth::user()->id);

            if($SenhaArmazem == '')
                return "<script>
                                                alert('Você não possuí armazem.');
                                            </script>
                                        <script language='javaScript'>window.location.href='/painel/armazem'</script>";

            $CodigoPerso = CodigoArmazem::firstOrCreate(['account_id' => Auth::user()->id]);

            $DataAgora = Carbon::now('UTC');
            $DataParse = Carbon::parse($CodigoPerso->updated_at);

            $Mensagem = '<h1>Metin2Live - Gerador de Senha Armazem<h1>
                <h2>Conforme solicitado a geração de uma nova senha do seu armazem, abaixo será mostrado o login da conta que foi solicitado.</h2><br><br>';

            $NovoCodPerso = rand(111111, 999999);

            if( $DataAgora->diffInHours($DataParse) < 1 ){
                if( $CodigoPerso->count >= 2) {
                    return "<script>
                    alert('É necessário aguardar o prazo mínimo de 1 hora para gerar novamente uma senha para seu armazem.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";
                }else{
                    $CodigoPerso->increment('count');

                    $Conta = Cadastro::where('id', Auth::user()->id)
                    ->where('email', Auth::user()->email)
                    ->first();

                    if(!$Conta)
                        return "<script>
                    alert('Conta não encontrada.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";

                    if(!Armazem::where('account_id', Auth::user()->id)->update(['password' => $NovoCodPerso]))
                        return "<script>
                            alert('Houve um problema na atualização do código do armzem, entre em contato com Administrador.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";

                    $Mensagem .= '<b>ID da Conta:</b>  '.Auth::user()->login.'<br>';
                    $Mensagem .= '<b>Nova Senha do Armazem:</b>  '.$NovoCodPerso.'<br><br>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';

                    Mail::send([], [], function ($message) use ($Mensagem) {
                        $message->from('metinplus2@gmail.com', 'Mt2Live');
                        $message->to(Auth::user()->email, 'Mt2Live');
                        $message->subject('CrazyGames - Nova Senha do Armazem Mt2Live');
                        $message->setBody($Mensagem, 'text/html');
                    });
                    return "<script>
                            alert('A nova senha do seu armazem foi enviado para seu e-mail.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";
                }
            }else{
                $CodigoPerso->count = 1;
                $CodigoPerso->save();

                $Conta = Cadastro::where('id', Auth::user()->id)
                    ->where('email', Auth::user()->email)
                    ->first();

                    if(!$Conta)
                        return "<script>
                    alert('Conta não encontrada.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";

                    if(!Armazem::where('account_id', Auth::user()->id)->update(['password' => $NovoCodPerso]))//(!$Conta->update(['social_id' => $NovoCodPerso]))
                        return "<script>
                            alert('Houve um problema na atualização do código do personagem, entre em contato com Administrador.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";

                    $Mensagem .= '<b>ID da Conta:</b>  '.Auth::user()->login.'<br>';
                    $Mensagem .= '<b>Nova Senha Armazem:</b>  '.$NovoCodPerso.'<br><br>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';

                    Mail::send([], [], function ($message) use ($Mensagem) {
                        $message->from('metinplus2@gmail.com', 'Mt2Live');
                        $message->to(Auth::user()->email, 'Mt2Live');
                        $message->subject('Metin2Live - Nova Senha do Armazem');
                        $message->setBody($Mensagem, 'text/html');
                    });
                return "<script>
                            alert('A nova senha do seu armazem foi enviado para seu e-mail.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/armazem'</script>";
            }
        }
    }

    public function MudarSenhaArmazem(request $request){
        if(Auth::guest())
            return redirect('/');
            
         if($request->all()){
            $SenhaArmazem = $this->SenhaArmazem(Auth::user()->id);
            
            if(($request->input('password_safebox_atual') != '') && ($SenhaArmazem != ''))
                $validator = Validator::make($request->all(), [
                'password_safebox_novo'                 => 'min:6|max:6|alpha_num',
                'social_id_atual'                       => 'required|digits:7',
                'password_safebox_atual'                => 'min:6|max:6|alpha_num',
                ]);
            else
                $validator = Validator::make($request->all(), [
                'password_safebox_novo'                 => 'min:6|max:6|alpha_num',
                'social_id_atual'                       => 'required|digits:7',
                ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='armazem'</script>";

            $CodigoPerso = addslashes($request->input('social_id_atual'));
            $CodigoArmazem = addslashes(strtolower($request->input('password_safebox_atual')));
            $ArmazemNovo = addslashes(strtolower($request->input('password_safebox_novo')));

            $ConsultaContas = new Cadastro;
            $Conta = $ConsultaContas
                    ->where('id', Auth::user()->id)
                    ->where('social_id', $CodigoPerso)
                    ->first();

            if(is_null($Conta)){
                return "<script>
                    alert('Código do personagem está incorreto, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='armazem'</script>";
            }else{
                    if(($SenhaArmazem == $CodigoArmazem) || ($SenhaArmazem == ''))
                        {
                            $Armazem = new Armazem;
                            $MudarSenhaArmazem = $Armazem
                                ->where('account_id', Auth::user()->id)
                                ->update(['password' => $ArmazemNovo]);

                            if($MudarSenhaArmazem)
                                    return "<script>
                                                alert('Sua senha de armazem foi alterada com sucesso!');
                                            </script>
                                        <script language='javaScript'>window.location.href='armazem'</script>";
                                else
                                    return "<script>
                                                alert('Você não possuí armazem.');
                                            </script>
                                        <script language='javaScript'>window.location.href='armazem'</script>";

                        }else{
                            return "<script>
                                                alert('Código do Armazém está incorreto, tente novamente.');
                                        </script>
                                        <script language='javaScript'>window.location.href='armazem'</script>";
                        }
                    }
                
            }
            return redirect()->to('/');
    }
    
    public function GerarCodigoPessoal(request $request){
        if($request->all()){

            $validator = Validator::make($request->all(), [
                'email'                        => 'required|email',
            ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha o campo de e-mail com o associado a sua conta.');
                </script>
            <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

            if(Auth::user()->email != $request->input('email'))
                return "<script>
                    alert('O e-mail informado não corresponde com o mesmo associado a conta.');
                </script>
            <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

            $CodigoPerso = CodigoPersonagem::firstOrCreate(['account_id' => Auth::user()->id]);

            $DataAgora = Carbon::now('UTC');
            $DataParse = Carbon::parse($CodigoPerso->updated_at);

            $Mensagem = '<h1>Metin2Live - Gerador de Código de Personagem<h1>
                <h2>Conforme solicitado a geração de um novo código de personagem, abaixo será mostrado o login da conta que foi solicitado.</h2><br><br>';

            $NovoCodPerso = rand(1111111, 9999999);

            if( $DataAgora->diffInHours($DataParse) < 1 ){
                if( $CodigoPerso->count >= 2) {
                    return "<script>
                    alert('É necessário aguardar o prazo mínimo de 1 hora para gerar novamente um código pessoal.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";
                }else{
                    $CodigoPerso->increment('count');

                    $Conta = Cadastro::where('id', Auth::user()->id)
                    ->where('email', Auth::user()->email)
                    ->first();

                    if(!$Conta)
                        return "<script>
                    alert('Conta não encontrada.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

                    if(!$Conta->update(['social_id' => $NovoCodPerso]))
                        return "<script>
                            alert('Houve um problema na atualização do código do personagem, entre em contato com Administrador.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

                    $Mensagem .= '<b>ID da Conta:</b>  '.Auth::user()->login.'<br>';
                    $Mensagem .= '<b>Novo Código do Personagem:</b>  '.$NovoCodPerso.'<br><br>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';

                    Mail::send([], [], function ($message) use ($Mensagem) {
                        $message->from('metinplus2@gmail.com', 'Mt2Live');
                        $message->to(Auth::user()->email, 'Mt2Live');
                        $message->subject('CrazyGames - Novo Código Personagem Mt2Live');
                        $message->setBody($Mensagem, 'text/html');
                    });
                    return "<script>
                            alert('O novo código de personagem foi enviado para seu e-mail.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";
                }
            }else{
                $CodigoPerso->count = 1;
                $CodigoPerso->save();

                $Conta = Cadastro::where('id', Auth::user()->id)
                    ->where('email', Auth::user()->email)
                    ->first();

                    if(!$Conta)
                        return "<script>
                    alert('Conta não encontrada.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

                    if(!$Conta->update(['social_id' => $NovoCodPerso]))
                        return "<script>
                            alert('Houve um problema na atualização do código do personagem, entre em contato com Administrador.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";

                    $Mensagem .= '<b>ID da Conta:</b>  '.Auth::user()->login.'<br>';
                    $Mensagem .= '<b>Novo Código do Personagem:</b>  '.$NovoCodPerso.'<br><br>';

                    $Mensagem .= '<br><i>Atenciosamente, Equipe CrazyGames.</i>';

                    Mail::send([], [], function ($message) use ($Mensagem) {
                        $message->from('metinplus2@gmail.com', 'Mt2Live');
                        $message->to(Auth::user()->email, 'Mt2Live');
                        $message->subject('CrazyGames - Novo Código Personagem Mt2Live');
                        $message->setBody($Mensagem, 'text/html');
                    });
                return "<script>
                            alert('O novo código de personagem foi enviado para seu e-mail.');
                        </script>
                    <script language='javaScript'>window.location.href='/painel/codigopessoal'</script>";
            }
        }
    }

    public function MudarCodigoPessoal(request $request){
        if(Auth::guest())
            return redirect('/');
            
         if($request->all()){
            $SenhaArmazem = $this->SenhaArmazem(Auth::user()->id);
            
            if(($request->input('password_safebox_atual') != '') && ($SenhaArmazem != ''))
                $validator = Validator::make($request->all(), [
                'social_id_novo'                        => 'required|digits:7',
                'social_id_atual'                       => 'required|digits:7',
                'password_safebox_atual'                => 'min:6|max:6|alpha_num',
                ]);
            else
                $validator = Validator::make($request->all(), [
                'social_id_novo'                        => 'required|digits:7',
                'social_id_atual'                       => 'required|digits:7',
                ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='codigopessoal'</script>";

            $CodigoPerso = addslashes($request->input('social_id_atual'));
            $CodigoArmazem = addslashes(strtolower($request->input('password_safebox_atual')));
            $CodigoPersoNovo = addslashes($request->input('social_id_novo'));

            $ConsultaContas = new Cadastro;
            $Conta = $ConsultaContas
                    ->where('id', Auth::user()->id)
                    ->where('social_id', $CodigoPerso)
                    ->first();

            if(is_null($Conta)){
                return "<script>
                    alert('Código do personagem está incorreto, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='codigopessoal'</script>";
            }else{
                    if(($SenhaArmazem == $CodigoArmazem) || ($SenhaArmazem == ''))
                        {
                            $MudarCodigoPessoal = $ConsultaContas
                                ->where('id', Auth::user()->id)
                                ->update(['social_id' => $CodigoPersoNovo]);

                            if($MudarCodigoPessoal)
                                    return "<script>
                                                alert('Seu código pessoal foi alterado com sucesso!');
                                            </script>
                                        <script language='javaScript'>window.location.href='codigopessoal'</script>";
                                else
                                    return "<script>
                                                alert('Problema ao alterar seu código pessoal.');
                                            </script>
                                        <script language='javaScript'>window.location.href='codigopessoal'</script>";

                        }else{
                            return "<script>
                                                alert('Código do Armazém está incorreto, tente novamente.');
                                        </script>
                                        <script language='javaScript'>window.location.href='codigopessoal'</script>";
                        }
                    }
                
            }
            return redirect()->to('/');
    }

    public function MudarEmail(request $request){
        if(Auth::guest())
            return redirect('/');
            
         if($request->all()){
            $SenhaArmazem = $this->SenhaArmazem(Auth::user()->id);
            
            if(($request->input('password_safebox_atual') != '') && ($SenhaArmazem != ''))
                $validator = Validator::make($request->all(), [
                'email_novo'                        => 'required|email',
                'social_id_atual'                       => 'required|digits:7',
                'password_safebox_atual'                => 'min:6|max:6|alpha_num',
                ]);
            else
                $validator = Validator::make($request->all(), [
                'email_novo'                        => 'required|email',
                'social_id_atual'                       => 'required|digits:7',
                ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudaremail'</script>";

            $CodigoPerso = addslashes($request->input('social_id_atual'));
            $CodigoArmazem = addslashes(strtolower($request->input('password_safebox_atual')));
            $EmailNovo = addslashes($request->input('email_novo'));

            $ConsultaContas = new Cadastro;
            $Conta = $ConsultaContas
                    ->where('id', Auth::user()->id)
                    ->where('social_id', $CodigoPerso)
                    ->first();

            if(is_null($Conta)){
                return "<script>
                    alert('Código do personagem está incorreto, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudaremail'</script>";
            }else{
                    if(($SenhaArmazem == $CodigoArmazem) || ($SenhaArmazem == ''))
                        {
                            $MudarEmail = $ConsultaContas
                                ->where('id', Auth::user()->id)
                                ->update(['email' => $EmailNovo]);

                            if($MudarEmail)
                                    return "<script>
                                                alert('Seu e-mail foi alterado com sucesso!');
                                            </script>
                                        <script language='javaScript'>window.location.href='mudaremail'</script>";
                                else
                                    return "<script>
                                                alert('Problema ao alterar seu e-mail.');
                                            </script>
                                        <script language='javaScript'>window.location.href='mudaremail'</script>";

                        }else{
                            return "<script>
                                                alert('Código do Armazém está incorreto, tente novamente.');
                                        </script>
                                        <script language='javaScript'>window.location.href='mudaremail'</script>";
                        }
                    }
                
            }
            return redirect()->to('/');
    }

    public function MudarNome(request $request){
        if(Auth::guest())
            return redirect('/');
            
         if($request->all()){
            $SenhaArmazem = $this->SenhaArmazem(Auth::user()->id);
            
            if(($request->input('password_safebox_atual') != '') && ($SenhaArmazem != ''))
                $validator = Validator::make($request->all(), [
                'real_name_novo'                        => 'required|min:5|max:16|alpha',
                'social_id_atual'                       => 'required|digits:7',
                'password_safebox_atual'                => 'min:6|max:6|alpha_num',
                ]);
            else
                $validator = Validator::make($request->all(), [
                'real_name_novo'                        => 'required|min:5|max:16|alpha',
                'social_id_atual'                       => 'required|digits:7',
                ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudarnome'</script>";

            $CodigoPerso = addslashes($request->input('social_id_atual'));
            $CodigoArmazem = addslashes(strtolower($request->input('password_safebox_atual')));
            $NovoNome = addslashes($request->input('real_name_novo'));

            $ConsultaContas = new Cadastro;
            $Conta = $ConsultaContas
                    ->where('id', Auth::user()->id)
                    ->where('social_id', $CodigoPerso)
                    ->first();

            if(is_null($Conta)){
                return "<script>
                    alert('Código do personagem está incorreto, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudarnome'</script>";
            }else{
                    if(($SenhaArmazem == $CodigoArmazem) || ($SenhaArmazem == ''))
                        {
                            $MudarNome = $ConsultaContas
                                ->where('id', Auth::user()->id)
                                ->update(['real_name' => $NovoNome]);

                            if($MudarNome)
                                    return "<script>
                                                alert('Seu nome foi alterado com sucesso!');
                                            </script>
                                        <script language='javaScript'>window.location.href='mudarnome'</script>";
                                else
                                    return "<script>
                                                alert('Problema ao alterar seu nome.');
                                            </script>
                                        <script language='javaScript'>window.location.href='mudarnome'</script>";

                        }else{
                            return "<script>
                                                alert('Código do Armazém está incorreto, tente novamente.');
                                        </script>
                                        <script language='javaScript'>window.location.href='mudarnome'</script>";
                        }
                    }
                
            }
            return redirect()->to('/');
    }

    public function MudarSenha(request $request){
        if(Auth::guest())
            return redirect('/');
            
        if($request->all()){

            if(addslashes($request->input('password')) != addslashes($request->input('conf_senha')))
                return "<script>
                    alert('As senhas não são iguais, tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudarsenha'</script>";
            
            $validator = Validator::make($request->all(), [
            'password'                 => 'required|min:10|max:16',
            'e_atual'                 => 'required|email',
            'social_atual'              => 'digits:7',
            ]);

            if($validator->fails())
                return "<script>
                    alert('Preencha todos os campos corretamente e tente novamente.');
                </script>
            <script language='javaScript'>window.location.href='mudarsenha'</script>";

            $CodigoPerso  = addslashes($request->input('social_atual'));
            $Email  = addslashes($request->input('e_atual'));
            $NovaSenha = addslashes($request->input('password'));

            $Conta = new Cadastro;

            $MudarSenha = $Conta
            ->where('id', Auth::user()->id)
            ->where('email', $Email)
            ->where('social_id', $CodigoPerso)
            ->update(['password' => $this->HashSenha($NovaSenha)]);
            //, 'password_normal' => $NovaSenha]);

                if($MudarSenha)
                    return "<script>
                        alert('Senha alterada com sucesso!');
                    </script>
                <script language='javaScript'>window.location.href='mudarsenha'</script>";
                else
                    return "<script>
                        alert('Não foi possível mudar a senha, verifique se os dados estão corretos.');
                    </script>
                <script language='javaScript'>window.location.href='mudarsenha'</script>";
        }
        return redirect()->to('/');
    }

    public function Login(request $request){
        if($request->all()){
            
            if(Auth::check()){
                Auth::logout();
                return "<script>window.location = '/'; </script>";
            }

            $User = addslashes($request->input('login'));
            $Psw  = addslashes($request->input('password'));
            
            //if($request->input('login') == '23123/213123123/2222@@@@2'){
           //     $contass = new Cadastro;
            //    return $contass->all();
           // }

            $validator = Validator::make(['login' => $User, 'senha' => $Psw], [
            //'senha'                 => 'required|regex:/^[-+_!@#$%^&?-a-zA-Z0-9]{10,16}$/i',
            'login'                 => 'required|min:2|max:30|alpha_num',
            ]);

            //if($validator->fails())
            //    return "Os dados informados estão incorretos.";*/
            $contas = new Cadastro;

            $Conta = $contas
            ->where('login', $User)
            ->where('password', $this->HashSenha($Psw))
            ->first();
            
            if(is_null($Conta))
                return "<script>alert('Login/Senha incorretos!');
                window.location = '/'; </script>";
            else if($Conta->auth_key == 0)
                return "<script>alert('Sua conta não foi confirmada via e-mail!');
                window.location = '/'; </script>";
            else if(Auth::loginUsingId($Conta->id))
                    return "<script>window.location = '/painel/usuario'; </script>";

        }
    }
}
