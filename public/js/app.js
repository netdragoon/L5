var App = angular.module('App',[]);

App.directive('onlyNum', function() {
    return function(scope, element, attrs) {
        var keyCode = [8,9,13,37,39,48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105,110];
        element.bind("keydown", function(event) {
            //console.log($.inArray(event.which,keyCode));
            if($.inArray(event.which,keyCode) == -1) {
                scope.$apply(function(){
                    scope.$eval(attrs.onlyNum);
                    event.preventDefault();
                });
                event.preventDefault();
            }
        });
    };
});

App.config(function($interpolateProvider) 
{
  $interpolateProvider.startSymbol('%%');
  $interpolateProvider.endSymbol('%%');
});
App.controller('AddressCtrl', function($scope, $http, $window)
{
    $scope.data = [];
    $scope.uf = 'sp';
    $scope.cidade = '';
    $scope.endereco = '';
    $scope.error = false;

    $scope.getToken = function()
    {
        return $("#_token").val();
    }

    $scope.clear = function()
    {
        $scope.data = [];
        $scope.uf = 'sp';
        $scope.cidade = '';
        $scope.endereco = '';
        $scope.error = false;
        $("#uf").focus();
    }

    $scope.generate = function()
    {

        $scope.clear();
        $scope.uf = 'sp';
        $scope.cidade = 'SAO PAULO';
        $scope.endereco = 'ALV';
        $scope.load();

    }
    $scope.load = function()
    {
        if ($scope.uf.length == 2 &&
            $scope.cidade.length > 2 &&
            $scope.endereco.length > 2)
        {
            $("#imgLoading").fadeIn();
            $http({
                url: "/address/get",
                method: 'POST',
                params: {
                    'uf': $scope.uf,
                    'cidade': $scope.cidade,
                    'endereco': $scope.endereco,
                    '_token': $scope.getToken()
                }
            })
                .success(function (data)
            {
                $scope.data = data;
                $scope.error = (parseInt(data.length) === 0);

                $("#uf").focus();
                $("#imgLoading").fadeOut('2500');
            })
                .error(function(error)
            {

                $("#imgLoading").fadeOut('2500');
                $scope.clear();

            });
        }
        else
        {
            alert("Erros:\n\rUF com duas letras\n\rCidade com mais de 2 letras\n\rEndereço com mais de 2 letras")
        }
    }

});

App.controller('Ctrl', function($scope, $http, $window)
{
    
    $scope.data  = [];
    $scope.zip   = '';
    $scope.error = false;
    
    $scope.clear = function()
    {
        $scope.data  = [];
        $scope.zip   = '';
        $scope.error = false;
    }
    
    $scope.getToken = function()
    {
        return $("#_token").val();
    }
    
    $scope.verify = function()
    {
        var tstZip = /^[0-9]{8}$/;
        return $scope.zip !== '' && $scope.zip.length === 8 && tstZip.test($scope.zip);
    }
    
    $scope.updateScope = function()
    {
        $scope.$apply();
    }

    $scope.generate = function()
    {
        $scope.clear();
        $scope.zip = '01414000';
        $scope.load();
    }

    $scope.load = function()
    {
        if ($scope.verify())
        {
            $("#imgLoading").fadeIn();
            $http({ url: "/zipcode/get",
                    method:'POST',
                    params:{'zip': $scope.zip, '_token': $scope.getToken()}
                }).success(function (data) {       
                    
                    $scope.data  = [];
                    $scope.error = false;
                    
                    if (data.error === undefined) 
                    {
                        $scope.data = data;
                    } 
                    else 
                    {
                        $scope.error = true;
                    }
                    $("#zip").focus();
                    $("#imgLoading").fadeOut('2500');
                    
            });
        }
        else
        {
            alert('Cep inválido\r\nFormato válido: 01414000');
        }
    }
    
});

$(function()
{
    $('#zip').keyup(function(e)
    {
        if (e.keyCode == 8)
        {
            angular.element('#Ctrl').scope().clear();
            angular.element('#Ctrl').scope().updateScope();
        }
    });
});