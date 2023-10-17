<form name="FormUpdate">
<div class="modal-content animated bounceInRight">
    <div class="modal-header bg-warning">
        <h4 class="modal-title">Datos Actualizar Registros</h4>
    </div>
    <div class="modal-body">


        <div  class="form-group">
            <input type="text"  ng-model="FormUpdate.id"  ng-init="FormUpdate.id=datos.id" ng-model="FormUpdate.id" ng-value="FormUpdate.id" class="form-control " disabled>
        </div>

        <div  class="form-group">
            <label for="FormUpdate.placa">Placa del Vehìculo <span class="text-danger">*</span></label>
            <input type="text" ng-model="FormUpdate.placa"  ng-model="FormUpdate.placa" ng-init="FormUpdate.placa=datos.vehiculo_placa" class="form-control" autofocus>
        </div>

        <div  class="form-group">
            <label for="FormUpdate.placa">Nombre del Conductor <span class="text-danger">*</span></label>
            <input type="text" ng-model="FormUpdate.nombre"  ng-model="FormUpdate.nombre" ng-init="FormUpdate.nombre=datos.conductor_nombre" class="form-control">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white"  data-dismiss="modal" ng-click="cancel()">Close</button>
        <button value="Guardar" class='btn btn-success m-t-n-xs' data-ng-click='submit_actualizar(FormUpdate)' >Actualizar</button>
    </div>
</div>
</form>
