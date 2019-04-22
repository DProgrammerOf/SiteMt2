@extends('layout.topo')
@push('layoutstilos')

    <link href="{{ asset('assets/css/mobile.css') }}" rel="stylesheet" type="text/css" media="all">

    <link href="{{ asset('assets/stylesheets/cs.global.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.style.css') }}" rel="stylesheet" type="text/css" media="all">
    

		<script type="text/JavaScript" src="assets/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
	<script type="text/JavaScript" src="assets/js/jquery.validate.regEX.js"></script>
	<script type="text/JavaScript" src="assets/js/StrongPassword.js"></script>
	
<!-------------------->
<script type="text/javascript">	
	$(document).ready(function(){
	
	$("#codperso").keyup(function () {
    if (this.value.length == this.maxLength) {
          $(this).blur();
    }
});

	$("#cadastro").validate({
		rules:{
			nome:{ required: true, regEX: /^[a-zA-Z ]{5,16}$/i },
			login:{ required: true, regEX: /^[a-zA-Z0-9]{5,30}$/i },
			senha:{ required: true, regEX: /^[-+_!@#$%^&?-a-zA-Z0-9]{10,16}$/i },
			senhaconf:{ required: true, equalTo: "#senha" },
			email:{ required: true, email: true },
			emailc:{ required: true, equalTo: "#email" },
			codperso:{ required: true, regEX: /^[0-9]{7}$/i },
			termo0:{ required: true }
			},

		messages:{
			nome:{ required: "Campo obrigatório.", regEX: "Somente letras, sem espaço. Entre 5 e 16 caracteres." },
			login:{ required: "Campo obrigatório.", regEX: "Somente letras e números, sem espaço. Entre 5 e 15 caracteres.", remote: "Usuário já esta em uso." },
			senha:{ required: "Campo obrigatório.", regEX: "Simbolos aceitos: (-+_!@#$%^&?)" },
			senhaconf:{ required: "Campo obrigatório.", equalTo: "As senhas digitadas não coincidem." },
			email:{ required: "Campo obrigatório.", email: "Entre com um E-Mail válido.", remote: "E-Mail já esta em uso." },
			emailc:{ required: "Campo obrigatório.", equalTo: "Os E-Mails digitados não coincidem." },
			codperso:{ required: "Campo obrigatório.", regEX: "7 caracteres obrigatórios." },
			termo0:{ required: "É necessário ler e aceitar os termos Metin2Plus." }
			}
		});
	});
</script> 

<script type="text/javascript">
	$(document).on('keydown', '#nome', function(caracter) {
    	if (caracter.keyCode == 32) return false;
	});
</script>

 <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
<script>
$( document ).ready( function() {
  $('.responsive-slider').responsiveSlider({
    autoplay: true,
    interval: 5000,
    transitionTime: 300
  });
});
</script>
<style>
.forcaSenha {
  float: left;
  background-size: 100px 70px;
    width: 100px;
    height: 70px;
  font-family: Verdana;
  text-transform: uppercase;
  -webkit-transition: all 0.5s ease-out;  /* Saf3.2+, Chrome */
     -moz-transition: all 0.5s ease-out;  /* FF4+ */
      -ms-transition: all 0.5s ease-out;  /* IE10 */
       -o-transition: all 0.5s ease-out;  /* Opera 10.5+ */
          transition: all 0.5s ease-out;
}  

input[type="text"]
{
	color: #fff;
    background: transparent;
    border: none;
}

input[readonly] {
     cursor: text;
     background-color: #fff;
}

.termodeuso {
    height: 25px;
    width: 25px;
    background: url(assets/imagens/cadastro/input_codperso2.png) no-repeat;
    background-size: 100% 100%;
    font-size: 22px;
	float: left;
	cursor: pointer;
	    margin-top: 0.4em;
    margin-left: 1.3em;
}

input[type="checkbox"]#termo:checked + label span:before {
  padding: auto;
  content: 'X';
  color: #FFF;
  font-family: cursive;
  font-weight: 900;
  margin-left: -20px;
  margin-top: -6px;
  position: absolute;
}

input[type="text"]#nome {
    color: #fff;
    background: url(assets/imagens/cadastro/input_nome_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input[type="text"]#login {
    color: #fff;
    background: url(assets/imagens/cadastro/input_login_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input[type="password"]#senha {
    color: #fff;
    background: url(assets/imagens/cadastro/input_senha_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input[type="password"]#senhaconf {
    color: #fff;
    background: url(assets/imagens/cadastro/input_confsenha_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    padding-top: 20px;
    text-align: center;
    font-size: 20px;
}

input[type="text"]#email {
    color: #fff;
    background: url(assets/imagens/cadastro/input_email_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input[type="text"]#emailc {
    color: #fff;
    background: url(assets/imagens/cadastro/input_confemail_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input[type="text"]#codperso {
    /*color: #fff;
    background-size: 50px 55px, 50px 55px, 50px 55px, 50px 55px, 50px 55px, 50px 55px, 50px 55px;
    height: 60px;
    width: 400px;
    border: none;
    letter-spacing: 28px;
    font-size: 40px;
    padding-left: 10.5%;
    padding-bottom: 3%;

    background-image: url(assets/imagens/cadastro/input_codperso2.png), 
                  url(assets/imagens/cadastro/input_codperso2.png),
                  url(assets/imagens/cadastro/input_codperso2.png),
                  url(assets/imagens/cadastro/input_codperso2.png),
                  url(assets/imagens/cadastro/input_codperso2.png),
                  url(assets/imagens/cadastro/input_codperso2.png),
                  url(assets/imagens/cadastro/input_codperso2.png);
background-repeat: no-repeat, 
                   no-repeat,
                   no-repeat,
                   no-repeat,
                   no-repeat,
                   no-repeat,
                   no-repeat;
background-position: 0 top, 
                     50px top,
                     100px top,
                     150px top,
                     200px top,
                     250px top,
                     300px top;*/
                     color: #fff;
    background: url(assets/imagens/cadastro/input_codperso_new.png) no-repeat;
    background-size: 340px;
    height: 90px;
    width: 340px;
    border: none;
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
	
     background: url(assets/imagens/cadastro/input_nome.png) no-repeat !important;
transition: background-color 5000s ease-in-out 0s;
}

label.error {
	position: absolute;
    width: 100%;
    margin:auto;
    color: #720707;
    min-width: 350px;
    text-align: center;
}
</style>
@endpush

@section('conteudo')
<div id="content-wrapper-parent">
	<div id="content-wrapper">
		<div class="container">
			<div class="row">
			
				</div>
			</div>
		</div>

		<div id="content" class="container clearfix" style="padding-bottom: 0px;background: none!important;position: relative;">
			<section class="row content">
				<div id="col-main" class="clearfix">
				<script type="text/javascript">
					function forcaSenha( $senha ) {
							$LMaiusc = new RegExp("[A-Z]", "g");
						    $LMinusc = new RegExp("[a-z]", "g");
						    $Numero = new RegExp("[0-9]", "gi");
						    $LSimb = new RegExp("[-+_!@#$%^&?]", "gi");
						    $MinTamanho = new RegExp(".{10,16}$", "gi");
						    $VerifSenhaForte = new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[-+_!@#$%^&?]).{10,}$", "g");
						    
						    if($LMaiusc.test($senha) == true)
						    	EstCerto("LMaiusc");
						    else
						    	EstErrado("LMaiusc");
						        
						    if($LMinusc.test($senha) == true)
						    	EstCerto("LMinusc");
						    else
						    	EstErrado("LMinusc");
						        
						    if($Numero.test($senha) == true)
						    	EstCerto("Numero");
						    else
						    	EstErrado("Numero");
						        
						    if($LSimb.test($senha) == true)
						    	EstCerto("LSimb");
						    else
						    	EstErrado("LSimb");
						        
						    if($MinTamanho.test($senha) == true)
						    	EstCerto("MinTamanho");
						    else
						    	EstErrado("MinTamanho");

						    if($VerifSenhaForte.test($senha) == true)
						    	document.getElementById( 'forcadasenha' ).value = "tudook";
						    else
						    	document.getElementById( 'forcadasenha' ).value = "nadaok";
						    
						}

						function CodPersonagem( $codigo ){
							$VerifSenhaForte = new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[-+_!@#$%^&?]).{10,}$", "g");
						}

						function EstCerto( $id ){
							var urlImg = 'assets/imagens/cadastro/';

							switch($id){
								case 'LMaiusc':
									urlImg += 'okCarMaiusculo.png';
									break;
								case 'LMinusc':
									urlImg += 'okCarMinusculo.png';
									break;
								case 'Numero':
									urlImg += 'okCarNum.png';
									break;
								case 'LSimb':
									urlImg += 'okCarSimb.png';
									break;
								case 'MinTamanho':
									urlImg += 'ok10Car.png';
									break;
							}
						  	document.getElementById( $id ).style.background = "url("+urlImg+")";
						  	//document.getElementById( $id ).style.color = "#ee7";
						}

						function EstErrado( $id ){
							var urlImg = 'assets/imagens/cadastro/';

							switch($id){
								case 'LMaiusc':
									urlImg += 'xCarMaiusculo.png';
									break;
								case 'LMinusc':
									urlImg += 'xCarMinusculo.png';
									break;
								case 'Numero':
									urlImg += 'xCarNum.png';
									break;
								case 'LSimb':
									urlImg += 'xCarSimb.png';
									break;
								case 'MinTamanho':
									urlImg += 'x10Car.png';
									break;
							}
						  	document.getElementById( $id ).style.background = "url("+urlImg+")";
						  	//document.getElementById( $id ).style.color = "#000";
						}
					
				</script>
					<script type="text/javascript">
						jQuery(document).ready(function($){

							initTabActive();

							//  When user clicks on tab, this code will be executed
							$(".head_tabs").on(clickEv, function() {

							if(!$(this).parent().hasClass('active')) {
							//  First remove class "active" from currently active tab
							$(".head_tabs").parent().removeClass("active");

							//  Here we get the data-src(parent) value of the selected tab
							var $src_tab = $(this).attr("data-src");

							//  Now add class "active" to the selected/clicked tab
							$($src_tab).parent().addClass("active");

							//  Hide all tab content
							$(".content_tabs").hide();

							//  Here we get the href value of the selected tab
							var $selected_tab = $(this).attr("href");

							//  Show the selected tab content
							if(isMobile.any())
							$($selected_tab).show();
							else
							$($selected_tab).fadeIn();

							// Scroll to content
							$('html, body').animate({
							scrollTop: $($selected_tab).offset().top - 80
							},300);

							// re-call position quickshop
							positionQuickshop();

							//  Here we get the href value of the selected tab
							var $selected_carousel = $(this).attr("data-crs");

							}
							//  At the end, we add return false so that the click on the link is not executed
							return false;
							});

							/* Function: init item active */
							function initTabActive(){
							// Content
							jQuery('#tabs_content_container').find('.content_tabs').first().show();
							jQuery('#tabs_content_container').find('.content_tabs').first().prev().addClass('active');

							jQuery('#tabs_container #tabs').find('.head_tabs').first().parent().addClass('active');

							}
						});
					</script><!--home-tabs-->


<!--------------------------------------------Inicio Rankings Top4-------------------------------------------------->
					

					<div class="container container-cadastro" style="background: url('assets/imagens/cadastro/bgnew.png'); background-size: 100% 100%;
    height: 120%;">
						<div class="row" style="width: 100%;padding-top: 10%;">

						<div class="titleCadastro" style="width: 100%; margin: auto; text-align: center; color: #fff; font-weight: bold; font-size: 60px;letter-spacing: 0.2em; padding-bottom: 5%;">
							CADASTRO
						</div>
						
<form method="POST" action="" class="form-horizontal" style="width: 100%;
    align-content: center;
    margin: auto;
    max-width: 320px;" id="cadastro">

<fieldset>
{{ csrf_field() }}
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
 
  <div class="col-md-12 divInputCadastro">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="" autocomplete="mt2plus-in-name">
    
  </div>
</div>

<div class="form-group" style="margin-top: 2.2em;">
  <div class="col-md-2" style="position:absolute; margin-left: -9em;;
    width: 130px;
    margin-top: 2em;
    text-align: center; display: none;">
  	<img src="assets/imagens/cadastro/frase.png" width="120" height="10" alt="Frase">
  </div>
  <div class="col-md-10 divInputCadastro">
  <input id="login" name="login" type="text" placeholder="" class="form-control input-md" required="" autocomplete="mt2plus-in-login">
    
  </div>
</div>


<div class="form-group" style="margin-top: 2.6em;">
  
  <div class="col-md-10 divInputCadastro">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="" autocomplete="mt2plus-in-email">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group" style="margin-top: 2.6em;"> 
  
  <div class="col-md-10 divInputCadastro">
  <input id="emailc" name="emailc" type="text" placeholder="" class="form-control input-md" required="" autocomplete="mt2plus-in-confemail">
    
  </div>
</div>


<div class="form-group mainForcaSenha" style="     position: absolute;
    width: 80%;
    margin-left: 37%;
    ">
  <div id="forcaSenhaId"  class="col-md-10" style="    padding-top: 2.5em;
    padding-bottom: 3em;
	padding-left: 0;
	width: 275px;
	min-height: 218px;
	z-index:3;">
    
<div id="LMaiusc" class="forcaSenha" style="background-image: url(assets/imagens/cadastro/xCarMaiusculo.png);">
	
	<img src="assets/imagens/cadastro/okCarMaiusculo.png" style="display: none;" alt="caracter maiusculo ok" width="100" height="70" >
</div>

<div id="LMinusc" class="forcaSenha" style="background-image: url(assets/imagens/cadastro/xCarMinusculo.png); margin-left: 5.4em;">
	<img src="assets/imagens/cadastro/okCarMinusculo.png" style="display: none;" alt="caracter minusculo ok" width="100" height="70" >
</div>

<div id="LSimb" class="forcaSenha" style="background-image: url(assets/imagens/cadastro/xCarSimb.png);clear: both;margin-left: 7.3em;margin-top: -3.5%;">
	<img src="assets/imagens/cadastro/okCarSimb.png" style="display: none;" alt="caracter simbolico ok" width="100" height="70" >
</div>

<div id="Numero" class="forcaSenha" style="background-image: url(assets/imagens/cadastro/xCarNum.png);clear: both;margin-top: -3%;">
	<img src="assets/imagens/cadastro/okCarNum.png" style="display: none;" alt="caracter numerico ok" width="100" height="70" >
</div>

<div id="MinTamanho" class="forcaSenha" style="background-image: url(assets/imagens/cadastro/x10Car.png);margin-left: 5.4em;margin-top: -3%;">
	<img src="assets/imagens/cadastro/ok10Car.png" style="display: none;" alt="min tamanho ok" width="100" height="70" >
</div>

<div id="TudoOK" style="float: left; padding: 20px; font-size: 18px; font-weight: bold; color: #0c0; display: none;">TUDO OK!</div>

<input id="forcadasenha" type="text" name="forcadasenha" value="nadaok" style="display: none;">
  </div>
</div>

<!-- Password input-->
<div class="form-group" style="margin-top: 2.2em;"> 
  <div class="col-md-2" style="position:absolute; margin-left: -9em;;
    width: 130px;
    margin-top: 2em;
    text-align: center; display: none;">
  	<img src="assets/imagens/cadastro/frase.png" width="120" height="10" alt="Frase">
  </div>
  <div class="col-md-10 divInputCadastro">
    <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="" onkeyup="forcaSenha(this.value)" onfocus="eventForca('block')" onblur="eventForca('none')" autocomplete="mt2plus-in-senha">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group" style="margin-top: 2.2em;">
  <div class="col-md-2" style="position:absolute; margin-left: -9em;;
    width: 130px;
    margin-top: 2em;
    text-align: center; display: none;">
  	<img src="assets/imagens/cadastro/frase.png" width="120" height="10" alt="Frase">
  </div>
  <div class="col-md-10 divInputCadastro">
    <input id="senhaconf" name="senhaconf" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-10 divInputCadastro" style="margin-top: 2em;">
  <input id="codperso" name="codperso" type="text" placeholder="" class="form-control input-md inputs"  maxlength="7" size="7" required="" autocomplete="mt2plus-in-codperso" >
    
  </div>
</div>

<!--div class="form-group">
  <label class="col-md-4 control-label" for="codperso">Verificação:</label>  
  <div class="col-md-6">
  <div class="g-recaptcha" data-sitekey="6Lf4oyoUAAAAAKH_n9RoDzMhr7HighhsMv59IgI-"></div>
    
  </div>
</div -->


<!-- Multiple Checkboxes -->


<div class="form-group" style="margin:auto;margin-left: -2em;">
	<div class="col-md-10">
		<input type="checkbox" id="termo" name="termo" value="VDD" style="display: none;">
		<label for="termo" class="termodeuso"><span></span></label>
		<div style="background: url(assets/imagens/cadastro/termosnew.png) no-repeat;
    background-size: 400px 38px;
    height: 38px;
    width: 400px;
    text-align: left;
    padding-top: 1em;
    color: #fff;
    margin-top: 0.3em;
    margin-left: -0.3em;
    padding-left: 6em;
    font-weight: bold;">

  	EU LI E ACEITO OS <a href="termos" target="_blank" style="color: #9c9c00;">TERMOS & REGRAS</a> DO Mt2 Plus.
	</div> 
</div>
</div> 
<br>
<!-- Button (Double) -->
<div class="form-group" style="margin:auto;">
  <div class="col-md-12" style="margin: auto;text-align: center;">
   <input type="submit" class="register-content-button" style='    background-image: url(assets/imagens/cadastro/botao.png);
    background-repeat: no-repeat;
    background-position-y: 0.2em;
    width: 150px;
    height: 55px;
    cursor: pointer;
    background-color: transparent;
    border: none;
    /* line-height: 100; */
    overflow: hidden;
    background-size: 150px 45px;
    color: #fff;
    font-weight: bold;
    margin-left: 18%; 
    font-size: 18px;' name="register" value="REGISTRAR" alt="Registrar">
  </div>
</div>

</fieldset>
</form>
<br><br><br><br><br><br><br>



					</div><!--end feature product-->
				</div>
			</section>
		</div>
	</div>
	<br>
</div>

<script>
	function eventForca( tipo ){
		
		if( (screen.width > 992) || (screen.width < 320) )
			return;
			
			element = document.getElementById("forcaSenhaId");
			console.log(element.style.display);
	var sitElm = element.style.display;
	if(tipo == "none")
  		element.style.display = "none";
    else
    	element.style.display = "block";
	}
</script>


@endsection
