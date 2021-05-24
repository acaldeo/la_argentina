<?php 
    require_once('../class/Stock.php');
    require_once('../class/Cart.php');
    $stocks = $stock->all_stockList();
    $cartDatas = $cart->all_cartDatas($_SESSION['logged_id']);
    // echo '<pre>';
    //     print_r($cartDatas);
    // echo '</pre>';
 ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">    
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Productos <input  type="text" style="color:black;" name="codigo-scanner" id="codigo-scanner" onkeypress="validar(event)" /></h3>
               
            </div>
            <div class="panel-body">
                <!-- start item -->
               <div class="table-responsive">
                        <table id="myTable-item-order" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Código</center></th>
                                    <th><center>Producto</center></th>
                                    <th><center>Precio</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center>Stock-Min</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($stocks as $s): ?>
                                 <?php 
                                    $iva = ($s['item_iva'] / 100);
                                    $precio =  ($s['item_price'] * $iva) + $s['item_price'];  ?>
                                <tr align="center">
                                    <td><?= ucwords($s['item_code']); ?></td>
                                    <td><?= ucwords($s['item_name']); ?></td>
                                    <td><?= "$ ".number_format($precio, 2); ?></td>
                                    <td><?= $s['stock_qty']; ?></td>
                                       <td align="left" width="110px;"><?= $s['stock_min'];?>
                                        <?php if($s['stock_qty'] < $s['stock_min']): ?>
                                            <span class="label label-danger">!</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button  onclick="toCart('<?= $s['stock_id']; ?>','<?= $s['stock_qty']; ?>','<?= $s['item_id']; ?>','<?= $precio; ?>');" type="button" class="btn btn-success btn-xs" title="Agregar a carrito">
                                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>  
            </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-item-order').DataTable({
                                "language": {
                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                "sZeroRecords":    "No se encontraron resultados",
                                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ productos",
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

                <!-- end item -->
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                Carrito
                </h3>
            </div>
            <div class="panel-body">
                <!-- cart -->
                <div class="table-responsive">
                        <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Producto</center></th>
                                    <th><center>Precio</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center>Sub</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;
                             foreach($cartDatas as $c): 
                                /*$iva = ($c['item_iva'] / 100);
                                $precio =  ($c['item_price'] * $iva) + $c['item_price']; */
                                //$price = $c['item_price'];
                                $qty = $c['cart_qty'];
                                $subTotal = $c['cart_precio'];
                                $total += $subTotal;
                            ?>
                                <tr align="center">
                                    <td><?= ucwords($c['item_name']); ?></td>
                                    <td><?= "$ ".number_format($precio, 2); ?></td>
                                    <td><?= $c['cart_qty']; ?></td>
                                    <td><?= number_format($subTotal,2); ?></td>
                                    <?php $cantidadItems = $cantidadItems + $c['cart_qty'];?>
                                    <td>
                                    <button onclick="delCart('<?= $c['cart_stock_id']; ?>','<?= $qty; ?>','<?= $c['cart_id']; ?>');" type="button" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td align="center">
                                        <strong><?= number_format($total, 2); ?></strong>
                                    </td>
                                    <td>
                                        <?php if($total > 0): ?>
                                        <button onclick="confirm_cart('<?=$total; ?>')" type="button" class="btn btn-success btn-xs">
                                        Confirmar
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                        </table>
                        <strong><?php  if ($cantidadItems != 0) {
                            echo "Cantidad de items:  ". $cantidadItems;
                        }  ?></strong>
                </div>
             </div>   
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-cart').DataTable({
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

                <!-- cart -->
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#codigo-scanner").focus();
        //$("#codigo-scanner").val('1');
    });
</script>
<br /><br /><br /><br /><br /><br /><br /><br />
