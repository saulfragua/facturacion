<?php

class Regimen
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
            FROM regimenes
            WHERE estado = 1
            ORDER BY nombre ASC
        ");

        return $this->db->resultSet();
    }
}