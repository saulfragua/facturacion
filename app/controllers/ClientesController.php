<?php

class ClientesController extends Controller
{
    private $clienteModel;
    private $ubicacionModel;

    public function __construct()
    {
        session_start();

        // ======================================
        // VALIDAR LOGIN
        // ======================================

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');
            exit;
        }

        // ======================================
        // MODELOS
        // ======================================

        $this->clienteModel = $this->model('Cliente');

        $this->ubicacionModel = $this->model('Ubicacion');
    }

    // ======================================
    // LISTADO CLIENTES
    // ======================================

    public function index()
    {
        $empresa_id = $_SESSION['empresa_id'];

        $clientes = $this->clienteModel->listar($empresa_id);

        $data = [

            'contenido' => 'clientes/index',
            'clientes' => $clientes

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // CREAR CLIENTE
    // ======================================

public function crear()
{
    // ======================================
    // GUARDAR CLIENTE
    // ======================================

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [

            'empresa_id' => $_SESSION['empresa_id'],

            'tipo_persona' => trim($_POST['tipo_persona']),
            'tipo_documento' => trim($_POST['tipo_documento']),
            'numero_documento' => trim($_POST['numero_documento']),

            'nombres' => trim($_POST['nombres']),
            'apellidos' => trim($_POST['apellidos']),

            'razon_social' => trim($_POST['razon_social']),
            'nit' => trim($_POST['nit']),
            'dv' => trim($_POST['dv']),

            'telefono' => trim($_POST['telefono']),
            'correo' => trim($_POST['correo']),
            'direccion' => trim($_POST['direccion']),

            'ciudad' => trim($_POST['municipio_id']),
            'departamento' => trim($_POST['departamento_id']),

            'regimen' => trim($_POST['regimen']),
            'responsabilidad_fiscal' => trim($_POST['responsabilidad_fiscal'])

        ];

        if($this->clienteModel->crear($data)){

            $_SESSION['success'] = 'Cliente registrado correctamente';

            header('Location: ' . URL . '/clientes');
            exit;
        }
    }

    // ======================================
    // CARGAR DEPARTAMENTOS
    // ======================================

    $departamentos = $this->ubicacionModel->listarDepartamentos();

    // ======================================
    // VISTA
    // ======================================

    $data = [

        'contenido' => 'clientes/crear',
        'departamentos' => $departamentos

    ];

    $this->view('layouts/app', $data);
}

 // ======================================
 // EDITAR CLIENTE
 // ======================================

// ======================================
// EDITAR CLIENTE
// ======================================

// ======================================
// EDITAR CLIENTE
// ======================================

public function editar($id = null)
{
    if(!$id){

        header('Location: ' . URL . '/clientes');
        exit;
    }

    $empresa_id = $_SESSION['empresa_id'];

    // ======================================
    // OBTENER CLIENTE
    // ======================================

    $cliente = $this->clienteModel->obtenerCliente($id, $empresa_id);

    if(!$cliente){

        $_SESSION['error'] = 'Cliente no encontrado';

        header('Location: ' . URL . '/clientes');
        exit;
    }

    // ======================================
    // ACTUALIZAR
    // ======================================

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [

            'id' => $id,

            'empresa_id' => $empresa_id,

            // PERSONA

            'tipo_persona' => trim($_POST['tipo_persona']),
            'tipo_documento' => trim($_POST['tipo_documento']),
            'numero_documento' => trim($_POST['numero_documento']),

            // NATURAL

            'nombres' => trim($_POST['nombres']),
            'apellidos' => trim($_POST['apellidos']),

            // JURIDICA

            'razon_social' => trim($_POST['razon_social']),
            'nit' => trim($_POST['nit']),
            'dv' => trim($_POST['dv']),

            // CONTACTO

            'telefono' => trim($_POST['telefono']),
            'correo' => trim($_POST['correo']),
            'direccion' => trim($_POST['direccion']),

            // UBICACION

            'municipio_id' => trim($_POST['municipio_id']),
            'departamento_id' => trim($_POST['departamento_id']),

            'ciudad' => trim($_POST['ciudad']),
            'departamento' => trim($_POST['departamento']),

            // DIAN

            'regimen' => trim($_POST['regimen']),
            'responsabilidad_fiscal' => trim($_POST['responsabilidad_fiscal']),

            // ESTADO

            'estado' => trim($_POST['estado'])

        ];

        // ======================================
        // NOMBRE DEPARTAMENTO
        // ======================================

        foreach($this->ubicacionModel->listarDepartamentos() as $dep){

            if($dep->id == $data['departamento_id']){

                $data['departamento'] = $dep->nombre;
            }
        }

        // ======================================
        // MUNICIPIOS
        // ======================================

        $municipios = $this->ubicacionModel->listarMunicipios(
            $data['departamento_id']
        );

        foreach($municipios as $mun){

            if($mun->id == $data['municipio_id']){

                $data['ciudad'] = $mun->nombre;
            }
        }

        // ======================================
        // ACTUALIZAR
        // ======================================

        if($this->clienteModel->actualizar($data)){

            $_SESSION['success'] = 'Cliente actualizado correctamente';

            header('Location: ' . URL . '/clientes');
            exit;
        }
    }

    // ======================================
    // DEPARTAMENTOS
    // ======================================

    $departamentos = $this->ubicacionModel->listarDepartamentos();

    // ======================================
    // MUNICIPIOS CLIENTE
    // ======================================

    $municipios = [];

    if(!empty($cliente->departamento_id)){

        $municipios = $this->ubicacionModel->listarMunicipios(
            $cliente->departamento_id
        );
    }

    // ======================================
    // VISTA
    // ======================================

    $data = [

        'contenido' => 'clientes/editar',

        'cliente' => $cliente,

        'departamentos' => $departamentos,

        'municipios' => $municipios

    ];

    $this->view('layouts/app', $data);
}
}