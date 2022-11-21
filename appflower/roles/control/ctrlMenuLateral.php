<?php

require '../Modelo/ModeloRoles.php';

$User = new Roles();


//Recibimos las variables de Jquery
$perfil = $_POST['perfil'];
$title = $_POST['title'];

function adminMenu($title)
{

    //Declaramos por defecto el valor del usuario
    $Usuarios = "btn-outline-dark";


    //Si el titulo es Usuarios, Le va a modificar la propiedad 
    switch ($title) {
        case 'Usuarios':
            $Usuarios = "btn-dark";
            break;
    }
    echo "<a href='../../usuarios/vista/usuariosVista.php' class='btn btn-block $Usuarios  mb-2   text-left'><i
    class='fad fa-user  pr-2'></i>Usuarios</a>";
}

function userMenu($title)
{
    $indexAdmin = "btn-outline-dark";

    $Operarios = "btn-outline-dark";

    switch ($title) {
        case 'Reportes':
            $indexAdmin = "btn-dark";
            break;
        case 'Operarios':
            $Operarios = "btn-dark";
            break;
    }
    echo "<a href='../../reportes/vista/reportesVista.php' class='btn btn-block $indexAdmin  mb-2 text-left'><i class='fas fa-flag pr-2'></i>Reportes</a>";

    echo "<a href='../../operarios/vista/operariosVista.php' class='btn btn-block $Operarios  mb-2   text-left'><i
        class='fad fa-user-hard-hat  pr-2'></i>Operarios</a>";
}

function liderMenu($title)
{

    $produccion = "btn-outline-dark";
    $empaque = "btn-outline-dark";
    $materialSeco = "btn-outline-dark";
    $tinturados = "btn-outline-dark";
    $picking = "btn-outline-dark";
    $tiempoProduccion = "btn-outline-dark";
    $tiempoEmpaque = "btn-outline-dark";
    $tiempogeneral = "btn-outline-dark";

    switch ($title) {
        case 'Produccion':
            $produccion = "btn-dark";
            break;
        case 'Empaque':
            $empaque = "btn-dark";
            break;
        case 'Material Seco':
            $materialSeco = "btn-dark";
            break;
        case 'Tinturados':
            $tinturados = "btn-dark";
            break;
        case 'Picking':
            $picking = "btn-dark";
            break;
        case 'Tiempo Produccion':
            $tiempoProduccion = "btn-dark";
            break;
        case 'Tiempo Empaque':
            $tiempoEmpaque = "btn-dark";
            break;
        case 'Tiempo General':
            $tiempogeneral = "btn-dark";
            break;
    }
    echo "<a href='../../produccion/vista/produccionVista.php' class='btn btn-block $produccion mb-2 text-left'><i
        class='fas fa-seedling pr-2'></i>Produccion</a>";
    echo "<a href='../../empaque/vista/empaqueVista.php' class='btn btn-block $empaque mb-2 text-left'><i
        class='fas fa-box-open  pr-2'></i>Empaque</a>";
    echo "<a href='../../materialSeco/vista/materialSecoVista.php' class='btn btn-block $materialSeco mb-2 text-left'><i
        class='fas fa-tags pr-2'></i>Material Seco</a>";
    echo "<a href='../../tinturado/vista/tinturadoVista.php' class='btn btn-block $tinturados mb-2 text-left'><i
        class='fas fa-spray-can  pr-2'></i>Tinturados</a>";
    echo "<a href='../../picking/vista/pickingVista.php' class='btn btn-block $picking mb-2 text-left'><i
        class='fad fa-person-carry  pr-2'></i>Picking</a>";
    echo "<a href='../../tmProduccion/vista/tmProduccionVista.php' class='btn btn-block $tiempoProduccion mb-2 text-left'><i
        class='fas fa-stopwatch pr-2'></i>Tiempo Produccion</a>";
    echo "<a href='../../tmEmpaque/vista/tmEmpaqueVista.php' class='btn btn-block $tiempoEmpaque mb-2 text-left'><i
        class='fas fa-stopwatch pr-2'></i>Tiempo Empaque</a>";
    echo "<a href='../../tmGeneral/vista/tmGeneralVista.php' class='btn btn-block $tiempogeneral mb-2 text-left'><i
        class='fas fa-stopwatch pr-2'></i>Tiempo general</a>";
}


//Según el perfil, le vamos a mostrar al usuario la funcion del menu correspondiente
//swtch sin frenos
switch ($perfil) {
    case '1':
        adminMenu($title);

    case '2':
        userMenu($title);

    case '3':
        liderMenu($title);
        break;
}


?>