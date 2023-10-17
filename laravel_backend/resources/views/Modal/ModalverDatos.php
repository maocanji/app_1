<div class="modal-content animated bounceInRight">
    <div class="modal-header bg-info">
        <h4 class="modal-title">Datos de Registros</h4>
    </div>
    <div class="modal-body">
        <table  class="table table-hover dataTables-velet">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Placa</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Tiempo</th>
                <th>Total Pagado</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><% datos.id %></td>
                <td><% datos.vehiculo_placa %></td>
                <td><% datos.conductor_nombre %></td>
                <td><% datos.entrada %></td>
                <td><% datos.salida %></td>
                <td><% datos.formato_horas %></td>
                <td><% datos.total %></td>

            </tr>

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white"  data-dismiss="modal" ng-click="cancel()">Close</button>
    </div>
</div>
