<?php

require_once('../../conexion.php');

class Produccion extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarLaborProduccion()
    {
        $listaLabor = null;
        $statement = $this->db->prepare("SELECT * FROM `labor_produccion`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaLabor[] = $consulta;
        }
        return $listaLabor;
    }

    public function insertarProduccion($Operario, $Labor, $Posicion, $Fecha, $Semana, $Tallos, $Hora, $recetas)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_produccion`(`operario`, `labor`, `posicion`, `fecha`, `semana`, `tallos`, `hora`, `recetas`)
          VALUES (:Operario,:Labor,:Posicion,:Fecha,:Semana,:Tallos,:Hora,:recetas)");
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Posicion', $Posicion);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Tallos', $Tallos);
        $statement->bindParam(':Hora', $Hora);
        $statement->bindParam(':recetas', $recetas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarProduccion($id_produccion, $Operario, $Labor, $Posicion, $Fecha, $Semana, $Tallos, $Hora, $recetas)
    {
        $statement = $this->db->prepare("UPDATE `tbl_produccion` SET `id_produccion`=:id_produccion,`operario`=:Operario,`labor`=:Labor,`posicion`=:Posicion,`fecha`=:Fecha,`semana`=:Semana,`tallos`=:Tallos,`hora`=:Hora,`recetas`=:recetas WHERE id_produccion= :id_produccion");

        $statement->bindParam(':id_produccion', $id_produccion);
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Posicion', $Posicion);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Tallos', $Tallos); 
        $statement->bindParam(':Hora', $Hora);
        $statement->bindParam(':recetas', $recetas);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lista con el total de los Operarios
    public function listaProduccion()
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_produccion, P.operario, P.labor, P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',
         Week(fecha) AS 'Semana',P.hora, P.tallos,P.recetas, ROUND(P.tallos/P.hora,0) AS 'Promedio' FROM `tbl_produccion` as P
          INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_produccion AS L ON L.id_labor=P.labor ORDER BY `Labor` ASC;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }


    public function contadorProduccion()
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT count(id_produccion) as 'id' FROM `tbl_produccion`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }

    public function listaProduccionLimit($paginationStart, $limit)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_produccion, P.operario, P.labor, P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',
        Week(fecha) AS 'Semana',P.hora, P.tallos,P.recetas, ROUND(P.tallos/P.hora,0) AS 'Promedio', L.rendimiento FROM `tbl_produccion` as P
         INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_produccion AS L ON L.id_labor=P.labor ORDER BY `id_produccion` desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }

    public function listarProduccionTable($codigo)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_produccion, P.operario, P.labor, P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',
        Week(fecha) AS 'Semana',P.hora, P.tallos,P.recetas, ROUND(P.tallos/P.hora,0) AS 'Promedio' FROM `tbl_produccion` as P
         INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_produccion AS L ON L.id_labor=P.labor Where P.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }

    public function listarProduccionUpdate($idProduccion)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_produccion, P.operario,P.semana, P.labor,L.labor as 'nombreLabor', P.fecha,P.posicion, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',
        Week(fecha) AS 'Semana',P.hora, P.tallos,P.recetas, ROUND(P.tallos/P.hora,0) AS 'Promedio' FROM `tbl_produccion` as P
         INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario INNER JOIN labor_produccion AS L ON L.id_labor=P.labor Where P.id_produccion= :idProduccion LIMIT 1;");
        $statement->bindParam(':idProduccion', $idProduccion);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }
}


?>