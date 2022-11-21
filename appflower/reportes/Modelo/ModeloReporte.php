<?php

require_once '../../conexion.php';

class Reporte extends conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    //Modulo
    //Modulo Producción

    //rendimiento mayor a menor por fecha
    public function produccionMayorMenor($labor,  $desde, $hasta)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(SUM(P.tallos)/SUM(P.hora),0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor         
        where P.labor = :labor AND fecha BETWEEN :desde AND :hasta
        GROUP BY (P.operario)
        ORDER by (rendimiento) DESC");
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }
    //rendimiento mayor a menor semana
    public function produccionMayorMenorSemana($labor,  $semana)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(SUM(P.tallos)/SUM(P.hora),0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :labor AND semana= :semana
        GROUP BY (P.operario)
        ORDER by (rendimiento) DESC");
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }



    //tallos por fecha
    public function produccionTallosMenorMayor($labor,  $desde, $hasta)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre,SUM(P.tallos) as 'SumTallos' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :labor AND fecha BETWEEN :desde AND :hasta
        GROUP BY (P.operario)
        ORDER by (SumTallos) DESC");
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }
    //talos por semana
    public function produccionTallosMenorMayorSemana($labor, $semana)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre,SUM(P.tallos) as 'SumTallos' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :labor AND semana= :semana
        GROUP BY (P.operario)
        ORDER by (SumTallos) DESC");
        $statement->bindParam(':labor', $labor);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }



    //rendimiento operarios armado
    public function rendimientosArmado($id, $desde, $hasta)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(SUM(P.tallos)/SUM(P.hora),0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :id AND fecha BETWEEN :desde AND :hasta
        GROUP BY (P.operario)
        ORDER by (laborArmado) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }
    //rendimiento  operarios armado semana
    public function RendimientosSemana($id, $semana)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(SUM(P.tallos)/SUM(P.hora),0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :id AND semana= :semana
        GROUP BY (P.operario)
        ORDER by (laborArmado) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }




    //Soporte tallo fecha
    public function moduloProduccionFecha($id, $desde, $hasta)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha, week(P.fecha) as 'week',CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre,P.hora,P.tallos, ROUND(P.tallos/P.hora,0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :id AND fecha BETWEEN :desde AND :hasta
        ORDER by (laborArmado) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }

    //Soporte tallo semana
    public function moduloProduccionSemana($id, $semana)
    {
        $listaProduccion = null;
        $statement = $this->db->prepare("SELECT P.fecha, week(P.fecha) as 'week',CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre,P.hora,P.tallos, ROUND(P.tallos/P.hora,0) AS 'rendimiento' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        where P.labor = :id AND semana= :semana
        ORDER by (laborArmado) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProduccion[] = $consulta;
        }
        return $listaProduccion;
    }


    //reporte de produccion por fecha, (Reporte general)
    public function generalProduccionFecha($id, $desde, $hasta)
    {
        $generalProduccionFecha = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(P.tallos/P.hora,0) AS 'rendimiento', P.recetas FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor  
        where P.labor = :id AND fecha BETWEEN :desde AND :hasta
        ORDER BY `fecha` DESC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $generalProduccionFecha[] = $consulta;
        }
        return $generalProduccionFecha;
    }

    //reporte de produccion por semana, (Reporte general)
    public function generalProduccionSemana($id, $semana)
    {
        $generalProduccionSemana = null;
        $statement = $this->db->prepare("SELECT P.fecha,CONCAT(L.labor, ' ', P.posicion) AS 'laborArmado',P.operario,O.nombre, ROUND(P.tallos/P.hora,0) AS 'rendimiento', P.recetas FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor  
        where P.labor = :id AND semana= :semana
        ORDER BY `laborArmado` DESC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $generalProduccionSemana[] = $consulta;
        }
        return $generalProduccionSemana;
    }

    //Fin de modulo producción 




    //Modulo
    //Reportes modulo empaque

    //reporte empaque por fecha
    public function moduloEmpaqueFecha($id, $desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT week(E.fecha) as 'week',E.posicion,L.labor,O.nombre, ROUND(SUM(E.cajas)/sum(E.hora),0) AS 'rendimiento' FROM `tbl_empaque` as E
        INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
        INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
        where E.labor != :id AND fecha BETWEEN :desde AND :hasta
        GROUP BY (e.operario)
        ORDER by (E.posicion) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte empaque por semana
    public function moduloEmpaqueSemana($id, $semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT week(E.fecha) as 'week',E.posicion,L.labor,O.nombre, ROUND(SUM(E.cajas)/sum(E.hora),0) AS 'rendimiento' FROM `tbl_empaque` as E
        INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
        INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
        where E.labor != :id AND semana= :semana
        GROUP BY (E.operario)
        ORDER by (E.posicion) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }

    //reporte empaque postcosecha por fecha
    public function moduloEmpaquePostcosechaFecha($id, $desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT week(E.fecha) as 'week',E.posicion,L.labor,O.nombre, ROUND(SUM(E.cajas)/sum(E.hora),0) AS 'rendimiento' FROM `tbl_empaque` as E
            INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
            INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
            where E.labor = :id AND fecha BETWEEN :desde AND :hasta
            GROUP BY (E.operario)
            ORDER by (E.posicion) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte empaque postcosecha por semana
    public function moduloEmpaquePostcosechaSemana($id, $semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT week(E.fecha) as 'week',E.posicion,L.labor,O.nombre, ROUND(SUM(E.cajas)/sum(E.hora),0) AS 'rendimiento' FROM `tbl_empaque` as E
            INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
            INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
            where E.labor = :id AND semana= :semana
            GROUP BY (E.operario)
            ORDER by (E.posicion) ASC");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }


    //FIN reporte modulo empaque




    //Modulo
    //Modulo material seco

    //reporte empaque postcosecha por fecha
    public function rendimientoMaterialSecoFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,M.operario,O.nombre,SUM(M.hora) as 'Tiempo',SUM(M.cantidad) as 'Cantidad', ROUND(SUM(M.cantidad)/sum(M.hora),0) AS 'rendimiento' FROM `tbl_materialseco` as M
        INNER JOIN tbl_operarios AS O ON O.id_operario=M.operario
        INNER JOIN labor_material AS L ON L.id_labor=M.labor
        where fecha BETWEEN :desde AND :hasta
        GROUP BY (M.operario)
        ORDER by (labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte empaque postcosecha por semana
    public function rendimientoMaterialSecoSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,M.operario,O.nombre,SUM(M.hora) as 'Tiempo',SUM(M.cantidad) as 'Cantidad', ROUND(SUM(M.cantidad)/sum(M.hora),0) AS 'rendimiento' FROM `tbl_materialseco` as M
        INNER JOIN tbl_operarios AS O ON O.id_operario=M.operario
        INNER JOIN labor_material AS L ON L.id_labor=M.labor
        where semana= :semana
        GROUP BY (M.operario)
        ORDER by (labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }

    //Fin material seco



    //Modulo
    //Modulo Tinturados


    //reporte tinturados por fecha
    public function rendimientoTinturadosFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,T.operario,O.nombre,SUM(T.horas) as 'tiempo',SUM(T.tallos) as 'cantidad', ROUND(SUM(T.tallos)/sum(T.horas),0) AS 'rendimiento' FROM `tbl_tinturados` as T
        INNER JOIN tbl_operarios AS O ON O.id_operario=T.operario
        INNER JOIN labor_general AS L ON L.id_labor=T.labor
        where fecha BETWEEN :desde AND :hasta
        GROUP BY (T.operario)
        ORDER by (labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte tinturados por semana
    public function rendimientoTinturadosSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,T.operario,O.nombre,SUM(T.horas) as 'tiempo',SUM(T.tallos) as 'cantidad', ROUND(SUM(T.tallos)/sum(T.horas),0) AS 'rendimiento' FROM `tbl_tinturados` as T
        INNER JOIN tbl_operarios AS O ON O.id_operario=T.operario
        INNER JOIN labor_general AS L ON L.id_labor=T.labor
        where semana= :semana
        GROUP BY (T.operario)
        ORDER by (labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }

    //Fin modulo tinturados



    //Modulo
    //Modulo picking


    //reporte picking por fecha
    public function rendimientoPickingFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT P.labor,P.operario,O.nombre,SUM(P.horas) as 'tiempo',SUM(P.tallos) as 'cantidad', ROUND(SUM(P.tallos)/sum(P.horas),0) AS 'rendimiento' FROM `tbl_picking` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_general AS L ON L.id_labor=P.labor
        where fecha BETWEEN :desde AND :hasta
        GROUP BY (P.operario)
        ORDER by (labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte picking por semana
    public function rendimientoPickingSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT P.labor,P.operario,O.nombre,SUM(P.horas) as 'tiempo',SUM(P.tallos) as 'cantidad', ROUND(SUM(P.tallos)/sum(P.horas),0) AS 'rendimiento' FROM `tbl_picking` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_general AS L ON L.id_labor=P.labor
        where semana= :semana
        GROUP BY (P.operario)
        ORDER by (labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }

    //Fin modulo picking

    //Modulo
    //Modulo tiempo muerto producción

    //reporte tiempo muerto producción por fecha
    public function tiempoProuduccionFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT CONCAT(L.labor,' ',TP.posicion) AS 'laborTP',C.causa, SUM(TP.tiempo) AS 'tiempo'  FROM tmproduccion as TP 
        INNER JOIN tbl_operarios AS O ON O.id_operario=TP.operario
        INNER JOIN causa_produccion AS C ON C.id_causa=TP.causa
        INNER JOIN labor_produccion AS L ON L.id_labor=TP.labor
        WHERE fecha BETWEEN :desde AND :hasta
        GROUP BY laborTp,C.causa
        ORDER BY (laborTP)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte tiempo muerto producción por semana
    public function tiempoProuduccionSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT CONCAT(L.labor,' ',TP.posicion) AS 'laborTP',C.causa, SUM(TP.tiempo) AS 'tiempo'  FROM tmproduccion as TP 
        INNER JOIN tbl_operarios AS O ON O.id_operario=TP.operario
        INNER JOIN causa_produccion AS C ON C.id_causa=TP.causa
        INNER JOIN labor_produccion AS L ON L.id_labor=TP.labor
        WHERE semana= :semana
        GROUP BY laborTp,C.causa
        ORDER BY (laborTP)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //Fin modulo  tiempo muerto producción



    //Modulo
    //Modulo tiempo muerto general

    //reporte tiempo muerto general por fecha
    public function tiempoGeneralFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,C.causa, SUM(TG.tiempo) AS 'tiempo'  FROM tm_general as TG
        INNER JOIN causa_general AS C ON C.id_causa=TG.causa
        INNER JOIN labor_general AS L ON L.id_labor=TG.labor
        WHERE fecha BETWEEN :desde AND :hasta
        GROUP BY L.labor,C.causa
    ORDER BY (L.labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte tiempo muerto general por semana
    public function tiempoGeneralSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT L.labor,C.causa, SUM(TG.tiempo) AS 'tiempo'  FROM tm_general as TG
        INNER JOIN causa_general AS C ON C.id_causa=TG.causa
        INNER JOIN labor_general AS L ON L.id_labor=TG.labor
        WHERE semana= :semana
        GROUP BY L.labor,C.causa
        ORDER BY (L.labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //Fin modulo  tiempo muerto general




    //Modulo
    //Modulo tiempo muerto empaque

    //reporte tiempo muerto empaque por fecha
    public function tiempoEmpaqueFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT TE.celula as 'labor',C.causa, SUM(TE.minutos) AS 'minutos', SUM(TE.horas) AS 'horas'  FROM tm_empaquefinal as TE
        INNER JOIN causa_empaque AS C ON C.id_causa=TE.causa
        WHERE fecha BETWEEN :desde AND :hasta
        GROUP BY labor,C.causa
        ORDER BY (labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte tiempo muerto empaque por semana
    public function tiempoEmpaqueSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT TE.celula as 'labor',C.causa, SUM(TE.minutos) AS 'minutos', SUM(TE.horas) AS 'horas'  FROM tm_empaquefinal as TE
        INNER JOIN causa_empaque AS C ON C.id_causa=TE.causa
        WHERE semana= :semana
        GROUP BY labor,C.causa
        ORDER BY (labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }


    //reporte tiempo muerto empaque por fecha
    public function tiempoEmpaqueOperarioFecha($desde, $hasta)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT TE.operario,O.nombre,C.causa, SUM(TE.minutos) AS 'minutos', SUM(TE.horas) AS 'horas'  FROM tm_empaquefinal as TE
        INNER JOIN causa_empaque AS C ON C.id_causa=TE.causa
        INNER JOIN tbl_operarios AS O ON O.id_operario=TE.operario
        WHERE fecha BETWEEN :desde AND :hasta
        GROUP BY TE.operario,C.causa
        ORDER BY (TE.operario)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //reporte tiempo muerto empaque por semana
    public function tiempoEmpaqueOperarioSemana($semana)
    {
        $ListaEmpaque = null;
        $statement = $this->db->prepare("SELECT TE.operario,O.nombre,C.causa, SUM(TE.minutos) AS 'minutos', SUM(TE.horas) AS 'horas'  FROM tm_empaquefinal as TE
        INNER JOIN causa_empaque AS C ON C.id_causa=TE.causa
        INNER JOIN tbl_operarios AS O ON O.id_operario=TE.operario
        WHERE semana= :semana
        GROUP BY TE.operario,C.causa
        ORDER BY (TE.operario)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaEmpaque[] = $consulta;
        }
        return $ListaEmpaque;
    }
    //Fin modulo  tiempo muerto empaque



    //bonificacion produccion
    public function bonificacionProduccionFecha($desde, $hasta)
    {
        $bonificacionProduccionFecha = null;
        $statement = $this->db->prepare("SELECT CONCAT(L.labor, ' ', P.posicion) AS 'Labor',P.operario,O.nombre,SUM((ROUND(P.tallos/P.hora,0) - L.rendimiento)) AS 'tallosBonificacion', SUM(((L.bonificacion * (ROUND(P.tallos/P.hora,0)-L.rendimiento))*P.hora)) AS 'valorBonifi' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        WHERE ROUND(P.tallos/P.hora,0) > L.rendimiento AND L.bonificacion > 0 AND fecha BETWEEN :desde AND :hasta
        GROUP BY (P.operario)
        ORDER BY (Labor)");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $bonificacionProduccionFecha[] = $consulta;
        }
        return $bonificacionProduccionFecha;
    }
    //bonificacion produccion
    public function bonificacionProduccionSemana($semana)
    {
        $bonificacionProduccionSemana = null;
        $statement = $this->db->prepare("SELECT CONCAT(L.labor, ' ', P.posicion) AS 'Labor',P.operario,O.nombre,SUM((ROUND(P.tallos/P.hora,0) - L.rendimiento)) AS 'tallosBonificacion', SUM(((L.bonificacion * (ROUND(P.tallos/P.hora,0)-L.rendimiento))*P.hora)) AS 'valorBonifi' FROM `tbl_produccion` as P
        INNER JOIN tbl_operarios AS O ON O.id_operario=P.operario
        INNER JOIN labor_produccion AS L ON L.id_labor=P.labor 
        WHERE ROUND(P.tallos/P.hora,0) > L.rendimiento AND L.bonificacion > 0 AND semana= :semana
        GROUP BY (P.operario)
        ORDER BY (Labor)");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $bonificacionProduccionSemana[] = $consulta;
        }
        return $bonificacionProduccionSemana;
    }


    //bonificacion Empaque
    public function bonificacionEmpaqueFecha($desde, $hasta)
    {
        $bonificacionEmpaqueFecha = null;
        $statement = $this->db->prepare("SELECT E.operario,L.labor,O.nombre, ROUND(SUM((E.cajas/E.hora) - L.rendimiento),0) AS 'rendimiento',SUM(L.bonificacion * (ROUND((E.cajas/E.hora),0) - L.rendimiento) * E.hora) AS 'valor' FROM `tbl_empaque` as E
        INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
        INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
        WHERE ROUND(E.cajas/E.hora,0) > L.rendimiento AND L.bonificacion > 0  AND fecha BETWEEN :desde AND :hasta
        GROUP BY E.operario
        ORDER by (E.posicion) ASC");
        $statement->bindParam(':desde', $desde);
        $statement->bindParam(':hasta', $hasta);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $bonificacionEmpaqueFecha[] = $consulta;
        }
        return $bonificacionEmpaqueFecha;
    }
    //bonificacion Empaque
    public function bonificacionEmpaqueSemana($semana)
    {
        $bonificacionEmpaqueSemana = null;
        $statement = $this->db->prepare("SELECT E.operario,L.labor,O.nombre, ROUND(SUM((E.cajas/E.hora) - L.rendimiento),0) AS 'rendimiento',SUM(L.bonificacion * (ROUND((E.cajas/E.hora),0) - L.rendimiento) * E.hora) AS 'valor' FROM `tbl_empaque` as E
        INNER JOIN tbl_operarios AS O ON O.id_operario=E.operario
        INNER JOIN labor_empaque AS L ON L.id_labor=E.labor
        WHERE ROUND(E.cajas/E.hora,0) > L.rendimiento AND L.bonificacion > 0  AND semana= :semana
        GROUP BY E.operario
        ORDER by (E.posicion) ASC");
        $statement->bindParam(':semana', $semana);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $bonificacionEmpaqueSemana[] = $consulta;
        }
        return $bonificacionEmpaqueSemana;
    }
}
