@php
use \App\Http\Controllers\PainelController;
@endphp
@extends('layout.topo')

@push('layoutstilos')
<style> 
	.formCont input[type="text"], input[type="password"] {
		width: 60%;
	}

	.formCont {
		background: rgb(22, 25, 27);
    	border-radius: 1.5em;
	}

	.row {
		margin-top: 2em;
	}

	.row:last-child {
		margin-top: 4em;
		font-size: 12px;
	}

	.row .form div {
		margin-top: 1em;
	}

	.row .form {
		padding-bottom: 1em;
	}
</style>
@endpush

@section('conteudo')

<div class="container bg-dark-1">
	<div class="row">
		<div class="col-6 col-md-4">
			<a href=#>RETORNAR</a>
		</div>

		<div class="col-12 col-md-12" style="text-align:center;padding-left:0px;">
			<h2>Painel de Eleições</h2>
		</div>
	</div>

	@if (is_array($eleicao) || is_object($eleicao))
		<div class="row">
			<div class="col-12 col-md-12" style="text-align:center;">
				<span class='text-responsive' style="color: #f57e7e; font-weight: bold;">Para você votar é necessário {{ $eleicao->tempo_min }} dias de jogo.</span>
				<span class='text-responsive' style="color: #f57e7e; font-weight: bold;">E também o mínimo de {{ $eleicao->kills_min }} kills.</span><br><br>
			</div>
		
			@php
				$tempojogando = $tempojogando*60;
				$m = floor(($tempojogando %3600)/60);
				$h = floor(($tempojogando %86400)/3600);
				$d = floor(($tempojogando %2592000)/86400);

				$tempojogandoTxt = "$d dias, $h horas e $m minutos";
			@endphp

			<div class="col-12 col-md-6" style="text-align:center; "> 
				@if ($d >= $eleicao->tempo_min)
					<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;padding-right: 0;">TOTAL DE TEMPO</span><br><br>
					<span class='text-responsive' style="color: green;
														font-weight: bold;
														background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
														background-size: 100% 100%;
														width: 350px;
														height: 60px;
														font-size: 16px;
														font-weight: bold;
														/* color: #fff; */
														margin: auto;
														padding: 1.4em 3.2em;">{{ $tempojogandoTxt }}</span>
				@else
					<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;padding-right: 0;">TOTAL DE TEMPO</span><br><br>
					<span class='text-responsive' style="color: red;
														font-weight: bold;
														background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
														background-size: 100% 100%;
														width: 350px;
														height: 60px;
														font-size: 16px;
														font-weight: bold;
														/* color: #fff; */
														margin: auto;
														padding: 1.4em 3.2em;">{{ $tempojogandoTxt }}</span>
				@endif
			</div>

		

			<div class="col-12 col-md-6" style="text-align:center;"> 
				@if ($kills >= $eleicao->kills_min)
					<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;  width: 350px; padding-left: 0;">TOTAL DE KILLS</span><br><br>
					<span class='text-responsive' style="color: green;
														font-weight: bold;
														background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
														width: 350px;
														height: 60px;
														background-size: 100% 100%;
														font-size: 16px;
														font-weight: bold;
														/* color: #fff; */
														margin: auto;
														padding: 1.4em 130px;">{{ $kills }} kills</span>
				@else
					<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;  width: 350px; padding-left:0;">TOTAL DE KILLS</span><br><br>
					<span class='text-responsive' style="color: red;
														font-weight: bold;
														background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
														width: 350px;
														height: 60px;
														background-size: 100% 100%;
														font-size: 16px;
														font-weight: bold;
														/* color: #fff; */
														margin: auto;
														padding: 1.4em 130px;">{{ $kills }} kills</span>
				@endif
			</div>
		</div>

		@if ($errors->any())
			<div class="row">
				<div class="col-12 col-md-6" style="margin: 0 auto;">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ ucfirst(trans($error)) }}</li>
                            @endforeach
                        </ul>
					</div>
				</div>
			</div>
        @endif

		<div class="row">
			<div class="col-12 col-md-12" style="text-align:center;">
				@if (is_array($Imperio) || is_object($Imperio))
					@if($Imperio->empire == 1)<img src="{{ asset('assets/imagens/eleicoes/shinsoo.png') }}" width="250" height="140" />@endif
			
					@if($Imperio->empire == 3)<img src="{{ asset('assets/imagens/eleicoes/jinno.png') }}" width="250" height="140" />@endif
				
					@if($Imperio->empire == 2)<img src="{{ asset('assets/imagens/eleicoes/chunjo.png') }}" width="250" height="140" />@endif
				@endif
			</div>
		</div>
	@endif

	<div class="row">
			@if (is_array($candidatos) || is_object($candidatos))
				
						@forelse($candidatos as $Candidato)
							<div class="col-12 col-md-4" style="text-align:center;">

								@php
									$Personagem = PainelController::UsuarioPersonagem($Candidato->id_player);
								@endphp

								<div class="tdCandidato" style="margin-top:20px;@if (is_array($candidatovotado) || is_object($candidatovotado))
																	@if($Candidato->id == $candidatovotado->id_candidato)
																		background: #4caf50;
																	@endif
																@endif">
									<h3>{{ $Personagem->name }}</h3>
									
									<div style="width: 100%;z-index: 2;">
										
											<div class=" bounceIn animated" data-animate="bounceIn" data-delay="450" style="background: url(../assets/imagens/eleicoes/bg-perso.png); background-size: 100% 100%; width: 210px; height: 110%; padding-top: 1.5em;margin: -5px auto 0 auto;">
												<a href="{{ url('personagem/'.$Personagem->name) }}" style="margin: auto;">
													<img src="{{ asset('assets/imagens/eleicoes/'.$Personagem->job.'.png') }}" class="image-fly img-responsive" width="90" height="90">
												</a>
											</div>
										
									</div>
											
									<div class="group_info" style="background: url(../assets/imagens/eleicoes/caixa.png); background-size: 100% 100%; width: 290px; height: 55px; color: #11c128; padding-top: 1.4em; font-size: 12px; font-weight: bold;margin-top: -2%; z-index: 3;margin: -5px auto 0 auto;">
										@if (!is_array($candidatovotado) && !is_object($candidatovotado))
											<form method="POST" action="{{ route('addVoto') }}">
												{{ csrf_field() }}
												<input type="hidden" name="id_cand" value="{{ $Candidato->id }}">
												<button type="submit" style="background-color: Transparent;
																			background-repeat:no-repeat;
																			border: none;
																			overflow: hidden;
																			outline:none;color:#0e0;font-size: 18px;margin-top:-4px;">VOTAR</button>
											</form>
										@else
											@if($Candidato->id == $candidatovotado->id_candidato)
												<span style="color:#fff">VOTADO POR VOCÊ</span>
											@endif
										@endif
									</div>
								</div>

							</div>
						@empty
							<div class="col-12 col-md-12" style="text-align:center;"> Nenhum candidato inscrito na eleição... </div>
						@endforelse
			@else
				<div class="col-12 col-md-12" style="text-align:center;"> Nenhum candidato inscrito na eleição... </div>
			@endif
		
	</div>

	<div class="row" style="margin-top:8em;">
		<div class="col-12 col-md-12" style="text-align:center;color:red;">
			Aumente a segurança da sua conta, altere seus dados regularmente!
		</div>
	</div>
	
