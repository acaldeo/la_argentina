<?php 
interface iProveedor{
	public function all_Proveedores();
	public function get_proveedor($proveedor_id);
	public function add_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu);
	public function edit_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu,$proveedor_id);
	public function get_proveedorByCuit($cuit);
}//end iItem