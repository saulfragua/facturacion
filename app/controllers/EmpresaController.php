<?php

class EmpresaController extends Controller
{
    private $empresaModel;

    private $ubicacionModel;

    private $regimenModel;

    private $responsabilidadFiscalModel;

    private $tipoDocumentoModel;

    public function __construct()
    {
        session_start();

        if (!isset($_SESSION['usuario_id'])) {

            header('Location: ' . URL . '/inicio/login');

            exit;
        }

        $this->empresaModel = $this->model('Empresa');

        $this->ubicacionModel = $this->model('Ubicacion');

        $this->regimenModel = $this->model('Regimen');

        $this->responsabilidadFiscalModel =
            $this->model('ResponsabilidadFiscal');

        $this->tipoDocumentoModel =
            $this->model('TipoDocumento');
    }

    // ======================================
    // INDEX
    // ======================================

    public function index()
    {
        $empresa_id = $_SESSION['empresa_id'];

        $empresa = $this->empresaModel->obtenerEmpresa(
            $empresa_id
        );

        $data = [

            'contenido' => 'empresa/index',

            'empresa' => $empresa

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // EDITAR
    // ======================================

    public function editar($id = null)
    {
        if (!$id) {

            header('Location: ' . URL . '/empresa');

            exit;
        }

        // ======================================
        // EMPRESA
        // ======================================

        $empresa = $this->empresaModel->obtenerEmpresa(
            $id
        );

        if (!$empresa) {

            $_SESSION['error'] =
                'Empresa no encontrada';

            header('Location: ' . URL . '/empresa');

            exit;
        }

        // ======================================
        // ACTUALIZAR
        // ======================================

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [

                'id' => $id,

                'razon_social' =>
                    trim($_POST['razon_social']),

                'nit' =>
                    trim($_POST['nit']),

                'dv' =>
                    trim($_POST['dv']),

                'direccion' =>
                    trim($_POST['direccion']),

                'telefono' =>
                    trim($_POST['telefono']),

                'correo' =>
                    trim($_POST['correo']),

                'municipio_id' =>
                    trim($_POST['municipio_id']),

                'departamento_id' =>
                    trim($_POST['departamento_id']),

                'regimen_id' =>
                    trim($_POST['regimen_id']),

                'responsabilidad_fiscal_id' =>
                    trim($_POST['responsabilidad_fiscal_id']),

                'tipo_documento_id' =>
                    trim($_POST['tipo_documento_id']),

                'resolucion_dian' =>
                    trim($_POST['resolucion_dian']),

                'prefijo_factura' =>
                    trim($_POST['prefijo_factura']),

                'rango_desde' =>
                    trim($_POST['rango_desde']),

                'rango_hasta' =>
                    trim($_POST['rango_hasta']),

                'fecha_vencimiento' =>
                    trim($_POST['fecha_vencimiento']),

                'estado' =>
                    trim($_POST['estado'])

            ];

            // ======================================
            // LOGO
            // ======================================

            if (
                isset($_FILES['logo']) &&
                $_FILES['logo']['error'] == 0
            ) {

                $nombreLogo =
                    time() . '_' .
                    $_FILES['logo']['name'];

                $ruta =
                    dirname(dirname(__DIR__)) .
                    '/public/assets/img/logosempresas/' .
                    $nombreLogo;

                move_uploaded_file(
                    $_FILES['logo']['tmp_name'],
                    $ruta
                );

                $data['logo'] = $nombreLogo;
            }

            // ======================================
            // ACTUALIZAR
            // ======================================

            if (
                $this->empresaModel->actualizar($data)
            ) {

                $_SESSION['success'] =
                    'Empresa actualizada correctamente';

                header('Location: ' . URL . '/empresa');

                exit;
            }
        }

        // ======================================
        // MUNICIPIOS
        // ======================================

        $municipios = [];

        if (!empty($empresa->departamento_id)) {

            $municipios =
                $this->ubicacionModel
                    ->listarMunicipios(
                        $empresa->departamento_id
                    );
        }

        // ======================================
        // VIEW
        // ======================================

        $data = [

            'contenido' => 'empresa/editar',

            'empresa' => $empresa,

            'departamentos' =>
                $this->ubicacionModel
                    ->listarDepartamentos(),

            'municipios' =>
                $municipios,

            'regimenes' =>
                $this->regimenModel
                    ->listar(),

            'responsabilidades' =>
                $this->responsabilidadFiscalModel
                    ->listar(),

            'tipos_documento' =>
                $this->tipoDocumentoModel
                    ->listar()

        ];

        $this->view('layouts/app', $data);
    }
}