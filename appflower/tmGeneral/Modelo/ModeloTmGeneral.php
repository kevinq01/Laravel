<?php
require_once '../../conexion.php';

class tmGeneral extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarLabor()
    {
        $listaLabor = null;
        $statement = $this->db->prepare("SELECT * FROM `labor_general`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLabor[] = $consulta;
        }
        return $listaLabor;
    }

    public function listarCausa()
    {
        $listaCausa = null;
        $statement = $this->db->prepare("SELECT * FROM causa_general");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaCausa[] = $consulta;
        }
        return $listaCausa;
    }

    public function contadortmGeneral()
    {
        $listatmGeneral = null;
        $statement = $this->db->prepare("SELECT count(id_general) as 'id' FROM `tm_general`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmGeneral[] = $consulta;
        }
        return $listatmGeneral;
    }

    public function listatmGeneralLimit($paginationStart, $limit)
    {
        $listatmGeneral = null;
        $statement = $this->db->prepare("SELECT G.id_general, G.operario,L.labor as 'nombreLabor',G.semana, G.labor, C.causa as 'nombreCausa', G.fecha, O.nombre, Week(fecha) AS 'Semana',G.tiempo,G.causa FROM `tm_general` as G
        INNER JOIN tbl_operarios AS O ON O.id_operario=G.operario
        INNER JOIN labor_general AS L ON L.id_labor=G.labor
        INNER JOIN causa_general as C on C.id_causa=G.causa
        ORDER BY `id_general` desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmGeneral[] = $consulta;
        }
        return $listatmGeneral;
    }

    public function ingresartmGeneral($Operario, $Labor, $Causa, $Fecha, $Semana, $Tiempo)
    {
        $statement = $this->db->prepare("INSERT INTO `tm_general`(`operario`, `labor`, `causa`, `fecha`, `semana`,`tiempo`)
          VALUES (:Operario,:Labor,:Causa,:Fecha,:Semana,:Tiempo)");
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Causa', $Causa);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Tiempo', $Tiempo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarTmGeneralTable($codigo)
    {
        $listatmGeneral = null;
        $statement = $this->db->prepare("SELECT G.id_general, G.operario,L.labor as 'nombreLabor',G.semana, G.labor, C.causa as 'nombreCausa', G.fecha, O.nombre, Week(fecha) AS 'Semana',G.tiempo,G.causa FROM `tm_general` as G
        INNER JOIN tbl_operarios AS O ON O.id_operario=G.operario
        INNER JOIN labor_general AS L ON L.id_labor=G.labor
        INNER JOIN causa_general as C on C.id_causa=G.causa
         Where G.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmGeneral[] = $consulta;
        }
        return $listatmGeneral;
    }


    public function listarTmGeneralUpdate($id_general)
    {
        $listatmGeneral = null;
        $statement = $this->db->prepare("SELECT G.id_general, G.operario,L.labor as 'nombreLabor',G.semana, G.labor, C.causa as 'nombreCausa', G.fecha, O.nombre, Week(fecha) AS 'Semana',G.tiempo,G.causa FROM `tm_general` as G
        INNER JOIN tbl_operarios AS O ON O.id_operario=G.operario
        INNER JOIN labor_general AS L ON L.id_labor=G.labor
        INNER JOIN causa_general as C on C.id_causa=G.causa Where G.id_general= :id_general LIMIT 1;");
        $statement->bindParam(':id_general', $id_general);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmGeneral[] = $consulta;
        }
        return $listatmGeneral;
    }

    public function updateTmGeneral($idTmGeneral, $operario, $labor, $causa, $fecha, $semana, $tiempo)
    {
        $statement = $this->db->prepare("UPDATE `tm_general` SET `id_general`=:id_general,`operario`=:operario,`labor`=:labor,`causa`=:causa,`fecha`=:fecha,`semana`=:semana,`tiempo`=:tiempo WHERE id_general= :id_general");
        $statement->bindParam(':id_general', $idTmGeneral);
        $statement->bindParam(':operario', $operario);
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':causa', $causa);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':semana', $semana);
        $statement->bindParam(':tiempo', $tiempo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
