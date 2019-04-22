@extends('layout.topo')


@section('conteudo')

<div class="container bg-dark-1">

	<div class="row" style="padding: 3em 0;">
		<div class="col-12 col-md-12" style="text-align:center;">
			<form action="" method="POST">
				{{ csrf_field() }}
				<div class="form-group" style="margin: 0 auto 2em auto;">
					<label for="email"><h3>Informe seu E-mail</h3></label>
					<input type="email" class="form-control" id="email" placeholder="Digite aqui um e-mail válido." name="email" style="width: 80%; border-radius: 1em; margin: auto; text-align:center;">
				</div>
				<div style="font-size:12px;">
					OBS: Será enviado um e-mail de nosso sistema com usuário e senha de sua conta.
					<br>
					OBS²: Caso exista mais de uma conta cadastrada, o e-mail informará todas.
				</div>
				<br>
				<button type="submit" class="btn btn-default">Recuperar Senha</button>
		</form>
		</div>
	</div>

</div>

@endsection