<?php
require_once '../../conexion.php';

class Picking extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarLaborGeneral()
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare("SELECT * FROM labor_general LIMIT 2");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }

    public function contadorPicking()
    {
        $contadorPicking = null;
        $statement = $this->db->prepare("SELECT count(id_picking) as 'id' FROM tbl_picking");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorPicking[] = $consulta;
        }
        return $contadorPicking;
    }

    public function ingresarPicking($Operario, $Labor, $Fecha, $Semana, $Tallos, $Horas)
    {
        $statement = $this->db->prepare('INSERT INTO tbl_picking(operario,labor,fecha,semana,tallos,horas) VALUES (:operario,:labor,:fecha,:semana,:tallos,:horas)');
        $statement->bindParam(':operario', $Operario);
        $statement->bindParam(':labor', $Labor);
        $statement->bindParam(':fecha', $Fecha);
        $statement->bindParam(':semana', $Semana);
        $statement->bindParam(':tallos', $Tallos);
        $statement->bindParam(':horas', $Horas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarPicking($idPicking, $Operario, $Labor, $Fecha,  $Semana,  $Tallos, $Horas)
    {
        $statement = $this->db->prepare("UPDATE `tbl_picking` SET `id_picking`=:id_picking,`operario`=:operario,`labor`=:labor,`fecha`=:fecha,`semana`=:semana,`tallos`=:tallos,`horas`=:horas WHERE id_picking= :id_picking");
        $statement->bindParam(':id_picking', $idPicking);
        $statement->bindParam(':operario', $Operario);
        $statement->bindParam(':labor', $Labor);
        $statement->bindParam(':fecha', $Fecha);
        $statement->bindParam(':semana', $Semana);
        $statement->bindParam(':tallos', $Tallos);
        $statement->bindParam(':horas', $Horas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function listaPickingUpdate($id_picking)
    {
        $listaPickingUpdate = null;
        $statement = $this->db->prepare("SELECT P.id_picking, P.operario,P.semana, P.labor as 'id_labor', L.labor, P.fecha, O.nombre, Week(fecha) AS 'Semana', P.horas, L.rendimiento, P.tallos, ROUND(P.tallos/P.horas,0) AS 'Promedio' FROM `tbl_picking` as P INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_general AS L ON L.id_labor=P.labor WHERE id_picking= :id_picking");
        $statement->bindParam(':id_picking', $id_picking);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaPickingUpdate[] = $consulta;
        }
        return $listaPickingUpdate;
    }

    public function listaPickingLimit($paginationStart, $limit)
    {
        $listaPickingLimit = null;
        $statement = $this->db->prepare("SELECT P.id_picking, P.operario, P.labor as 'id_labor', L.labor, P.fecha, O.nombre, Week(fecha) AS 'Semana', P.horas, L.rendimiento, P.tallos, ROUND(P.tallos/P.horas,0) AS 'Promedio' FROM `tbl_picking` as P INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_general AS L ON L.id_labor=P.labor ORDER BY id_picking desc  LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaPickingLimit[] = $consulta;
        }
        return $listaPickingLimit;
    }


    public function listarPickingTable($codigo)
    {
        $listarPickingTable = null;
        $statement = $this->db->prepare("SELECT P.id_picking, P.operario, P.labor as 'id_labor', L.labor, P.fecha, O.nombre, Week(fecha) AS 'Semana', P.horas, L.rendimiento, P.tallos, ROUND(P.tallos/P.horas,0) AS 'Promedio' FROM `tbl_picking` as P INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_general AS L ON L.id_labor=P.labor Where P.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarPickingTable[] = $consulta;
        }
        return $listarPickingTable;
    }
}
