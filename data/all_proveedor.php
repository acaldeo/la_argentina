<?php 
/*************************/
//Mostrar errores php
///*************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
    require_once('../class/Proveedor.php');
    $proveedores = $proveedor->all_Proveedores();
    // echo '<pre>';
    //     print_r($items);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-proveedor" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Razon Social</th>
                    <th>Domicilio</th>
                    <th>Localidad</th>
                    <th><center>Provicina</center></th>
                    <th><center>Telefono</center></th>
                    <th><center>Mail</center></th>
                    <th><center>Fecha Alta</center></th>
                    <th>Cuit</th>
                    <th>CBU</th>
                    
                    <th>
                        <center>Acciones</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($proveedores as $prov): ?>
                    <tr align="center">
                        
                        <td align="left"><?= ucwords($prov['razon_social']); ?></td>
                        <td align="left"><?= ucwords($prov['domicilio']); ?></td>
                        <td align="left"><?= ucwords($prov['localidad']); ?></td>
                        <td align="left"><?= ucwords($prov['provincia']); ?></td>
                        <td align="left"><?= $prov['telefono']; ?></td>
                        <td align="left"><?= ucwords($prov['email']); ?></td>
                        <td align="left"><?= ucwords($prov['fecha_alta']); ?></td>
                        <td align="left"><?= $prov['cuit']; ?></td>
                        <td align="left"><?= $prov['cbu']; ?></td>
                         <td>
                           <center>
                               <button onclick="editModalProveedor('<?= $prov['idproveedor']; ?>');" type="button" class="btn btn-warning btn-xs">Editar
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
$proveedor->Disconnect();
 ?>