<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // =====================================
    // BUSCAR POR CORREO
    // =====================================

    public function buscarPorCorreo($correo)
    {
        $this->db->query("
            SELECT *
            FROM usuarios
            WHERE correo = :correo
            LIMIT 1
        ");

        $this->db->bind(':correo', $correo);

        return $this->db->single();
    }

    // =====================================
    // CREAR USUARIO
    // =====================================

    public function crear($data)
    {
        $this->db->query("
            INSERT INTO usuarios (
                empresa_id,
                nombre,
                correo,
                password,
                rol,
                estado
            ) VALUES (
                :empresa_id,
                :nombre,
                :correo,
                :password,
                :rol,
                :estado
            )
        ");

        $this->db->bind(':empresa_id', $data['empresa_id']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':correo', $data['correo']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':rol', $data['rol']);
        $this->db->bind(':estado', 1);

        if($this->db->execute()){

            return $this->db->lastInsertId();

        } else {

            return false;
        }
    }

    // =====================================
    // ACTUALIZAR ULTIMO LOGIN
    // =====================================

    public function actualizarUltimoLogin($id)
    {
        $this->db->query("
            UPDATE usuarios
            SET ultimo_login = NOW()
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}