<?php

class UsuariosController extends Controller
{
    private $usuarioModel;

    public function __construct()
    {
        session_start();

        // LOGIN

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');

            exit;
        }

        // MODEL

        $this->usuarioModel = $this->model('Usuario');
    }

    // ======================================
    // INDEX
    // ======================================

    public function index()
    {
        $empresa_id = $_SESSION['empresa_id'];

        $usuarios = $this->usuarioModel->listar(
            $empresa_id
        );

        $data = [

            'contenido' => 'usuarios/index',

            'usuarios' => $usuarios

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

            'empresa_id' => $_SESSION['empresa_id'],

            'nombre' =>
                trim($_POST['nombre']),

            'correo' =>
                trim($_POST['correo']),

            'password' =>
                password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                ),

            'rol' =>
                trim($_POST['rol']),

            'estado' =>
                trim($_POST['estado'])

        ];

        // ======================================
        // FOTO
        // ======================================

        if(
            isset($_FILES['foto']) &&
            $_FILES['foto']['error'] == 0
        ){

            $nombreFoto =
                time() . '_' .
                $_FILES['foto']['name'];

            $ruta =
                dirname(dirname(__DIR__)) .
                '/public/assets/img/usuarios/' .
                $nombreFoto;

            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $ruta
            );

            $data['foto'] = $nombreFoto;

        } else {

            $data['foto'] = null;
        }

        // ======================================
        // CREAR
        // ======================================

        if(
            $this->usuarioModel->crearUsuario(
                $data
            )
        ){

            $_SESSION['success'] =
                'Usuario creado correctamente';

            header('Location: ' . URL . '/usuarios');

            exit;
        }

        $_SESSION['error'] =
            'No fue posible crear el usuario';
    }

    // ======================================
    // VIEW
    // ======================================

    $data = [

        'contenido' => 'usuarios/crear'

    ];

    $this->view('layouts/app', $data);
}

// ======================================
// EDITAR
// ======================================

public function editar($id = null)
{
    if(!$id){

        header('Location: ' . URL . '/usuarios');

        exit;
    }

    $empresa_id = $_SESSION['empresa_id'];

    // ======================================
    // USUARIO
    // ======================================

    $usuario = $this->usuarioModel->obtenerUsuario(
        $id,
        $empresa_id
    );

    if(!$usuario){

        $_SESSION['error'] =
            'Usuario no encontrado';

        header('Location: ' . URL . '/usuarios');

        exit;
    }

    // ======================================
    // ACTUALIZAR
    // ======================================

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [

            'id' => $id,

            'empresa_id' => $empresa_id,

            'nombre' =>
                trim($_POST['nombre']),

            'correo' =>
                trim($_POST['correo']),

            'rol' =>
                trim($_POST['rol']),

            'estado' =>
                trim($_POST['estado'])

        ];

        // PASSWORD

        if(!empty($_POST['password'])){

            $data['password'] =
                password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                );
        }

        // FOTO

        if(
            isset($_FILES['foto']) &&
            $_FILES['foto']['error'] == 0
        ){

            $nombreFoto =
                time() . '_' .
                $_FILES['foto']['name'];

            $ruta =
                dirname(dirname(__DIR__)) .
                '/public/assets/img/usuarios/' .
                $nombreFoto;

            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $ruta
            );

            $data['foto'] = $nombreFoto;
        }

        // ACTUALIZAR

        if(
            $this->usuarioModel->actualizar(
                $data
            )
        ){

            $_SESSION['success'] =
                'Usuario actualizado correctamente';

            header('Location: ' . URL . '/usuarios');

            exit;
        }
    }

    // VIEW

    $data = [

        'contenido' => 'usuarios/editar',

        'usuario' => $usuario

    ];

    $this->view('layouts/app', $data);
}
}