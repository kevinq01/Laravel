<?php
require_once '../../conexion.php';

class tmProduccion extends Conexion
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

    public function listarCausaProduccion()
    {
        $listaCausaProduccion = null;
        $statement = $this->db->prepare("SELECT * FROM causa_produccion");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaCausaProduccion[] = $consulta;
        }
        return $listaCausaProduccion;
    }

    public function ingresartmProduccion($Operario, $Labor, $Posicion, $Causa, $Fecha, $Semana, $Tiempo)
    {
        $statement = $this->db->prepare("INSERT INTO `tmproduccion`(`operario`, `labor`, `posicion`, `causa`, `fecha`, `semana`,`tiempo`) VALUES (:Operario,:Labor,:Posicion,:Causa,:Fecha,:Semana,:Tiempo)");
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Posicion', $Posicion);
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

    public function contadortmProduccion()
    {
        $listatmProduccion = null;
        $statement = $this->db->prepare("SELECT count(id_tmproduccion) as 'id' FROM `tmproduccion`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmProduccion[] = $consulta;
        }
        return $listatmProduccion;
    }

    public function listatmProduccionLimit($paginationStart, $limit)
    {
        $listatmProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_tmproduccion, P.operario, P.labor, C.causa as 'nombreCausa', P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor', Week(fecha) AS 'Semana',P.tiempo,P.causa FROM `tmproduccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor
        INNER JOIN causa_produccion as C on C.id_causa=P.causa ORDER BY `id_tmproduccion` desc  LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmProduccion[] = $consulta;
        }
        return $listatmProduccion;
    }

    public function listarTmProduccionTable($codigo)
    {
        $listatmProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_tmproduccion, P.operario, P.labor, C.causa as 'nombreCausa', P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',Week(fecha) AS 'Semana',P.tiempo,P.causa FROM `tmproduccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor
        INNER JOIN causa_produccion as C on C.id_causa=P.causa
        Where P.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmProduccion[] = $consulta;
        }
        return $listatmProduccion;
    }

    public function listarTmProduccionUpdate($id_tmproduccion)
    {
        $listatmProduccion = null;
        $statement = $this->db->prepare("SELECT P.id_tmproduccion, P.semana , P.operario, L.labor as 'nombreLabor', P.labor, C.causa as 'nombreCausa',P.posicion,P.semana, P.fecha, O.nombre, CONCAT(L.labor, ' ', P.posicion) AS 'Labor',Week(fecha) AS 'Semana',P.tiempo,P.causa FROM `tmproduccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario 
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        INNER JOIN causa_produccion as C on C.id_causa=P.causa Where P.id_tmproduccion= :id_tmproduccion LIMIT 1;");
        $statement->bindParam(':id_tmproduccion', $id_tmproduccion);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listatmProduccion[] = $consulta;
        }
        return $listatmProduccion;
    }

    public function updateTmProduccion($id_tmproduccion, $operario, $labor, $posicion, $causa, $fecha, $semana, $tiempo)
    {
        $statement = $this->db->prepare("UPDATE `tmproduccion` SET `id_tmproduccion`=:id_tmproduccion,`operario`=:operario,`labor`=:labor,`posicion`=:posicion,`causa`=:causa,`fecha`=:fecha,`semana`=:semana,`tiempo`=:tiempo WHERE id_tmproduccion= :id_tmproduccion");
        $statement->bindParam(':id_tmproduccion', $id_tmproduccion);
        $statement->bindParam(':operario', $operario);
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':posicion', $posicion);
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


?>