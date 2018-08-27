'use strict';
var app = angular.module('empApp', ['ngMaterial']);

app.factory('apiService', ['$http', function ($http) {
        $http.defaults.headers.post["Content-Type"] = 'application/x-www-form-urlencoded; charset=utf-8';
        var pwData = {};
        var api = '';
        pwData.postData = function (data, url) {
            return $http({
                method: 'POST',
                url: api + '/' + url,
                data: $.param(data)
            });
        };
        return pwData;
    }]);

app.controller('DialogController', ['$scope', '$mdDialog', '$mdMedia', function ($scope, $mdDialog, $mdMedia) {
        $scope.loadDialog = function (url, elm, clkOutToCls) {
            $mdDialog.show({
                controller: PanelController,
                templateUrl: '/' + url,
                parent: angular.element(document.body),
                targetEvent: elm,
                clickOutsideToClose: clkOutToCls,
                escapeToClose: clkOutToCls,
                fullscreen: true,
                scope: $scope.$new()
            });
            $scope.$watch(function () {
                return $mdMedia('xl') || $mdMedia('xl');
            }, function (wantsFullScreen) {
                $scope.customFullscreen = (wantsFullScreen === true);
            });
        };
    }]);


function PanelController($scope, $mdDialog) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        angular.element(document.getElementById('homeHdr')).removeClass('_stcky');
        angular.element(document.getElementById('mainHeader')).removeClass('hide');
        $mdDialog.cancel();
    };
    $scope.answer = function (answer) {
        $mdDialog.hide(answer);
    };
}


app.controller('IndexController', ['$scope', 'apiService', '$controller', function ($scope, apiService, $controller) {
    $scope.loginFromSubmit = function (isvalid) {
        if (isvalid) {
            apiService.postData({}, 'login').success(function (res) {
                console.log(res);
            });
        } else {
            return false;
        }
    };
}]);


app.controller('Homecontroller', ['$scope', 'apiService', '$controller', function ($scope, apiService, $controller) {
    $controller('DialogController', { $scope: $scope });
    $scope.emp = {};
    
    $scope.updateEmp = function() {
        
    };
    
    $scope.showEmp = function (tp, id) {
        if(tp == 'E'){
            $scope.emp = {'id': 'EMP01', 'name': 'Sathish Kumar', 'email': 'mukkojusatish@gmail.com', 'mobile': '9948983078'};
            apiService.postData({tp: tp, id: id}, 'getemp').success(function(res) {
            });
        }
        $scope.loadDialog('application/views/employee.php');
    };
    
    $scope.allEmp = function() {
        apiService.postData({}, 'getallemp').success(function(res) {
            $scope.emps = [{'id': 'EMP01', 'name': 'Sathish Kumar', 'email': 'mukkojusatish@gmail.com', 'mobile': '9948983078'},
                   {'id': 'EMP01', 'name': 'Sathish Kumar', 'email': 'mukkojusatish@gmail.com', 'mobile': '9948983078'},
                   {'id': 'EMP01', 'name': 'Sathish Kumar', 'email': 'mukkojusatish@gmail.com', 'mobile': '9948983078'},
                   {'id': 'EMP01', 'name': 'Sathish Kumar', 'email': 'mukkojusatish@gmail.com', 'mobile': '9948983078'}];
        });
        $scope.loadDialog('application/views/allemp.php');
    };
}]);

app.controller('EmployeeController', ['$scope', 'apiService', '$controller', function($scope, apiService, $controller) {
    $scope.saveEmp = function() {
        apiService.postData({id: $scope.emp.id, 
                            name: $scope.emp.name,
                            email: $scope.emp.email,
                            mobile: $scope.emp.mobile
        }, 'addemp').success(function(res) {
            
        });
    };
}]);