<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">La Argentina</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Administrador <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if (isset($home_menu)){echo "active";}?>">
                        <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i> Inicio</a>
                    </li>
                    <li class="<?php if (isset($item_menu)){echo "active";}?>">
                        <a href="item.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Lista de productos</a>
                    </li>
                    <li class="<?php if (isset($products_menu)){echo "active";}?>">
                        <a href="product.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Stock de almacen</a>
                    </li>
                    <li class="<?php if (isset($producane_menu)){echo "active";}?>">
                        <a href="product_carne.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Stock de carniceria</a>
                    </li>
                    <li class="<?php if (isset($proveedores_menu)){echo "active";}?>">
                        <a href="proveedor.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Lista de proveedores</a>
                    </li>
                    <li class="<?php if (isset($compraprov_menu)){echo "active";}?>">
                        <a href="compras-prov.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Compra a proveedores</a>
                    </li>
                    <li class="<?php if (isset($stock_menu)){echo "active";}?>">
                        <a href="stock.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Inventario</a>
                    </li>
                     <li class="<?php if (isset($expired_menu)){echo "active";}?>">
                        <a href="expired.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Productos con Bajo Stock</a>
                    </li>
                    <li class="<?php if (isset($sales_menu)){echo "active";}?>">
                        <a href="sales.php"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Ventas</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>