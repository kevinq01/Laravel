<?php
require_once '../../conexion.php';

class materialSeco extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaLaborMaterial()
    {
        $listaMaterial = null;
        $statement = $this->db->prepare("SELECT * FROM labor_material");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaMaterial[] = $consulta;
        }
        return $listaMaterial;
    }

    public function contadorMaterialSeco()
    {
        $listaMaterial = null;
        $statement = $this->db->prepare("SELECT count(id_seco) as 'id' FROM `tbl_materialseco`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaMaterial[] = $consulta;
        }
        return $listaMaterial;
    }
    
    public function listaMaterialLimit($paginationStart, $limit)
    {
        $listaMaterial = null;
        $statement = $this->db->prepare("SELECT M.id_seco, M.operario, M.labor as 'id_labor', L.labor, M.fecha, O.nombre, Week(fecha) AS 'Semana', M.hora, L.promedio, M.cantidad, ROUND(M.cantidad/M.hora,0) AS 'Promedio' FROM `tbl_materialseco` as M INNER JOIN tbl_operarios AS O ON O.id_operario=M.operario INNER JOIN labor_material AS L ON L.id_labor=M.labor ORDER BY id_seco desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaMaterial[] = $consulta;
        }
        return $listaMaterial;
    }

    public function listaMateriaUpdate($id_seco)
    {
        $listaMaterial = null;
        $statement = $this->db->prepare("SELECT M.id_seco, M.operario, M.labor as 'id_labor', M.semana, L.labor, M.fecha, O.nombre, Week(fecha) AS 'Semana', M.hora, L.promedio, M.cantidad, ROUND(M.cantidad/M.hora,0) AS 'Promedio' FROM `tbl_materialSeco` as M INNER JOIN tbl_operarios AS O ON O.id_operario=M.operario INNER JOIN labor_material AS L ON L.id_labor=M.labor WHERE id_seco= :id_seco");
        $statement->bindParam(':id_seco',$id_seco);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaMaterial[] = $consulta;
        }
        return $listaMaterial;
    }
    public function insertarMaterialSeco($Operario, $Labor,$Semana, $Fecha, $Cantidad, $Hora)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_materialseco`(`operario`, `labor`, `semana`, `fecha`, `cantidad`, `hora`) VALUES (:Operario,:Labor,:Semana,:Fecha,:Cantidad,:Hora)");
        $statement->bindParam(':Operario', $Operario);
        $statement->bindParam(':Labor', $Labor);
        $statement->bindParam(':Semana', $Semana);
        $statement->bindParam(':Fecha', $Fecha);
        $statement->bindParam(':Cantidad', $Cantidad);
        $statement->bindParam(':Hora', $Hora);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarMaterialSeco($idSeco,$Operario, $Labor, $Semana, $Fecha,  $Cantidad, $Hora)
    {
        $statement = $this->db->prepare("UPDATE `tbl_materialseco` SET `id_seco`=:id_seco,`operario`=:operario,`labor`=:labor,`semana`=:semana,`fecha`=:fecha,`cantidad`=:cantidad,`hora`=:hora WHERE id_seco= :id_seco");
        $statement->bindParam(':id_seco', $idSeco);
        $statement->bindParam(':operario', $Operario);
        $statement->bindParam(':labor', $Labor);
        $statement->bindParam(':semana', $Semana);
        $statement->bindParam(':fecha', $Fecha);
        $statement->bindParam(':cantidad', $Cantidad);
        $statement->bindParam(':hora', $Hora);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarMateriaTable($codigo)
    {
        $listaMaterial = null;
        $statement = $this->db->prepare("SELECT M.id_seco, M.operario, M.labor as 'id_labor', M.semana, L.labor, M.fecha, O.nombre, Week(fecha) AS 'Semana', M.hora, L.promedio, M.cantidad, ROUND(M.cantidad/M.hora,0) AS 'Promedio' FROM `tbl_materialSeco` as M INNER JOIN tbl_operarios AS O ON O.id_operario=M.operario INNER JOIN labor_material AS L ON L.id_labor=M.labor Where M.operario LIKE '%' :codigo '%' OR O.nombre LIKE '%' :codigo '%' ORDER BY fecha desc LIMIT 5;");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaMaterial[] = $consulta;
        }
        return $listaMaterial;
    }

}

?>