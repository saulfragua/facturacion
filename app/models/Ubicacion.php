<?php

class Ubicacion
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ======================================
    // LISTAR DEPARTAMENTOS
    // ======================================

    public function listarDepartamentos()
    {
        $this->db->query("
            SELECT *
            FROM departamentos
            ORDER BY nombre ASC
        ");

        return $this->db->resultSet();
    }

    // ======================================
    // LISTAR MUNICIPIOS
    // ======================================

public function listarMunicipios($departamento_id)
{
    $this->db->query("
        SELECT *
        FROM municipios
        WHERE departamento_id = :departamento_id
        ORDER BY nombre ASC
    ");

    $this->db->bind(':departamento_id', $departamento_id);

    return $this->db->resultSet();
}
    
}