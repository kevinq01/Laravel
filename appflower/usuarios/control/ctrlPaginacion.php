<?php
require('../Modelo/ModeloUsuarios.php');
require '../../modal/pagination.php';
$Paginacion = new Paginacion();
$Usuario = new Usuarios();

//recibimos las variables al cargar la pagina
$limit = $_POST['limit'];
$pagina = $_POST['pagina'];

//La funcion contadorUsuarios nos da la cantidad total de usuarios 
$Usuarios = $Usuario->contadorUsuarios();
$totalUsuarios = $Usuarios[0]['correo']; 


//Vamos a tener como resultado siempre el valor entero. "1.3 = 2"
$totalpaginas = ceil($totalUsuarios / $limit);


if ($pagina != null) {
    $cur_page = $pagina;
    $number_of_pages = $totalpaginas;
    $Paginacion->insertPagination('usuariosVista.php', $cur_page, $number_of_pages, true);
}

