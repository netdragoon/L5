@extends('_layout')
@section('content')

    <div ng-app="App" ng-controller="AddressCtrl" id="AddressCtrl" class="well" style="margin-left: auto; margin-right: auto; margin-top: 20px;">
        <form ng-submit="load()">
            <input type="hidden" id="_token" name="_token" value="{!!csrf_token()!!}">
            <div class="form-group">
                <code>Exemplo: UF: SP / Cidade: São Paulo / Endereço: Alv</code> <a href="javascript:;" ng-click="generate()">[Simular o Exemplo]</a>
            </div>
            <div class="row">
                <div class="form-group col-md-1">
                    <label class="sr-only" for="zip">UF:</label>
                    <input title="Unidade Federativa" type="text" class="form-control" ng-model="uf" id="uf" placeholder="UF" required="required" maxlength="2" autofocus>
                </div>
                <div class="form-group col-md-4">
                    <label class="sr-only" for="zip">Cidade:</label>
                    <input title="Cidade" type="text" class="form-control" ng-model="cidade" id="cidade" placeholder="Cidade" required="required">
                </div>
                <div class="form-group col-md-4">
                    <label class="sr-only" for="zip">Endereço:</label>
                    <input title="Endereço" type="text" class="form-control" ng-model="endereco" id="endereco" placeholder="Endereço" required="required">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <button type="button" class="btn btn-danger" ng-click="clear()"><span class="glyphicon glyphicon-minus-sign"></span></button>
                    <img src="{!!asset('imagem/loading.gif')!!}" border="0" id="imgLoading" style="width:30px;border:0;display: none" />
                </div>
            </div>
        </form>
        <table class="table table-condensed table-hover">
            <!--
            <thead>
                <tr>
                    <th style="vertical-align: middle; text-align: center"><p>Cep</p></th>
                    <th style="width: 50%; vertical-align: middle; text-align: center">
                        <p>Cidade</p>
                        <p>Logradouro</p>
                    </th>
                    <th  style="width: 30%; vertical-align: middle; text-align: center">
                        <p>Bairro</p>
                        <p>Complemento</p>
                    </th>
                    <th style="vertical-align: middle; text-align: center"><p>IBGE</p></th>
                    <th style="vertical-align: middle; text-align: center"><p>Gia</p></th>
                </tr>
            </thead>-->
            <tbody>
                <tr ng-repeat="d in data" ng-class="$index % 2 == 0 ? 'info':'warning'">
                    <td>
                        <h5><small>CEP</small></h5>
                        <p>%%d.cep%%</p>
                    </td>
                    <td style="width: 50%;">
                        <h5><small>Cidade</small></h5>
                        <p>%%d.localidade%%</p>
                        <h5><small>Endereço</small></h5>
                        <p>%%d.logradouro%%</p>
                    </td>
                    <td style="width: 30%;">
                        <h5><small>Bairro</small></h5>
                        <p>%%d.bairro%%</p>
                        <h5><small>Complemento</small></h5>
                        <p>%%d.complemento%%</p>
                    </td>
                    <td>
                        <h5><small>IBGE</small></h5>
                        <p>%%d.ibge%%</p>
                        <h5><small>Gia</small></h5>
                        <p>%%d.gia%%</p>
                    </td>
                </tr>
                <tr ng-if="error">
                    <td colspan="4" style="width: 100%;text-align: center">
                        <h4>Não existe resultado para essa pesquisa !!!</h4>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@stop