<?php

//import.php

include '../../vendor/autoload.php';
require '../Modelo/ModeloOperarios.php';

$operarios = new Operarios();

try {

    if ($_FILES["import_excel"]["name"] != '') {
        $allowed_extension = ['xls', 'csv', 'xlsx'];
        $file_array = explode(".", $_FILES["import_excel"]["name"]);
        $file_extension = end($file_array);

        if (in_array($file_extension, $allowed_extension)) {
            $file_name = time() . '.' . $file_extension;
            move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
            $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

            $spreadsheet = $reader->load($file_name);

            unlink($file_name);

            $data = $spreadsheet->getActiveSheet()->toArray();

            foreach ($data as $row) {
                $newData[] = [
                    'codigo' => $row[0],
                    'nombre' => $row[1],
                    'cedula' => $row[2],
                ];
            }

            $sw = false;
            $contador= 0;
            $codigoBaseDedatos = $operarios->listOperario();
            if ($codigoBaseDedatos != null) {

                foreach ($codigoBaseDedatos as $codigoBD) {
                    $codigosOperario[] = $codigoBD['id_operario'];
                }

                $filtered = array_filter($newData, function ($item) use ($codigosOperario) {
                    return !in_array($item['codigo'], $codigosOperario);
                });
                foreach ($filtered as $arregloUpdate) {
                    $codigo =  $arregloUpdate['codigo'];
                    $nombre =   $arregloUpdate['nombre'];
                    $cedula =   $arregloUpdate['cedula'];
                    if ($codigo != '' && $nombre != '' && $cedula != '') {
                        $sw = true;
                        $contador = $contador + 1;
                        $nombre = (ucwords(strtolower($nombre)));
                        $Operarios = $operarios->ingresarOperarios($codigo, $nombre, $cedula);
                    }
                }
                if ($sw === true) {
                    echo  $message = '<div class="alert alert-success">
                    <i class="fas fa-file-check"></i> Nuevos operarios cargados correctamente.('. $contador .')
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>';
                } else {
                    echo  $message = '<div class="alert alert-danger"><i class="fas fa-ban"></i> Este archivo no contiene datos nuevos.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>';
                }
            } else {
                foreach ($newData as $newData) {
                    $codigo =  $newData['codigo'];
                    $nombre =   $newData['nombre'];
                    $cedula =   $newData['cedula'];
                    if ($codigo != '' && $nombre != '' && $cedula != '') {
                        $sw = true;
                        $contador = $contador + 1;
                        $nombre = (ucwords(strtolower($nombre)));
                        $Operarios = $operarios->ingresarOperarios($codigo, $nombre, $cedula);
                    }
                }
                if ($sw === true) {
                    echo  $message = '<div class="alert alert-success"><i class="fas fa-file-check"></i> Datos cargados correctamente.('. $contador .')
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>';
                } else {
                    echo  $message = '<div class="alert alert-danger"><i class="fas fa-ban"></i> Este archivo no contiene datos nuevos.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>';
                }
            }
        } else {
            echo  $message = '<div class="alert alert-danger"><i class="fas fa-ban"></i> Solo se permiten archivos:<strong> .xls .csv or .xlsx </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>';
        }
    } else {
        echo  $message = '<div class="alert alert-primary"><i class="fas fa-hand-pointer"></i> Por favor, selecciona un archivo.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>';
    }
} catch (PDOException $e) {
    echo  $message = '<div class="alert alert-danger"><i class="fas fa-ban"></i> Este archivo no contiene datos nuevos.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
}

?>