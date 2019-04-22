@extends('layout.topo')

@push('layoutstilos')
<!-------------------->

<style> 
	.formCont input[type="text"], input[type="password"] {
		width: 60%;
	}

	.row {
		margin-top: 2em;
	}

	.row:last-child {
		margin-top: 0em;
		font-size: 12px;
		padding-bottom: 1em;
	}

	.row .form div {
		margin-top: 1em;
	}

	.formCont > .row > div {
		background: rgb(22, 25, 27);
		border-radius: 1.5em;
	}	

	.formCont {
		margin-top: 2em;
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
			<h2>Alterar Senha</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
			Preencha os campos abaixo com seus dados corretamente:
		</div>
	</div>
	
	<form class="formCont" action="" method="POST" name="nova_senha" id="nova_senha">
						{{ csrf_field() }}
		<div class="row" style="margin: 0 auto;">
			<div class="col-12 col-md-8" style="margin: 0 auto;">
				<div class="row form">
				
						<div class="col-6 col-md-6" style="text-align: center;">
							Senha de apagar char:
						</div>
						<div class="col-6 col-md-6">
							<input name="social_atual" type="text" id="social_atual" size="7" maxlength="7" autocomplete="social-atual" required />
						</div>

						<div class="col-6 col-md-6" style="text-align: center;">
							E-mail:
						</div>
						<div class="col-6 col-md-6">
							<input name="e_atual" type="text" id="e_atual" autocomplete="mt2plus-in-email" required />
						</div>

						<div class="col-6 col-md-6" style="text-align: center;">
							Nova senha:
						</div>
						<div class="col-6 col-md-6">
							<input name="password" type="password" id="password" onkeyup="forcaSenha(this.value)" required />
						</div>

						<div class="col-6 col-md-6" style="text-align: center;">
							Repita nova senha:
						</div>
						<div class="col-6 col-md-6">
							<input name="conf_senha" type="password" id="conf_senha" autocomplete="mt2plus-in-nova-senha-conf" required />
						</div>

						<div class="col-6 col-md-6" style="text-align: right;">
							<input class="btn btn-primary" name="submit" type="submit" value="ALTERAR">
						</div>
						<div class="col-6 col-md-6">
							<input class="btn btn-warning" name="reset" type="reset" value="LIMPAR">
						</div>
				
				</div>
			</div>
		</div>
	</form>

	<div class="row" style="margin-top:8em;">
		<div class="col-12 col-md-12" style="text-align:center;color:red;">
			Aumente a segurança da sua conta, altere seus dados regularmente!
		</div>
	</div>

</div>
@endsection