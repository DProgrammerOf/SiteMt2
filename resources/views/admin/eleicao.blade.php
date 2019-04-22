@extends('admin.layout.base')

@section('title')
Painel Administrativo - Mt2Plus
@endsection

@section('page')
Página de Eleições
@endsection

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#resultadoAdd">
                      Adicionar Resultado
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#resultadoDel">
                      Limpar Resultado
                    </button>
                    <br>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#eleicaoModalAdd">
                      Criar Eleição
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eleicaoModalDel">
                      Excluir Eleição
                    </button>

                    <div class="modal fade" id="resultadoDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirmação de Remoção</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{ route('delResultado') }}">
                        <div class="modal-body">
                             {{ csrf_field() }}
                         <h4>Tem certeza que deseja limpar o Resultado?</h4>
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                          <button type="submit" class="btn btn-danger">Sim</button>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>

                    <div class="modal fade" id="resultadoAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Resultado</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{ route('addResultado') }}">
                        <div class="modal-body">
                             {{ csrf_field() }}
                          <h4> Ganhador Império do Jinno </h4><br>
                          <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Nick do Player</b></label>
                            <input required type="text" class="form-control" name="nick_eleicao1" placeholder="1° Lugar - Nickname">
                            <input required type="text" class="form-control" name="nick_eleicao1_2" placeholder="2° Lugar - Nickname">
                           </div>
                           <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Votos do Player</b></label>
                            <input required type="number" class="form-control" name="votos_eleicao1" placeholder="1° Lugar - Votos">
                            <input required type="number" class="form-control" name="votos_eleicao1_2" placeholder="2° Lugar - Votos">
                          </div>
                          <h4> Ganhador Império do Chunjo </h4><br>
                          <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Nick do Player</b></label>
                            <input required type="text" class="form-control" name="nick_eleicao2" placeholder="1° Lugar - Nickname">
                            <input required type="text" class="form-control" name="nick_eleicao2_2" placeholder="2° Lugar - Nickname">
                         </div>
                         <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Votos do Player</b></label>
                            <input required type="number" class="form-control" name="votos_eleicao2" placeholder="1° Lugar - Votos">
                            <input required type="number" class="form-control" name="votos_eleicao2_2" placeholder="2° Lugar - Votos">
                          </div>
                          <h4> Ganhador Império do Shinsoo </h4><br>
                          <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Nick do Player</b></label>
                            <input required type="text" class="form-control" name="nick_eleicao3" placeholder="1° Lugar - Nickname">
                            <input required type="text" class="form-control" name="nick_eleicao3_2" placeholder="2° Lugar - Nickname">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1"><b>Votos do Player</b></label>
                            <input required type="number" class="form-control" name="votos_eleicao3" placeholder="1° Lugar - Votos">
                            <input required type="number" class="form-control" name="votos_eleicao3_2" placeholder="2° Lugar - Votos">
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

                            <div class="modal fade" id="eleicaoModalDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{ route('delEleicao') }}">
                        <div class="modal-body">
                             {{ csrf_field() }}
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Id da Eleição</label>
                            <input required type="number" class="form-control" name="id_eleicao" placeholder="0">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-danger">Remover</button>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>

                    <div class="modal fade" id="eleicaoModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Adicionando Nova Eleição</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="eleicaoFormAdd" method="POST" action="{{ route('addEleicao') }}">
                            <div class="modal-body">
                                 {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" name="nome_eleicao" placeholder="Nome de referência da eleição.">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Dias de Jogo</label>
                                <input type="number" class="form-control" name="tempo_eleicao" placeholder="Tempo mínimo para o usuário poder votar (em 1 personagem).">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Número de Kills</label>
                                <input type="number" class="form-control" name="kills_eleicao" placeholder="Número de kills mínimos total de personagens de uma conta.">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Data de Ínicio</label>
                                <input type="text" class="form-control" id="datai_eleicao" name="datai_eleicao" placeholder="00/00/0000">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Data de Término</label>
                                <input type="text" class="form-control" id="datat_eleicao" name="datat_eleicao" placeholder="00/00/0000">
                              </div><br>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-warning">Criar</button>
                            </div>
                         </form>
                          </div>
                        </div>
                      </div>

                    @foreach( $eleicoes as $Eleicao )
                      <div class="modal fade" id="eleicaoModal{{$Eleicao->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eleição (<font color="#5db461">{{$Eleicao->nome}}</font>)</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="eleicaoForm{{$Eleicao->id}}" method="POST" action="{{ route('attEleicao') }}">
                            <div class="modal-body">
                                 {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" name="nome_eleicao" value="{{$Eleicao->nome}}">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Tempo de Jogo</label>
                                <input type="text" class="form-control" name="tempo_eleicao" value="{{$Eleicao->tempo_min}}">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Kills</label>
                                <input type="text" class="form-control" name="kills_eleicao" value="{{$Eleicao->kills_min}}">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Data de Ínicio</label>
                                <input type="text" class="form-control" id="datai_eleicao{{$Eleicao->id}}" name="datai_eleicao" value="{{ Carbon\Carbon::parse($Eleicao->data_inicio)->format('Y-m-d') }}">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Data de Término</label>
                                <input type="text" class="form-control" id="datat_eleicao{{$Eleicao->id}}" name="datat_eleicao" value="{{ Carbon\Carbon::parse($Eleicao->data_termino)->format('Y-m-d') }}">
                              </div><br>
                              <input type="hidden" name="id_eleicao" value="{{$Eleicao->id}}">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-warning">Salvar mudanças</button>
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
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Eleições</h4>
                  <p class="card-category">Gerenciamento de datas, validade e candidatos.</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>Data de Ínicio</th>
                      <th>Data de Término</th>
                      <th>Ações</th>
                      <th>Status</th>
                    </tr></thead>
                    <tbody>
                      @forelse($eleicoes as $Eleicao)
                      <tr>
                        <td>{{ $Eleicao->id }}</td>
                        <td>{{ Carbon\Carbon::parse($Eleicao->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($Eleicao->data_termino)->format('d/m/Y') }}</td>
                        <td class="td-actions">
                          <button type="button" class="btn btn-warning btn-link btn-sm" data-toggle="modal" data-target="#eleicaoModal{{$Eleicao->id}}">
                                <i class="material-icons">edit</i>
                          </button>
                          <button id="candatosEleicao{{$Eleicao->id}}" type="button" rel="tooltip" title="Gerenciar Candidatos" class="btn btn-info btn-link btn-sm">
                                <i class="material-icons">group</i>
                          </button>
                          @if($Eleicao->visivel == 1)
                             <form action="{{ route('desativarEleicao', $Eleicao->id) }}" style="float: right;">
                              <button type="submit" rel="tooltip" title="Desabilitar visualização" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                            </form>
                            @else
                            <form action="{{ route('ativarEleicao', $Eleicao->id) }}" style="float: right;">
                              <button type="submit" rel="tooltip" title="Habilitar visualização" class="btn btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                            </form>
                            @endif
                        </td>
                        @if($Eleicao->visivel == 1)
                        <td class="text-center" style="background: linear-gradient(60deg, #66bb6a, #43a047); color: #fff;width: 180px;">Ativo</td>
                        @elseif($Eleicao->visivel == 0)
                        <td class="text-center" style="background: linear-gradient(60deg, #ef5350, #e53935); color: #fff;width: 180px;">Desativado</td>
                        @endif
                      </tr>
                      @empty
                      <tr>
                        <td colspan="4">Nenhuma eleição registrada ainda...</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div id="candidatos-add" class="row" style="display: none;">
          <div class="col-lg-12 col-md-12">
            <div class="modal fade" id="candidatosModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Adicionando Novo Candidato</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="eleicaoFormAdd" method="POST" action="{{ route('addCandidato') }}">
                            <div class="modal-body">
                                 {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nick do Candidato</label><br>
                                <input type="text" class="form-control" name="nick_cand" placeholder="Nick do personagem.">
                              </div><br>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Império</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="imperio_cand">
                                  <option value="1">Shinsoo</option>
                                  <option value="2">Chunjo</option>
                                  <option value="3">Jinno</option>

                                </select>
                              </div><br>
                                <input id="candAdd-eleicaoId" type="hidden" name="id_eleicao">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-info">Adicionar</button>
                            </div>
                         </form>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#candidatosModalAdd">
                                CADASTRAR CANDIDATO
                              </button>
                </div>
          </div>

          <div id="candidatos" class="row" style="display: none;">
            <div class="col-lg-12 col-md-12">
              <div id="loading-candidatos" style="display: none;">Carregando...</div>
              <div id="card-candidatos" class="card" style="display: none;">
                <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span id="titulo-candidatos" class="nav-tabs-title">Candidatos da Eleição</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#fogo" data-toggle="tab">
                             Chunjo
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#gelo" data-toggle="tab">
                             Jinno
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#shinsoo" data-toggle="tab">
                             Shinsoo
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="fogo">
                      <table class="table">
                        
                         <thead class="text-info">
                            <tr><th>Nick</th>
                            <th>Votos</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody id="candidatos-fogo">
                           </tbody> 
                        
                      </table>
                    </div>

                     <div class="tab-pane" id="gelo">
                      <table class="table">
                        
                         <thead class="text-info">
                            <tr><th>Nick</th>
                            <th>Votos</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody id="candidatos-gelo">
                           </tbody> 
                        
                      </table>
                    </div>

                     <div class="tab-pane" id="shinsoo">
                      <table class="table">
                        
                         <thead class="text-info">
                            <tr><th>Nick</th>
                            <th>Votos</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody id="candidatos-shinsoo">
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
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 @foreach( $eleicoes as $Eleicao )
<script>
    $(document).ready(function(){
       $("#candatosEleicao{{$Eleicao->id}}").on('click', function()
       {
            $("#candidatos").css('display', 'block');
            $("#loading-candidatos").css('display', 'block');
            valor = $(this).val();    
            $.ajax({

                type:'POST',
                url:"{{ route('getCandidatos') }}",
                dataType: 'JSON',
                data: {
                    "eleicaoid": {{$Eleicao->id}}
                },
                headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                success:function(data){
                    if(data == ''){
                      $("#titulo-candidatos").html("Candidatos da Eleição (ID: {{ $Eleicao->id}})");
                      var candFogo = "<td colspan='3'>Nenhum candidato cadastrado ainda.</td>";
                      var candGelo = "<td colspan='3'>Nenhum candidato cadastrado ainda.</td>";
                      var candShinsoo = "<td colspan='3'>Nenhum candidato cadastrado ainda.</td>";
                      $("#candidatos-fogo").html(candFogo);
                      $("#candidatos-gelo").html(candGelo);
                      $("#candidatos-shinsoo").html(candShinsoo);
                      $("#candAdd-eleicaoId").val("{{$Eleicao->id}}");

                      $("#candidatos-add").css('display', 'block');
                      $("#loading-candidatos").css('display', 'none');
                      $("#card-candidatos").css('display', 'block');
                    }
                    else{
                      console.log( data );
                      resTamanho = Object.keys(data).length;
                      var i;
                      var candFogo = "";
                      var candGelo = "";
                      var candShinsoo = "";
                      for (i = 0; i < resTamanho; i++) { 
                        if(data[i].id_reino == 2){
                          candFogo += "<tr><td style='color: #000; '>" +
                              data[i].nickname +
                            "</td>" +
                            "<td>" +
                            data[i].votos +
                            "</td>" +
                            "<td class='td-actions text-right'>" +
                            " <form action='"+window.location.pathname+"/candidatos/"+data[i].id_player+"/{{$Eleicao->id}}'>" +
                            "  <button type='submit' rel='tooltip' title='Excluir Candidato' class='btn btn-danger btn-link btn-sm'>" +
                            "    <i class='material-icons'>remove_circle</i>" +
                            "  </button>" +
                            "</form>" +
                            "</td></tr>";
                        }else if(data[i].id_reino == 3){
                          candGelo += "<tr><td style='color: #000; '>" +
                              data[i].nickname +
                            "</td>" +
                            "<td>" +
                            data[i].votos +
                            "</td>" +
                            "<td class='td-actions text-right'>" +
                            " <form action='"+window.location.pathname+"/candidatos/"+data[i].id_player+"/{{$Eleicao->id}}'>" +
                            "  <button type='submit' rel='tooltip' title='Excluir Candidato' class='btn btn-danger btn-link btn-sm'>" +
                            "    <i class='material-icons'>remove_circle</i>" +
                            "  </button>" +
                            "</form>" +
                            "</td></tr>";
                        }else if(data[i].id_reino == 1){
                          candShinsoo += "<tr><td style='color: #000; '>" +
                              data[i].nickname +
                            "</td>" +
                            "<td>" +
                            data[i].votos +
                            "</td>" +
                            "<td class='td-actions text-right'>" +
                            " <form action='"+window.location.pathname+"/candidatos/"+data[i].id_player+"/{{$Eleicao->id}}'>" +
                            "  <button type='submit' rel='tooltip' title='Excluir Candidato' class='btn btn-danger btn-link btn-sm'>" +
                            "    <i class='material-icons'>remove_circle</i>" +
                            "  </button>" +
                            "</form>" +
                            "</td></tr>";
                        }
                      }
                      $("#titulo-candidatos").html("Candidatos da Eleição (ID: {{ $Eleicao->id}})");

                      if(candFogo == "")
                        candFogo = "<td colspan='3'>Nenhum candidato cadastrado no império do Jinno.</td>";

                      if(candGelo == "")
                        candGelo = "<td colspan='3'>Nenhum candidato cadastrado no império do Chunjo.</td>";

                      if(candShinsoo == "")
                        candShinsoo = "<td colspan='3'>Nenhum candidato cadastrado no império do Shinsoo.</td>";

                      $("#candAdd-eleicaoId").val("{{$Eleicao->id}}");
                      $("#candidatos-fogo").html(candFogo);
                      $("#candidatos-gelo").html(candGelo);
                      $("#candidatos-shinsoo").html(candShinsoo);

                      $("#candidatos-add").css('display', 'block');
                      $("#loading-candidatos").css('display', 'none');
                      $("#card-candidatos").css('display', 'block');
                    }
                },
                error: function (xhr) {
                        alert((xhr.error));
                        $("#candidatos").css('display', 'none');
                        $("#loading-candidatos").css('display', 'none');
                    }
            });


       });
    });
</script>
@endforeach

        <script>
 $( function() {
    var dateFormat = "yy-mm-dd";

    @forelse($eleicoes as $Eleicao)
      var from{{$Eleicao->id}} = $( "#datai_eleicao{{$Eleicao->id}}" )
        .datepicker({
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to{{$Eleicao->id}}.datepicker( "option", "minDate", getDate( this ) );
        }),
      to{{$Eleicao->id}} = $( "#datat_eleicao{{$Eleicao->id}}" ).datepicker({
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from{{$Eleicao->id}}.datepicker( "option", "maxDate", getDate( this ) );
      });
      $("#datai_eleicao{{$Eleicao->id}}" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $("#datat_eleicao{{$Eleicao->id}}" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $('#datai_eleicao{{$Eleicao->id}}').datepicker('setDate', "{{ Carbon\Carbon::parse($Eleicao->data_inicio)->format('Y-m-d') }}");
      $('#datat_eleicao{{$Eleicao->id}}').datepicker('setDate', "{{ Carbon\Carbon::parse($Eleicao->data_termino)->format('Y-m-d') }}");
    @empty
    @endforelse

    var fromAdd = $( "#datai_eleicao" )
        .datepicker({
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          toAdd.datepicker( "option", "minDate", getDate( this ) );
        }),
      toAdd = $( "#datat_eleicao" ).datepicker({
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        fromAdd.datepicker( "option", "maxDate", getDate( this ) );
      });
      $("#datai_eleicao" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $("#datat_eleicao" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $('#datai_eleicao').datepicker('setDate', "{{ Carbon\Carbon::parse($hoje)->format('Y-m-d') }}");
      $('#datat_eleicao').datepicker('setDate', "{{ Carbon\Carbon::parse($hoje)->format('Y-m-d') }}");
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>

   @if (session('attPagseguroOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('attPagseguroOk') }}", 'success');</script>
    @elseif (session('attPagseguroErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('attPagseguroErro') }}", 'danger');</script>
    @endif

    @if (session('ativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisOk') }}", 'success');</script>
    @elseif (session('desativarVisOk'))
                        <script>demo.showNotification('bottom','right', "{{ session('desativarVisOk') }}", 'warning');</script>
    @elseif (session('ativarVisErro'))
                        <script>demo.showNotification('bottom','right', "{{ session('ativarVisErro') }}", 'danger');</script>
    @endif
@endsection