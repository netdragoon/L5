@extends('_layout')
@section('content')
    <div ng-app="App" ng-controller="Ctrl" id="Ctrl" class="well" style="margin-left: auto; margin-right: auto; margin-top: 20px; width: 440px;">
        <form class="form-inline" ng-submit="load()">
            <input type="hidden" id="_token" name="_token" value="{!!csrf_token()!!}">
            <div class="form-group">
                <code>Exemplo de formato: 01414000 (somente números)</code>
            </div>
            <div class="form-group">
                <label class="sr-only" for="zip">Digite o CEP:</label>
                <input  title="Preencha o campo com um CEP de 8 números" type="text" class="form-control" ng-model="zip" id="zip" placeholder="CEP" required="required" maxlength="8" autofocus pattern="\d{8}" only-num>
            </div>
            <button type="submit" class="btn btn-default">Pesquisar</button>
            <button type="submit" class="btn btn-danger" ng-click="clear()">Limpar</button>
            <img src="{!!asset('imagem/loading.gif')!!}" border="0" id="imgLoading" style="width:30px;border:0;display:none;" />
        </form>
        <p ng-if="data.ibge">
        <div ng-if="error" class="text-success">
            <code>CEP não encontrado</code>
        </div>
        <div ng-if="data.ibge" class="text-success">
            <code>IBGE</code>
            <div style="padding-left:10px;">%%data.ibge%%</div>
        </div>
        <div ng-if="data.cep" class="text-success">
            <code>CEP</code>
            <div style="padding-left:10px;">%%data.cep%%</div>
        </div>
        <div ng-if="data.localidade" class="text-success">
            <code>Localidade</code>
            <div style="padding-left:10px;">%%data.localidade%% %%data.uf%%<br />
            </div>
            <div ng-if="data.logradouro" class="text-success">
                <code>Logradouro</code>
                <div style="padding-left:10px;">%%data.logradouro%%<br />
                </div>
                <div ng-if="data.bairro" class="text-success">
                    <code>Bairro</code>
                    <div style="padding-left:10px;">%%data.bairro%%<br />
                    </div>
                    <div ng-if="data.complemento" class="text-success">
                        <code>Complemento</code>
                        <div style="padding-left:10px;">%%data.complemento%%<br />
                        </div>
                        </p>
                    </div>
@stop