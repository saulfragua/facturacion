<?php

class ClientesController extends Controller
{
    private $clienteModel;

    private $ubicacionModel;

    private $regimenModel;

    private $responsabilidadFiscalModel;

    private $tipoDocumentoModel;

    public function __construct()
    {
        session_start();

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');

            exit;
        }

        $this->clienteModel = $this->model('Cliente');

        $this->ubicacionModel = $this->model('Ubicacion');

        $this->regimenModel = $this->model('Regimen');

        $this->responsabilidadFiscalModel = $this->model('ResponsabilidadFiscal');
        
        $this->tipoDocumentoModel = $this->model('TipoDocumento');
    }

    // ======================================
    // LISTADO
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
    // CREAR
    // ======================================

    public function crear()
    {
        // ======================================
        // GUARDAR
        // ======================================

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [

                // EMPRESA

                'empresa_id' => $_SESSION['empresa_id'],

                // PERSONA

                'tipo_persona' => trim($_POST['tipo_persona']),
                'tipo_documento_id' => trim($_POST['tipo_documento_id']),
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

                // DIAN

                'regimen_id' => trim($_POST['regimen_id']),
                'responsabilidad_fiscal_id' => trim($_POST['responsabilidad_fiscal_id'])

            ];

            // ======================================
            // VALIDACIONES
            // ======================================

            if(empty($data['numero_documento'])){

                $_SESSION['error'] =
                    'El número de documento es obligatorio';

                header('Location: ' . URL . '/clientes/crear');

                exit;
            }

            // ======================================
            // CREAR
            // ======================================

            if($this->clienteModel->crear($data)){

                $_SESSION['success'] =
                    'Cliente registrado correctamente';

                header('Location: ' . URL . '/clientes');

                exit;

            } else {

                $_SESSION['error'] =
                    'No fue posible registrar el cliente';

                header('Location: ' . URL . '/clientes/crear');

                exit;
            }
        }

        // ======================================
        // CARGAR FORMULARIO
        // ======================================

        $data = [

            'contenido' => 'clientes/crear',

            'departamentos' =>
                $this->ubicacionModel->listarDepartamentos(),

            'regimenes' =>
                $this->regimenModel->listar(),

            'responsabilidades' =>
                $this->responsabilidadFiscalModel->listar(),

            'tipos_documento' =>
                $this->tipoDocumentoModel->listar()

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // EDITAR
    // ======================================

    public function editar($id = null)
    {
        if(!$id){

            header('Location: ' . URL . '/clientes');

            exit;
        }

        $empresa_id = $_SESSION['empresa_id'];

        // ======================================
        // CLIENTE
        // ======================================

        $cliente = $this->clienteModel->obtenerCliente(
            $id,
            $empresa_id
        );

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
                'tipo_documento_id' => trim($_POST['tipo_documento_id']),
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

                // DIAN

                'regimen_id' => trim($_POST['regimen_id']),
                'responsabilidad_fiscal_id' =>
                    trim($_POST['responsabilidad_fiscal_id']),

                // ESTADO

                'estado' => trim($_POST['estado'])

            ];

            // ======================================
            // ACTUALIZAR
            // ======================================

            if($this->clienteModel->actualizar($data)){

                $_SESSION['success'] =
                    'Cliente actualizado correctamente';

                header('Location: ' . URL . '/clientes');

                exit;

            } else {

                $_SESSION['error'] =
                    'No fue posible actualizar el cliente';
            }
        }

        // ======================================
        // MUNICIPIOS CLIENTE
        // ======================================

        $municipios = [];

        if(!empty($cliente->departamento_id)){

            $municipios =
                $this->ubicacionModel->listarMunicipios(
                    $cliente->departamento_id
                );
        }

        // ======================================
        // FORMULARIO
        // ======================================

        $data = [

            'contenido' => 'clientes/editar',

            'cliente' => $cliente,

            'departamentos' =>
                $this->ubicacionModel->listarDepartamentos(),

            'municipios' => $municipios,

            'regimenes' =>
                $this->regimenModel->listar(),

            'responsabilidades' =>
                $this->responsabilidadFiscalModel->listar(),

            'tipos_documento' =>
                $this->tipoDocumentoModel->listar()

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // ELIMINAR
    // ======================================

    public function eliminar($id = null)
    {
        if(!$id){

            header('Location: ' . URL . '/clientes');

            exit;
        }

        $empresa_id = $_SESSION['empresa_id'];

        if($this->clienteModel->eliminar($id, $empresa_id)){

            $_SESSION['success'] =
                'Cliente eliminado correctamente';

        } else {

            $_SESSION['error'] =
                'No fue posible eliminar el cliente';
        }

        header('Location: ' . URL . '/clientes');

        exit;
    }
}