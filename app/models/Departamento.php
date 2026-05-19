<?php

class Departamento
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Obtener todos los departamentos
     */
    public function obtenerDepartamentos()
    {
        $this->db->query("
            SELECT *
            FROM departamentos
            ORDER BY nombre ASC
        ");

        return $this->db->registros();
    }

    /**
     * Obtener departamento por ID
     */
    public function obtenerDepartamentoPorId($id)
    {
        $this->db->query("
            SELECT *
            FROM departamentos
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->registro();
    }

    /**
     * Crear departamento
     */
    public function crearDepartamento($datos)
    {
        $this->db->query("
            INSERT INTO departamentos(
                codigo,
                nombre
            ) VALUES (
                :codigo,
                :nombre
            )
        ");

        $this->db->bind(':codigo', $datos['codigo']);
        $this->db->bind(':nombre', $datos['nombre']);

        return $this->db->execute();
    }

    /**
     * Actualizar departamento
     */
    public function actualizarDepartamento($datos)
    {
        $this->db->query("
            UPDATE departamentos
            SET
                codigo = :codigo,
                nombre = :nombre
            WHERE id = :id
        ");

        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':codigo', $datos['codigo']);
        $this->db->bind(':nombre', $datos['nombre']);

        return $this->db->execute();
    }

    /**
     * Eliminar departamento
     */
    public function eliminarDepartamento($id)
    {
        $this->db->query("
            DELETE FROM departamentos
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}