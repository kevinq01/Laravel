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

$reporte->setTitle("Tiempo empaque operario");


//Posicion del titulo
$reporte->setCellValue('A1', 'Tiempo muerto empaque operario');

if ($selectedOption === "1") {
    $reporte->setCellValue('D1', 'Fecha:');

    if ($verDesde === $verHasta) {
        $reporte->setCellValue('E1',  $verDesde);
    } else {
        $reporte->setCellValue('E1',  $verDesde . " Hasta: " .  $verHasta);
        $spreadsheet->getActiveSheet()->mergeCells("E1:F1");

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
$reporte->setCellValue('A2', 'Codigo');
$reporte->setCellValue('B2', 'Operario');
$reporte->setCellValue('C2', 'Causa');
$reporte->setCellValue('D2', 'Minutos');
$reporte->setCellValue('E2', 'Horas');


//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(20);

//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->applyFromArray($tableStyle);

$count = 3;

if ($selectedOption === "1") {
    $Reporte = $report->tiempoEmpaqueOperarioFecha($desde, $hasta);
} else {
    $Reporte = $report->tiempoEmpaqueOperarioSemana($Week);
}

if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['operario']);
        $reporte->setCellValue('B' . $count, $rows['nombre']);
        $reporte->setCellValue('C' . $count, $rows['causa']);
        $reporte->setCellValue('D' . $count, $rows['minutos']);
        $reporte->setCellValue('E' . $count, $rows['horas']);

        $count++;
    }
} else {
    $reporte->setCellValue('A4', "No hay registros en las fechas seleccionadas");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":E" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="empaqueOperario-' . $desde . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
