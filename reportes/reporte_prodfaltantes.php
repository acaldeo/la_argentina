<?php
 	date_default_timezone_set('America/Argentina/Buenos_Aires');
      $id = $_GET['idproveedor'];
	  require('fpdf.php');

	  
	
		//$mysqli=new mysqli("localhost","c16292","f0hq5a9mJWKH","c16292_cejupeba");
		$mysqli=new mysqli("localhost","root","","laargentina");
		$resultado = $mysqli->query("SELECT productos.descripcion, proveedores.razon_social from (proveedores inner join productos on proveedores.idproveedor = productos.idproveedor) where proveedores.idproveedor = '$id'");	
		while($registro2 = mysqli_fetch_array($resultado))	
		{
			$razonsocial = $registro2[1];
			break;
		}
		
		

	  //$pdf->Image('logo2.png',10,8,50);
	  class pdf extends FPDF
	  {
	  	 
	  	public function header()
	  	{
	  		$this->SetFont('Arial','B',20);
	  		$this->Ln();
			
			$this->Ln(10);
			//$this->Cell (0,0,'CEJUPEBA',0,2,'L');
			$this->Write (5,'Minimercado LA ARGENTINA');
			$this->SetFont('Arial','',10);
			$this->Ln();
			$this->SetTextColor(61,174,233);
			$this->Write (5,'Segundo Sombras 1331 - Baradero - Bs. As.');
			$this->Ln();
			$this->Write (5,'Tel: 03329-15697421'); 
			$this->Ln(10);

	  	}
	  	public function footer()
	  	{
	  		// Posición: a 1,5 cm del final
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	  	}
	}
	  $fpdf=new pdf();
	  $fpdf->AliasNbPages();
	  $fpdf->AddPage('P', 'A4');
	  $fpdf->Ln(10);
	  $fpdf->SetFont('Arial','B',14); 
	  $fpdf->Cell(0,5,'Detalle de productos faltantes del proveedor:'." ".$razonsocial,0,0,'C');
	  $fpdf->SetFontSize(10);
	  $fpdf->SetFillColor(255,255,255);
	  $fpdf->SetTextColor(40,40,40);
	  $fpdf->SetDrawColor(88,88,88);
	  $fpdf->Ln(10); 
	  $fpdf->Cell(100,10,'NOMBRE PRODUCTO',0,0,'C',1);
	  //$fpdf->Cell(45,10,'MONTO',0,0,'C',1);
	  //$fpdf->Cell(45,10,'TIPO',0,1,'C',1);
	  $fpdf->SetDrawColor(61,174,233);
	  $fpdf->SetLineWidth(1);
	  $fpdf->Line(10,68,199,68);
	  
	  $fpdf->SetLineWidth(0.2);	
	  $fpdf->SetFillColor(240,240,240);
	  $fpdf->SetTextColor(40,40,40);
	  $fpdf->SetDrawColor(255,255,255);	
	  $fpdf->Ln(0.3);
			//         ancho,altura
	  $fpdf->SetFont('Arial','',8);

	  $resultado = $mysqli->query("SELECT productos.descripcion, proveedores.razon_social from (proveedores inner join productos on proveedores.idproveedor = productos.idproveedor) where proveedores.idproveedor = '$id'");	
	  while($registro = mysqli_fetch_array($resultado))	
		{	
			  
			  $fpdf->Cell(100,6,$registro[0],1,0,'L',1);
			  //$fpdf->Cell(45,6,$registro[1],1,0,'L',1);
			  //if ($registro['tipo']== 0) {
			  //	$fpdf->Cell(45,6,'Salida',1,1,'L',1);
			  //}else{
			  //	$fpdf->Cell(45,6,'Entrada',1,1,'L',1);
			  //}	
			  
		} 
		
	  	


		  //$pdf->Output('F', '/home/c16292/public_html/detailing/presupuestos/Presupuesto.pdf');
		$fpdf->Output();
	
	mysql_close;
	  
?>
