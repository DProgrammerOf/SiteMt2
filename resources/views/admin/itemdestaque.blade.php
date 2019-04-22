@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Itens Destaques
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemModalAdd">
            Adicionar Item
          </button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#itemModalDel">
            Remover Item
          </button>

          <div class="modal fade" id="itemModalDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Remover Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('delItemDestaque') }}">
                <div class="modal-body">
                     {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Id do Item</label>
                    <input required type="number" class="form-control" name="id_item" placeholder="0">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Remover</button>
                </div>
             </form>
              </div>
            </div>
          </div>


          <div class="modal fade" id="itemModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('addItemDestaque') }}">
                <div class="modal-body">
                     {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Imagem referência</label>
                    <input required type="text" class="form-control" name="img_item" placeholder="ExemploImagem.png">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Dia da semana</label>
                    <select required class="form-control" id="exampleFormControlSelect1" name="lista_item">
                      <option value="1">Segunda-Feira</option>
                      <option value="2">Terça-Feira</option>
                      <option value="3">Quarta-Feira</option>
                      <option value="4">Quinta-Feira</option>
                      <option value="5">Sexta-Feira</option>
                      <option value="6">Sábado</option>
                      <option value="7">Domingo</option>
                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="comment">Texto:</label><br>
                    <textarea required class="form-control" rows="10" id="texto_item" name="texto_item">
<div><strong><font color='#ffa500'>Nome do Item</font></strong>
<br>
<br>Usado para transmutação de armadura.
<br><font color='red'>Quantidade: 1</font>
<br><font color='green'>Valor em Cash: 20.000</font>
<br>
<br>Item negociável.
  </div></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Adicionar Item</button>
                </div>
             </form>
              </div>
            </div>
          </div>

					<!-- Modal -->
					@foreach( $itens as $Item )
					<div class="modal fade" id="itemModal{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Item</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{ route('attItemDestaque') }}">
					      <div class="modal-body">
					        	 {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Imagem referência</label>
                    <input required type="text" class="form-control" name="img_item" value="{{$Item->img}}">
                  </div>
								  <div class="form-group">
                    <label for="exampleFormControlSelect1">Dia da semana</label>
                    <select required class="form-control" id="exampleFormControlSelect1" name="lista_item">
                      <option value="1" @if($Item->id_lista == 1) selected @endif>Segunda-Feira</option>
                      <option value="2" @if($Item->id_lista == 2) selected @endif>Terça-Feira</option>
                      <option value="3" @if($Item->id_lista == 3) selected @endif>Quarta-Feira</option>
                      <option value="4" @if($Item->id_lista == 4) selected @endif>Quinta-Feira</option>
                      <option value="5" @if($Item->id_lista == 5) selected @endif>Sexta-Feira</option>
                      <option value="6" @if($Item->id_lista == 6) selected @endif>Sábado</option>
                      <option value="7" @if($Item->id_lista == 7) selected @endif>Domingo</option>
                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="comment">Texto:</label><br>
                    <textarea required class="form-control" rows="10" id="texto_item" name="texto_item">{{$Item->texto}}</textarea>
                  </div>
								  <input type="hidden" name="id_item" value="{{$Item->id}}">
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
                      <span class="nav-tabs-title">Itens em Destaque</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#primeira" data-toggle="tab">
                             Segunda-Feira
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#segunda" data-toggle="tab">
                             Terça-Feira
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#terceira" data-toggle="tab">
                             Quarta-Feira
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#quarta" data-toggle="tab">
                             Quinta-Feira
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#quinta" data-toggle="tab">
                             Sexta-Feira
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#sexta" data-toggle="tab">
                             Sábado
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#setima" data-toggle="tab">
                             Domingo
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">

                    <div class="tab-pane active" id="primeira">
                      <table class="table">
                        <tbody>
                        	@foreach( $itens as $Item )
                          @if($Item->id_lista == 1)
                          <tr>
                            <td style="font-weight: bold">
                            	{{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                          	</form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                            	<button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="segunda">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 2)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="terceira">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 3)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="quarta">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 4)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="quinta">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 5)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="sexta">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 6)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="setima">
                      <table class="table">
                        <tbody>
                          @foreach( $itens as $Item )
                          @if($Item->id_lista == 7)
                          <tr>
                            <td style="font-weight: bold">
                              {{ $Item->id }}
                            </td>
                            <td>
                             {{ $Item->img }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#itemModal{{$Item->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                             @if($Item->visivel == 1)
                             <form action="{{ route('desativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarItem', $Item->id) }}">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                            </td>
                          </tr>
                          @endif
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
