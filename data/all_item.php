<?php 
    require_once('../class/Item.php');
    $items = $item->all_items();
    // echo '<pre>';
    //     print_r($items);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <!--th><center>Cantidad</center></th-->
                    <th><center>Costo</center></th>
                    <th><center>Precio Venta</center></th>
                    <th>Iva</th>
                    <!--th>Stock Max</th>
                    <th>Stock Min</th-->
                    <th>
                        <center>Acciones</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $it): ?>
                    <tr align="center">
                        <td align="left"><?= $it['item_code']; ?></td>
                        <td align="left"><?= ucwords($it['item_name']); ?></td>
                        <td align="left"><?= $it['proveedor']; ?></td>
                        <!--td align="left"><?= $it['item_qty']; ?></td-->
                        <td><?= "$ ".number_format($it['purchase'], 2); ?></td>
                        <td><?= "$ ".number_format($it['item_price'], 2); ?></td>
                        <td align="left"><?= $it['item_iva']; ?></td>
                        <!--td align="left"><?= $it['item_stock_max']; ?></td>
                        <td align="left"><?= $it['item_stock_min']; ?></td-->
                        <td>
                           <center>
                               <button onclick="editModal('<?= $it['item_id']; ?>');" type="button" class="btn btn-warning btn-xs">Editar
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                                <button onclick="aumentarPrecio('<?= $it['item_id']; ?>','<?= $it['item_name']; ?>','<?= $it['item_price']; ?>');" type="button" class="btn btn-primary btn-xs">Aumentar
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
        $('#myTable-item').DataTable();
    });
</script>

<?php 
$item->Disconnect();
 ?>