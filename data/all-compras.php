<?php 
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
    require_once('../class/Compra.php');
    $compraProv = $compra->all_Compras();
    // echo '<pre>';
    //     print_r($items);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-compraprov" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th><center>Fecha Compra</center></th>
                   
                    <th>
                        <center>Acciones</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($compraProv as $c): ?>
                    <tr align="center">
                        
                        <td align="left"><?= ucwords($c['razon_social']); ?></td>
                        <td align="left"><?= ucwords($c['item_name']); ?></td>
                        <td align="left"><?= ucwords($c['qty_compra']); ?></td>
                        <td align="left"><?= ucwords($c['fecha_compra']); ?></td>
                         <td>
                           <center>
                               <button onclick="editModalProveedor('<?= $c['idproveedor']; ?>');" type="button" class="btn btn-warning btn-xs">Editar
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
        $('#myTable-proveedor').DataTable();
    });
</script>

<?php 
$compra->Disconnect();
 ?>