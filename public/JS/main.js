
var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope){
    $scope.hello = "hello world, my name is angularjs";
    $scope.datas = JSON.parse('[{"masv":"10119479","tensv":"Poppy"},{"masv":"10119480","tensv":"Yasuo"}]');

});