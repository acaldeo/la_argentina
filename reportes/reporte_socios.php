<?php
 	

	
	require('fpdf.php');
	
	$mysqli=new mysqli("localhost","c16292","f0hq5a9mJWKH","c16292_cejupeba");
	$resultado = $mysqli->query("SELECT idsocio, nombre_apellido, calle, nro, telefono, fecha_alta, antiguedad from socios where estado <> 'BAJA'");	
	 
		
	 class pdf extends FPDF
	  {
	  	
	  	public function header()
	  	{
	  		$this->SetFont('Arial','B',20);
	  		$this->Ln();
			
			$this->Ln(10);
			//$this->Cell (0,0,'CEJUPEBA',0,2,'L');
			$this->Write (5,'CEJUPEBA');
			$this->SetFont('Arial','',10);
			$this->Ln();
			$this->SetTextColor(61,174,233);
			//$this->Cell (0,10,'Anchorena 724 - Baradero - Bs. As.',0,2,'L'); 
			$this->Write (5,'Anchorena 724 - Baradero - Bs. As.');
			$this->Ln();
			$this->Write (5,'Tel: 03329-15605094'); 
			//$this->Cell (0,1,'Tel: 03329-15605094',0,2,'L');
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
	  $fpdf->Cell (0,20,'Listado de Socios',0,2,'C'); 

	  $fpdf->SetFontSize(10);
	  $fpdf->SetFillColor(255,255,255);
	  $fpdf->SetTextColor(40,40,40);
	  $fpdf->SetDrawColor(88,88,88);
	  $fpdf->Ln(5); 
	
	  $fpdf->Cell(15,4,'CODIGO',0,0,'C',1);
	  $fpdf->Cell(40,4,'NOMBRE Y APELLIDO',0,0,'C',1);
	  $fpdf->Cell(40,4,'CALLE',0,0,'C',1);	
	  $fpdf->Cell(15,4,'NRO',0,0,'C');	 
	  $fpdf->Cell(30,4,'TELEFONO',0,0,'C',1);	
	  $fpdf->Cell(20,4,'ALTA',0,0,'C',1);	
	  $fpdf->Cell(15,4,'ANTIG.',0,1,'C',1);	

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
	  while($registro = mysqli_fetch_array($resultado))	
		{
			  $fpdf->Cell(15,6,$registro[0],1,0,'R',1);
			  $fpdf->Cell(40,6,$registro[1],1,0,'L',1);
			  $fpdf->Cell(40,6,$registro[2],1,0,'L',1);
			  $fpdf->Cell(15,6,$registro[3],1,0,'L',1);
			  $fpdf->Cell(30,6,$registro[4],1,0,'L',1);
			  $newDate = date("d/m/Y", strtotime($registro[5]));  
			  $fpdf->Cell(20,6,$newDate,1,0,'C',1);
			  $fpdf->Cell(15,6,$registro[6],1,1,'C',1);
		} 
	  
	  


		  //$pdf->Output('F', '/home/c16292/public_html/detailing/presupuestos/Presupuesto.pdf');
		$fpdf->Output();
	
	mysql_close;
	  
?>
