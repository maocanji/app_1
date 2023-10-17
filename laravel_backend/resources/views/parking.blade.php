

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="johanm carrillo maocanji@gmail.com">
    <meta name="generator" content="maocanji.0.1">
    <title>Valet Parking</title>

    <!-- Bootstrap  CSS -->
<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/form-validation.css') !!}" rel="stylesheet" type="text/css" />





</head>
<body class="bg-light">
<div class="row" ng-app="listApp"  ng-controller="Controller" >
    <div class="container"  ng-init="cargarRegistros()">
        <div class="py-5 text-center">
            <h2>Valet Parking</h2>
        </div>
        {{-- contenedor 1 -> derecha --}}
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Número de Carros parqueados</span>
                <span class="badge badge-secondary badge-pill"><%Nregistros%></span>
            </h4>
        </div>

        {{-- contenedor 2 -> izquierdo --}}
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Registrar</h4>
            <form class="needs-validation" name="formRegistro" novalidate>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Nombre del conductor</label>

                <input type="text" class="form-control" id="nombre" ng-model="formRegistro.nombre" placeholder="" value="" autofocus required>
                    <div class="invalid-feedback">
                    Nombre es requerido.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Placa del Auto</label>
                    <input type="text" class="form-control" id="placa" ng-model="formRegistro.placa" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    Placa es requerida.
                    </div>
                </div>
                </div>
                {{-- linea de separación --}}
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" ng-click="submit_Guardar(formRegistro)" >Guardar</button>
            </form>

        </div>
    </div>
    <hr class="mb-4">

    <div class="container">
        <table  class="table table-hover dataTables-velet">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Placa</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>total</th>
                <th>Acciones</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="d in data  track by $index">
                <th scope="row"><%$index + 1%></th>
                <td><%d.conductor_nombre%></td>
                <td><%d.vehiculo_placa%></td>
                <td><%d.entrada | date:'medium' %></td>
                <td>
                      <span ng-class="d.salida !='' ? 'badge badge-warning': 'badge badge-success'"> <%d.salida%></span>
                </td>
                  <td><%d.total%></td>
                <td><button type="button" class="btn btn-danger" ng-click="Eliminar($index)">Eliminar</button>
                    <button type="button" class="btn btn-warning" ng-click="submit_ModalUpdate($index)">Actualizar</button>
                    <button type="button" class="btn btn-info" ng-click="submit_ModalVer($index)">Ver</button>
                </td>
                 <td>
                     <span class="animate-show-hide" ng-hide="d.total">
                         <button type="button" class="btn btn-success" ng-click="submit_ModalPagar($index)">Consultar</button>

                     </span>

                </td>
              </tr>

            </tbody>
          </table>
    </div>

    <footer>
        <p class="mb-1">&copy; 2023 Autor @maocanji</p>
    </footer>
    {{-- </div> --}}
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
    <script src="js/datatables.min.js"></script>
    <script src="{{asset('js/angular-1.8.2/angular.js')}}"></script>
    <script src="{{asset('js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js')}}"></script>
    <script src="{{asset('js/angular-1.8.2/angular-messages.js')}}"></script>
    <script src="{{asset('js/angular-1.8.2/angular-route.js')}}"></script>

</div>
</div>
</body>
</html>

<script>
 $(document).ready(function(){

    $('.dataTables-velet').DataTable();

});
</script>
<script>
'use strict';

