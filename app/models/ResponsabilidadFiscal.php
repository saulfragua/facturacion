<?php

class ResponsabilidadFiscal
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
            FROM responsabilidades_fiscales
            WHERE estado = 1
            ORDER BY nombre ASC
        ");

        return $this->db->resultSet();
    }
}