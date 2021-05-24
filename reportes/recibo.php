<?php
 	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$idcobrador = $_POST['idcobrador'];
	$mes = $_POST['mes'];
	$anio = $_POST['anio'];
	//echo "$idcuota";
	require('fpdf.php');
	
	$mysqli=new mysqli("localhost","c16292","f0hq5a9mJWKH","c16292_cejupeba");
	$resultado = $mysqli->query("select socios.nombre_apellido as nombre, socios.calle as calle, socios.nro as nro, cuotas.periodo_mes, cuotas.periodo_anio, cuotas.importe from (cuotas inner join socios on cuotas.idsocio = socios.idsocio) where socios.idcobrador = $idcobrador and cuotas.periodo_mes = '$mes' and cuotas.periodo_anio = $anio");	
	//$resultado = $mysqli->query("select cuotas.* from ((cuotas inner join socios on cuotas.idsocio = socios.idsocio) inner join cobradores on socios.idcobrador = cobradores.idcobrador) where cuotas.periodo_mes = '$nromes' and cuotas.periodo_anio = $anio and socios.idcobrador = $idcobrador");	
	//SELECT cuotas.* FROM (cuotas inner join socios on cuotas.idsocio = socios.idsocio) where socios.idcobrador = 2 and cuotas.periodo_mes = 'FEBRERO' and periodo_anio = 2021
		
		$pdf = new FPDF();             //Crea objeto PDF
    //  $pdf->AliasNbPages();
	  $pdf->AddPage('P', 'A4'); //Vertical, Carta
	  
	  //ENCABEZADO
	  $pdf->SetFont('Arial','',10);//Establece la fuente a utilizar, el formato 
	  //$pdf->Image('logo2.png',10,8,50);
	  $resultado2 = $mysqli->query("select cobradores.nombre_apellido as nombre from cobradores where idcobrador = $idcobrador");	
	  while($registro2 = mysqli_fetch_array($resultado2))	
	  {
		  $nombrecobrador = $registro2[0];
		  break;
	  }
	  $pdf->Cell (0,0,'Cobrador: '." ".$nombrecobrador,0,2,'L');
	  

	  //$pdf->Line(90,15,10,15);//linea horizontal superior
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
					
			//bucle columnas
			//for ($i = 1; $i <= 2; $i++) {
			//	//bucle filas
			//$pdf->Cell (40,5,'Centro de Jubilados y Pensionados de Baradero',0,2,'L');
				//for ($x = 1; $x <= 2; $x++) {
					$pdf->Ln();
					$pdf->Ln(10); 
					//$pdf->Cell (0,0,'',0,0,'L');
					$pdf->Line($lineasup_a,$lineasup_b,$lineasup_c,$lineasup_d);//linea horizontal superior
					$pdf->Line($lineainf_a,$lineainf_b,$lineainf_c,$lineainf_d); //linea horizontal inferior
	  				$pdf->Line($lineader_a,$lineader_b,$lineader_c,$lineader_d); //linea vertical derecha
	  				$pdf->Line($lineaizq_a,$lineaizq_b,$lineaizq_c,$lineaizq_d); //linea vertical izquierda
					$pdf->Cell (0,1,'Centro de Jubilados y Pensionados de Baradero',0,2,'L');
					//$pdf->Cell (0,10,'Socio: '." ".$registro[0]." ".$registro[1],0,2,'L'); 
					$pdf->Cell (0,10,'Socio: '." ".$registro[0],0,2,'L'); 
					$pdf->Cell (0,1,'Domicilio: '." ".$registro[1]." ".$registro[2],0,2,'L'); 
					$pdf->Cell (0,10,'Mes: '." ".$registro[3],0,2,'L'); 
					$pdf->Cell (0,1,'Año '." ".$registro[4],0,2,'L'); 
					$pdf->Cell (0,10,'Importe: $'." ".$registro[5],0,2,'L'); 
					

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
