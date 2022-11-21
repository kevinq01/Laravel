<?php
require_once('../../modal/modal.php');

$modal = new Modal();
$numero = $_POST['numero'];


if($numero == 1){
    $modal->modalOut("primary");
    //$Usuario->logOut();
}


?>