<?php
require '../Modelo/ModeloOperarios.php';
require '../../modal/pagination.php';
$Paginacion = new Paginacion();
$Operario = new Operarios();

//recibimos las variables al cargar la pagina
$limit = $_POST['limit'];
$pagina = $_POST['pagina'];

//La funcion contadorUsuarios nos da la cantidad total de usuarios 
$Operarios = $Operario->contadorOperarios();
$totalOperarios = $Operarios[0]['codigo']; 


//Vamos a tener como resultado siempre el valor entero. "1.3 = 2"
$totalpaginas = ceil($totalOperarios / $limit);


if ($pagina != null) {
    $cur_page = $pagina;
    $number_of_pages = $totalpaginas;
    $Paginacion->insertPagination('operariosVista.php', $cur_page, $number_of_pages, true);
}

