@extends('layout.topo')

@push('layoutstilos')
	<style>
		.linkPainel {
			font-family: "Marcellus SC", serif;
    		font-weight: bold;

			background: rgb(22, 25, 27);
			border-radius: 0em;
		}

		.linkEleicao {
			text-decoration: none !important;
			width: 25%;
			background: rgb(22, 25, 27);
			border-radius: 1.5em;
		}

		.row {
			margin-top: 2em;
		}

		.row:last-child {
			margin-top: 10em;
			font-size: 12px;
		}

		.row:last-child p {
			margin: 0 !important;
			color: #cacaca !important;
		}
	</style>
@endpush

@section('conteudo')

<div class="container bg-dark-1">
	<div class="row">
		<div class="col-12 col-md-6">
			<a href="deslogar">
				<img style="text-alig:right;" src="{{ asset('assets/imagens/painelusuario/logout.png') }}" width="60" height="60" alt="">
			</a>
		</div>

		<div class="col-12 col-md-6"  style="text-align:right;">
			<div style="width:50%;text-align:right;margin: 1em 0 0 auto;">
				<a class="linkEleicao" href="eleicoes"><h2>VOTAR PARA IMPERADOR</h2></a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
			<h5>{{ Auth::user()->real_name }} Seja Bem-Vindo(a) a Área de Login</h5>
			<h2>Painel de Controle</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
			<a href="/doacao" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">DOAÇÃO</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">DOAÇÃO</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">DOAÇÃO</span>
					</span>
				</span>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="mudarnome" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">ALTERAR NOME</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">ALTERAR NOME</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">ALTERAR NOME</span>
					</span>
				</span>
			</a>
		</div>

		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="mudarsenha" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">ALTERAR SENHA</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">ALTERAR SENHA</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">ALTERAR SENHA</span>
					</span>
				</span>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="mudaremail" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">ALTERAR E-MAIL</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">ALTERAR E-MAIL</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">ALTERAR E-MAIL</span>
					</span>
				</span>
			</a>
		</div>

		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="armazem" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">ALTERAR SENHA ARMAZÉM</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">ALTERAR SENHA ARMAZÉM</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">ALTERAR SENHA ARMAZÉM</span>
					</span>
				</span>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="codigopessoal" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">ALTERAR SENHA PERSONAGEM</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">ALTERAR SENHA PERSONAGEM</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">ALTERAR SENHA PERSONAGEM</span>
					</span>
				</span>
			</a>
		</div>

		<div class="col-12 col-md-6" style="text-align:center;">
			<a href="desbugar" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">DESBUGAR CHAR</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">DESBUGAR CHAR</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">DESBUGAR CHAR</span>
					</span>
				</span>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
		@if( Auth::user()->status == 'OK' )
			<a href="trancarconta" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">BLOQUEAR CONTA</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">BLOQUEAR CONTA</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">BLOQUEAR CONTA</span>
					</span>
				</span>
			</a>
		@elseif( Auth::user()->status == 'WEBBLK' )
			<a href="destrancarconta" class="link-effect-4 ready">
				<span class="link-effect-inner">
					<span class="link-effect-l">
						<span class="linkPainel">DESBLOQUEAR CONTA</span>
					</span>
					<span class="link-effect-r">
						<span class="linkPainel">DESBLOQUEAR CONTA</span>
					</span>
					<span class="link-effect-shade">
						<span class="linkPainel">DESBLOQUEAR CONTA</span>
					</span>
				</span>
			</a>
		@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;height:100%;">
			<p><span style="color: red;">OBS¹:</span> As doações são para manter o servidor online.</p>
		</div>

		<div class="col-12 col-md-12" style="text-align:center;">
			<p><span style="color: red;">OBS²:</span> O cash dado ao jogador é uma forma de agradecimento por sua doação.</p>
		</div>
	</div>
	
</div>