var listApp = angular.module('listApp', ['ui.bootstrap','ngMessages','ngRoute']);
        //Interpolaridad cambiar {} a <%%>
        listApp.config(function ($interpolateProvider, $httpProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
        });

        //controlador
        listApp.controller('Controller',function Controller($scope,$uibModal,$http,$rootScope) {
            $rootScope.data = 0;
            $rootScope.Nregistros = 0;


            $scope.cargarRegistros = function(){
                $scope.ruta = '{!! route( "TodosRegistros" ) !!}';
                /*Se envían los datos del formulario por ajax*/
                $http.get( $scope.ruta ,
                    {
                    }).then( function( responsive) {
                    $rootScope.data = responsive.data.data;
                    $rootScope.Nregistros = $rootScope.data.length;

                }).catch( function( error ){
                    $scope.error = error;
                    return  $scope.error ;
                });
            };

            $scope.submit_Guardar= function (formRegistro) {
            $scope.ruta = '{!! route( "GuardarRegistro" ) !!}';
            /*Se envían los datos del formulario por ajax*/
            $http.post( $scope.ruta ,
                {
                    nombre :  formRegistro['nombre'] ,
                    placa :  formRegistro['placa']
                }).then( function( responsive) {

                $scope.data.push(responsive.data.parking);
                $scope.resetForm(formRegistro);
                $rootScope.Nregistros = $scope.data.length;

            }).catch( function( error ){
                // $scope.data = data.data.errors;
                $scope.error = error;
                return  $scope.error ;
            });


        };

        $scope.resetForm = function(formRegistro) {
            formRegistro.nombre = '';
            formRegistro.placa = '';
        } ;


        $scope.Eliminar = function($index){
            if (!confirm('Confirmas Eliminar el registro ?')) return;
            $scope.Indice = $index;
            $scope.eliminar_id = $rootScope.data[$index].id;
            $scope.ruta = '{!! route( "EliminarRegistro" ) !!}';
            $http.post( $scope.ruta ,
                {
                    id: $scope.eliminar_id
                }).then( function( responsive) {
                $rootScope.data.splice($scope.Indice, 1);
                $rootScope.Nregistros = $rootScope.data.length;

            }).catch( function( data ){
                $scope.errors = data.errors;
                return $scope.errors;
            });

        };

            $scope.submit_ModalVer = function ($index) {

                $scope.ruta = '{!! route( "VerRegistro" ) !!}' ;
                /*Se envían los datos del formulario por ajax*/
                $http.post( $scope.ruta ,
                    {
                        id :   $rootScope.data[$index].id
                    }).then( function( responsive) {
                    $scope.datos = responsive.data.ver_dato;

                    var modalInstance = $uibModal.open({
                        templateUrl: '{!! route( "ModalDatos" ) !!}',
                        windowClass: 'show',
                        controller: 'ModalInstanceCtrl',
                        backdropClick: true,
                        dialogFade: true,
                        size: 'lg',
                        resolve: {
                            $variable: function () {
                                return $scope.datos;
                            },
                            $indice_registro: function () {
                                return '';
                            }
                        }
                    })
                    modalInstance.result.then(function (resultObj) {
                       //  $log.info(resultObj);
                    }, function () {
                       //  $log.info('Modal dismissed at: ' + new Date());
                    });
                });
            };

            $scope.submit_ModalUpdate = function ($index) {

                $scope.ruta = '{!! route( "VerRegistro" ) !!}' ;
                /*Se envían los datos del formulario por ajax*/
                $http.post( $scope.ruta ,
                    {
                        id :   $rootScope.data[$index].id
                    }).then( function( responsive) {
                    $scope.datos = responsive.data.ver_dato;

                    var modalInstance = $uibModal.open({
                        templateUrl: '{!! route( "ModalDatos_update" ) !!}',
                        windowClass: 'show',
                        controller: 'ModalInstanceCtrl',
                        backdropClick: true,
                        dialogFade: true,
                        size: 'lg',
                        resolve: {
                            $variable: function () {
                                return $scope.datos;
                            },
                            $indice_registro: function () {
                                return $index;
                            }
                        }
                    })
                    modalInstance.result.then(function (resultObj) {
                        //  $log.info(resultObj);
                    }, function () {
                        //  $log.info('Modal dismissed at: ' + new Date());
                    });
                });
            };

            $scope.submit_ModalPagar = function ($index) {

                $scope.ruta = '{!! route( "TotalPagar" ) !!}' ;
                /*Se envían los datos del formulario por ajax*/
                $http.post( $scope.ruta ,
                    {
                        id :   $rootScope.data[$index].id
                    }).then( function( responsive) {
                    $scope.datos = responsive.data.ver_dato;

                    var modalInstance = $uibModal.open({
                        templateUrl: '{!! route( "ModalPagar" ) !!}',
                        windowClass: 'show',
                        controller: 'ModalInstanceCtrl',
                        backdropClick: true,
                        dialogFade: true,
                        size: 'lg',
                        resolve: {
                            $variable: function () {
                                return $scope.datos[0];
                            },
                            $indice_registro: function () {
                                return '';
                            }
                        }
                    })
                    modalInstance.result.then(function (resultObj) {
                        //  $log.info(resultObj);
                    }, function () {
                        //  $log.info('Modal dismissed at: ' + new Date());
                    });
                });
            };



        });// Fin
        listApp.controller('ModalInstanceCtrl', function modalController($scope , $uibModalInstance,$http ,$rootScope ,$variable,$indice_registro){

            $rootScope.datos =  $variable;
            $rootScope.indice =  $indice_registro;

            $scope.cancel = function(){
                $uibModalInstance.close();
            }

            $scope.submit_actualizar= function (FormUpdate) {
                $scope.update_data = FormUpdate;
                console.log(FormUpdate);
                $scope.ruta = '{!! route( "ActualizarRegistro" ) !!}';
                //   /*Se envían los datos del formulario por ajax*/
                $http.post( $scope.ruta ,
                    {
                        id :   $scope.update_data['id'] ,
                        placa :   $scope.update_data['placa'] ,
                        nombre :    $scope.update_data['nombre'],

                    }).then( function( responsive) {
                    $rootScope.data[$rootScope.indice]=responsive.data.datos_update;
                    $uibModalInstance.close();




                }).catch( function( data ){
                    $scope.data = data.data.errors; ;
                    return data;
                });


            };
            $scope.submit_pagar= function (datos) {
                $scope.update_pago = datos;
                $scope.ruta = '{!! route( "ActualizarPago" ) !!}';
                //   /*Se envían los datos del formulario por ajax*/
                $http.post( $scope.ruta ,
                    {
                        id :    $scope.update_pago['id'],
                        salida :   $scope.update_pago['salidatos'] ,
                        total :    $scope.update_pago['Total'],
                        formato_horas :    $scope.update_pago['formato_horas'],

                    }).then( function( responsive) {
                    $rootScope.data[$rootScope.indice]=responsive.data.datos_update;
                    $uibModalInstance.close();




                }).catch( function( data ){
                    $scope.data = data.data.errors; ;
                    return data;
                });


            };
        });


          angular.bootstrap( document.getElementById( "listApp" ) ,['listApp'] );
</script>

