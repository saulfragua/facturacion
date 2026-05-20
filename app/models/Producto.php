<?php

class Producto
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ======================================
    // LISTAR
    // ======================================

    public function listar($empresa_id)
    {
        $this->db->query("
            SELECT *
            FROM productos
            WHERE empresa_id = :empresa_id
            ORDER BY id DESC
        ");

        $this->db->bind(':empresa_id', $empresa_id);

        return $this->db->resultSet();
    }

    // ======================================
    // OBTENER
    // ======================================

    public function obtener($id, $empresa_id)
    {
        $this->db->query("
            SELECT *
            FROM productos
            WHERE id = :id
            AND empresa_id = :empresa_id
            LIMIT 1
        ");

        $this->db->bind(':id', $id);
        $this->db->bind(':empresa_id', $empresa_id);

        return $this->db->single();
    }

    // ======================================
    // CREAR
    // ======================================

    public function crear($data)
    {
        $this->db->query("
            INSERT INTO productos (

                empresa_id,
                tipo,
                codigo,
                nombre,
                descripcion,
                imagen,
                precio,
                iva,
                stock,
                unidad_medida,
                estado

            ) VALUES (

                :empresa_id,
                :tipo,
                :codigo,
                :nombre,
                :descripcion,
                :imagen,
                :precio,
                :iva,
                :stock,
                :unidad_medida,
                :estado
            )
        ");

        foreach($data as $key => $value){

            $this->db->bind(':' . $key, $value);
        }

        return $this->db->execute();
    }

    // ======================================
    // ACTUALIZAR
    // ======================================

    public function actualizar($data)
    {
        $sql = "

            UPDATE productos SET

                tipo = :tipo,

                codigo = :codigo,

                nombre = :nombre,

                descripcion = :descripcion,

                precio = :precio,

                iva = :iva,

                stock = :stock,

                unidad_medida = :unidad_medida,

                estado = :estado

        ";

        // IMAGEN

        if(isset($data['imagen'])){

            $sql .= "

                , imagen = :imagen

            ";
        }

        $sql .= "

            WHERE id = :id
            AND empresa_id = :empresa_id

        ";

        $this->db->query($sql);

        foreach($data as $key => $value){

            $this->db->bind(':' . $key, $value);
        }

        return $this->db->execute();
    }

    // ======================================
    // ELIMINAR
    // ======================================

    public function eliminar($id, $empresa_id)
    {
        $this->db->query("
            DELETE FROM productos
            WHERE id = :id
            AND empresa_id = :empresa_id
        ");

        $this->db->bind(':id', $id);

        $this->db->bind(':empresa_id', $empresa_id);

        return $this->db->execute();
    }
}