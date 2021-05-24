<?php 
require_once('../class/Expired.php');
$expireds = $expired->all_expired();

 ?>
<div class="table-responsive">
        <table id="myTable-expired" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Codigo</center></th>
                    <th><center>Nombre</center></th>
                    <!--th><center>Precio</center></th-->
                    <th><center>Cant.</center></th>
                    <th><center>Stock Min</center></th>
                    <th><center>Proveedor</center></th>
                    <th><center>Pedido</center></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($expireds as $ex): ?>
                <tr align="center" class="text-danger">
                    <td><?= $ex['item_code']; ?></td>
                    <td><?= ucwords($ex['item_name']); ?></td>
                    <!--td><?= "$ ".number_format($ex['item_price'], 2); ?></td-->
                    <td><?= $ex['stock_qty']; ?></td>
                    <td><?= $ex['stock_min']; ?></td>
                    <td><?= $ex['razon_social']; ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-expired').DataTable({
         "language": {
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                     "sPrevious": "Anterior"
                }
            },
                responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]      
        });
    });
</script>

<?php 
$expired->Disconnect();
 ?>