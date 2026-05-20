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

    public function listar($empresa_id)
{
    $this->db->query("
        SELECT *
        FROM usuarios
        WHERE empresa_id = :empresa_id
        ORDER BY id DESC
    ");

    $this->db->bind(':empresa_id', $empresa_id);

    return $this->db->resultSet();
}

// ======================================
// CREAR USUARIO
// ======================================

public function crearUsuario($data)
{
    $this->db->query("
        INSERT INTO usuarios (

            empresa_id,
            nombre,
            correo,
            password,
            rol,
            foto,
            estado

        ) VALUES (

            :empresa_id,
            :nombre,
            :correo,
            :password,
            :rol,
            :foto,
            :estado
        )
    ");

    foreach($data as $key => $value){

        $this->db->bind(
            ':' . $key,
            $value
        );
    }

    return $this->db->execute();
}

// ======================================
// OBTENER USUARIO
// ======================================

public function obtenerUsuario($id, $empresa_id)
{
    $this->db->query("
        SELECT *
        FROM usuarios
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
// ACTUALIZAR
// ======================================

public function actualizar($data)
{
    $sql = "

        UPDATE usuarios SET

            nombre = :nombre,

            correo = :correo,

            rol = :rol,

            estado = :estado

    ";

    // PASSWORD

    if(isset($data['password'])){

        $sql .= "
            , password = :password
        ";
    }

    // FOTO

    if(isset($data['foto'])){

        $sql .= "
            , foto = :foto
        ";
    }

    $sql .= "

        WHERE id = :id

        AND empresa_id = :empresa_id

    ";

    $this->db->query($sql);

    foreach($data as $key => $value){

        $this->db->bind(
            ':' . $key,
            $value
        );
    }

    return $this->db->execute();
}
}