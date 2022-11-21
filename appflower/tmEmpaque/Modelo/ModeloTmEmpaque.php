<?php
require_once '../../conexion.php';

class tmEmpaque extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarCausaEmpaque()
    {
        $listaCausa = null;
        $statement = $this->db->prepare("SELECT * FROM causa_empaque");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaCausa[] = $consulta;
        }
        return $listaCausa;
    }
    public function contadortmEmpaque()
    {
        $listatmEmpaque = null;
        $statement = $this->db->prepare("SELECT count(id_empaquetm) as 'id' FROM `tm_empaquefinal`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmEmpaque[] = $consulta;
        }
        return $listatmEmpaque;
    }

    public function listatmEmpaqueLimit($paginationStart, $limit)
    {
        $listatmEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaquetm, E.operario, E.causa as 'nombreCausa', E.fecha, Week(fecha) AS 'Semana',E.minutos,E.celula,E.horas,O.nombre,C.causa FROM `tm_empaquefinal` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN causa_empaque as C on C.id_causa=E.causa ORDER BY `id_empaquetm` desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmEmpaque[] = $consulta;
        }
        return $listatmEmpaque;
    }

    public function listarTmEmpaqueTable($codigo)
    {
        $listatmEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaquetm,E.celula, E.operario, E.causa as 'nombreCausa', E.fecha, Week(fecha) AS 'Semana',E.minutos,E.horas,O.nombre,C.causa FROM `tm_empaquefinal` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN causa_empaque as C on C.id_causa=E.causa Where E.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmEmpaque[] = $consulta;
        }
        return $listatmEmpaque;
    }

    public function ingresartmEmpaque($Operario, $Celula, $Causa, $Fecha, $Semana, $Minutos, $Horas)
    {
        $statement = $this->db->prepare("INSERT INTO `tm_empaquefinal`(`operario`, `celula`, `causa`, `fecha`, `semana`, `minutos`, `horas`) VALUES (:Operario,:Celula,:Causa,:Fecha,:Semana,:Minutos,:Horas)");
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Celula', $Celula);
        $statement->bindParam(':Causa', $Causa);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Minutos', $Minutos);
        $statement->bindParam(':Horas', $Horas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarTmEmpaqueUpdate($idTmEmpaque)
    {
        $listatmEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaquetm, E.operario,E.celula,E.semana, E.causa as 'nombreCausa', E.fecha, Week(fecha) AS 'Semana',E.minutos,E.horas,O.nombre,C.causa FROM `tm_empaquefinal` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN causa_empaque as C on C.id_causa=E.causa Where E.id_empaquetm= :id_empaquetm LIMIT 1;");
        $statement->bindParam(':id_empaquetm', $idTmEmpaque);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmEmpaque[] = $consulta;
        }
        return $listatmEmpaque;
    }

    public function updateTmEmpaque($id_empaquetm, $operario, $celula, $causa, $fecha, $semana, $minutos, $horas)
    {
        $statement = $this->db->prepare("UPDATE `tm_empaquefinal` SET `id_empaquetm`=:id_empaquetm,`operario`=:operario,`celula`=:celula,`causa`=:causa,`fecha`=:fecha,`semana`=:semana,`minutos`=:minutos,`horas`=:horas WHERE id_empaquetm= :id_empaquetm");
        $statement->bindParam(':id_empaquetm', $id_empaquetm);
        $statement->bindParam(':operario', $operario);
        $statement->bindParam(':celula', $celula);
        $statement->bindParam(':causa', $causa);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':semana', $semana);
        $statement->bindParam(':minutos', $minutos);
        $statement->bindParam(':horas', $horas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function formatHoras($numero,$funcion)
    {
        //$function es lo que vamos hacer, en este caso dividor o multiplicar
        // bcdiv division, bcmul multiplicacion

        //validamos si el numero es entero
        if (ctype_digit($numero)) {
            return $numero;
        } else {
            $arregloHora = preg_split("/\./", $numero);
            //Despues del punto siempre seran los minutos  array(1 , 35) minutos->35
            $minutosDecimales = $funcion($arregloHora[1], 60, 2);
            //Al calcular lo minutos nos devuelve 0.58, por ende tenemos que separar de nuevo array(0 , 58)
            $decimalesEntero = preg_split("/\./", $minutosDecimales);
            //La hora siempre será la posicion 0
            $hora = $arregloHora[0];
            //los minutos siempren serán la posicion 1
            $minutos = $decimalesEntero[1];
            $horaDecimal = $hora . "." . $minutos;
            return  $horaDecimal;
        }
    }

}


?>