<?php
/*************************/
//Mostrar errores php
///*************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../database/Database.php');
require_once('../interface/iCompra.php');
class Compra extends Database implements iCompra {
	public function all_Compras()
	{
		$sql = "SELECT * FROM compra_proveedores inner join proveedores on proveedores.idproveedor = compra_proveedores.id_proveedor inner join item on item.item_id = compra_proveedores.id_item ORDER BY razon_social ASC ";
		return $this->getRows($sql);
	}//end all_venta
	
	/*public function get_proveedor($proveedor_id)
	{
		$sql = "SELECT * FROM proveedores
				WHERE idproveedor = ?";
		return $this->getRow($sql, [$proveedor_id]);
	}//end edit_proveedor*/

	public function add_compra($Vproveedor, $Vproducto, $Vcantidad, $Vcompra)
	{
		$sql = "INSERT INTO compra_proveedores(id_proveedor,id_item, qty_compra,fecha_compra)
				VALUES(?, ?, ?, ?)";
		return $this->insertRow($sql, [$Vproveedor, $Vproducto, $Vcantidad, $Vcompra]);
	}//end add_venta

	/*public function edit_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pestado, $Pcategoria, $Pcuit,$Pcbu,$proveedor_id)
	{
		$sql = "UPDATE proveedores 
				SET razon_social = ?, domicilio = ?,localidad = ?, provincia = ?, telefono = ?, email = ?, estado = ?, categoria_iva = ?, cuit = ?, cbu = ?
				WHERE idproveedor = ?";
		return $this->updateRow($sql, [$Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pestado, $Pcategoria, $Pcuit,$Pcbu,$proveedor_id]);
	}//end edit_item*/
}//end class Item

$compra = new Compra();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */