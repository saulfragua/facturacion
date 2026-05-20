<?php

class TipoDocumento
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ======================================
    // LISTAR
    // ======================================

    public function listar()
    {
        $this->db->query("
            SELECT *
            FROM tipos_documento
            WHERE estado = 1
            ORDER BY nombre ASC
        ");

        return $this->db->resultSet();
    }

    // ======================================
    // LISTAR POR PERSONA
    // ======================================

    public function listarPorPersona($tipo_persona)
    {
        $this->db->query("
            SELECT *
            FROM tipos_documento
            WHERE estado = 1
            AND (
                tipo_persona = :tipo_persona
                OR tipo_persona = 'AMBAS'
            )
            ORDER BY nombre ASC
        ");

        $this->db->bind(':tipo_persona', $tipo_persona);

        return $this->db->resultSet();
    }
}