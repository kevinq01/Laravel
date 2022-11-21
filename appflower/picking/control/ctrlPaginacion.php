<?php
require('../Modelo/ModeloPicking.php');
require '../../modal/pagination.php';
$picking = new Picking();
$Paginacion = new Paginacion();

//recibimos las variables al cargar la pagina
$limit = $_POST['limit'];
$pagina = $_POST['pagina'];

//La funcion contadorUsuarios nos da la cantidad total de material seco 
$Picking = $picking->contadorPicking();
$totalPicking = $Picking[0]['id'];


//Vamos a tener como resultado siempre el valor entero. "1.3 = 2"
$totalpaginas = ceil($totalPicking / $limit);


$anterior = $pagina - 1;  //atras
$siguiente = $pagina + 1; //adelante



if ($pagina != null) {
    $cur_page = $pagina;
    $number_of_pages = $totalpaginas;
    $Paginacion->insertPagination('pickingVista.php', $cur_page, $number_of_pages, true);
}


?>