</div>


<div id="content-wrapper-parent" style="display:none;">
    <div id="content-wrapper">
    	<div class="container">
			<div class="row">
			
				</div>
			</div>
		</div>
      <div id="content" class="container clearfix maincontent" style="padding-bottom: 5em;background: url(../assets/imagens/eleicoes/bg.png) no-repeat !important;background-size: 100% 100% !important;position: relative; padding-top: 10%;">
    
<section class="row content">
	<div id="col-main col-eleicao" class="container clearfix">
						<div class="page about-us"><div style="width:100%; background-color: rgba(138,97,65, 0.5);">
<!---------------------------------------------------------------------------------------------------------->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="table-layout: fixed;">
	<tbody>
		<tr>
			<td>
<br/><br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<div style="background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;background-size: 100% 100%; width: 300px; height: 60px;font-size: 16px; font-weight: bold; color: #fff; margin: auto;padding: 1.3em">
				PAINEL DE ELEIÇÕES
			</div>
			
		</td>
	</tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" bordercolor="#2b2018" style="margin-top: 0.5em">
	<tr>
		
			<td width="100%" bgcolor="#2b2018" class="style6">
				<div id="infosmenu" align="center">
					
					<span>
						<strong><font size="2" style="color: #fff">Login: </font></strong>
						<strong><font size="2" color="red">{{ Auth::user()->login }}</font></strong>
					</span>
					
					
				</div>
			</td>
	</tr>
