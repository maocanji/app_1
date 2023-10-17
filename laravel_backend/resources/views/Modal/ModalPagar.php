<div class="modal-content animated bounceInRight">
    <div class="modal-header bg-success">
        <h4 class="modal-title">Pagar</h4>
    </div>
    <div class="modal-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><% datos.Total %></h1>
                <p class="lead">Total de Minutos : <% datos.formato_horas %></p>
                <small>Valor de la Hora: $ 1.00 </small>
            </div>

        </div>
        <div class="row">
        <button value="Guardar" class='btn btn-success btn-lg btn-block' data-ng-click='submit_pagar(datos)'>Pagar</button>
        </div>

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
                <td><% datos.salidatos %></td>
                <td><% datos.formato_horas %></td>
                <td><% datos.Total %></td>

            </tr>

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white"  data-dismiss="modal" ng-click="cancel()">Close</button>
    </div>
</div>
