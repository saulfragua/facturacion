<?php

class UbicacionesController extends Controller
{
    private $ubicacionModel;

    public function __construct()
    {
        $this->ubicacionModel = $this->model('Ubicacion');
    }

    public function municipios($departamento_id = null)
    {
        header('Content-Type: application/json');

        if(!$departamento_id){

            echo json_encode([]);
            exit;
        }

        $municipios = $this->ubicacionModel->listarMunicipios($departamento_id);

        echo json_encode($municipios);

        exit;
    }
}