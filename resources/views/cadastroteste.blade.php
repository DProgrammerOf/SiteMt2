@extends('layout.topo')
@push('layoutstilos')
@endpush

@section('conteudo')
 <div class="container">
        <ul class="nk-forum">
            <li>
                <form id="cadastro" class="form-horizontal" method="post" action="#">
                    <fieldset>
                    {{ csrf_field() }}
                        <!-- Form Name -->
                        <legend class="shadows">Cadastro</legend>
                        <br>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label"
                                   for="textinput">Login</label>
                                <input id="textinput" name="login"
                                       placeholder="Digite um login de conta."
                                       class="form-control input-md" required type="text" value="">
                                <span class="help-block">5-30 Caracteres</span>
                                <input id="textinput" name="nome"
                                       placeholder="Digite seu primeiro nome."
                                       class="form-control input-md" required type="text" value="">
                                <span class="help-block">Para o toque pessoal ;)</span>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="control-label"
                                   for="passwordinput">Senha</label>
                                <input id="passwordinput" name="senha"
                                       placeholder="Por favor, digite uma senha."
                                       class="form-control input-md" required type="password" value="">
                            <span class="help-block"></span>
                                <input id="passwordinputconf" name="senhaconf"
                                       placeholder="Digite a senha novamente."
                                       class="form-control input-md" required type="password" value="">
                            <span class="help-block">10-16 Caracteres, Caracteres Especiais são bem vindos!</span>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label"
                                   for="textinput">Código de Apagamento</label>
                                <input id="textinput" name="codperso"
                                       placeholder="Por favor, corrija um código de exclusão."
                                       class="form-control input-md" required type="number" min="0000000" max="9999999" 
                                       value="">
                                <span class="help-block">Seu código de exclusão em 7 caracteres numéricos!</span>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label"
                                   for="textinput">E-Mail</label>
                                <input id="textinput" name="email"
                                       placeholder="Digite um e-mail."
                                       class="form-control input-md" required type="email" value="">
                                <span class="help-block">Digite um e-mail verídico pois será necessário confirmação para efetuar login.</span>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label"
                                   for="selectbasic">Pergunta de segurança e resposta</label>
                                <select id="selectbasic" name="question" class="form-control"
                                        style="height: 30px !important;">
                                    <option value="1">Qual é o nome do seu pai?</option>
                                    <option value="2">Qual o nome do seu animal de estimação?</option>
                                    <option value="3">De onde você é?</option>        
                                                            </select>
                            <span class="help-block"></span>
                            <input type="text" class="form-control" id="textarea" name="answer" placeholder="Sua resposta..." required />
                        </div>

                        <br>
                        <hr>

                        <!-- Button -->
                        <div class="input-group-btn btn-group" role="group">
                            <div>
                                <div class="left">
                                    <button type="submit" class="nk-btn nk-btn-lg link-effect-4 ready" name="reg" value="cadastrar">Cadastrar</button>
                                </div>
                                <div class="right">
                                    <button type="reset" class="nk-btn nk-btn-lg link-effect-4 ready">Limpar</button>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </li>
        </ul>
    </div>
@endsection
