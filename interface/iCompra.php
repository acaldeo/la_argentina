<?php 
interface iCompra{
	public function all_Compras();
	//public function get_proveedor($proveedor_id);
	public function add_compra($Vproveedor, $Vproducto, $Vcantidad, $Vcompra);
	//public function edit_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pestado, $Pcategoria, $Pcuit,$Pcbu,$proveedor_id);
}//end iCompra