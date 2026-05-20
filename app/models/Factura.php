<?php

class Factura
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ======================================
    // LISTAR FACTURAS
    // ======================================

    public function listar($empresa_id)
    {
        $this->db->query("
            SELECT

                f.*,

                c.numero_documento,

                c.nombres,
                c.apellidos,
                c.razon_social,

                u.nombre AS usuario

            FROM facturas f

            INNER JOIN clientes c
                ON f.cliente_id = c.id

            INNER JOIN usuarios u
                ON f.usuario_id = u.id

            WHERE f.empresa_id = :empresa_id

            ORDER BY f.id DESC
        ");

        $this->db->bind(
            ':empresa_id',
            $empresa_id
        );

        return $this->db->resultSet();
    }

    // ======================================
    // OBTENER FACTURA
    // ======================================

    public function obtener($id, $empresa_id)
    {
        $this->db->query("
            SELECT *
            FROM facturas
            WHERE id = :id
            AND empresa_id = :empresa_id
            LIMIT 1
        ");

        $this->db->bind(':id', $id);

        $this->db->bind(
            ':empresa_id',
            $empresa_id
        );

        return $this->db->single();
    }

    // ======================================
    // ELIMINAR
    // ======================================

    public function eliminar($id, $empresa_id)
    {
        $this->db->query("
            DELETE FROM facturas
            WHERE id = :id
            AND empresa_id = :empresa_id
        ");

        $this->db->bind(':id', $id);

        $this->db->bind(
            ':empresa_id',
            $empresa_id
        );

        return $this->db->execute();
    }
}