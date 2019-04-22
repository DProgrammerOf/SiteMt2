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
		margin-top: 4em;
		font-size: 12px;
	}

	.row .form div {
		margin-top: 1em;
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
			<h2>Desbugar Char</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12" style="text-align:center; color:red;font-weight: bold;">
			Para desbugar o Personagem ele deve encontrar-se deslogado do Jogo!
			<br>Selecione o Personagem que deseja desbugar: 
		</div>
	</div>

	<div class="row">
		@if(!is_null($ContaPersos))
		@foreach($ContaPersos as $Personagem)
		<div class="col-12 col-md-12" style="text-align:center;margin-top:1em;">
					<form name='form1' action='' method="POST" >
			
					{{ csrf_field() }}
					<input class="btn btn-default" style='color: #000;' name='nameperso' type='submit' id='nameperso' 
					onclick="return confirm('Ao desbugar, {{ $Personagem->name }} voltará para a vila 1.')" value='{{ $Personagem->name }}'>
				
					</form>
		</div>
		@endforeach
		@else
		<div class="col-12 col-md-12" style="text-align:center;">
					<span style="color: white;">Nenhum personagem nessa conta.</span>
		</div>
		@endif
	</div>

	<div class="row" style="margin-top:8em;">
		<div class="col-12 col-md-12" style="text-align:center;color:red;">
			Aumente a segurança da sua conta, altere seus dados regularmente!
		</div>
	</div>

</div>
@endsection