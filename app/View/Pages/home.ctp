<html ng-app="myapp" lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
    <title>Sales Order</title>
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    <div class="navbar-header">
        <h3>Sales Order</h3>
        </div>
    </div>
</div>
<div ng-controller="SalesController">
<div class="container">
	<table class="table table-striped table-bordered">
            <thead>
            <th><a href="" ng-click="sort = 'Sale.id'; reverse=!reverse">Order id&nbsp;</a></th>
            <th><a href="" ng-click="sort = 'Sale.Customer.name'; reverse=!reverse">Customer Name&nbsp;</a></th>
            <th><a href="" ng-click="">Products&nbsp;</a></th>
            <th><a href="" ng-click="sort = 'Sale.order_date'; reverse=!reverse">Order Date&nbsp;</a></th>
            <th><a href="" ng-click="sort = 'Sale.order_value'; reverse=!reverse">Order Value&nbsp;</a></th>  
            <th><a href="" ng-click="">Tax Percentage&nbsp;</a></th>
            <th><a href="" ng-click="">Tax Amount&nbsp;</a></th>
            </thead>
            <tbody>
            	<tr ng-repeat = "sale in sales | orderBy:sort:reverse">
            		<td>{{sale.Sale.id}}</td> 
            		<td>{{sale.Sale.Customer.name}}</td>
            		<td>{{sale.Product.name}}</td>
            		<td>{{sale.Sale.order_date}}</td>
            		<td>{{sale.Sale.order_value}}</td>
            		<td>
            		<span ng-show="add!==sale.Sale.id" ng-click="add_hide(sale.Sale.id)">{{sale.Sale.tax_percentage}}</span>
            		<input ng-show="add==sale.Sale.id"  type="text" ng-model="sale.Sale.tax_percentage" ng-enter="abhi(sale.Sale.tax_percentage)"></td>
            		<td>
            		<span>{{(sale.Sale.order_value*sale.Sale.tax_percentage)/100}}</span>
            		</td>
            	</tr>
            </tbody>                            
           </table>
          </div>
         </div>
<script>
	
	var app = angular.module('myapp',[]);
	

	app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});
	

	app.controller('SalesController',function($scope,$http){
		$http.get('/cakephp-cakephp-7253405/Sales_view/').success(function(data){
			console.log(data);
			$scope.sales = data;
		});
		console.log('Done');
		$scope.sort = 'sale.Sale.id';
		$scope.add = 'shit';
		$scope.abh={}
		$scope.add_hide= function(id){
			$scope.add = id;

		}
		$scope.abhi = function(shit){
			
			var a = {}
			a.tax = shit;
			console.log(a);
			var url = '/cakephp-cakephp-7253405/Sales/edit/'+$scope.add;
			$http.post(url,a).success(function(data){
				console.log('awesome');
				$scope.add = 'shit';
			})
			

		}
	})

	</script>
	
