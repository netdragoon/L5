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