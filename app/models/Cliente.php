<?php

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ======================================
    // LISTAR CLIENTES
    // ======================================

public function listar($empresa_id)
{
    $this->db->query("
        SELECT

            c.*,

            m.nombre AS ciudad,

            d.nombre AS departamento,

            r.nombre AS regimen,

            rf.nombre AS responsabilidad_fiscal,

            td.nombre AS tipo_documento_nombre

        FROM clientes c

        LEFT JOIN municipios m
            ON c.municipio_id = m.id

        LEFT JOIN departamentos d
            ON c.departamento_id = d.id

        LEFT JOIN regimenes r
            ON c.regimen_id = r.id

        LEFT JOIN responsabilidades_fiscales rf
            ON c.responsabilidad_fiscal_id = rf.id

        LEFT JOIN tipos_documento td
            ON c.tipo_documento_id = td.id

        WHERE c.empresa_id = :empresa_id

        ORDER BY c.id DESC
    ");

    $this->db->bind(':empresa_id', $empresa_id);

    return $this->db->resultSet();
}

    // ======================================
    // CREAR CLIENTE
    // ======================================

public function crear($data)
{
    $this->db->query("
        INSERT INTO clientes (

            empresa_id,

            tipo_persona,
            tipo_documento_id,
            numero_documento,

            nombres,
            apellidos,

            razon_social,
            nit,
            dv,

            telefono,
            correo,
            direccion,

            municipio_id,
            departamento_id,

            regimen_id,
            responsabilidad_fiscal_id

        ) VALUES (

            :empresa_id,

            :tipo_persona,
            :tipo_documento_id,
            :numero_documento,

            :nombres,
            :apellidos,

            :razon_social,
            :nit,
            :dv,

            :telefono,
            :correo,
            :direccion,

            :municipio_id,
            :departamento_id,

            :regimen_id,
            :responsabilidad_fiscal_id
        )
    ");

    // ======================================
    // BINDS
    // ======================================

    foreach($data as $key => $value){

        $this->db->bind(':' . $key, $value);
    }

    return $this->db->execute();
}

    // ======================================
    // OBTENER CLIENTE
    // ======================================

    public function obtenerCliente($id, $empresa_id)
    {
        $this->db->query("
            SELECT *
            FROM clientes
            WHERE id = :id
            AND empresa_id = :empresa_id
            LIMIT 1
        ");

        $this->db->bind(':id', $id);

        $this->db->bind(':empresa_id', $empresa_id);

        return $this->db->single();
    }

    // ======================================
    // ACTUALIZAR CLIENTE
    // ======================================

// ======================================
// ACTUALIZAR CLIENTE
// ======================================

public function actualizar($data)
{
    $this->db->query("
        UPDATE clientes SET

            tipo_persona = :tipo_persona,
            tipo_documento_id = :tipo_documento_id,
            numero_documento = :numero_documento,

            nombres = :nombres,
            apellidos = :apellidos,

            razon_social = :razon_social,
            nit = :nit,
            dv = :dv,

            telefono = :telefono,
            correo = :correo,
            direccion = :direccion,

            municipio_id = :municipio_id,
            departamento_id = :departamento_id,

            regimen_id = :regimen_id,
            responsabilidad_fiscal_id = :responsabilidad_fiscal_id,

            estado = :estado

        WHERE id = :id
        AND empresa_id = :empresa_id
    ");

    foreach($data as $key => $value){

        $this->db->bind(':' . $key, $value);
    }

    return $this->db->execute();
}

    // ======================================
    // ELIMINAR CLIENTE
    // ======================================

    public function eliminar($id, $empresa_id)
    {
        $this->db->query("
            DELETE FROM clientes
            WHERE id = :id
            AND empresa_id = :empresa_id
        ");

        $this->db->bind(':id', $id);

        $this->db->bind(':empresa_id', $empresa_id);

        return $this->db->execute();
    }
}