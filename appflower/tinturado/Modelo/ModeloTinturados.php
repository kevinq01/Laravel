<?php
require_once '../../conexion.php';

class Tinturados extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarLaborGeneral()
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare('SELECT * FROM labor_general LIMIT 2');
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }
    public function contadorTinturados()
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare("SELECT count(id_tinturado) as 'id' FROM tbl_tinturados");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }

    public function listaTinturadoLimit($paginationStart, $limit)
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare("SELECT T.id_tinturado, T.operario, T.labor as 'id_labor', L.labor, T.fecha, O.nombre, Week(fecha) AS 'Semana', T.horas, L.rendimiento, T.tallos, ROUND(T.tallos/T.horas,0) AS 'Promedio' FROM `tbl_tinturados` as T INNER JOIN tbl_operarios AS O ON O.id_operario=T.operario INNER JOIN labor_general AS L ON L.id_labor=T.labor ORDER BY id_tinturado desc  LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }

    public function listarTinturadoTable($codigo)
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare("SELECT T.id_tinturado, T.operario, T.labor as 'id_labor', L.labor, T.fecha, O.nombre, Week(fecha) AS 'Semana', T.horas, L.rendimiento, T.tallos, ROUND(T.tallos/T.horas,0) AS 'Promedio' FROM `tbl_tinturados` as T INNER JOIN tbl_operarios AS O ON O.id_operario=T.operario INNER JOIN labor_general AS L ON L.id_labor=T.labor Where T.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }

    public function ingresarTinturado($Operario, $Labor, $Fecha, $Semana, $Tallos, $Horas)
    {
        $statement = $this->db->prepare('INSERT INTO tbl_tinturados(operario,labor,fecha,semana,tallos,horas) VALUES (:operario,:labor,:fecha,:semana,:tallos,:horas)');
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

    public function actualizarTinturado($idTinturado, $Operario, $Labor, $Fecha,  $Semana,  $Tallos, $Horas)
    {
        $statement = $this->db->prepare("UPDATE `tbl_tinturados` SET `id_tinturado`=:id_tinturado,`operario`=:operario,`labor`=:labor,`fecha`=:fecha,`semana`=:semana,`tallos`=:tallos,`horas`=:horas WHERE id_tinturado= :id_tinturado");
        $statement->bindParam(':id_tinturado', $idTinturado);
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

    public function listaTinturadoUpdate($id_tinturado)
    {
        $listaLaborGeneral = null;
        $statement = $this->db->prepare("SELECT T.id_tinturado,T.semana, T.operario, T.labor as 'id_labor', L.labor, T.fecha, O.nombre, Week(fecha) AS 'Semana', T.horas, L.rendimiento, T.tallos, ROUND(T.tallos/T.horas,0) AS 'Promedio' FROM `tbl_tinturados` as T INNER JOIN tbl_operarios AS O ON O.id_operario=T.operario INNER JOIN labor_general AS L ON L.id_labor=T.labor WHERE id_tinturado= :id_tinturado");
        $statement->bindParam(':id_tinturado', $id_tinturado);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLaborGeneral[] = $consulta;
        }
        return $listaLaborGeneral;
    }
}


?>