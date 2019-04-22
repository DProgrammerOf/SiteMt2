@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Eventos
@endsection

@section('conteudo')
<div class="container-fluid">
		 <div class="row">
		 	<div class="col-lg-12 col-md-12">
								 		<!-- Button trigger modal -->
						@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ ucfirst(trans($error)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

					<!-- Modal -->
					@foreach( $eventos as $Evento )
					<div class="modal fade" id="eventoModal{{$Evento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Evento (<font color="#5db461">{{$Evento->titulo}}</font>)</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{ route('attEvento') }}">
					      <div class="modal-body">
					        	 {{ csrf_field() }}
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Titulo</label>
								    <input type="text" class="form-control" name="titulo_evento" value="{{$Evento->titulo}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Descrição</label>
								    <input type="text" class="form-control" name="desc_evento" value="{{$Evento->desc}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Link de Redirecionamento</label>
								    <input type="text" class="form-control" name="link_evento" value="{{$Evento->link}}">
								  </div>
								  <input type="hidden" name="id_evento" value="{{$Evento->id}}">
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
					      </div>
					 	 </form>
					    </div>
					  </div>
					</div>
					@endforeach
			</div>
		 </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Paginas</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#eventos" data-toggle="tab">
                             Eventos
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="eventos">
                      <table class="table">
                        <tbody>
                        	@foreach( $eventos as $Evento )
                          <tr>
                            <td style="font-weight: bold;">
                            	{{ $Evento->titulo }}
                            </td>
                            <td>
                              {{ $Evento->desc }}
                            </td>
                            <td><a href="{{ $Evento->link }}" target="_blank">{{ $Evento->link }}</a></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#eventoModal{{$Evento->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Evento->visivel == 1)
                             <form action="{{ route('desativarEvento', $Evento->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                          	</form>
                            @else
                            <form action="{{ route('ativarEvento', $Evento->id) }}">
                            	<button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          	@endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('js')
    @if (session('attEventoOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('attEventoOk') }}", 'success');</script>
    @elseif (session('attEventoErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('attEventoErro') }}", 'danger');</script>
    @endif

    @if (session('ativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisOk') }}", 'success');</script>
    @elseif (session('desativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('desativarVisOk') }}", 'warning');</script>
    @elseif (session('ativarVisErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisErro') }}", 'danger');</script>
    @endif
@endsection
