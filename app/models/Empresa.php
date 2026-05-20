<?php

class Empresa
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // =====================================
    // CREAR EMPRESA
    // =====================================

public function crear($data)
{
    $this->db->query("
        INSERT INTO empresas (

            razon_social,
            nit,
            dv,
            direccion,
            telefono,
            correo,

            municipio_id,
            departamento_id,
            regimen_id,
            responsabilidad_fiscal_id,
            tipo_documento_id

        ) VALUES (

            :razon_social,
            :nit,
            :dv,
            :direccion,
            :telefono,
            :correo,

            :municipio_id,
            :departamento_id,
            :regimen_id,
            :responsabilidad_fiscal_id,
            :tipo_documento_id
        )
    ");

    foreach($data as $key => $value){

        $this->db->bind(':' . $key, $value);
    }

    if($this->db->execute()){

        return $this->db->lastInsertId();
    }

    return false;
}

// ======================================
// OBTENER EMPRESA
// ======================================

public function obtenerEmpresa($id)
{
    $this->db->query("
        SELECT

            e.*,

            d.nombre AS departamento,

            m.nombre AS municipio,

            r.nombre AS regimen,

            rf.nombre AS responsabilidad_fiscal,

            p.nombre AS plan

        FROM empresas e

        LEFT JOIN departamentos d
            ON e.departamento_id = d.id

        LEFT JOIN municipios m
            ON e.municipio_id = m.id

        LEFT JOIN regimenes r
            ON e.regimen_id = r.id

        LEFT JOIN responsabilidades_fiscales rf
            ON e.responsabilidad_fiscal_id = rf.id

        LEFT JOIN planes p
            ON e.plan_id = p.id

        WHERE e.id = :id

        LIMIT 1
    ");

    $this->db->bind(':id', $id);

    return $this->db->single();
}

// ======================================
// ACTUALIZAR EMPRESA
// ======================================

public function actualizar($data)
{
    $sql = "

        UPDATE empresas SET

            razon_social = :razon_social,
            nit = :nit,
            dv = :dv,

            direccion = :direccion,
            telefono = :telefono,
            correo = :correo,

            municipio_id = :municipio_id,
            departamento_id = :departamento_id,

            regimen_id = :regimen_id,
            responsabilidad_fiscal_id =
                :responsabilidad_fiscal_id,

            tipo_documento_id =
                :tipo_documento_id,

            resolucion_dian =
                :resolucion_dian,

            prefijo_factura =
                :prefijo_factura,

            rango_desde =
                :rango_desde,

            rango_hasta =
                :rango_hasta,

            fecha_vencimiento =
                :fecha_vencimiento,

            estado = :estado

    ";

    // ======================================
    // LOGO
    // ======================================

    if(isset($data['logo'])){

        $sql .= " , logo = :logo ";
    }

    $sql .= " WHERE id = :id ";

    // ======================================
    // QUERY
    // ======================================

    $this->db->query($sql);

    // ======================================
    // BINDS
    // ======================================

    foreach($data as $key => $value){

        $this->db->bind(':' . $key, $value);
    }

    return $this->db->execute();
}
}