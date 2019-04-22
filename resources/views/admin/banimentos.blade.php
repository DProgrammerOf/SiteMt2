@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Banimentos
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
            Adicionar E-mail
          </button>

          <div class="modal fade" id="cashModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar Ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('addBan') }}">
                <div class="modal-body">
                     {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input required type="text" class="form-control" name="email_acc" placeholder="">
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
					
			</div>
		 </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">E-mails Banidos do Servidor</h4>
                  <p class="card-category">Gerenciamento dos e-mails banidos do cadastro.</p>
                  
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="pagseguro">
                      <table class="table">
                        <tbody>
                        	@foreach( $emails as $Email )
                          <tr>
                           
                            <td>
                             {{ $Email->email }}
                            </td>
                            
                            <td class="td-actions text-right">
                              <form action="{{ route('removerBan', $Email->id) }}" style="float: right;">
                              <button type='submit' rel='tooltip' title='Retirar Banimento' class='btn btn-danger btn-link btn-sm'>
                                <i class='material-icons'>remove_circle</i>
                              </button>
                            </form>
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
    @if (session('ativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisOk') }}", 'success');</script>
    @elseif (session('desativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('desativarVisOk') }}", 'warning');</script>
    @elseif (session('ativarVisErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisErro') }}", 'danger');</script>
    @endif
@endsection
