<?php

class ConfiguracionController extends Controller
{
    private $empresaModel;

    public function __construct()
    {
        session_start();

        // VALIDAR LOGIN

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');

            exit;
        }

        // MODELO

        $this->empresaModel = $this->model('Empresa');
    }

    // ======================================
    // INDEX
    // ======================================

    public function index()
    {
        // EMPRESA LOGUEADA

        $empresa_id = $_SESSION['empresa_id'];

        // DATOS EMPRESA

        $empresa = $this->empresaModel->obtenerEmpresa(
            $empresa_id
        );

        // VIEW

        $data = [

            'contenido' => 'empresa/index',

            'empresa' => $empresa

        ];

        $this->view('layouts/app', $data);
    }
}