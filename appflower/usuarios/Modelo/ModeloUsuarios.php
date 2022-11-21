<?php

require_once('../../conexion.php');

class Usuarios extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaPerfil(){
        $ListaPerfil = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_perfil");
        $statement->execute();
        while($consulta = $statement->fetch()){
            $ListaPerfil[] = $consulta;
        }
        return $ListaPerfil;
    }
    
    public function insertarUsuario($Correo, $Nombre, $Password, $Perfil)
    {
        $statement = $this->db->prepare("INSERT INTO tbl_usuario(correo,nombre,password,perfil) VALUES (:Correo,:Nombre,:Password,:Perfil)");
        $statement->bindParam(':Correo', $Correo);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Password', $Password);
        $statement->bindParam(':Perfil', $Perfil);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarUsuario($id,$Correo, $Nombre, $Password, $Perfil)
    {
        $statement = $this->db->prepare("UPDATE `tbl_usuario` SET `correo`=:id,`nombre`=:nombre,`password`=:password,`perfil`=:perfil WHERE correo= :correo");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':correo', $Correo);
        $statement->bindParam(':nombre', $Nombre);
        $statement->bindParam(':password', $Password);
        $statement->bindParam(':perfil', $Perfil);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lista con todos los usuarios, Y un contador por cada usuario
    public function eliminarUsuario($correo)
    {
        $listUser = null;
        $statement = $this->db->prepare("DELETE FROM `tbl_usuario` WHERE correo= :correo");
        $statement->bindParam(':correo', $correo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Lista con todos los usuarios, Y un contador por cada usuario
    public function getUsuarioById($correo)
    {
        $listUser = null;
        $statement = $this->db->prepare("SELECT U.*, P.perfil AS 'tperfil' FROM `tbl_usuario` as U 
        INNER JOIN tbl_perfil AS P ON P.id_perfil = U.perfil
        Where correo= :correo");
        $statement->bindParam(':correo', $correo);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listUser[] = $consulta;
        }
        return $listUser;
    }

    //Lista con el total de los usuarios
    public function contadorUsuarios()
    {
        $listUser = null;
        $statement = $this->db->prepare("SELECT count(correo) as 'correo' FROM `tbl_usuario`;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listUser[] = $consulta;
        }
        return $listUser;
    }

    //Lista para ponerle el inicio de la paginación y el limite 
    public function listaUsuariosLimit($paginationStart, $limit)
    {
        $listUser = null;
        $statement = $this->db->prepare("SELECT @contador:=@contador+1 contador, U.*, P.perfil as 'tipoPerfil' FROM tbl_usuario U INNER JOIN tbl_perfil AS P ON P.id_perfil=U.perfil, (SELECT @contador:=0) r ORDER by id_perfil  LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listUser[] = $consulta;
        }
        return $listUser;
    }
}

?>