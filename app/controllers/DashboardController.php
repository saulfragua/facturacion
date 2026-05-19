<?php

class DashboardController extends Controller
{
    public function index()
    {
        session_start();

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');
            exit;
        }

        $data = [

            'contenido' => 'dashboard/index'

        ];

        $this->view('layouts/app', $data);
    }
}