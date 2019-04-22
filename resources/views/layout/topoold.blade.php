<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ $title or 'Titanz2' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <link href="{{ asset('assets/stylesheets/cs.animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/application.css') }}" rel="stylesheet" type="text/css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="{{ asset('assets/stylesheets/bootstrap.min.3x.css') }}" rel="stylesheet" type="text/css" media="all">

    <link href="{{ asset('assets/stylesheets/cs.bootstrap.3x.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/jquery.owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/responsive-slider.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.global.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.style.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.media.3x.css') }}" rel="stylesheet" type="text/css" media="all">
    <!-- JS -->
    <script src="{{ asset('assets/javascripts/jquery-1.8.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/bootstrap.min.3x.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/modernizr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/cs.global.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/cs.script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.responsive-slider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.imagesloaded.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/application.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.form.js') }}" type="text/javascript"></script>

    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('assets/javascripts/owl.carousel.min.js') }}" type="text/javascript"></script>
<!-------------------->
    <link href="{{ asset('global/status.css') }}" rel="stylesheet" type="text/css" media="all">
    
<!-------------------->

    @stack('layoutstilos')

  </head>
  <body style="background-color: #000 !important;">
    <script type="text/javascript">
        // Quando carregado a página
        
        $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                    });


        $(function($) {

            // Quando enviado o formulário
            $('#frmLogin').submit(function() {
                var user = $('#username').val();
                var psw = $('#password').val();
                // Limpando mensagem de erro
                $('div.mensagem-erro').html('');

                // Mostrando loader
                $('div.loader').show();

                $.post("{{ URL::to('logar') }}", { login:user, senha:psw }, function(data){
                  console.log(data);
                  // Encondendo loader
                        $('div.loader').hide();
                        // Exibimos a mensagem de erro
                        $('div.mensagem-erro').html(data);
                });

                // Retornando false para que o formulário não envie as informações da forma convencional
                return false;

            });
        });
</script>
<script language="javascript">  
function abrePopUp(urlImagem){  
    window.open(urlImagem,'Shop','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=750,height=500');  
}  
</script>
<script language="javascript">  
function abrePopUp2(urlImagem){  
    window.open(urlImagem,'Shop','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=750,height=650');  
}  
</script>
<header id="top" class="clearfix">
    <!--top-other-->
    <div id="top-other">


      <div class="container">

        <div class="row">
         <div class="welcome col-md-4 text-left"><font size="1" color="#eaeaea">Olá&nbsp;
      
          @if( Auth::check() ) {{ Auth::user()->real_name }} @else Visitante @endif, seja bem-vindo!</font></div>
<div class="welcome col-md-10 text-center">

        Status do Servidor: <font color="green">Online</font>
    
</div>
            <div class="top-other col-md-8">
        <ul class="list-inline text-right">
          <li class="currencies-switcher">
            <div class="currency-plain">
              <ul class="currencies list-inline unmargin">
                <li class="currency-BRL_EUR active"><a href="javascript:;">BR-PT</a>
                  <input type="hidden" value="BRL_EUR">
                </li>
               
              </ul>
              <select class="currencies_src hide" name="currencies">
                <option value="BRL_EUR" selected="selected">BR-PT</option>
                <option value="USD">US</option>
              </select>
            </div>
          </li>
          
          <li class="customer-links">
            <ul id="accounts" class="list-inline">
                              <li class="login">
                 @if( Auth::check() )
                   <a href="/painel/usuario" style="text-decoration: none; color: gold; size: 1;"> ACESSAR PAINEL JOGADOR </a>
                   @if(Auth::user()->web_level == 5) -
                    <a href="/painel/admin" style="text-decoration: none; color: gold;"> ADMINISTRATIVO </a>
                    @endif
                 @else
          <span id="loginButton" class="dropdown-toggle" data-toggle="dropdown">
                      &nbsp;&nbsp;&nbsp;Painel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="sub-dropdown1"></i>
                      <i class="sub-dropdown"></i>
                    </span>
                    <div id="loginBox" class="dropdown-menu text-left" style="overflow:hidden;display:none">
                      <form id="frmLogin" action="#">
            <div id="bodyBox">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="sb-title">Painel de Controle</div>
                          <ul class="control-container customer-accounts list-unstyled">
                            <li class="clearfix">
                              <label for="customer_email_box" class="control-label">Login <span class="req">*</span></label>
                              <input class="form-control" name="username" type="text" id="username" placeholder="Login" maxlength="25">
                            </li>
                            <li class="clearfix">
                              <label for="customer_password_box" class="control-label">Senha <span class="req">*</span></label>
                              <input class="form-control password" id="password" name="password" type="password" placeholder="Senha" maxlength="25">
                            </li>
                            <li class="clearfix last1">
                              <button class="btn btn-1" type="submit" value="Entrar">Acessar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="register" href="recuperar">Esqueceu a senha?</a>
                            </li>
                            <li>
                <center><div class="loader" style="display: none;"><img src="{{ asset('assets/images/loading.gif') }}" alt="Carregando" /></div>
                <div class="mensagem-erro"></div></center>
                    
                            </li>
                          </ul>
                        </div>
                      </form>
            
                    </div>
                  </li>
 </li>
                <li>-</li>
                <li class="register"><a href="/cadastro" id="customer_register_link">Registrar</a></li>
                          </ul>
                          @endif
          </li>   
               

        </ul>
      </div>
            </div>
        </div>
      </div>
    </div>
    <!--end top-other -->
    