</table>
<br>


@if (is_array($eleicao) || is_object($eleicao))
<div style="width: 100%;">
	<div style="width: 100%; font-size: 16px;">
		<span class='text-responsive' style="color: #f57e7e; font-weight: bold;">Para você votar é necessário {{ $eleicao->tempo_min }} dias de jogo.</span>
		<span class='text-responsive' style="color: #f57e7e; font-weight: bold;">E também o mínimo de {{ $eleicao->kills_min }} kills.</span><br><br>
	</div>

	@php
	 	$tempojogando = $tempojogando*60;
	    $m = floor(($tempojogando %3600)/60);
	    $h = floor(($tempojogando %86400)/3600);
	    $d = floor(($tempojogando %2592000)/86400);

	    $tempojogandoTxt = "$d dias, $h horas e $m minutos";
	@endphp

	<div class="mainDiv50" style="width: 50%; float: left; "> 
		@if ($d >= $eleicao->tempo_min)
		<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;padding-right: 0;">TOTAL DE TEMPO</span><br><br>
		 <span class='text-responsive' style="    color: green;
    font-weight: bold;
    background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
    background-size: 100% 100%;
    width: 350px;
    height: 60px;
    font-size: 16px;
    font-weight: bold;
    /* color: #fff; */
    margin: auto;
    padding: 1.4em 3.2em;">{{ $tempojogandoTxt }}</span>
		@else
		<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;padding-right: 0;">TOTAL DE TEMPO</span><br><br>
		 <span class='text-responsive' style="color: red;
    font-weight: bold;
    background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
    background-size: 100% 100%;
    width: 350px;
    height: 60px;
    font-size: 16px;
    font-weight: bold;
    /* color: #fff; */
    margin: auto;
    padding: 1.4em 3.2em;">{{ $tempojogandoTxt }}</span>
		@endif
	</div>

	<div class="mainDiv50" style="width: 50%; float: left;"> 
		@if ($kills >= $eleicao->kills_min)
		<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;  width: 350px; padding-left: 0;">TOTAL DE KILLS</span><br><br>
		 <span class='text-responsive' style="color: green;
    font-weight: bold;
    background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
    width: 350px;
    height: 60px;
    background-size: 100% 100%;
    font-size: 16px;
    font-weight: bold;
    /* color: #fff; */
    margin: auto;
    padding: 1.4em 130px;">{{ $kills }} kills</span>
		@else
		<span class='text-responsive' style="color:#fff; font-size: 18px;font-weight: bold;  width: 350px; padding-left:0;">TOTAL DE KILLS</span><br><br>
		 <span class='text-responsive' style="color: red;
    font-weight: bold;
    background: url(../assets/imagens/eleicoes/caixa.png) no-repeat;
    width: 350px;
    height: 60px;
    background-size: 100% 100%;
    font-size: 16px;
    font-weight: bold;
    /* color: #fff; */
    margin: auto;
    padding: 1.4em 130px;">{{ $kills }} kills</span>
		@endif
	</div>

<br/><br/>
</div>
@endif

