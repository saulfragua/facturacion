<?php

class Municipio
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Obtener todos los municipios
     */
    public function obtenerMunicipios()
    {
        $this->db->query("
            SELECT 
                m.*,
                d.nombre AS departamento
            FROM municipios m
            INNER JOIN departamentos d
                ON m.departamento_id = d.id
            ORDER BY m.nombre ASC
        ");

        return $this->db->registros();
    }

    /**
     * Obtener municipios por departamento
     */
    public function obtenerMunicipiosPorDepartamento($departamento_id)
    {
        $this->db->query("
            SELECT *
            FROM municipios
            WHERE departamento_id = :departamento_id
            ORDER BY nombre ASC
        ");

        $this->db->bind(':departamento_id', $departamento_id);

        return $this->db->registros();
    }

    /**
     * Obtener municipio por ID
     */
    public function obtenerMunicipioPorId($id)
    {
        $this->db->query("
            SELECT *
            FROM municipios
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->registro();
    }

    /**
     * Crear municipio
     */
    public function crearMunicipio($datos)
    {
        $this->db->query("
            INSERT INTO municipios(
                departamento_id,
                codigo,
                nombre
            ) VALUES (
                :departamento_id,
                :codigo,
                :nombre
            )
        ");

        $this->db->bind(':departamento_id', $datos['departamento_id']);
        $this->db->bind(':codigo', $datos['codigo']);
        $this->db->bind(':nombre', $datos['nombre']);

        return $this->db->execute();
    }

    /**
     * Actualizar municipio
     */
    public function actualizarMunicipio($datos)
    {
        $this->db->query("
            UPDATE municipios
            SET
                departamento_id = :departamento_id,
                codigo = :codigo,
                nombre = :nombre
            WHERE id = :id
        ");

        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':departamento_id', $datos['departamento_id']);
        $this->db->bind(':codigo', $datos['codigo']);
        $this->db->bind(':nombre', $datos['nombre']);

        return $this->db->execute();
    }

    /**
     * Eliminar municipio
     */
    public function eliminarMunicipio($id)
    {
        $this->db->query("
            DELETE FROM municipios
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}