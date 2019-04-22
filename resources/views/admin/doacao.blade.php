@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Doações
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

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cashModalAdd">
            Adicionar Cash
          </button>

          <div class="modal fade" id="cashModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar Cash</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('addCash') }}">
                <div class="modal-body">
                     {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Login da Conta</label>
                    <input required type="text" class="form-control" name="login_acc" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Cash</label>
                    <input required type="text" class="form-control" name="cash_acc" placeholder="0">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
             </form>
              </div>
            </div>
          </div>

					<!-- Modal -->
					@foreach( $pagseguro as $PagDados )
					<div class="modal fade" id="pagseguroModal{{$PagDados->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">PagSeguro (<font color="#5db461">R${{$PagDados->valor}}</font>)</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{ route('attDoacaoPagSeguro') }}">
					      <div class="modal-body">
					        	 {{ csrf_field() }}
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Valor do pagamento</label>
								    <input type="number" class="form-control" name="valor_pag" value="{{$PagDados->valor}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Cash</label>
								    <input type="number" class="form-control" name="cash_pag" value="{{$PagDados->cash}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Bônus (em %)</label>
								    <input type="number" class="form-control" name="bonus_pag" value="{{$PagDados->bonus}}">
								  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Imagem referência</label>
                    <input type="text" class="form-control" name="img_pag" value="{{$PagDados->img}}">
                  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Link de redirecionamento</label>
								    <input type="text" class="form-control" name="link_pag" value="{{$PagDados->link}}">
								  </div>
								  <input type="hidden" name="id_pag" value="{{$PagDados->id}}">
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


					<!-- Modal -->
					@foreach( $banco as $BancoDados )
					<div class="modal fade" id="bancoModal{{$BancoDados->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Banco (@if($BancoDados->banco == 1)
                              Banco do Brasil
                              @elseif($BancoDados->banco == 2)
                              Caixa
                              @elseif($BancoDados->banco == 3)
                              Bradesco
                              @endif)</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{ route('attDoacaoBanco') }}">
					      <div class="modal-body">
					        	 {{ csrf_field() }}
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Agência</label>
								    <input type="text" class="form-control" name="agencia_pag" value="{{$BancoDados->agencia}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Conta</label>
								    <input type="text" class="form-control" name="conta_pag" value="{{$BancoDados->conta}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Titular</label>
								    <input type="text" class="form-control" name="titular_pag" value="{{$BancoDados->titular}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlSelect1">Banco</label>
								    <select class="form-control" id="exampleFormControlSelect1" name="banco_pag">
								      <option value="1" @if($BancoDados->banco == 1) selected @endif>Banco do Brasil</option>
								      <option value="2" @if($BancoDados->banco == 2) selected @endif>Caixa</option>
								      <option value="3" @if($BancoDados->banco == 3) selected @endif>Bradesco</option>

								    </select>
  								  </div>
								  <input type="hidden" name="id_pag" value="{{$BancoDados->id}}">
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
                      <span class="nav-tabs-title">Formas de Doações</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#pagseguro" data-toggle="tab">
                             PagSeguro
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#bancos" data-toggle="tab">
                             Bancos
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="pagseguro">
                      <table class="table">
                        <tbody>
                        	@foreach( $pagseguro as $PagDoacao )
                          <tr>
                            <td style="color: #5db461;">
                            	R${{ $PagDoacao->valor }}
                            </td>
                            <td>
                             {{ $PagDoacao->cash }} Cash + {{ ($PagDoacao->cash * ($PagDoacao->bonus / 100)) }} Cash (Bônus: {{ $PagDoacao->bonus }}%)
                            </td>
                            <td><a href="{{ $PagDoacao->link }}" target="_blank">{{ $PagDoacao->link }}</a></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#pagseguroModal{{$PagDoacao->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($PagDoacao->visivel == 1)
                             <form action="{{ route('desativarDoacao', $PagDoacao->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                          	</form>
                            @else
                            <form action="{{ route('ativarDoacao', $PagDoacao->id) }}">
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
                    <div class="tab-pane" id="bancos">
                      <table class="table">
                        <tbody>
                        	@foreach( $banco as $BancoDoacao )
                          <tr>
                            <td style="font-weight: bold;">
                              @if($BancoDoacao->banco == 1)
                              Banco do Brasil
                              @elseif($BancoDoacao->banco == 2)
                              Caixa
                              @elseif($BancoDoacao->banco == 3)
                              Bradesco
                              @endif
                            </td>
                            <td>{{ $BancoDoacao->titular }}</td>
                            <td>Conta: {{ $BancoDoacao->conta }}</td>
                            <td>Agência: {{ $BancoDoacao->agencia }}</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#bancoModal{{$BancoDoacao->id}}">
                                <i class="material-icons">edit</i>
                              </button>

                            @if($BancoDoacao->visivel == 1)
                             <form action="{{ route('desativarDoacao', $BancoDoacao->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                          	</form>
                            @else
                            <form action="{{ route('ativarDoacao', $BancoDoacao->id) }}">
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
    @if (session('attPagseguroOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('attPagseguroOk') }}", 'success');</script>
    @elseif (session('attPagseguroErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('attPagseguroErro') }}", 'danger');</script>
    @endif

    @if (session('attBancoOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('attBancoOk') }}", 'success');</script>
    @elseif (session('attBancoErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('attBancoErro') }}", 'danger');</script>
    @endif

    @if (session('ativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisOk') }}", 'success');</script>
    @elseif (session('desativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('desativarVisOk') }}", 'warning');</script>
    @elseif (session('ativarVisErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisErro') }}", 'danger');</script>
    @endif
@endsection
