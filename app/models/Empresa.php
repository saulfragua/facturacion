<?php

class Empresa
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // =====================================
    // CREAR EMPRESA
    // =====================================

public function crear($data)
{
    $this->db->query("
        INSERT INTO empresas (

            razon_social,
            nit,
            dv,
            direccion,
            telefono,
            correo,

            municipio_id,
            departamento_id,
            regimen_id,
            responsabilidad_fiscal_id,
            tipo_documento_id

        ) VALUES (

            :razon_social,
            :nit,
            :dv,
            :direccion,
            :telefono,
            :correo,

            :municipio_id,
            :departamento_id,
            :regimen_id,
            :responsabilidad_fiscal_id,
            :tipo_documento_id
        )
    ");

    foreach($data as $key => $value){

        $this->db->bind(':' . $key, $value);
    }

    if($this->db->execute()){

        return $this->db->lastInsertId();
    }

    return false;
}
}