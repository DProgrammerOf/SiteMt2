@extends('layout.topo')
@push('layoutstilos')
		<script type="text/JavaScript" src="assets/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
	<script type="text/JavaScript" src="assets/js/jquery.validate.regEX.js"></script>
	<script type="text/JavaScript" src="assets/js/StrongPassword.js"></script>
	
<!-------------------->
<script type="text/javascript">	
	$(document).ready(function(){
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
			termo0:{ required: "É necessário ler e aceitar os termos Titanz2." }
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
  width: 80px;
  border-radius: 10px;
  margin: 10px;
  background-color: #a00;
  font-family: Verdana;
  text-transform: uppercase;
  border: 2px solid;
  color: #000;
  -webkit-transition: all 0.5s ease-out;  /* Saf3.2+, Chrome */
     -moz-transition: all 0.5s ease-out;  /* FF4+ */
      -ms-transition: all 0.5s ease-out;  /* IE10 */
       -o-transition: all 0.5s ease-out;  /* Opera 10.5+ */
          transition: all 0.5s ease-out;
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

		<div id="content" class="container clearfix">
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

						    if($VerifSenhaForte.test($senha) == true){
						    	document.getElementById( 'TudoOK' ).style.display = "block";
						    	document.getElementById( 'forcadasenha' ).value = "tudook";

						    }else{
						    	document.getElementById( 'TudoOK' ).style.display = "none";
						    	document.getElementById( 'forcadasenha' ).value = "nadaok";
						    }
						}

						function EstCerto( $id ){
						  	document.getElementById( $id ).style.backgroundColor = "lightgreen";
						  	document.getElementById( $id ).style.color = "#ee7";
						}

						function EstErrado( $id ){
						  	document.getElementById( $id ).style.backgroundColor = "#a00";
						  	document.getElementById( $id ).style.color = "#000";
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
					

					<div class="container">
						<div class="row">
						<center><h1>Cadastro</h1>
<form method="POST" action="" class="form-horizontal" style="width: 100%; align-content: center; margin-left: 30em;" id="cadastro">

<fieldset>
{{ csrf_field() }}
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="login">Informe seu Nome:</label>  
  <div class="col-md-6">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="login">Informe seu Usuário:</label>  
  <div class="col-md-6">
  <input id="login" name="login" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Informe sua Senha:</label>
  <div class="col-md-6">
    <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="" onkeyup="forcaSenha(this.value)">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senhaconf">Confirme sua Senha:</label>
  <div class="col-md-6">
    <input id="senhaconf" name="senhaconf" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="senhaconf">Força da Senha:</label>
  <div class="col-md-6">
    
<div id="LMaiusc" class="forcaSenha">Carácter Maiúsculo</div>

<div id="LMinusc" class="forcaSenha">Carácter Minúsculo</div>

<div id="LSimb" class="forcaSenha">Carácter Simbólicos</div>

<div id="Numero" class="forcaSenha">Carácter Numérico</div>

<div id="MinTamanho" class="forcaSenha">Min. 10 Carácteres</div>

<div id="TudoOK" style="float: left; padding: 20px; font-size: 18px; font-weight: bold; color: #0c0; display: none;">TUDO OK!</div>

<input id="forcadasenha" type="text" name="forcadasenha" value="nadaok" style="display: none;">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Informe seu E-mail:</label>  
  <div class="col-md-6">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailc">Confirme seu E-mail:</label>  
  <div class="col-md-6">
  <input id="emailc" name="emailc" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="codperso">Código de Personagem:</label>  
  <div class="col-md-6">
  <input id="codperso" name="codperso" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!--div class="form-group">
  <label class="col-md-4 control-label" for="codperso">Verificação:</label>  
  <div class="col-md-6">
  <div class="g-recaptcha" data-sitekey="6Lf4oyoUAAAAAKH_n9RoDzMhr7HighhsMv59IgI-"></div>
    
  </div>
</div -->


<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="termo"></label>
  <div class="col-md-4">
  <input type="checkbox" name="termo" value="VDD">
  EU LI E ACEITO OS <a href="pt-br/termos.php" target="_blank">TERMOS & REGRAS</a> DO Titanz2.
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registrar"></label>
  <div class="col-md-8">
   <input type="submit" class="register-content-button" name="register" value="Registrar" alt="Registrar">
  </div>
</div>

</fieldset>
</form>
</center>



					</div><!--end feature product-->
				</div>
			</section>
		</div>
	</div>
</div>

<div id="bottom"></div>

	<footer id="footer">
		<div class="container">
			<div id="footer-content">
				<div class="row widget-blog" id="widget-blog">
					<div class="widget-header f_title text-center">
						<h4>Vídeos e Temas</h4>
						<span>Acompanhe nossos vídeos e fique por dentros de nossos temas, em breve...</span>
					</div>
					<div class="wrap_item">
						<div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="0">
							<div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="screen/products/video_img1.jpg"></a>
								<h5 class="title"><a>Purgatório Ardente</a></h5>
								<span class="line"></span>
								<p class="desc">Prepare-se para uma batalha insana pelo fogo, o mestre das sombras ressurgiu.</p>
							</div>
						</div>
						<div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="300">
							<div class="group"> <a href="https://www.youtube.com/" target="_blank"><img src="screen/products/video_img2.jpg"></a>
								<h5 class="title"><a>Torre de Nemere</a></h5>
								<span class="line"></span>
								<p class="desc">A <strong>Torre de Vigia de Nemere</strong> é  composta por 9 pisos diferentes, para completa-la é necessário que passe por 9 desafios.</p>
							</div>
						</div>
						<div class="article-extras col-md-8 not-animated" data-animate="fadeInUp" data-delay="600">
							<div class="group">
								<img src="screen/products/video_img3.jpg">
								<h5 class="title"><a>Sua jornada começa aqui</a></h5>
								<span class="line"></span>
								<p class="desc">A escolha do seu reino é o início de tudo, ele poderá definir o quão longe você chegará.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="footer_bottom row">
					
				</div>
			</div>
		</div>
	</footer>
@endsection
