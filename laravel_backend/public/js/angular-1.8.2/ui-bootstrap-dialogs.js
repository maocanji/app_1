angular.module('ui.bootstrap.dialogs', ['uibootstrap_confirm'])

    .factory('$dialogConfirm', function ($uibModal) {

        return function (message, title) {

            var modal = $uibModal.open({
                size: 'sm',
                template: '<div class="modal-header">\
                            <h4 class="modal-title" ng-bind="title"></h4>\
                        </div>\
                        <div class="modal-body" ng-bind="message"></div>\
                        <div class="modal-footer">\
                            <button class="btn btn-default" ng-click="modal.dismiss()">não</button>\
                            <button class="btn btn-primary" ng-click="modal.close()">sim</button>\
                        </div>',
                controller: function ($scope, $uibModalInstance) {

                    $scope.modal = $uibModalInstance;

                    if (angular.isObject(message)) {
                        angular.extend($scope, message);
                    } else {
                        $scope.message = message;
                        $scope.title = angular.isUndefined(title) ? 'Mensagem' : title;
                    }
                }
            });

            return modal.result;
        }
    })

    .factory('$dialogAlert', function ($uibModal) {

        return function (message, title) {

            var modal = $uibModal.open({
                size: 'sm',
                template: '<div class="modal-header">\
                        <h4 class="modal-title" ng-bind="title"></h4></div>\
                        <div class="modal-body" ng-bind="message"></div>\
                        <div class="modal-footer">\
                            <button class="btn btn-primary" ng-click="modal.close()">OK</button>\
                        </div>',
                controller: function ($scope, $uibModalInstance) {
                    $scope.modal = $uibModalInstance;
                    if (angular.isObject(message)) {
                        angular.extend($scope, message);
                    } else {
                        $scope.message = message;
                        $scope.title = angular.isUndefined(title) ? 'Mensagem' : title;
                    }
                }
            });

            return modal.result;
        }
    })
