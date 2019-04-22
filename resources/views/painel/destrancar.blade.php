@extends('layout.topo')
@push('layoutstilos')
<style> 
	.formCont input[type="text"], input[type="password"] {
		width: 60%;
	}

	.row {
		margin-top: 2em;
	}

	.row:last-child {
		margin-top: 2em;
	}

	.row .form div {
		margin-top: 1em;
	}

	#etapa2 {
		text-align:center;
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
			<h2>Desbloquear Conta</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center;">
			<h4>Etapa 1</h4>
		</div>
		<div class="col-12 col-md-12" style="text-align:center;">
			<p style="color:#fff;">Receba seu código de destrancamento via E-mail.</p>
		</div>
		<div class="col-12 col-md-12" style="text-align:center;">
			<a href="destrancarcontaemail">
				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Send-email.svg/750px-Send-email.svg.png" width="120px" height="70px" />
			</a>
		</div>
	</div>
	<br><br><br>

	<div id="etapa2">
			<h4>Etapa 2</h4>
			<p style="color: #fff">Informe seu E-mail e o código de destrancamento.</p>
			<form method="post" action="destrancarcontaemail">
				{{ csrf_field() }}
				<table align="center">
					<tr>
						<td style="padding: 1rem;">E-mail:&nbsp;&nbsp;&nbsp;</td>
						<td style="padding: 1rem;"><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td style="padding: 1rem;">Código:&nbsp;&nbsp;&nbsp;</td>
						<td style="padding: 1rem;"><input type="text" name="codigo" /></td>
					</tr>
					<tr>
						<td colspan="2" style="padding: 1rem;"><button type="submit" class="btn btn-success">Destrancar</button></td>
					</tr>
				</table>
			</form>
		</div>

	<div class="row" style="margin-top:8em;">
		<div class="col-12 col-md-12" style="text-align:center;color:red;">
			Aumente a segurança da sua conta, altere seus dados regularmente!
		</div>
	</div>

</div>

@endsection