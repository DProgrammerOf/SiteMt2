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
			<h2>Alterar/Ver 
			<br>Senha do Armazem</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
			Preencha os campos abaixo com seus dados corretamente:
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6" style="text-align:center;">
			<form class="formCont" action="" method="POST" name="novo_codarmazem" id="novo_codarmazem">
					<div class="row form">
					{{ csrf_field() }}
							<div class="col-6 col-md-6" style="text-align: center;">
								Senha de apagar char:
							</div>
							<div class="col-6 col-md-6">
								<input name="social_id_atual" type="text" id="social_id_atual" size="7" maxlength="7" autocomplete="social-atual" required />
							</div>

							<div class="col-6 col-md-6" style="text-align: center;">
								Senha do armazém:
							</div>
							<div class="col-6 col-md-6">
								<input name="password_safebox_atual" type="text" id="password_safebox_atual" size="7" maxlength="7" autocomplete="mt2live-in-armazem-atual" required />
							</div>

							<div class="col-6 col-md-6" style="text-align: center;">
								Nova senha do armazém:
							</div>
							<div class="col-6 col-md-6">
								<input name="password_safebox_novo" type="text" id="password_safebox_novo" size="6" maxlength="6" required="">
							</div>

							<div class="col-6 col-md-6" style="text-align: right;">
								<input class="btn btn-primary" name="submit" type="submit" value="ALTERAR">
							</div>
							<div class="col-6 col-md-6" style="text-align: left;">
								<input class="btn btn-warning" name="reset" type="reset" value="LIMPAR">
							</div>
					</div>
			</form>
		</div>

		<div class="col-12 col-md-6" style="text-align:center;">
			<form class="formCont" action="{{ URL::route('painelusuariogerarcodigoarmazempost') }}" method="POST" name="novo_codarmazem" id="novo_codarmazem" >
					<div class="row form">
							{{ csrf_field() }}
							<div class="col-12 col-md-12" style="text-align: center;font-size:13px;">
								Pedido: <font color="red">(Senha do Armazém)</font>
							</div>

							<div class="col-12 col-md-12" style="text-align: center;font-size:13px;">
								uma nova senha: (senha do armazém) gerada através do nosso sistema!
							</div>

							<div class="col-5 col-md-5" style="text-align: right;margin-top:2em;">
								E-Mail:
							</div>
							<div class="col-7 col-md-7" style="text-align: left;margin-top:2em;">
								<input style="width:60%" name="email" type="text" id="email" size="64" maxlength="64" autocomplete="social-atual" required />
							</div>

							<div class="col-12 col-md-12" style="text-align: center;">
								<input class="btn btn-primary" name="submit" type="submit" value="ENVIAR">
							</div>
					</div>
			</form>
		</div>
	</div>


	<div class="row" style="margin-top:8em;">
		<div class="col-12 col-md-12" style="text-align:center;color:red;">
			Aumente a segurança da sua conta, altere seus dados regularmente!
		</div>
	</div>

</div>
@endsection