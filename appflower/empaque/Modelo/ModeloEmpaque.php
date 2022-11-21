<?php
require_once '../../conexion.php';

class Empaque extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaLaborEmpaque()
    {
        $listaEmpaque = null;
        $statement = $this->db->prepare("SELECT * FROM labor_empaque");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpaque[] = $consulta;
        }
        return $listaEmpaque;
    }

    public function insertarProduccion($Posicion, $Labor, $Operario, $Fecha, $Semana, $Cajas, $Hora)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_empaque`(`posicion`, `labor`, `operario`, `fecha`, `semana`, `cajas`, `hora`) VALUES (:Posicion,:Labor,:Operario,:Fecha,:Semana,:Cajas,:Hora)");
        $statement->bindParam(':Posicion', $Posicion);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Cajas', $Cajas);
        $statement->bindParam(':Hora', $Hora);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lista con el total de los Operarios
    public function listaEmpaque()
    {
        $listaEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaque, E.operario, E.labor, E.fecha, O.nombre, E.posicion, Week(fecha) AS 'Semana',E.hora, E.cajas, ROUND(E.cajas/E.hora,0) AS 'Promedio' FROM `tbl_empaque` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN labor_produccion AS L ON L.id_labor=E.labor ORDER BY `Labor` ASC;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpaque[] = $consulta;
        }
        return $listaEmpaque;
    }

    public function listaEmpaqueLimit($paginationStart, $limit)
    {
        $listaEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaque, E.operario,E.labor as 'id_labor', L.labor, E.fecha, O.nombre,E.posicion, Week(fecha) AS 'Semana',E.hora,L.rendimiento, E.cajas, ROUND(E.cajas/E.hora,0) AS 'Promedio' FROM `tbl_empaque` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN labor_empaque AS L ON L.id_labor=E.labor ORDER BY  `id_empaque` desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpaque[] = $consulta;
        }
        return $listaEmpaque;
    }

    public function contadorEmpaque()
    {
        $listaEmpaque = null;
        $statement = $this->db->prepare("SELECT count(id_empaque) as 'id' FROM `tbl_empaque`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpaque[] = $consulta;
        }
        return $listaEmpaque;
    }

    public function listarEmpaqueUpdate($idEmpaque)
    {
        $listaEmpaque = null;
        $statement = $this->db->prepare("SELECT E.id_empaque, E.operario,E.labor as 'id_labor', L.labor, E.fecha, O.nombre,E.posicion, E.semana,E.hora,L.rendimiento, E.cajas FROM `tbl_empaque` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN labor_empaque AS L ON L.id_labor=E.labor Where E.id_empaque= :idEmpaque LIMIT 1;");
        $statement->bindParam(':idEmpaque', $idEmpaque);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpaque[] = $consulta;
        }
        return $listaEmpaque;
    }

    public function actualizarEmpaque($idEmpaque,$Posicion, $Labor, $Operario, $Fecha, $Semana, $Cajas, $Hora)
    {
        $statement = $this->db->prepare("UPDATE `tbl_empaque` SET `id_empaque`=:idEmpaque, `posicion`=:Posicion, `labor`=:Labor,`operario`=:Operario,`fecha`=:Fecha,`semana`=:Semana,`cajas`=:Cajas,`hora`=:Hora WHERE `id_empaque`= :idEmpaque");
        $statement->bindParam(':idEmpaque', $idEmpaque);
        $statement->bindParam(':Posicion', $Posicion);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Cajas', $Cajas);
        $statement->bindParam(':Hora', $Hora);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function listarEmpaqueTable($codigo)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT E.id_empaque, E.operario,E.labor as 'id_labor', L.labor, Week(fecha) AS 'Semana', E.fecha, O.nombre,E.posicion, ROUND(E.cajas/E.hora,0) AS 'Promedio', E.semana,E.hora,L.rendimiento, E.cajas FROM `tbl_empaque` as E INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario INNER JOIN labor_empaque AS L ON L.id_labor=E.labor Where E.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }
}

?>