@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ ucfirst(trans($error)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
<table align="center">
	<tbody>
		<tr>
		    @if (is_array($Imperio) || is_object($Imperio))
			@if($Imperio->empire == 1) <td style="padding: 2em;"><img src="{{ asset('assets/imagens/eleicoes/shinsoo.png') }}" width="250" height="140" /></td>@endif
	
			@if($Imperio->empire == 3)<td style="padding: 2em;"><img src="{{ asset('assets/imagens/eleicoes/jinno.png') }}" width="250" height="140" /></td>@endif
		
			@if($Imperio->empire == 2)<td style="padding: 2em;"><img src="{{ asset('assets/imagens/eleicoes/chunjo.png') }}" width="250" height="140" /></td>@endif
			@endif
		</tr>
	</tbody>
</table>
<table style="
    width: 100%;
    table-layout: fixed;" align="center">
	<tbody>
		<tr>
			@if (is_array($candidatos) || is_object($candidatos))
					@forelse($candidatos as $Candidato)
					@php
						$Personagem = PainelController::UsuarioPersonagem($Candidato->id_player);
					@endphp
					<td class="tdCandidato" style="@if (is_array($candidatovotado) || is_object($candidatovotado))
		                                	@if($Candidato->id == $candidatovotado->id_candidato)
		                                	background: #4caf50;
		                                	@endif
		                                @endif">
                                        <h3>{{ $Personagem->name }}</h3>
		                                <div style="width: 100%;     padding-left: 14%;     z-index: 2;">
		                                
		                                <span class="">
		                                    <div class=" bounceIn animated" data-animate="bounceIn" data-delay="450" style="background: url(../assets/imagens/eleicoes/bg-perso.png); background-size: 100% 100%; width: 210px; height: 100%; padding-top: 1.5em">
		                                       <a href="{{ url('personagem/'.$Personagem->name) }}" style="margin: auto;">
		                                        <img src="{{ asset('assets/imagens/eleicoes/'.$Personagem->job.'.png') }}" class="image-fly img-responsive" width="140" height="90">
		                                    </a>
		                                    </div>
		                                </span>
		                        </div>
		                            <div class="group_info" style="background: url(../assets/imagens/eleicoes/caixa.png); background-size: 100% 100%; width: 290px; height: 55px; color: #11c128; padding-top: 1.4em; font-size: 12px; font-weight: bold;margin-top: -2%;    z-index: 3;">
		                            	@if (!is_array($candidatovotado) && !is_object($candidatovotado))
		                                <form method="POST" action="{{ route('addVoto') }}">
		                                	{{ csrf_field() }}
		                                	<input type="hidden" name="id_cand" value="{{ $Candidato->id }}">
		                                	<button type="submit" style="background-color: Transparent;
																		background-repeat:no-repeat;
																		border: none;
																		overflow: hidden;
																		outline:none;color:#0e0;font-size: 18px;margin-top:-4px;">VOTAR</button>
		                            	</form>
		                            	@else
		                            	@if($Candidato->id == $candidatovotado->id_candidato)
		                            		<span style="color:#fff">VOTADO POR VOCÊ</span>
		                            	@endif
		                            	@endif
		                                <!--<a class="title-5" style="font-weight: bold" href="{{ url('personagem/'.$Personagem->name) }}">Nome: {{ $Personagem->name }}</a>
		                                <!-- <br>
		                                <a>Votos: {{ $Candidato->votos }}</a>
		                                <div class="product-price">
		                                    <span class="price">
		                                        <span class="money">Kills: {{ $Personagem->kills }}</span>
		                                    </span>
		                                </div>
		                                @if (!is_array($candidatovotado) && !is_object($candidatovotado))
		                                <form method="POST" action="{{ route('addVoto') }}">
		                                	{{ csrf_field() }}
		                                	<input type="hidden" name="id_cand" value="{{ $Candidato->id }}">
		                                	<button type="submit" class="btn-success">VOTAR</button>
		                            	</form>
		                            	@else
		                            	@if($Candidato->id == $candidatovotado->id_candidato)
		                            		<span style="color:#fff">SEU VOTO</span>
		                            	@endif
		                            	@endif
		                            	!-->
		                            </div>
		            </td>
		            @empty
		            <td> Nenhum candidato inscrito na eleição... </td>
		            @endforelse
		    @else
		    	<td> Nenhum candidato inscrito na eleição... </td>
		    @endif
		</tr>
	</tbody>
</table>
<div align="right" style="margin-top: -6em; padding-right: 1em;">
	<a href="usuario"><img src="../assets/imagens/doacao/retornar.png" width="80" height="80" /></a>
</div>
<br>
			</td>
		</tr>
	</tbody>
</table>
<!---------------------------------------------------------------------------------------------------------->
						</div></div>
					</div>
</section>
</div>
</div>
</div>

@endsection