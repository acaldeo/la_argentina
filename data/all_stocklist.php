<?php 
require_once('../class/Stock.php');
$stockList = $stock->all_stockList();

// echo '<pre>';
//     print_r($stockList);
// echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-stocklist" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center></center></th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <th><center>Cantidad</center></th>
                    <th><center>Stock Minimo</center></th>
                    <th><center>Stockaximo</center></th>
                    <th><center></center></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $dateNow = date('Y-m');
                    foreach($stockList as $sl): 
                    $xDate = date('Y-m', $xDate);
                    $class = "text-success";
                    /*if($xDate == $dateNow){ 
                        $class = "text-warning";
                    }*/
                ?>
                    <tr  align="center" class="<?= $class; ?>">
                        <td><input type="checkbox" name="stock" value="<?= $sl['stock_id']; ?>"></td>
                        <td align="left"><?= $sl['item_code']; ?></td>
                        <td align="left"><?= ucwords($sl['item_name']); ?></td>
                        <td><?= $sl['razon_social']; ?></td>
                        <td><?= $sl['stock_qty']; ?></td>
                        <td><?= $sl['stock_min']; ?></td>
                        <td><?= $sl['stock_max']; ?></td>
                        <td>
                           <center>
                               <button onclick="editModalStock('<?= $sl['stock_id']; ?>');" type="button" class="btn btn-warning btn-xs">Editar
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                           </center>
                         
                        </td>
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
        $('#myTable-stocklist').DataTable({
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
                            }
                        });
    });
</script>

<?php 
$stock->Disconnect();
 ?>