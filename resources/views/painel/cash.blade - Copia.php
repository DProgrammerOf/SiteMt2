@extends('layout.topo')
@push('layoutstilos')
<style type="text/css">

ul#pagseguro li {
    display:inline;
    clear: both; 
    list-style-type: none;
}

.maincontent {
	background-size: 100% 100% !important;
}

#tabelacash td{
 border: 2px solid #fff;
}

#tabelapaypal td {
}

input[type="text"]#os1 {
    color: #fff;
    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 150px 30px;
    height: 30px;
    width: 150px;
    border: none;
    text-align: center;
}

#os0 {
	margin-top: -1em;
	border: transparent;
    background-color: transparent;
    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 150px 30px;
    height: 30px;
    width: 150px;
    text-align: center;
    padding-left: 4em;

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
      <div id="content" class="container clearfix maincontent" style="padding-bottom: 5em;background: url(../assets/imagens/doacao/bg.png) no-repeat !important;background-size: 100% 100% !important;position: relative;">
<section class="row content">
	<div id="col-main" class="container clearfix">
<!---------------------------------------------------------------------------------------------------------->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td >
<br/><br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 0.5em;">
	<tr>
		<td width="38%"><div align="left"><a href="usuario"><img src="../assets/imagens/doacao/retornar.png" width="80" height="80" /></a></div></td>
		<td>
			<img src="../assets/imagens/doacao/doacao.png" width="250" height="80" />
		</td>
		<td >
			
		</td>
		<td width="40%"><div align="center"></div></td>
	</tr>
</table>
<br/><br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<div>
				<div class="content_phoenix">
					<div class="tabs_phoenix-content_phoenix">
						<div class="tabs_phoenix-menu_phoenix clearfix">

						<div style="background: url(../assets/imagens/doacao/tabela-bg.png) no-repeat; background-size: 100% 100%; width: 60%; height: 112%; float: left;">
							<div style="    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 260px 60px;
    margin: auto;
    width: 260px;
    height: 60px;
        padding-top: 1em;
    font-weight: bold;
    font-size: 20px;">
								TABELA DE CASH
							</div>
							<br>
							<table id="tabelacash" style="width: 70%;margin: auto;">
								 <tr>
								   <th width="25%">Quantidade</th>
								   <th width="25%">Valor</th>
								   <th width="15%">Bônus</th>
								   <th width="35%">Cash a Receber</th>
								 </tr>
								 @foreach( $pagseguro as $PagDados)
								 <tr>
								   <td>{{ $PagDados->cash }}</td>
								   <td>R${{ $PagDados->valor }}</td>
								   <td>+{{ $PagDados->bonus }}%</td>
								   <td>{{ ($PagDados->cash + ($PagDados->cash * ($PagDados->bonus / 100))) }}</td>
								 </tr>
								 @endforeach
							</table><br>
							<div style="width: 70%;margin: auto;">
<p style="font-size: 10px;text-align: left; color: #dedddc;">
	<strong style="color: #e00;">OBS¹:</strong> Caso ocorra uma promoção de cash o valor BÔNUS se torna 0% para qualquer valor e o valor da promoção será sobre o valor da Quantidade.<br>
<span style="font-style: italic;"><strong style="color: #e00;">Ex:</strong> Caso está ocorrendo um evento dobro cash e o usuário donata 50k de cash, ele irá receber o dobro cash sobre sobre o o valor da quantidade que nesse caso é 50K então será 50K x2 = 100k de cash ele irá receber em sua conta. O valor BÔNUS ele não é acumulativo, ele só é aplicado sobre o valor donatado, logo assim caso você donate 2x ou mais o valor não se acumula.</span>
<br><br>
<strong style="color: #e00;">OBS²:</strong> Após efetuar a donatação envie o comprovante, juntamente com id da conta para o WhatsApp: (73) 99155-1500 [DEV]Apple.
<br><br><br><br><br>
</p>
</div>
						</div>
						<div style="width: 40%; float: left;">
							<div style="background: url(../assets/imagens/doacao/pagseguro.png) no-repeat;
    background-size: 275px 80px;
    margin: auto;
    width: 275px;
    height: 80px;
    padding-top: 1em;">
							</div>
							<br>
							<div>
								<ul id="pagseguro">
									@foreach($pagseguro as $PagSeguroDados)
									<li><a target="_blank" href="{{ $PagSeguroDados->link }}"><img src="{{ asset('assets/imagens/doacao/'.$PagSeguroDados->img) }}" width="150px" /></a></li>
									@endforeach


								</ul>
							</div>
						</div>
						<div style="float: left; background: url(../assets/imagens/doacao/paypal.png) no-repeat;
    background-size: 100% 100%;
    width: 38%;
    height: 55px;
    margin: auto;
    margin-left: 1em;color: #000;">
						    <form style="padding-left: 30%; padding-top: 0.3em;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FGXGDHUC2WW5G">
