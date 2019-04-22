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

</style>
@endpush


@section('conteudo')


<div class="container" style="padding-top: 20px; padding-bottom: 15px">
    <h3>Doação</h3>
    <section class="nk-box-3 bg-dark-1">
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

<p>
    </p><p style="color: #4f4bff">Basta enviar um e-mail com os seguintes dados::</p>
    <div class="email-template">
            <span>Conta:</span><br>
            <span>Forma de Pagamento:</span><br>
            <span>Valor:</span><br>
            <span>Código:</span><br>
            <span>Foto:</span><br>
        </div>
        <br>
    <hr>
    <p>Por favor, envie a coisa toda para este endereço: : <a href="mailto://electryced2.coins@gmx.de">electryced2.coins@gmx.de</a></p>
    <p><i>As moedas serão creditadas em sua conta dentro de 24 horas após o pagamento bem-sucedido.</i></p>
  <p></p>
        <hr>
        <br>

        <h3>Formas de Pagamento</h3>
        <img src="{{ asset('ayora/img/donate/paypal.png') }}" width="150px">
        <img src="{{ asset('ayora/img/donate/paysafe.png') }}" width="150px">
        <img src="{{ asset('ayora/img/donate/googleplay.png') }}" width="130px">
        <img src="{{ asset('ayora/img/donate/pagseguro.png') }}" width="170px" height="60px">
        <img src="{{ asset('ayora/img/donate/picpay.png') }}" width="140px" height="70px">
        <br>
        (Obs: Em breve estaremos aceitando o PaySafeCard como forma de pagamento)
        <hr>
        <br>

        <h3>Comprar Cash</h3>
       	<br>
        

      <div class="row">
		      <div class="col-12 col-md-6" style="background: url(../assets/imagens/doacao/paypal.png) no-repeat;background-size: 100% 100%; display: none;">

		      	<div class="row">
		      		<div class="col-4 col-md-4">
		      		</div>
					<div class="col-4 col-md-4">
						<input type="hidden" name="on0" value="Selecione"><font size="1" style="font-weight: bold;">Selecione</font>
						<br>
						<select id="os0" name="os0">
						<option value="R$">R$15,00</option>
						<option value="R$">R$30,00</option>
						<option value="R$">R$45,00</option>
						<option value="R$">R$60,00</option>
						<option value="R$">R$75,00</option>
						<option value="R$">R$120,00</option>
						<option value="R$">R$160,00</option>
						<option value="R$">R$200,00</option>
						<option value="R$">R$300,00</option>
						<option value="R$">R$450,00</option>
					</select> 
					</div>
					<div class="col-4 col-md-4">
						<input type="hidden" name="on1" value="Conta - ID"><font size="1" style="font-weight: bold;">Conta - ID</font>
						<br>
						<input style="height: 24px;width: 150px;" id="os1" type="text" name="os1" maxlength="30">
					</div>
				</div>

		      </div>

		       <div class="col-12 col-md-6 pr-md-3" style="float: left; background: url(../assets/imagens/doacao/paypal.png) no-repeat;
    background-size: 100% 100%;
    height: 55px;
    margin: auto;
    color: #bbb; margin-top: 1em;">
						    <form style="padding-left: 30%; padding-top: 0.3em;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FGXGDHUC2WW5G">
<table>
<tbody>
	<tr>
		<td width="50%" style="text-transform: uppercase;line-height: 10px">
			<input type="hidden" name="on0" value="Selecione"><font size="1" style="font-weight: bold;">Selecione</font>
		</td>
		<td width="50%" style="text-transform: uppercase;line-height: 10px">
			<input type="hidden" name="on1" value="Conta - ID"><font size="1" style="font-weight: bold;">Conta - ID</font>
		</td>
	</tr>

	<tr>
		<td width="50%">
			<select id="os0" name="os0">
				<option value="R$">R$15,00</option>
				<option value="R$">R$30,00</option>
				<option value="R$">R$45,00</option>
				<option value="R$">R$60,00</option>
				<option value="R$">R$75,00</option>
				<option value="R$">R$120,00</option>
				<option value="R$">R$160,00</option>
				<option value="R$">R$200,00</option>
				<option value="R$">R$300,00</option>
				<option value="R$">R$450,00</option>
			</select> 
		</td>
		<td width="50%">
			<input style="height: 24px;width: 100%;" id="os1" type="text" name="os1" maxlength="30">
		</td>
	</tr>

</tbody>

</table>
</form>
						</div>

		      <div class="col-12 col-md-4" style="padding: 0em 2.5em; margin-top: 1em;">
		      	<div class="doacaoCenter">
		      		<div>
							<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
	<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
	<input type="hidden" name="currency" value="BRL" />
	<input type="hidden" name="receiverEmail" value="joaogabrielbasilva@hotmail.com" />
	<input type="hidden" name="iot" value="button" />
	<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/120x53-doar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
	</form></div>



</div>
</div>

</div>

<div class="row justify-content-md-center">

     <div class="col-12 col-md-4" style="margin-top: 3em;">
	     <div class="responsiveDoacao" style="width: 200px;font-size: 12px;
																background-color: #fefefe;
																 border-radius: 0.5rem; color: rgba(41, 46, 49, 1.00);padding-bottom: 0.3em;margin: auto;">
									<img style="border-radius: 0.5rem 0.5rem 0rem 0rem;" src="{{ asset('/assets/imagens/doacao/caixa.png') }}" width="100%" height="50">
									<div style="margin: 0.5em auto;text-align: center;">
										<strong>Conta Poupança</strong>
										<br>
										<strong>Agência:</strong> 0886.013
										<br>
										<strong>Conta:</strong> 10898-7
										<br>
										<strong>Titular:</strong> Bruno Maurício Nyland
									</div>
								</div>
						</div>

						<div class="col-12 col-md-4" style="margin-top: 3em;">
	     <div class="responsiveDoacao" style="width: 200px;font-size: 12px;
																background-color: #fff212;
																 border-radius: 0.5rem; color: rgba(41, 46, 49, 1.00);padding-bottom: 0.3em;margin: 0px 10px;">
									<img style="border-radius: 0.5rem 0.5rem 0rem 0rem;" src="{{ asset('/assets/imagens/doacao/bb.png') }}" width="100%" height="50">
									<div style="margin: 0.5em auto;text-align: center;">
										<strong>Conta Corrente</strong>
										<br>
										<strong>Agência:</strong> 4336-2
										<br>
										<strong>Conta:</strong> 18064-5
										<br>
										<strong>Titular:</strong>  Larissa B Almeida
									</div>
								</div>
						</div>


						<div class="col-12 col-md-4" style="margin-top: 3em;">
								<div class="responsiveDoacao" style="width: 150px;font-size: 12px;background-color: #fefefe; border-radius: 0.5rem; color: rgba(41, 46, 49, 1.00);margin: 0px 20px;padding-bottom: 0.3em;">
									<img style="border-radius: 0.5rem 0.5rem 0rem 0rem;" src="{{ asset('ayora/img/donate/picpay.png') }}" width="100%" height="50">
									<div style="margin: 0.5em auto;text-align: center;">
										<strong>@joao.gabriel.benicio</strong>
									</div>
								</div>
						</div>
</div>
    </section>
</div>
@endsection