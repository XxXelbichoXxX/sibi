<?php
require('./fpdf.php');


class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      /*$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hh";

      $conexion = mysqli_connect($servername, $username, $password, $dbname);
      $claveHotel=$_SESSION['claveH'];

      $consulta_info = $conexion->query("select * from hoteleria WHERE claveHotel = '$claveHotel'");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();*/
      $this->Image('../../img/logo-sibi.png', 230, 5, 70); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->Image('../../img/logo-ine.png', 10, 2, 70); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(75); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(130, 15, utf8_decode("SISTEMA DE BIENES INFORMATICOS"), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* ClaveHotel */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Autor : "), 0, 0, '', 0);
      $this->Ln(5);

      /* Domicilio */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Departamento :  "), 0, 0, '', 0);
      $this->Ln(5);


      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(180, 44, 44);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(80, 10, utf8_decode("Generación de Reportes"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(171, 184, 195); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(204, 196, 172); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('Estatus'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Resguardo'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Junta a la que pertenece'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Marca'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Modelo'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Serie'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Numero de inventario'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

/* CONSULTA INFORMACION DEL HOSPEDAJE */
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hh";

$conexion = mysqli_connect($servername, $username, $password, $dbname);*/
$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$claveHotel=$_SESSION['claveH'];
$consulta_reporte_empleado = $conexion->query(" SELECT * FROM EMPLEADO WHERE claveHotel = '$claveHotel'");

while ($datos_reporte = $consulta_reporte_empleado->fetch_object()) {  */ 
   /* TABLA */
   /*$pdf->Cell(40, 10, utf8_decode("$datos_reporte->claveEmpleado"), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode("$datos_reporte->claveArea"), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode("$datos_reporte->antiguedad"), 1, 0, 'C', 0);
   $pdf->Cell(70, 10, utf8_decode("$datos_reporte->nombreEmpleado"." ".$datos_reporte->apellidoEmpleado), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode("$datos_reporte->NSS"), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode("$datos_reporte->status"), 1, 1, 'C', 0);
}*/
$date = date("d M Y");
$pdf->Output('ReporteSibi_'.$date.'.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