<table id="tabelapaypal">
<tbody>
	<tr>
		<td width="25%" style="text-transform: uppercase;">
			<input type="hidden" name="on0" value="Selecione"><font size="1" style="font-weight: bold;">Selecione</font>
		</td>
		<td width="25%" style="text-transform: uppercase;">
			<input type="hidden" name="on1" value="Conta - ID"><font size="1" style="font-weight: bold;">Conta - ID</font>
		</td>
	</tr>

	<tr>
		<td width="25%">
			<select id="os0" name="os0">
				<option value="R$">R$ R$15,00</option>
				<option value="R$">R$ R$30,00</option>
				<option value="R$">R$ R$45,00</option>
				<option value="R$">R$ R$60,00</option>
				<option value="R$">R$ R$75,00</option>
				<option value="R$">R$ R$120,00</option>
				<option value="R$">R$ R$160,00</option>
				<option value="R$">R$ R$200,00</option>
				<option value="R$">R$ R$300,00</option>
				<option value="R$">R$ R$450,00</option>
			</select> 
		</td>
		<td width="25%">
			<input style="margin-top: -1em;" id="os1" type="text" name="os1" maxlength="200">
		</td>
	</tr>

</tbody>

</table>
</form>
						</div>

							<div style="float: left; width: 40%; margin-top: 1em;">

								<div style="width: 100%">
									<div style="    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 150px 60px;
    margin: auto;
    width: 150px;
    height: 60px;
        padding-top: 1em;
    font-weight: bold;
    font-size: 20px; clear: both;">
								BANCOS
							</div>
								</div>

								<div style="width: 100%">
<div style="width: 50%; float: left;">
									<div style="    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 200px 60px;
    margin: auto;
    width: 200px;
    height: 60px;
        padding-top: 1.5em;
    font-weight: bold;
    font-size: 14px;">
								Conta Poupança
							</div></div>
							<div style="width: 50%;  margin-left: 50%;">
							<div style="    background: url(../assets/imagens/doacao/input.png) no-repeat;
    background-size: 200px 60px;
    margin: auto;
    width: 200px;
    height: 60px;
        padding-top: 1.5em;
    font-weight: bold;
    font-size: 14px">
								Conta Corrente
							</div></div>
								</div>
								@foreach($bancos as $BancoDados)


							<div style="width: 50%; font-size: 12px;
							@if($BancoDados->banco == 1)
								background-color: #f9dd1a;
								@elseif($BancoDados->banco == 2)
								background-color: #0070b8;
								@elseif($BancoDados->banco == 3)
								background-color: #cc0a2f;
								@endif
							 border-radius: 1rem; color: #fff; float: left; margin-left: 0em; background: url('../assets/imagens/doacao/banco-bg.png') 0px no-repeat; background-size: 100% 100%; padding-top: 1.4em; padding-left: 0.3em;">
								<img 
								@if($BancoDados->banco == 1)
								src="{{ asset('assets/imagens/doacao/bb.png') }}" width="78%"
								@elseif($BancoDados->banco == 2)
								src="{{ asset('assets/imagens/doacao/caixa.png') }}" width="78%"
								@elseif($BancoDados->banco == 3)
								src="{{ asset('images/bancobradesco.png') }}" width="78%"
								@endif height="50"  />
								<br>
								<strong>Agência:</strong> {{ $BancoDados->agencia }}
								<br>
								<strong>Conta:</strong> {{ $BancoDados->conta }}
								<br>
								<strong>Titular:</strong> {{ $BancoDados->titular }}
								<br>&nbsp;
							</div>
							
							@endforeach


					
							
							<!--div style="float: left; margin-left: 5rem; font-size: 14px; background-color: #0070b8; border-radius: 1rem; color: #000;" ">
								<img style="border-radius: 1rem;" src="{{ asset('images/caixaeconomica.jpeg') }}" height="100" width="200" />
								<br>
								<strong>Agência:</strong> 0886.013
								<br><br>
								<strong>Conta:</strong> 10898-7
								<br><br>
								<strong>Titular:</strong> Bruno Maurício Nyland
								<br>&nbsp;
							</div>
							
							<div style="float: left; margin-left: 5rem; font-size: 14px; background-color: #cc0a2f; border-radius: 1rem; color: #000;" ">
								<img style="border-radius: 1rem;" src="{{ asset('images/bancobradesco.png') }}" height="100" width="200" />
								<br>
								<strong>Agência:</strong> x
								<br><br>
								<strong>Conta:</strong> x
								<br><br>
								<strong>Titular:</strong> x
								<br>&nbsp;	
							</div>
							<br><br>&nbsp;
						</div!-->

						</div>

						
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
			</td>
		</tr>
	</tbody>
