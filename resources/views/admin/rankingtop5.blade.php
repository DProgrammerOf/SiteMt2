@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Ranking Top 5
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

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rankModalAdd">
            Adicionar Ranking
          </button>

          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rankModelDel">
            Limpar Ranking
          </button>

          <div class="modal fade" id="rankModelDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{ route('delRanking') }}">
                        <div class="modal-body">
                             {{ csrf_field() }}
                          <h4>Categoria</h4>
                          <div class="form-group">
                              <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                                <option value="guerreiro">Top Guerreiro</option>
                                <option value="ninja">Top Ninja</option>
                                <option value="shura">Top Shura</option>
                                <option value="shaman">Top Shaman</option>
                                <option value="pvpgeral">Top PvP Geral</option>
                              </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-danger">Limpar</button>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>

          @foreach($topall as $Rank)

          <div class="modal fade" id="rankingTop{{$Rank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Alterar Personagem</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{ route('attRanking') }}">
                        <div class="modal-body">
                             {{ csrf_field() }}
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nickname</label>
                            <input required type="text" class="form-control" name="perso" value="{{$Rank->NickName}}">
                          </div>
                        </div>
                        <input type="hidden" name="id_rank" value="{{$Rank->id}}">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-warning">Salvar mudança</button>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>

          @endforeach

          <div class="modal fade" id="rankModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar Ranking</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('addRanking') }}">
                <div class="modal-body">
                     {{ csrf_field() }}
                    <h4>Posição: 1°</h4>
                  <div class="form-group">
                    <input type="text" class="form-control" name="perso_1" placeholder="Nick do personagem...">
                  </div><br>
                    <h4>Posição: 2°</h4>
                  <div class="form-group">
                    <input type="text" class="form-control" name="perso_2" placeholder="Nick do personagem...">
                  </div><br>
                    <h4>Posição: 3°</h4>
                  <div class="form-group">
                    <input type="text" class="form-control" name="perso_3" placeholder="Nick do personagem...">
                  </div><br>
                    <h4>Posição: 4°</h4>
                  <div class="form-group">
                    <input type="text" class="form-control" name="perso_4" placeholder="Nick do personagem...">
                  </div><br>
                    <h4>Posição: 5°</h4>
                  <div class="form-group">
                    <input type="text" class="form-control" name="perso_5" placeholder="Nick do personagem...">
                  </div>
                </div><br>
                <h4>Categoria</h4>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                      <option value="guerreiro">Top Guerreiro</option>
                      <option value="ninja">Top Ninja</option>
                      <option value="shura">Top Shura</option>
                      <option value="shaman">Top Shaman</option>
                      <option value="pvpgeral">Top PvP Geral</option>

                    </select>
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
					
					<div class="modal fade" id="topGuerreiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Top 5 Guerreiros</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form method="POST" action="{{ route('attDoacaoPagSeguro') }}">
					      <div class="modal-body">
					        	 {{ csrf_field() }}
                     @foreach( $topguerreiro as $Jogador )
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Nome: </label>
								    <input type="number" class="form-control" name="guerreiro" value="{{$Jogador->NickName}}">
								  </div>
                    @endforeach
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
					      </div>
					 	 </form>
					    </div>
					  </div>
					</div>


					
			</div>
		 </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Categorias</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#guerreiro" data-toggle="tab">
                             Guerreiro
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#ninja" data-toggle="tab">
                             Ninja
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#shura" data-toggle="tab">
                             Shura
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#shaman" data-toggle="tab">
                             Shaman
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#pvpgeral" data-toggle="tab">
                             PvP Geral
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="guerreiro">
                      <table class="table">
                        <tbody>
                          <thead class="text-primary">
                            <tr><th>Nick</th>
                            <th>Posição</th>
                            <th>Ação</th>
                          </tr></thead>
                        	@forelse( $topguerreiro as $Jogador )
                          <tr>
                            <td>
                            	{{ $Jogador->NickName }}
                            </td>
                            <td>
                              {{ $Jogador->Posicao }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#rankingTop{{$Jogador->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                            </td>
                          </tr>
                            @empty
                            <tr><td colspan="3">Nenhum personagem cadastrado...</td></tr>
                          	@endforelse
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="ninja">
                      <table class="table">
                        <tbody>
                          <thead class="text-primary">
                            <tr><th>Nick</th>
                            <th>Posição</th>
                            <th>Ação</th>
                          </tr></thead>
                          @forelse( $topninjas as $Jogador )
                          <tr>
                            <td>
                              {{ $Jogador->NickName }}
                            </td>
                            <td>
                              {{ $Jogador->Posicao }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#rankingTop{{$Jogador->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                            </td>
                          </tr>
                            @empty
                            <tr><td colspan="3">Nenhum personagem cadastrado...</td></tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="shura">
                      <table class="table">
                        <tbody>
                          <thead class="text-primary">
                            <tr><th>Nick</th>
                            <th>Posição</th>
                            <th>Ação</th>
                          </tr></thead>
                          @forelse( $topshuras as $Jogador )
                          <tr>
                            <td>
                              {{ $Jogador->NickName }}
                            </td>
                            <td>
                              {{ $Jogador->Posicao }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#rankingTop{{$Jogador->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                            </td>
                          </tr>
                            @empty
                            <tr><td colspan="3">Nenhum personagem cadastrado...</td></tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="shaman">
                      <table class="table">
                        <tbody>
                          <thead class="text-primary">
                            <tr><th>Nick</th>
                            <th>Posição</th>
                            <th>Ação</th>
                          </tr></thead>
                          @forelse( $topshamans as $Jogador )
                          <tr>
                            <td>
                              {{ $Jogador->NickName }}
                            </td>
                            <td>
                              {{ $Jogador->Posicao }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#rankingTop{{$Jogador->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                            </td>
                          </tr>
                            @empty
                            <tr><td colspan="3">Nenhum personagem cadastrado...</td></tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="pvpgeral">
                      <table class="table">
                        <tbody>
                          <thead class="text-primary">
                            <tr><th>Nick</th>
                            <th>Posição</th>
                            <th>Ação</th>
                          </tr></thead>
                          @forelse( $toppvpgeral as $Jogador )
                          <tr>
                            <td>
                              {{ $Jogador->NickName }}
                            </td>
                            <td>
                              {{ $Jogador->Posicao }}
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#rankingTop{{$Jogador->id}}">
                                <i class="material-icons">edit</i>
                              </button>
                            </td>
                          </tr>
                            @empty
                            <tr><td colspan="3">Nenhum personagem cadastrado...</td></tr>
                            @endforelse
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
