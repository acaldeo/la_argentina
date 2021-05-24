<?php
//Mostrar errores php
///*************************/
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
///*************************/
 	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$id= $_GET['id'];
	
	require('fpdf.php');
	include 'barcode.php';
	
	$mysqli=new mysqli("localhost","c16292","f0hq5a9mJWKH","c16292_laargentina");
	$resultado = $mysqli->query("select descripcion, codigo, precio from productos where idproducto = $id");	
	
	  $pdf = new FPDF();             //Crea objeto PDF
    //  $pdf->AliasNbPages();
	  $pdf->AddPage('P', 'A4'); //Vertical, Carta
	  $pdf->SetMargins(30,25, 30);
	  //$pdf->SetAutoPageBreak(true, 20);//establece el margen inferior
	  //$y=$pdf->GetY();
	  //ENCABEZADO
	  $pdf->SetFont('Arial','',24);//Establece la fuente a utilizar, el formato 
	  //$pdf->Image('logo2.png',10,8,50);
	  ////$pdf->Line(90,15,10,15);//linea horizontal superior
	  //$pdf->Line(90,45,10,45); //linea horizontal inferior
	  //$pdf->Line(90,15,90,45); //linea vertical derecha 
	  //$pdf->Line(10,45,10,15); //linea vertical izquierda
	  //variables parametros de lineas
	  $lineasup_a=0;
	  $lineasup_b=0;
	  $lineasup_c=0;
	  $lineasup_d=0;

	  $lineainf_a=0;
	  $lineainf_b=0;
	  $lineainf_c=0;
	  $lineainf_d=0;

	  $lineaizq_a=0;
	  $lineaizq_b=0;
	  $lineaizq_c=0;
	  $lineaizq_d=0;

	  $lineader_a=0;
	  $lineader_b=0;
	  $lineader_c=0;
	  $lineader_d=0;

	  $fila=0;
	  $columna=0;
	  $lineasup_a=90;
	  $lineasup_b=15;
	  $lineasup_c=10;
	  $lineasup_d=15;
	  		  
	  $lineainf_a=90;
	  $lineainf_b=50;
	  $lineainf_c=10;
	  $lineainf_d=50;
			  
	  $lineader_a=90;
	  $lineader_b=15;
	  $lineader_c=90;
	  $lineader_d=50;
			  
	  $lineaizq_a=10;
	  $lineaizq_b=50;
	  $lineaizq_c=10;
	  $lineaizq_d=15;


					
	  while($registro = mysqli_fetch_array($resultado))	
	  
		{
					
					$pdf->Ln();
					$pdf->Ln(10); 
					//$pdf->Cell (0,0,'',0,0,'L');
					$pdf->Line($lineasup_a,$lineasup_b,$lineasup_c,$lineasup_d);//linea horizontal superior
					$pdf->Line($lineainf_a,$lineainf_b,$lineainf_c,$lineainf_d); //linea horizontal inferior
	  				$pdf->Line($lineader_a,$lineader_b,$lineader_c,$lineader_d); //linea vertical derecha
	  				$pdf->Line($lineaizq_a,$lineaizq_b,$lineaizq_c,$lineaizq_d); //linea vertical izquierda*/
					//$pdf->Cell (0,1,'Centro de Jubilados y Pensionados de Baradero',0,2,'L');
					//$pdf->Cell (0,10,'Socio: '." ".$registro[0]." ".$registro[1],0,2,'L'); 
					$pdf->SetFont('Arial','',20);
					$pdf->Cell (0,1,$registro[0],0,2,'L'); 
					$pdf->Ln(10);
					$code=$registro[1];
					
					barcode('codigos/'.$code.'.png', $code, 20, 'horizontal','code128',true);
					

					$pdf->Image('codigos/'.$code.'.png',25,25,50,0,'PNG');
					//$pdf->Cell (0,1,' '." ".$registro[1],0,2,'L'); 
					$pdf->Ln(8); 
					$pdf->Cell (0,10,'$'."  ".$registro[2],0,2,'L'); 
					

					$lineasup_a=$lineasup_a+0;
					$lineasup_b=$lineasup_b+50;
					$lineasup_c=$lineasup_c+0;
					$lineasup_d=$lineasup_d+50;
			  
					$lineainf_a=$lineasup_a+0;
					$lineainf_b=$lineasup_b+40;
					$lineainf_c=$lineasup_c+0;
					$lineainf_d=$lineasup_d+40;
			  
					$lineader_a=$lineader_a;
					$lineader_b=$lineader_b+50;
					$lineader_c=$lineader_c;
					$lineader_d=$lineader_d+55;
			  
					$lineaizq_a=$lineaizq_a;
					$lineaizq_b=$lineaizq_b+55;
					$lineaizq_c=$lineaizq_c;
					$lineaizq_d=$lineaizq_d+50;
		     	    
	  				
	  				//$pdf->Cell (0,10,'Socio: Luis Lavanchy',0,2,'L'); 
	  			//	$pdf->Cell (0,1,'Domicilio: Libertad 2195',0,2,'L'); 
	  			//	$pdf->Cell (0,10,'Mes: MARZO',0,2,'L'); 
	  			//	$pdf->Cell (0,1,'Anio: 2021',0,2,'L'); 
					//$pdf->Line(90,15,10,15);//linea horizontal superior
					
					//	$pdf->Ln();
	  				//$pdf->Ln(10); 
				//}
				
			//}
	  		
	  		//$y = $y+15;
		}

	  //$pdf->Line(500,70,0,70);
	  //$pdf->SetFont('Arial','',10);
	  //$pdf->Cell (0,10,'Datos del Cliente',0,2,'L'); 
	  //$pdf->Line(500,87,0,87); 
	  //while($registro = mysqli_fetch_array($resultado))	
	//	{
			//$codigo = $registro[0];
		
			//         ancho,altura
	  //$pdf->SetFont('Arial','',8);
	  //$newDate = date("d/m/Y", strtotime($registro[0])); 
	  //$pdf->Cell(50,6,'Fecha presupuesto:'." ".$newDate,1,1,'L');
	  //$newDate2 = date("d/m/Y", strtotime($registro[15]));  
	  //$pdf->Cell(50,6,'Codigo:'." ".$registro[0],1,1,'L');
	//	} 
	  //$pdf->Cell(50,6,'Titular:'." ".$registro[1],1,1,'L');
	  //$pdf->Cell(50,6,'Telefono:'." ".$registro[8],1,1,'L');
	  //$pdf->Cell(50,6,'Vehiculo:'." ".$registro[9]." ".$registro[10],1,1,'L');	
	  //$pdf->Cell(50,6,'Patente:'." ".$registro[2],1,1,'L');			
	  //$pdf->Cell(50,6,'Compania:'." ".$registro[11],1,1,'L');	
	  //$pdf->Line(500,140,0,140);
	  


		  //$pdf->Output('F', '/home/c16292/public_html/detailing/presupuestos/Presupuesto.pdf');
		$pdf->Output();
	
	mysql_close;
	  
?>
