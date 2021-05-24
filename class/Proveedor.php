<?php
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../database/Database.php');
require_once('../interface/iProveedor.php');
class Proveedor extends Database implements iProveedor {
	public function all_Proveedores()
	{
		$sql = "SELECT * FROM proveedores ORDER BY razon_social ASC";
		return $this->getRows($sql);
	}//end all_proveedor
	
	public function get_proveedor($proveedor_id)
	{
		$sql = "SELECT * FROM proveedores
				WHERE idproveedor = ?";
		return $this->getRow($sql, [$proveedor_id]);
	}//end edit_proveedor
	public function get_proveedorByCuit($cuit)
	{
		$sql = "SELECT * FROM proveedores
				WHERE cuit = ?";
		return $this->getRow($sql, [$cuit]);
	}//end edit_proveedor
	public function add_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu)
	{
		$sql = "INSERT INTO proveedores(razon_social,domicilio, localidad,provincia, telefono, email, cuit, cbu)
				VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu]);
	}//end add_proveedor

	public function edit_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu,$proveedor_id)
	{
		$sql = "UPDATE proveedores 
				SET razon_social = ?, domicilio = ?,localidad = ?, provincia = ?, telefono = ?, email = ?, cuit = ?, cbu = ?
				WHERE idproveedor = ?";
		return $this->updateRow($sql, [$Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu,$proveedor_id]);
	}//end edit_item
}//end class Item

$proveedor = new Proveedor();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */