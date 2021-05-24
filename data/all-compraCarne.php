<?php 
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../class/Stock-carne.php');
$stockList = $stockCarne->all_stockCarneDetalle();

// echo '<pre>';
//     print_r($stockList);
// echo '</pre>';
 ?>
<br />
<?php
    echo "Detalle: ";
    echo (int)$_GET['stock_id'];
?>
<div class="table-responsive">
        <table id="myTable-stocklistCarne" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <!--th><center></center></th-->
                    <th><center>Tipo</center></th>
                    <th><center>Proveedor</center></th>    
                    <th><center>Cantidad</center></th>
                    <th><center>Fecha Compra</center></th>
                    <th><center>Costo</center></th>
                    <th><center></center></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stockList as $sl): ?>
                    <tr  align="center" class="<?= $class; ?>">
                        <!--td><input type="checkbox" name="stock" value="<?= $sl['stock_id']; ?>"></td--><!--Muestra checkbox para seleccion multiple-->
                        <td align="left"><?= ucwords($sl['item_name']); ?></td>
                        <td align="left"><?= ucwords($sl['razon_social']); ?></td>
                        <td><?= $sl['stock_qty']; ?></td>
                        <td><?= date ("d/m/Y",strtotime($sl['stock_purchased'])); ?></td>
                        <td><?= $sl['costo']; ?></td>
                        <td>
                           <center>
                           
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
        $('#myTable-stocklistCarne').DataTable({
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
$stockCarne->Disconnect();
 ?>