(function(){
	var app = angular.module('login',[]);
	
	app.controller('loginController',function($scope,$http,$httpParamSerializer){
		//Envia os dados para o servidor
		this.enviar = function(){
			//console.log($httpParamSerializer($scope));
			$http.get('https://viacep.com.br/ws/'+$scope.cep+'/json/unicode/').then(function($response){
				console.log($response);
			});
			*/
		};
	});

})();
