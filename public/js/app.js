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

app.controller('ToastController', ['$scope', '$mdToast',
    function ($scope, $mdToast) {
        var last = {
            bottom: true,
            top: false,
            left: true,
            right: false
        };

        $scope.tstPos = angular.extend({}, last);
        $scope.getTstPos = function () {
            return Object.keys($scope.tstPos)
                    .filter(function (pos) {
                        return $scope.tstPos[pos]
                    })
                    .join(' ');
        };

        $scope.showActionToast = function (ctnt, scope) {
            var par = document.querySelector('body');
            if (angular.element(par).hasClass('md-dialog-is-showing'))
                par = document.querySelector('.wrapper');
            $mdToast.show({
                hideDelay: 15000,
                controller: 'ToastController',
                template: ctnt,
                scope: scope
            });
        };

        $scope.showSimpleToast = function (text) {
            var par = document.querySelector('body');
            if (angular.element(par).hasClass('md-dialog-is-showing'))
                par = document.querySelector('.wrapper');

            $mdToast.show($mdToast.simple().textContent(text)
                    .position($scope.getTstPos()).hideDelay(4000).parent(par));
        };

        $scope.cancelToast = function () {
            $mdToast.hide();
        };
    }]);


app.controller('IndexController', ['$scope', 'apiService', '$controller', function ($scope, apiService, $controller) {
        $controller('ToastController', {$scope: $scope});
        $scope.loginFromSubmit = function (isvalid, username, password) {
            if (isvalid) {
                apiService.postData({username: username, password: password}, 'login').success(function (res) {
                    if (res.status == 1) {
                        document.location = 'home';
                    } else {
                        $scope.showSimpleToast(res.msg);
                    }
                });
            } else {
                return false;
            }
        };
    }]);


app.controller('Homecontroller', ['$scope', 'apiService', '$controller', function ($scope, apiService, $controller) {
        $controller('DialogController', {$scope: $scope});
        $controller('ToastController', {$scope: $scope});
        $scope.emp = {};

        $scope.showEmp = function (tp, id) {
            if (tp == 'E') {
                apiService.postData({id: id}, 'getemp').success(function (res) {
                    if (res.status == '1') {
                        $scope.emp = res.msg;
                        $scope.loadDialog('application/views/employee.php');
                    } else {
                        $scope.showSimpleToast(res.msg);
                    }
                });
            } else {
                $scope.loadDialog('application/views/employee.php');
            }
        };

        $scope.allEmp = function () {
            apiService.postData({}, 'getallemp').success(function (res) {
                if (res.status == '1') {
                    $scope.emps = res.msg;
                    $scope.loadDialog('application/views/allemp.php');
                } else {
                    $scope.showSimpleToast(res.msg);
                }
            });
        };
        
        $scope.showallEmp = function () {
            apiService.postData({}, 'getallemp').success(function (res) {
                if (res.status == '1') {
                    $scope.emps = res.msg;
                    $scope.loadDialog('application/views/showallemp.php');
                } else {
                    $scope.showSimpleToast(res.msg);
                }
            });
        };
        
        $scope.cancle = function () {
            $scope.cancel();
        };
    }]);

app.controller('EmployeeController', ['$scope', 'apiService', '$controller', function ($scope, apiService, $controller) {
        $controller('ToastController', {$scope: $scope});
        $scope.saveEmp = function () {
            apiService.postData({id: $scope.emp.id,
                name: $scope.emp.name,
                email: $scope.emp.email,
                mobile: $scope.emp.mobile
            }, 'saveemp').success(function (res) {
                $scope.showSimpleToast(res.msg);
            });
        };
        
        $scope.cancle = function () {
            $scope.cancel();
        };
    }]);