<div id="content-wrapper-parent" style="display:none;">
    <div id="content-wrapper">
      <div id="content" class="container clearfix" style="
    height: 769px;
    background: url('../assets/imagens/painelusuario/bg5.png') no-repeat !important;
	background-size: 100% 100% !important;
">
        
<section class="row content">
	<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
	<!-- tbody>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="22%"><div align="center"></div></td>
			<td>
				<div align="center">
					<img src="{{ asset('images/painel_de_controle.jpg') }}" width="300" height="55">&nbsp;&nbsp;
					<a href="deslogar"><img src="{{ asset('images/botao_desconectar.jpg') }}" width="75" height="40" border="0"></a>
				</div>
			</td>
			<td width="23%"><div align="center"></div></td>
		</tr>
	</tbody !-->
</table>
<br>
<table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td><div align="center"></div></td>
		</tr>
	</tbody>
</table>
<br>

<table width="750" border="0" align="center" cellpadding="2" cellspacing="2">
	<tbody>
		<tr>
			<td width="100%"></td>
		</tr>
		<tr>
			<td width="100%" style="text-align: right;">
			    <a href="eleicoes"><img style="margin-right: -190px; margin-top:20px;" src="{{ asset('assets/imagens/painelusuario/eleicao.png') }}" width="180" height="100" alt=""></a></td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table width="550" style="margin-top:80px;" border="0" align="center" cellpadding="5" cellspacing="7">
	<tbody>
	    <tr>
			<td colspan="2" width="100%"><span class="style5"><a href="cash"><img src="{{ asset('assets/imagens/painelusuario/docao.png') }}" width="250" height="70" alt=""></a></span></td>
		</tr>
		<tr>
			<td><div align="center"><a href="mudarnome"><img src="{{ asset('assets/imagens/painelusuario/modif_nome.png') }}" width="250" height="60" border="0"></a></div></td>
			<td><div align="center"><a href="mudarsenha"><img src="{{ asset('assets/imagens/painelusuario/modif_senha.png') }}" width="250" height="60" border="0"></a></div></td>
		</tr>
		
		<tr>
			<td><div align="center"><a href="mudaremail"><img src="{{ asset('assets/imagens/painelusuario/modif_email.png') }}" width="250" height="60" border="0"></a></div></td>
			<td><div align="center"><a href="armazem"><img src="{{ asset('assets/imagens/painelusuario/modif_senhaarmazem.png') }}" width="250" height="60" border="0"></a></div></td>
		</tr>
		
		<tr>
			<td><div align="center"><a href="codigopessoal"><img src="{{ asset('assets/imagens/painelusuario/modif_senhachar.png') }}" width="250" height="60" border="0"></a></div></td>
			
			<td><div align="center"><a href="desbugar"><img src="{{ asset('assets/imagens/painelusuario/desbug.png') }}" width="250" height="60" border="0"></a></div></td>
			
			
			
		</tr>
		<tr>
		    @if( Auth::user()->status == 'OK' )
					<td colspan="2"><div align="center"><a href="trancarconta" onclick="return confirm('Tem certeza que quer trancar sua conta {{ Auth::user()->real_name }}?')"><img src="{{ asset('assets/imagens/painelusuario/bloq.png') }}" width="250" height="90" border="0"></a></div></td>
				@elseif( Auth::user()->status == 'WEBBLK' )
					<td colspan="2"><div align="center"><a href="destrancarconta" onclick="return confirm('Tem certeza que quer destrancar sua conta {{ Auth::user()->real_name }}?')"><img src="{{ asset('assets/imagens/painelusuario/desbloq.png') }}" width="250" height="90" border="0"></a></div></td>
				@endif
		</tr>
		<tr>
			<td colspan="2" width="100%"><span class="style5"><a href="deslogar"><img style="text-alig:right; margin-right: -990px;" src="{{ asset('assets/imagens/painelusuario/logout.png') }}" width="60" height="60" alt=""></a></span></td>
		</tr>
		
	</tbody>
</table>

			</td>
		</tr>
	</tbody>
</table>
</section>
</div>
</div>
</div>


	
@endsection