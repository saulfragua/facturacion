<?php

class InicioController extends Controller
{
    private $usuarioModel;
    private $empresaModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
        $this->empresaModel = $this->model('Empresa');
    }

    // ====================================
    // INDEX
    // ====================================

    public function index()
    {
        header('Location: ' . URL . '/inicio/login');
        exit;
    }

    // ====================================
    // LOGIN
    // ====================================

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            session_start();

            $correo = trim($_POST['correo']);
            $password = trim($_POST['password']);

            $usuario = $this->usuarioModel->buscarPorCorreo($correo);

            if ($usuario) {

                if (password_verify($password, $usuario->password)) {

                    $this->usuarioModel->actualizarUltimoLogin($usuario->id);

                    $_SESSION['usuario_id'] = $usuario->id;
                    $_SESSION['empresa_id'] = $usuario->empresa_id;
                    $_SESSION['usuario_nombre'] = $usuario->nombre;
                    $_SESSION['usuario_rol'] = $usuario->rol;

                    header('Location: ' . URL . '/dashboard');
                    exit;
                }
            }

            $data['error'] = 'Correo o contraseña incorrectos';

            $this->view('inicio/login', $data);

        } else {

            $this->view('inicio/login');
        }
    }

    // ====================================
    // REGISTRO
    // ====================================

public function registro()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // =================================
        // EMPRESA
        // =================================

        $empresa = [

            'razon_social' => trim($_POST['razon_social']),
            'nit' => trim($_POST['nit']),
            'dv' => trim($_POST['dv'] ?? ''),
            'direccion' => trim($_POST['direccion'] ?? ''),
            'telefono' => trim($_POST['telefono'] ?? ''),
            'correo' => trim($_POST['correo']),

            // NUEVA ESTRUCTURA BD

            'municipio_id' => !empty($_POST['municipio_id'])
                ? trim($_POST['municipio_id'])
                : null,

            'departamento_id' => !empty($_POST['departamento_id'])
                ? trim($_POST['departamento_id'])
                : null,

            'regimen_id' => !empty($_POST['regimen_id'])
                ? trim($_POST['regimen_id'])
                : null,

            'responsabilidad_fiscal_id' => !empty($_POST['responsabilidad_fiscal_id'])
                ? trim($_POST['responsabilidad_fiscal_id'])
                : null,

            'tipo_documento_id' => !empty($_POST['tipo_documento_id'])
                ? trim($_POST['tipo_documento_id'])
                : null

        ];

        // =================================
        // CREAR EMPRESA
        // =================================

        $empresa_id = $this->empresaModel->crear($empresa);

        if ($empresa_id) {

            // =================================
            // USUARIO ADMIN
            // =================================

            $usuario = [

                'empresa_id' => $empresa_id,

                'nombre' => trim($_POST['nombre']),

                'correo' => trim($_POST['correo']),

                'password' => password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                ),

                'rol' => 'ADMIN'

            ];

            $usuario_id = $this->usuarioModel->crear($usuario);

            if ($usuario_id) {

                session_start();

                $_SESSION['success'] =
                    'Cuenta creada correctamente. Ahora puedes iniciar sesión.';

                header('Location: ' . URL . '/inicio/login');

                exit;
            }
        }

        $data['error'] = 'No fue posible crear la cuenta';

        $this->view('inicio/registro', $data);

    } else {

        $this->view('inicio/registro');
    }
}

    // ====================================
    // RECUPERAR PASSWORD
    // ====================================

    public function recuperar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $correo = trim($_POST['correo']);

            $data['success'] = 'Si el correo existe, recibirás instrucciones.';

            $this->view('inicio/recuperar', $data);

        } else {

            $this->view('inicio/recuperar');
        }
    }

    // ====================================
    // LOGOUT
    // ====================================

    public function logout()
    {
        session_start();

        session_destroy();

        header('Location: ' . URL . '/inicio/login');
        exit;
    }
}