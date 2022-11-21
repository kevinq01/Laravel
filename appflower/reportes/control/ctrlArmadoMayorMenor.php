<?php
require '../Modelo/ModeloReporte.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//Style
$tableStyle = [
    'font' => [
        'color' => [
            'rgb' => 'FFFFFF'
        ],
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '366092'
        ]
    ],
];

$report = new Reporte();
$spreadsheet = new Spreadsheet();

if (strlen($_GET['desde']) > 0 and strlen($_GET['hasta']) > 0 and strlen($_GET['selectOption']) > 0 and strlen($_GET['semanaReport']) > 0) {
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];
    $selectedOption = $_GET['selectOption'];
    $Week = $_GET['semanaReport'];

    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
}

$reporte = $spreadsheet->getActiveSheet();

$reporte->setTitle("Reporte Armado");


//Posicion del titulo
$reporte->setCellValue('A1', 'Rendimientos descendente');

if ($selectedOption === "1") {
    $reporte->setCellValue('D1', 'Fecha:');

    if ($verDesde === $verHasta) {
        $reporte->setCellValue('E1',  $verDesde);
    } else {
        $reporte->setCellValue('E1',  $verDesde . " Hasta: " .  $verHasta);
    }

} else {
    $reporte->setCellValue('D1', 'Semana:');
    $reporte->setCellValue('E1',  $Week);
}


//Estilo del titulo
$spreadsheet->getActiveSheet()->mergeCells("A1:C1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight(30);

//Campos de la cabecera
$reporte->setCellValue('A2', 'Labor');
$reporte->setCellValue('B2', 'Codigo');
$reporte->setCellValue('C2', 'Operario');
$reporte->setCellValue('D2', 'Rendimiento');


//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(27);
$spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(27);


//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:E2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:E2')->applyFromArray($tableStyle);

$count = 3;
$labor = 1;

if ($selectedOption === "1") {
    $Reporte = $report->produccionMayorMenor($labor, $desde, $hasta);
} else {
    $Reporte = $report->produccionMayorMenorSemana($labor, $Week);
}

if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['laborArmado']);
        $reporte->setCellValue('B' . $count, $rows['operario']);
        $reporte->setCellValue('C' . $count, $rows['nombre']);
        $reporte->setCellValue('D' . $count, $rows['rendimiento']);
        $count++;
    }
} else {
    $reporte->setCellValue('A4', "No hay registros en las fechas seleccionadas");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":D" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="armado_rendimiento__' . $desde . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
