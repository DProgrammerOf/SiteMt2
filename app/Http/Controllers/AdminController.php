<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cadastro;
use App\Doacao;
use App\ItemDestaque;
use App\Eleicao;
use App\EleicaoCandidato;
use App\Jogadores;
use App\EleicaoResultado;
use App\RankingTop5;
use App\Imperios;
use App\Bans;

use \Carbon\Carbon;

use Auth;

class AdminController extends Controller
{
    //

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

        /* USE
                            'ClasseImg' => $this->NomeDaClasse($Consulta->account_id, $Consulta->job)['NomeImg'],
                    'ImperioId' => $this->NomeDaClasse($Consulta->account_id, $Consulta->job)['ImperioId'],
                    */
    }

    public function addRanking(Request $request){
       if(Auth::guest())
        return redirect('/');
        
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
           // $validatedData = $this->validate($request, [
            //        'perso_1'                           => 'required|min:1|max:25',
                    //'perso_2'                           => 'max:25',
                    //'perso_3'                           => 'max:25',
                    //'perso_4'                           => 'max:25',
                    //'perso_5'                           => 'max:25',
              //      'categoria'                         => 'required|min:1'
             //   ]);
                
              //  dd($request);
            
        
            $Categoria =  '';


            switch ($request->input('categoria')) {
                case 'guerreiro':
                    $Categoria =  'top_guerreiro';
                    break;
                case 'ninja':
                    $Categoria =  'top_ninja';
                    break;
                case 'shura':
                    $Categoria =  'top_shura';
                    break;
                case 'shaman':
                    $Categoria =  'top_shaman';
                    break;
                case 'pvpgeral':
                    $Categoria =  'top_pvpgeral';
                    break;
                
                default:
                    $Categoria =  'erro';
                    break;
            }


            $Ranking = new RankingTop5;
            
             $Perso1 = Jogadores::where('name', $request->input('perso_1'))->first();

            if(!$Perso1)
                return redirect()->route('adminRanking')->with('desativarVisOk', 'Personagem da Posição: 1° não foi encontrado, tente novamente.');
                
            $RankingNew = $Ranking->create([
                'NickName'  =>  $Perso1->name,
                'ClasseImg' => $this->NomeDaClasse($Perso1->account_id, $Perso1->job)['NomeImg'],
                'ImperioId' => $this->NomeDaClasse($Perso1->account_id, $Perso1->job)['ImperioId'],
                'Posicao'   => '1',
                'ranking'   => $Categoria
            ]);

            if($request->input('perso_2') != null){
                $Perso2 = Jogadores::where('name', $request->input('perso_2'))->first();

                if(!$Perso2)
                    return redirect()->route('adminRanking')->with('desativarVisOk', 'Personagem da Posição: 2° não foi encontrado, tente novamente.');
                    
                if($Perso2)
                    $RankingNew2 = $Ranking->create([
                        'NickName'  =>  $Perso2->name,
                        'ClasseImg' => $this->NomeDaClasse($Perso2->account_id, $Perso2->job)['NomeImg'],
                        'ImperioId' => $this->NomeDaClasse($Perso2->account_id, $Perso2->job)['ImperioId'],
                        'Posicao'   => '2',
                        'ranking'   => $Categoria
                    ]);
            }

            if($request->input('perso_3') != null){
                $Perso3 = Jogadores::where('name', $request->input('perso_3'))->first();

                if(!$Perso3)
                    return redirect()->route('adminRanking')->with('desativarVisOk', 'Personagem da Posição: 3° não foi encontrado, tente novamente.');
                    
                if($Perso3)
                    $RankingNew3 = $Ranking->create([
                        'NickName'  =>  $Perso3->name,
                        'ClasseImg' => $this->NomeDaClasse($Perso3->account_id, $Perso3->job)['NomeImg'],
                        'ImperioId' => $this->NomeDaClasse($Perso3->account_id, $Perso3->job)['ImperioId'],
                        'Posicao'   => '3',
                        'ranking'   => $Categoria
                    ]);
            }
            
            if($request->input('perso_4') != null){
                $Perso4 = Jogadores::where('name', $request->input('perso_4'))->first();

                if(!$Perso4)
                    return redirect()->route('adminRanking')->with('desativarVisOk', 'Personagem da Posição: 4° não foi encontrado, tente novamente.');
                    
                if($Perso4)
                    $RankingNew4 = $Ranking->create([
                        'NickName'  =>  $Perso4->name,
                        'ClasseImg' => $this->NomeDaClasse($Perso4->account_id, $Perso4->job)['NomeImg'],
                        'ImperioId' => $this->NomeDaClasse($Perso4->account_id, $Perso4->job)['ImperioId'],
                        'Posicao'   => '4',
                        'ranking'   => $Categoria
                    ]);
            }
            
            if($request->input('perso_5') != null){
                $Perso5 = Jogadores::where('name', $request->input('perso_5'))->first();

                if(!$Perso5)
                    return redirect()->route('adminRanking')->with('desativarVisOk', 'Personagem da Posição: 5° não foi encontrado, tente novamente.');
                    
                if($Perso5)
                    $RankingNew5 = $Ranking->create([
                        'NickName'  =>  $Perso5->name,
                        'ClasseImg' => $this->NomeDaClasse($Perso5->account_id, $Perso5->job)['NomeImg'],
                        'ImperioId' => $this->NomeDaClasse($Perso5->account_id, $Perso5->job)['ImperioId'],
                        'Posicao'   => '5',
                        'ranking'   => $Categoria
                    ]);
            }

            
            
        


           // if( (!$RankingNew5) || (!$RankingNew4) || (!$RankingNew3) || //(!$RankingNew2) || (!$RankingNew) )
           //     return redirect()->route('adminRanking')->with('ativarVisErro', 'Houve um problema ao cadastrar os personagens no ranking, entre em contato com o programador.');
            //else
                return redirect()->route('adminRanking')->with('ativarVisOk', 'Ranking criado com sucesso!');
        }
    }

    public function attRanking(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            $validatedData = $this->validate($request, [
                    'perso'                           => 'required|min:1|max:25'
                ]);

            $Perso = Jogadores::where('name', $request->input('perso'))->first();

            if(!$Perso)
                return redirect()->route('adminRanking')->with('desativarVisOk', 'O novo personagem não foi encontrado, tente novamente.');


            $Ranking = RankingTop5::find($request->input('id_rank'));

            if(!$Ranking)
                return redirect()->route('adminRanking')->with('desativarVisOk', 'O ranking não foi encontrado, tente novamente.');

            $RankingUpd = $Ranking->update([
                'NickName'  =>  $Perso->name,
                'ClasseImg' => $this->NomeDaClasse($Perso->account_id, $Perso->job)['NomeImg'],
                'ImperioId' => $this->NomeDaClasse($Perso->account_id, $Perso->job)['ImperioId'],
            ]);

            if( (!$RankingUpd) )
                return redirect()->route('adminRanking')->with('ativarVisErro', 'Houve um problema ao salvar as mudanças no ranking, entre em contato com o programador.');
            else
                return redirect()->route('adminRanking')->with('ativarVisOk', 'Personagem do ranking foi atualizado com sucesso!');
        }
    }

    public function delRanking(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'categoria'                       => 'required|min:1',
                ]);

            $Categoria =  '';


            switch ($request->input('categoria')) {
                case 'guerreiro':
                    $Categoria =  'top_guerreiro';
                    break;
                case 'ninja':
                    $Categoria =  'top_ninja';
                    break;
                case 'shura':
                    $Categoria =  'top_shura';
                    break;
                case 'shaman':
                    $Categoria =  'top_shaman';
                    break;
                case 'pvpgeral':
                    $Categoria =  'top_pvpgeral';
                    break;
                
                default:
                    $Categoria =  'erro';
                    break;
            }

            $Ranking = RankingTop5::where('ranking', $Categoria)->get();


           // dd($Ranking->count());
            if($Ranking->count() < 1)
                return redirect()->route('adminRanking')->with('desativarVisOk', 'Nenhum personagem está cadastrado nesse ranking.');


            if($Ranking->count() > 0){
                $RankingDel = $Ranking->each(function($row){ $row->delete(); });

                if(!$RankingDel)
                    return redirect()->route('adminRanking')->with('ativarVisErro', 'Houve um problema ao remover os personagens do ranking, entre em contato com o programador.');
                else
                    return redirect()->route('adminRanking')->with('ativarVisOk', 'O ranking foi deletado, juntamente com os personagens!');
            }
        }
    }

    public function index(Request $request){
        if(Auth::guest())
        return redirect('/');
        
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	return view('admin.home', ['pagina' => 'home']);
    } 

    public function indexEleicao(Request $request){
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

        $Eleicao = Eleicao::get();
        $Hoje = Carbon::now();

    	return view('admin.eleicao', ['pagina' => 'eleicao', 'eleicoes' => $Eleicao, 'hoje' => $Hoje]);
    } 

    public function indexDoacao(Request $request){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	$Doacao = new Doacao;
    	$PagSeguro = $Doacao->where('tipo_doacao', 1)->get();
    	$Banco = $Doacao->where('tipo_doacao', 2)->get();

    	return view('admin.doacao', ['pagina' => 'doacao', 'pagseguro' => $PagSeguro, 'banco' => $Banco]);
    } 

    public function indexBans(Request $request){ // BANIMENTOS CONTROLLER
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $Emails = Bans::get();

        return view('admin.banimentos', ['pagina' => 'banimentos', 'emails' => $Emails]);
    } 

    public function addBanimento(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'email_acc'                   => 'required|min:1|max:64'
                ]);

            if(Bans::where('email', $request->input('email_acc'))->first())
                return redirect()->route('adminBans')->with('desativarVisOk', 'O e-mail informado já está banido.');

            $Ban = new Bans;
            if($Ban->create(['email' => $request->input('email_acc')]))
                return redirect()->route('adminBans')->with('ativarVisOk', 'E-mail banido com sucesso!');
            else
                return redirect()->route('adminBans')->with('ativarVisErro', 'Houve um problema ao adicionar o e-mail, entre em contato com o programador.');
            
        }
    }

    public function delBanimento($id){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $Ban = Bans::findOrFail($id);

        if($Ban->delete())
            return redirect()->route('adminBans')->with('ativarVisOk', 'E-mail desbanido!');
        else
            return redirect()->route('adminBans')->with('ativarVisErro', 'Houve um problema ao desbanir o e-mail, entre em contato com o programador.');
    }

    public function indexRanking(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $Top5_Guerreiros = RankingTop5::where('ranking', 'top_guerreiro')->orderBy('Posicao', 'ASC')->get();
        $Top5_Ninjas = RankingTop5::where('ranking', 'top_ninja')->orderBy('Posicao', 'ASC')->get();
        $Top5_Shuras = RankingTop5::where('ranking', 'top_shura')->orderBy('Posicao', 'ASC')->get();
        $Top5_Shamans = RankingTop5::where('ranking', 'top_shaman')->orderBy('Posicao', 'ASC')->get();
        $Top5_PvPGeral = RankingTop5::where('ranking', 'top_pvpgeral')->orderBy('Posicao', 'ASC')->get();

        $TopAll = RankingTop5::get();

        return view('admin.rankingtop5', ['pagina' => 'ranking', 'topguerreiro' => $Top5_Guerreiros,
        'topninjas' => $Top5_Ninjas, 'topshuras' => $Top5_Shuras, 'topshamans' => $Top5_Shamans, 'toppvpgeral' => $Top5_PvPGeral,  'topall' => $TopAll]);
    }

    public function indexItemDestaque(Request $request){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

        $Itens = ItemDestaque::get();

        return view('admin.itemdestaque', ['pagina' => 'itemdestaque', 'itens' => $Itens]);
    } 

    public function ativarItem($id){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        //dd($id);
        $ItemDestaque = ItemDestaque::findOrFail($id);
        //dd($Doacao);
        $ItemUpd = $ItemDestaque->update(['visivel'=>1]);

        if($ItemUpd)
                return redirect()->route('adminItemDestaque')->with('ativarVisOk', 'Item habilitado para visualização!');
            else
                return redirect()->route('adminItemDestaque')->with('ativarVisErro', 'Houve um problema ao habilitar a visualização, entre em contato com o programador.');
    }

    public function desativarItem($id){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $ItemDestaque = ItemDestaque::find($id);
        
        if(!$ItemDestaque)
            return redirect()->route('adminItemDestaque')->with('desativarVisOk', 'O item não foi encontrado, tente novamente.');

        $ItemUpd = $ItemDestaque->update(['visivel'=>0]);

        if($ItemUpd)
                return redirect()->route('adminItemDestaque')->with('desativarVisOk', 'Item desabilitado para visualização!');
            else
                return redirect()->route('adminItemDestaque')->with('ativarVisErro', 'Houve um problema ao desabilitar a visualização, entre em contato com o programador.');
    }

    public function ativarDoacao($id){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	//dd($id);
    	$Doacao = Doacao::find($id);

        if(!$Doacao)
            return redirect()->route('adminDoacao')->with('desativarVisOk', 'A doação não foi encontrado, tente novamente.');
    	//dd($Doacao);
    	$DoacaoUpd = $Doacao->update(['visivel'=>1]);

    	if($DoacaoUpd)
    			return redirect()->route('adminDoacao')->with('ativarVisOk', 'Doação habilitada para visualização!');
    		else
    			return redirect()->route('adminDoacao')->with('ativarVisErro', 'Houve um problema ao habilitar a visualização, entre em contato com o programador.');
    }

    public function desativarDoacao($id){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	$Doacao = Doacao::find($id);
        if(!$Doacao)
            return redirect()->route('adminDoacao')->with('desativarVisOk', 'A doação não foi encontrado, tente novamente.');

    	$DoacaoUpd = $Doacao->update(['visivel'=>0]);

    	if($DoacaoUpd)
    			return redirect()->route('adminDoacao')->with('desativarVisOk', 'Doação desabilitado para visualização!');
    		else
    			return redirect()->route('adminDoacao')->with('ativarVisErro', 'Houve um problema ao desabilitar a visualização, entre em contato com o programador.');
    }

    public function ativarEleicao($id){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        //dd($id);
        $Eleicao = Eleicao::find($id);
        if(!$Eleicao)
            return redirect()->route('adminEleicao')->with('desativarVisOk', 'A eleição não foi encontrada, tente novamente.');
        //dd($Doacao);
        $EleicaoUpd = $Eleicao->update(['visivel'=>1]);

        if($EleicaoUpd)
                return redirect()->route('adminEleicao')->with('ativarVisOk', 'Doação habilitada para visualização!');
            else
                return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao habilitar a visualização, entre em contato com o programador.');
    }

    public function desativarEleicao($id){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $Eleicao = Eleicao::find($id);
        if(!$Eleicao)
            return redirect()->route('adminEleicao')->with('desativarVisOk', 'A eleição não foi encontrada, tente novamente.');

        $EleicaoUpd = $Eleicao->update(['visivel'=>0]);

        if($EleicaoUpd)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'Eleição desabilitada para visualização!');
            else
                return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao desabilitar a eleição, entre em contato com o programador.');
    }

    public function attDoacaoPagseguro(Request $request){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	if($request->all()){
    		//dd($request);
    		$validatedData = $this->validate($request, [
                    'valor_pag'               	=> 'required|min:1|max:10',
                    'cash_pag'               	=> 'required|min:1|max:11',
                    'bonus_pag'               	=> 'required|min:1|max:3',
                    'img_pag'                   => 'required|min:1|max:1000',
                    'link_pag'               	=> 'required|min:1|max:1000',
                ]);

    		$Doacao = Doacao::find($request->input('id_pag'));

            if(!$Doacao)
                return redirect()->route('adminDoacao')->with('desativarVisOk', 'A doação não foi encontrada, tente novamente.');

    		$DoacaoUpd = $Doacao->update([
    			'valor'	=> $request->input('valor_pag'),
    			'bonus'	=> $request->input('bonus_pag'),
    			'cash'	=> $request->input('cash_pag'),
                'img'   => $request->input('img_pag'),
    			'link'	=> $request->input('link_pag'),
    		]);

    		if($DoacaoUpd)
    			return redirect()->route('adminDoacao')->with('attPagseguroOk', 'As mudanças da doação foram salvas com sucesso!');
    		else
    			return redirect()->route('adminDoacao')->with('attPagseguroErro', 'Houve um problema ao salvar, entre em contato com o programador.');
    	}
    }

    public function attDoacaoBanco(Request $request){
        if(Auth::guest())
        return redirect('/');
    	$Usuario = Cadastro::findOrFail(Auth::user()->id);

    	if(!$Usuario->isAdmin())
    		return redirect('/');

    	if($request->all()){
    		//dd($request);
    		$validatedData = $this->validate($request, [
                    'agencia_pag'               	=> 'required|min:1|max:25',
                    'conta_pag'               		=> 'required|min:1|max:25',
                    'titular_pag'               	=> 'required|min:1|max:100',
                    'banco_pag'               		=> 'required|min:1',
                ]);

    		$Doacao = Doacao::find($request->input('id_pag'));
            if(!$Doacao)
                return redirect()->route('adminDoacao')->with('desativarVisOk', 'A doação não foi encontrada, tente novamente.');

    		$DoacaoUpd = $Doacao->update([
    			'agencia'	=> $request->input('agencia_pag'),
    			'conta'		=> $request->input('conta_pag'),
    			'titular'	=> $request->input('titular_pag'),
    			'banco'		=> $request->input('banco_pag'),
    		]);

    		if($DoacaoUpd)
    			return redirect()->route('adminDoacao')->with('attBancoOk', 'As mudanças do banco foram salvas com sucesso!');
    		else
    			return redirect()->route('adminDoacao')->with('attBancoErro', 'Houve um problema ao salvar, entre em contato com o programador.');
    	}
    }

    public function attItemDestaque(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'img_item'                   => 'required|min:1|max:500',
                    'lista_item'                     => 'required|min:1|max:1',
                    'texto_item'                   => 'required|min:1|max:1000',
                ]);

            $ItemDestaque = ItemDestaque::find($request->input('id_item'));
            if(!$ItemDestaque)
                return redirect()->route('adminItemDestaque')->with('desativarVisOk', 'O item não foi encontrado, tente novamente.');

            $ItemUpd = $ItemDestaque->update([
                'img'           => $request->input('img_item'),
                'id_lista'      => $request->input('lista_item'),
                'texto'         => $request->input('texto_item'),
            ]);

            if($ItemUpd)
                return redirect()->route('adminItemDestaque')->with('attBancoOk', 'As mudanças do item foram salvas com sucesso!');
            else
                return redirect()->route('adminItemDestaque')->with('attBancoErro', 'Houve um problema ao salvar, entre em contato com o programador.');
        }
    }

    public function addItemDestaque(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'img_item'                   => 'required|min:1|max:500',
                    'lista_item'                     => 'required|min:1|max:1',
                    'texto_item'                   => 'required|min:1|max:1000',
                ]);

            $ItemDestaque = ItemDestaque::where('id_lista', $request->input('lista_item'))->count();

            if($ItemDestaque >= 6)
                return redirect()->route('adminItemDestaque')->with('desativarVisOk', 'Já existem 6 itens na lista que você quer adicionar, escolha outra.');

            $ItemDestaque = new ItemDestaque;
            $ItemUpd = $ItemDestaque->create([
                'img'           => $request->input('img_item'),
                'id_lista'      => $request->input('lista_item'),
                'texto'         => $request->input('texto_item'),
                'visivel'       => 1,
            ]);

            if($ItemUpd)
                return redirect()->route('adminItemDestaque')->with('attBancoOk', 'O item foi adicionado com sucesso!');
            else
                return redirect()->route('adminItemDestaque')->with('attBancoErro', 'Houve um problema ao adicionar, entre em contato com o programador.');
        }
    }


    public function delItemDestaque(Request $request){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'id_item'                       => 'required|min:1',
                ]);

            $ItemDestaque = ItemDestaque::find($request->input('id_item'));
            if(!$ItemDestaque)
                return redirect()->route('adminItemDestaque')->with('desativarVisOk', 'O item não foi encontrado, tente novamente.');

            $ItemDel = $ItemDestaque->delete();

            if($ItemDel)
                return redirect()->route('adminItemDestaque')->with('attBancoOk', 'O item foi removido com sucesso!');
            else
                return redirect()->route('adminItemDestaque')->with('attBancoErro', 'Houve um problema ao remover, entre em contato com o programador.');
        }
    }

    public function addCash(Request $request){
        if(Auth::guest())
        return redirect('/');
         $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
             $validatedData = $this->validate($request, [
                    'login_acc'                       => 'required|min:1|max:31',
                    'cash_acc'                        => 'required|min:1',
                ]);

            $UsuarioAlvo = Cadastro::where('login', $request->input('login_acc'))->first();

            if(!$UsuarioAlvo)
                return redirect()->route('adminDoacao')->with('desativarVisOk', 'O Login da conta informada não existe, tente novamente.');

            $UsuarioNewCash = ( $UsuarioAlvo->coins + ($request->input('cash_acc')) );

            $UsuarioUpd = $UsuarioAlvo->update([
                'coins'     =>     $UsuarioNewCash 
            ]);

            if($UsuarioUpd)
                return redirect()->route('adminDoacao')->with('attPagseguroOk', 'Cashs adicionados com sucesso!');
            else
                return redirect()->route('adminDoacao')->with('attPagseguroErro', 'Houve um problema ao adicionar o cash, entre em contato com o programador.');
        }
    }

    public function attEleicao(Request $request){
        if(Auth::guest())
        return redirect('/');
         $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            $validatedData = $this->validate($request, [
                    'nome_eleicao'                       => 'required|min:1|max:500',
                    'tempo_eleicao'                       => 'required|min:1|max:11',
                    'kills_eleicao'                       => 'required|min:1|max:11',
                    'datai_eleicao'                        => 'date_format:"Y-m-d"|required|before:datat_eleicao',
                    'datat_eleicao'                       => 'date_format:"Y-m-d"|required|after:datai_eleicao',
                ]);

            $Eleicao = Eleicao::find($request->input('id_eleicao'));
            if(!$Eleicao)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'A Eleição não foi encontrada, tente novamente.');


            $NovaDataInicio = Carbon::parse($request->input('datai_eleicao'));//Carbon::createFromFormat('Y-m-d H:i:s', $request->input('datai_eleicao'), 'America/Sao_Paulo'); ;//Carbon::parse(date_format($request->input('datai_eleicao'),'Y-d-m H:i:s'));
            $NovaDataFinal = Carbon::parse($request->input('datat_eleicao'));//Carbon::createFromFormat('Y-m-d H:i:s', $request->input('datat_eleicao'), 'America/Sao_Paulo'); ;//Carbon::parse(date_format($request->input('datat_eleicao'),'Y-d-m H:i:s'));

            //dd($NovaDataFinal);
            $EleicaoUpd = $Eleicao->update([
                'nome'          =>  $request->input('nome_eleicao'),
                'data_inicio'   =>  $NovaDataInicio,
                'data_termino'  =>  $NovaDataFinal,
                'tempo_min'     =>  $request->input('tempo_eleicao'),
                'kills_min'     =>  $request->input('kills_eleicao'),
            ]);

            if($EleicaoUpd)
                return redirect()->route('adminEleicao')->with('attPagseguroOk', 'Eleição atualizada com sucesso!');
            else
                return redirect()->route('adminEleicao')->with('attPagseguroErro', 'Houve um problema ao atualizar eleição, entre em contato com o programador.');
        }
    }

    public function addEleicao(Request $request){
        if(Auth::guest())
        return redirect('/');
         $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
             $validatedData = $this->validate($request, [
                    'nome_eleicao'                       => 'required|min:1|max:500',
                    'tempo_eleicao'                       => 'required|min:1|max:11',
                    'kills_eleicao'                       => 'required|min:1|max:11',
                    'datai_eleicao'                        => 'date_format:"Y-m-d"|required|before:datat_eleicao',
                    'datat_eleicao'                       => 'date_format:"Y-m-d"|required|after:datai_eleicao',
                ]);

            
            $NovaDataInicio = Carbon::parse($request->input('datai_eleicao'));//Carbon::createFromFormat('Y-m-d H:i:s', $request->input('datai_eleicao'), 'America/Sao_Paulo'); ;//Carbon::parse(date_format($request->input('datai_eleicao'),'Y-d-m H:i:s'));
            $NovaDataFinal = Carbon::parse($request->input('datat_eleicao'));//Carbon::createFromFormat('Y-m-d H:i:s', $request->input('datat_eleicao'), 'America/Sao_Paulo'); ;//Carbon::parse(date_format($request->input('datat_eleicao'),'Y-d-m H:i:s'));

            //dd($NovaDataFinal);
            $Eleicao = new Eleicao;
            $EleicaoAdd = $Eleicao->create([
                'nome'          =>  $request->input('nome_eleicao'),
                'data_inicio'   =>  $NovaDataInicio,
                'data_termino'  =>  $NovaDataFinal,
                'tempo_min'  =>  $request->input('tempo_eleicao'),
                'kills_min'  =>  $request->input('kills_eleicao'),
                'visivel'       =>  0,
            ]);

            if($EleicaoAdd)
                return redirect()->route('adminEleicao')->with('attPagseguroOk', 'Eleição criada com sucesso!');
            else
                return redirect()->route('adminEleicao')->with('attPagseguroErro', 'Houve um problema ao criar a eleição, entre em contato com o programador.');
        }
    }

    public function getCandidatos(Request $request)
    {
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            $EleicaoModel = Eleicao::find($request->eleicaoid);
             if(!$EleicaoModel)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'A Eleição não foi encontrada, tente novamente.');

            $CandidatoModel = EleicaoCandidato::where('id_eleicao', $EleicaoModel->id)->get();

            if(!$CandidatoModel)
                return ["status" => "A eleição solicitada não foi encontrada."];
            //return ["status" => "Sucesso ao encontrar."];

            //if($CandidatoModel->count() < 1)
            //    return ["status" => "A eleição ainda não possui nenhum candidato."];
            return response()->json($CandidatoModel);
       }
    }

    public function addCandidato(Request $request){
        if(Auth::guest())
        return redirect('/');
         $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
             $validatedData = $this->validate($request, [
                    'nick_cand'                           => 'required|min:1|max:25',
                    'imperio_cand'                        => 'required|min:1'
                ]);


            //dd($NovaDataFinal);
            $EleicaoModel = Eleicao::find($request->input('id_eleicao'));
             if(!$EleicaoModel)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'A Eleição não foi encontrada, tente novamente.');

            $PlayerModel = Jogadores::where('name', $request->input('nick_cand'))->first();

            if(!$PlayerModel)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'O nick informado não foi encontrado, tente novamente.');

            //$ContaModel = Cadastro::findOrFail($PlayerModel->account_id);

            $CandidatoModel = EleicaoCandidato::where('id_eleicao', $EleicaoModel->id)->where('id_player', $PlayerModel->id)->first();

            if($CandidatoModel)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'O nick informado já está cadastrado nessa eleição.');

            $Candidato = new EleicaoCandidato;
            $CandidatoAdd = $Candidato->create([
                'id_eleicao'    =>  $EleicaoModel->id,
                'id_player'     =>  $PlayerModel->id,
                'nickname'      =>  $PlayerModel->name,
                'id_reino'      =>  $request->input('imperio_cand'),
                'votos'         =>  0,
            ]);

            if($CandidatoAdd)
                return redirect()->route('adminEleicao')->with('attPagseguroOk', 'O candidato foi cadastrado com sucesso!');
            else
                return redirect()->route('adminEleicao')->with('attPagseguroErro', 'Houve um problema ao cadastrar o candidato, entre em contato com o programador.');
        }
    }



    public function removerCandidato($id, $eleicao){
        if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        $Eleicao = Eleicao::find($eleicao);
         if(!$Eleicao)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'A Eleição não foi encontrada, tente novamente.');

        $Candidato = EleicaoCandidato::where('id_player', $id)->where('id_eleicao', $eleicao)->firstOrFail();

        if(!$Candidato)
            return redirect()->route('adminEleicao')->with('desativarVisOk', 'O candidato não foi encontrado, tente novamente.');

        //dd($Candidato);
        $CandidatoDel = $Candidato->delete();

        if($CandidatoDel)
                return redirect()->route('adminEleicao')->with('ativarVisOk', 'Candidato removido com sucesso!');
            else
                return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao remover o candidato, entre em contato com o programador.');
    }


        public function delEleicao(Request $request){
            if(Auth::guest())
        return redirect('/');
        $Usuario = Cadastro::findOrFail(Auth::user()->id);

        if(!$Usuario->isAdmin())
            return redirect('/');

        if($request->all()){
            //dd($request);
            $validatedData = $this->validate($request, [
                    'id_eleicao'                       => 'required|min:1',
                ]);

            $Eleicao = Eleicao::find($request->input('id_eleicao'));

            if(!$Eleicao)
                return redirect()->route('adminEleicao')->with('desativarVisOk', 'A Eleição não foi encontrada, tente novamente.');

            $Candidatos = EleicaoCandidato::where('id_eleicao', $Eleicao->id)->get();

            if($Candidatos->count() > 0){
                $CandidatosDel = $Candidatos->each(function($row){ $row->delete(); });

                if(!$CandidatosDel)
                    return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao remover, entre em contato com o programador.');
            }

            $EleicaoDel = $Eleicao->delete();

            if($EleicaoDel)
                return redirect()->route('adminEleicao')->with('ativarVisOk', 'A eleição foi removida, juntamente com os candidatos!');
            else
                return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao remover, entre em contato com o programador.');
        }
    }

            public function delResultado(Request $request){
                if(Auth::guest())
        return redirect('/');
                $Usuario = Cadastro::findOrFail(Auth::user()->id);

                if(!$Usuario->isAdmin())
                    return redirect('/');

                $Resultados = EleicaoResultado::get();

                if($Resultados->count() < 1)
                    return redirect()->route('adminEleicao')->with('desativarVisOk', 'Não há resultados para limpar.');

                $ResultadosDel = $Resultados->each(function($row){ $row->delete(); });

                if($ResultadosDel)
                    return redirect()->route('adminEleicao')->with('ativarVisOk', 'Os resultados foram removidos!');
                else
                    return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao remover os resultados, entre em contato com o programador.');
            }


            public function addResultado(Request $request){
                if(Auth::guest())
        return redirect('/');
                $Usuario = Cadastro::findOrFail(Auth::user()->id);

                if(!$Usuario->isAdmin())
                    return redirect('/');

                if($request->all()){
                    $validatedData = $this->validate($request, [
                        'nick_eleicao1'                       => 'required|min:1|max:24',
                        'votos_eleicao1'                       => 'required|min:1',
                        'nick_eleicao1_2'                       => 'required|min:1|max:24',
                        'votos_eleicao1_2'                       => 'required|min:1',

                        'nick_eleicao2'                       => 'required|min:1|max:24',
                        'votos_eleicao2'                       => 'required|min:1',
                        'nick_eleicao2_2'                       => 'required|min:1|max:24',
                        'votos_eleicao2_2'                       => 'required|min:1',

                        'nick_eleicao3'                       => 'required|min:1|max:24',
                        'votos_eleicao3'                       => 'required|min:1',
                        'nick_eleicao3_2'                       => 'required|min:1|max:24',
                        'votos_eleicao3_2'                       => 'required|min:1',
                    ]);


                $PlayerModel1 = Jogadores::where('name', $request->input('nick_eleicao1'))->first();
                $PlayerModel2 = Jogadores::where('name', $request->input('nick_eleicao2'))->first();
                $PlayerModel3 = Jogadores::where('name', $request->input('nick_eleicao3'))->first();

                $PlayerModel1_2 = Jogadores::where('name', $request->input('nick_eleicao1_2'))->first();
                $PlayerModel2_2 = Jogadores::where('name', $request->input('nick_eleicao2_2'))->first();
                $PlayerModel3_2 = Jogadores::where('name', $request->input('nick_eleicao3_2'))->first();

                if(!$PlayerModel1 || !$PlayerModel2 || !$PlayerModel3 || !$PlayerModel1_2 || !$PlayerModel2_2 || !$PlayerModel3_2)
                    return redirect()->route('adminEleicao')->with('desativarVisOk', 'Algum dos nicks informados não foram encontrados, tente novamente.');


                $EleicaoResultado = new EleicaoResultado;

                // 1 LUGAR
                $EleicaoResultado->create([
                    'id_player' => $PlayerModel1->id,
                    'nickname' => $PlayerModel1->name,
                    'votos' => $request->input('votos_eleicao1'),
                    'id_reino' => 3
                ]);

                $EleicaoResultado = new EleicaoResultado;

                $EleicaoResultado->create([
                    'id_player' => $PlayerModel2->id,
                    'nickname' => $PlayerModel2->name,
                    'votos' => $request->input('votos_eleicao2'),
                    'id_reino' => 2
                ]);

                $EleicaoResultado = new EleicaoResultado;

                $EleicaoResultado->create([
                    'id_player' => $PlayerModel3->id,
                    'nickname' => $PlayerModel3->name,
                    'votos' => $request->input('votos_eleicao3'),
                    'id_reino' => 1
                ]);


                // 2 LUGAR
                $EleicaoResultado->create([
                    'id_player' => $PlayerModel1_2->id,
                    'nickname' => $PlayerModel1_2->name,
                    'votos' => $request->input('votos_eleicao1_2'),
                    'id_reino' => 3
                ]);

                $EleicaoResultado = new EleicaoResultado;

                $EleicaoResultado->create([
                    'id_player' => $PlayerModel2_2->id,
                    'nickname' => $PlayerModel2_2->name,
                    'votos' => $request->input('votos_eleicao2_2'),
                    'id_reino' => 2
                ]);

                $EleicaoResultado = new EleicaoResultado;

                $EleicaoResultado->create([
                    'id_player' => $PlayerModel3_2->id,
                    'nickname' => $PlayerModel3_2->name,
                    'votos' => $request->input('votos_eleicao3_2'),
                    'id_reino' => 1
                ]);

                if($EleicaoResultado)
                    return redirect()->route('adminEleicao')->with('ativarVisOk', 'Resultado adicionado com sucesso!');
                else
                    return redirect()->route('adminEleicao')->with('ativarVisErro', 'Houve um problema ao adicionar resultado, entre em contato com o programador.');
                }
            }


}