</table>
<!---------------------------------------------------------------------------------------------------------->
						</div>
					
</section>
</div>
</div>
</div>

<div class="container" style="padding-top: 20px; padding-bottom: 15px">
    <h3>Doação</h3>
    <section class="nk-box-3 bg-dark-1">

<p>
    </p><p style="color: #4f4bff">Einfach eine E-Mail mit folgenden Daten senden:</p>
    <div class="email-template">
            <span>Account ID: test123</span><br>
            <span>Zahlungsart:</span><br>
            <span>Betrag:</span><br>
            <span>Code:</span><br>
        </div>
        <br>
    <hr>
    <p>Das Ganze dann bitte an dieser Adresse senden: <a href="mailto://electryced2.coins@gmx.de">electryced2.coins@gmx.de</a></p>
    <p><i>Die Coins werden dann bei erfolgreicher Zahlung innerhalb von 24 Stunden auf euren Account gutgeschrieben.</i></p>
  <p></p>
        <hr>
        <br>

        <h3>Spendenmöglichkeiten</h3>
        <img src="https://dev.team-quantum.org/Ayora2/assets/img/donate/paypal.png">
        <img src="https://dev.team-quantum.org/Ayora2/assets/img/donate/paysafe.png">
        <img src="https://dev.team-quantum.org/Ayora2/assets/img/donate/googleplay.png">

        <hr>
        <br>

        <h3>Preisliste</h3>

        <h4 class="color">TABELA DE CASH</h4>
        <table class="table">
            <thead class="color underlined">
            <tr> 
            <th>Quantidade</th>
								   <th>Valor</th>
								   <th>Bônus</th>
								   <th>Cash a Receber</th></tr>
            </thead>
            <tbody>
             @foreach( $pagseguro as $PagDados)
								 <tr>
								   <td>{{ $PagDados->cash }}</td>
								   <td>R${{ $PagDados->valor }}</td>
								   <td>+{{ $PagDados->bonus }}%</td>
								   <td>{{ ($PagDados->cash + ($PagDados->cash * ($PagDados->bonus / 100))) }}</td>
								 </tr>
								 @endforeach
            </tbody></table>
        <hr>
        <h4 class="color">Paypal</h4>
        <table class="table">
            <thead class="color underlined">
            <tr> <th>Euro</th> <th>Coins</th></tr>
            </thead>
            <tbody>
            <tr> <td>10€</td> <td>3.000</td></tr>
            <tr> <td>20€</td> <td>7.000</td></tr>
            <tr> <td>25€</td> <td>9.000</td></tr>
            <tr> <td>50€</td> <td>20.000</td></tr>
            <tr> <td>75€</td> <td>30.000</td></tr>
            <tr> <td>100€</td> <td>50.000</td></tr>
            </tbody></table>
        <hr>
        <h4 class="color">Google Play Card</h4>
        <table class="table">
            <thead class="color underlined">
            <tr> <th>Euro</th> <th>Coins</th></tr>
            </thead>
            <tbody>
            <tr> <td>10€</td> <td>3.000</td></tr>
            <tr> <td>20€</td> <td>7.000</td></tr>
            <tr> <td>25€</td> <td>9.000</td></tr>
            <tr> <td>50€</td> <td>20.000</td></tr>
            <tr> <td>75€</td> <td>30.000</td></tr>
            <tr> <td>100€</td> <td>50.000</td></tr>
            </tbody></table>
        <br>
    </section>
</div>
@endsection