<div class="container">
<div class="block-image not-animated" data-animate="bounceIn" data-delay="300">
    <div class="row">
        <div class="col-md-12 top-logo">
            
      &nbsp;<br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br>
            <br/>
        </div>
    </div>
</div>
</div>
    
      <div class="container">
  <div class="row top-navigation">
    <nav class="navbar" role="navigation">
      <div class="clearfix">
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav hoverMenuWrapper">
          <li>
              <a href="/">
                PRINCIPAL
              </a>
            </li>
            <li>
              <a href="/cadastro">
                CADASTRO
              </a>
            </li>
              <li class=" dropdown">
              <a href="#" class="dropdown-toggle link-dropdown" data-toggle="dropdown">
                RANKING
                <i class="fa fa-caret-down"></i>
                <i class="sub-dropdown1 visible-md visible-lg"></i>
                <i class="sub-dropdown visible-md visible-lg"></i>
              </a>
              <ul class="dropdown-menu" style="overflow: hidden; display: none;">
                <li><a tabindex="-1" href="/ranking/guildas" title="Guilda">Guild</a></li>
                <li><a tabindex="-1" href="/ranking/personagens" title="Personagem">Personagem</a></li>
                <li><a tabindex="-1" href="/ranking/coliseu" title="Coliseu">Coliseu</a></li>
                <li><a tabindex="-1" href="/ranking/dragao" title="Matador de Dragões">Matador de Dragões</a></li>
                <li><a tabindex="-1" href="/ranking/killers" title="Top Kill">Top Kill</a></li>
              </ul>
            </li>
            <li>
              <a href="/download">
                DOWNLOAD
              </a>
            </li>
              <li class=" dropdown">
              <a href="#" class="dropdown-toggle link-dropdown" data-toggle="dropdown">
                COMUNIDADE
                <i class="fa fa-caret-down"></i>
                <i class="sub-dropdown1 visible-md visible-lg"></i>
                <i class="sub-dropdown visible-md visible-lg"></i>
              </a>
              <ul class="dropdown-menu" style="overflow: hidden; display: none;">
                <li><a tabindex="-1" href="ts3server://titanz2.ts3host.com.br?port=3012" title="TeamSpeak3">TeamSpeak3</a></li>
                <li><a tabindex="-1" href="https://www.facebook.com/titanz2oficial/" title="Fã page">Fã Page</a></li>
                <li><a tabindex="-1" href="https://www.facebook.com/groups/CrazyGames2017/" title="Grupo">Grupo</a></li>
                <li><a tabindex="-1" href="https://chat.whatsapp.com/JmnQBeHw85ZDDYHw1xzgNb" title="Whatsapp">Whatsapp</a></li>
                <li><a tabindex="-1" href="https://www.youtube.com/channel/UCCbi8zWu7yJIItMacvbp1PA" title="Titanz2Tube">Titanz2Tube</a></li>
              </ul>
            </li>
          </ul>       
        </div>
      </div>
    </nav>
  </div>
</div>

    <div class="gr-below-nav">
      <div class="container">
        <div class="home_below_nav top-below-nav clearfix">
          <div class="sub_menu" style="width: 102%;">
            <ul class="list-inline list-unstylet text-left clearfix">
              @forelse($eventos as $Evento)
              <li class="col-md-3">
                <a href="{{ $Evento->link }}">
                  <span>{{ $Evento->titulo }}</span>
                </a><br>{{ $Evento->desc }}<li>
              @empty
              @endforelse
            
            </ul>
            <span class="sub_nav"></span>
          </div>
        </div>
      </div>
    </div>
    

    @yield('conteudo')

    <script>
        function loginRedirect(){
            window.location.href = "{{ route('painelusuario') }}";
        }
    </script>
  </body>
</html>