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
            SELECT *
            FROM clientes
            WHERE empresa_id = :empresa_id
            ORDER BY id DESC
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
                tipo_documento,
                numero_documento,

                nombres,
                apellidos,

                razon_social,
                nit,
                dv,

                telefono,
                correo,
                direccion,

                ciudad,
                departamento,

                regimen,
                responsabilidad_fiscal

            ) VALUES (

                :empresa_id,
                :tipo_persona,
                :tipo_documento,
                :numero_documento,

                :nombres,
                :apellidos,

                :razon_social,
                :nit,
                :dv,

                :telefono,
                :correo,
                :direccion,

                :ciudad,
                :departamento,

                :regimen,
                :responsabilidad_fiscal
            )
        ");

        // BINDS

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
            tipo_documento = :tipo_documento,
            numero_documento = :numero_documento,

            nombres = :nombres,
            apellidos = :apellidos,

            razon_social = :razon_social,
            nit = :nit,
            dv = :dv,

            telefono = :telefono,
            correo = :correo,
            direccion = :direccion,

            ciudad = :ciudad,
            departamento = :departamento,

            municipio_id = :municipio_id,
            departamento_id = :departamento_id,

            regimen = :regimen,
            responsabilidad_fiscal = :responsabilidad_fiscal,

            estado = :estado

        WHERE id = :id
        AND empresa_id = :empresa_id
    ");

    // ======================================
    // IDs
    // ======================================

    $this->db->bind(':id', $data['id']);

    $this->db->bind(':empresa_id', $data['empresa_id']);

    // ======================================
    // PERSONA
    // ======================================

    $this->db->bind(':tipo_persona', $data['tipo_persona']);

    $this->db->bind(':tipo_documento', $data['tipo_documento']);

    $this->db->bind(':numero_documento', $data['numero_documento']);

    // ======================================
    // NATURAL
    // ======================================

    $this->db->bind(':nombres', $data['nombres']);

    $this->db->bind(':apellidos', $data['apellidos']);

    // ======================================
    // JURIDICA
    // ======================================

    $this->db->bind(':razon_social', $data['razon_social']);

    $this->db->bind(':nit', $data['nit']);

    $this->db->bind(':dv', $data['dv']);

    // ======================================
    // CONTACTO
    // ======================================

    $this->db->bind(':telefono', $data['telefono']);

    $this->db->bind(':correo', $data['correo']);

    $this->db->bind(':direccion', $data['direccion']);

    // ======================================
    // UBICACION
    // ======================================

    $this->db->bind(':ciudad', $data['ciudad']);

    $this->db->bind(':departamento', $data['departamento']);

    $this->db->bind(':municipio_id', $data['municipio_id']);

    $this->db->bind(':departamento_id', $data['departamento_id']);

    // ======================================
    // DIAN
    // ======================================

    $this->db->bind(':regimen', $data['regimen']);

    $this->db->bind(':responsabilidad_fiscal', $data['responsabilidad_fiscal']);

    // ======================================
    // ESTADO
    // ======================================

    $this->db->bind(':estado', $data['estado']);

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