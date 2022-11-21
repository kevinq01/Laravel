<?php

require_once('../../conexion.php');

class Operarios extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function ingresarOperarios($Codigo, $Nombre,$Cedula)
    {
        $statement = $this->db->prepare("INSERT INTO tbl_operarios(id_operario,nombre,cedula) VALUES (:Codigo,:Nombre,:Cedula)");
        $statement->bindParam(':Codigo', $Codigo);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Cedula', $Cedula);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lista con el total de los Operarios
    public function contadorOperarios()
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT count(id_operario) as 'codigo' FROM `tbl_operarios`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }

    //Lista para ponerle el inicio de la paginación y el limite 
    public function listaOperariosLimit($paginationStart, $limit)
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT @contador:=@contador+1 contador, O.* FROM tbl_operarios O, (SELECT @contador:=0) r ORDER by nombre desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }

    public function listarOperarioById($codigo)
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_operarios` Where id_operario LIKE '%' :codigo '%' LIMIT 5");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }

    public function listarOperarioByIdLimit($codigo)
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_operarios` Where id_operario= :codigo  LIMIT 1");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }


    public function listarOperario($codigo)
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_operarios` Where id_operario= :codigo");
        $statement->bindParam(':codigo', $codigo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }

    public function listarOperarioByNombre($nombre)
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_operarios` WHERE nombre LIKE '%' :nombre '%' LIMIT 5");
        $statement->bindParam(':nombre', $nombre);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }


    public function actualizarOperario($id,$Codigo, $Nombre,$Cedula)
    {
        $statement = $this->db->prepare("UPDATE `tbl_operarios` SET `id_operario`=:codigo,`nombre`=:nombre,`cedula`=:cedula WHERE id_operario= :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':codigo', $Codigo);
        $statement->bindParam(':nombre', $Nombre);
        $statement->bindParam(':cedula', $Cedula);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarOperario($Codigo){
        $statement = $this->db->prepare("DELETE FROM `tbl_operarios` WHERE id_operario= :codigo");
        $statement->bindParam(':codigo', $Codigo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function listOperario()
    {
        $listOperario = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_operarios");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listOperario[] = $consulta;
        }
        return $listOperario;
    }


}


?>