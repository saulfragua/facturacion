<?php

class ProductosController extends Controller
{
    private $productoModel;

    public function __construct()
    {
        session_start();

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . URL . '/inicio/login');

            exit;
        }

        $this->productoModel = $this->model('Producto');
    }

    // ======================================
    // INDEX
    // ======================================

    public function index()
    {
        $productos = $this->productoModel->listar(
            $_SESSION['empresa_id']
        );

        $data = [

            'contenido' => 'productos/index',

            'productos' => $productos

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // CREAR
    // ======================================

    public function crear()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [

                'empresa_id' =>
                    $_SESSION['empresa_id'],

                'tipo' =>
                    trim($_POST['tipo']),

                'codigo' =>
                    trim($_POST['codigo']),

                'nombre' =>
                    trim($_POST['nombre']),

                'descripcion' =>
                    trim($_POST['descripcion']),

                'precio' =>
                    trim($_POST['precio']),

                'iva' =>
                    trim($_POST['iva']),

                'stock' =>
                    trim($_POST['stock']),

                'unidad_medida' =>
                    trim($_POST['unidad_medida']),

                'estado' =>
                    trim($_POST['estado'])

            ];

            // IMAGEN

            if(
                isset($_FILES['imagen']) &&
                $_FILES['imagen']['error'] == 0
            ){

                $directorio =
                    dirname(dirname(__DIR__)) .
                    '/public/assets/img/productos/';

                if(!file_exists($directorio)){

                    mkdir($directorio, 0777, true);
                }

                $nombreImagen =
                    time() . '_' .
                    $_FILES['imagen']['name'];

                $ruta =
                    $directorio .
                    $nombreImagen;

                move_uploaded_file(
                    $_FILES['imagen']['tmp_name'],
                    $ruta
                );

                $data['imagen'] = $nombreImagen;

            } else {

                $data['imagen'] = null;
            }

            if($this->productoModel->crear($data)){

                $_SESSION['success'] =
                    'Producto creado correctamente';

                header('Location: ' . URL . '/productos');

                exit;
            }
        }

        $data = [

            'contenido' => 'productos/crear'

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // EDITAR
    // ======================================

    public function editar($id = null)
    {
        if(!$id){

            header('Location: ' . URL . '/productos');

            exit;
        }

        $empresa_id = $_SESSION['empresa_id'];

        $producto = $this->productoModel->obtener(
            $id,
            $empresa_id
        );

        if(!$producto){

            header('Location: ' . URL . '/productos');

            exit;
        }

        // ACTUALIZAR

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [

                'id' => $id,

                'empresa_id' =>
                    $empresa_id,

                'tipo' =>
                    trim($_POST['tipo']),

                'codigo' =>
                    trim($_POST['codigo']),

                'nombre' =>
                    trim($_POST['nombre']),

                'descripcion' =>
                    trim($_POST['descripcion']),

                'precio' =>
                    trim($_POST['precio']),

                'iva' =>
                    trim($_POST['iva']),

                'stock' =>
                    trim($_POST['stock']),

                'unidad_medida' =>
                    trim($_POST['unidad_medida']),

                'estado' =>
                    trim($_POST['estado'])

            ];

            // IMAGEN

            if(
                isset($_FILES['imagen']) &&
                $_FILES['imagen']['error'] == 0
            ){

                $directorio =
                    dirname(dirname(__DIR__)) .
                    '/public/assets/img/productos/';

                if(!file_exists($directorio)){

                    mkdir($directorio, 0777, true);
                }

                $nombreImagen =
                    time() . '_' .
                    $_FILES['imagen']['name'];

                $ruta =
                    $directorio .
                    $nombreImagen;

                move_uploaded_file(
                    $_FILES['imagen']['tmp_name'],
                    $ruta
                );

                $data['imagen'] = $nombreImagen;
            }

            if(
                $this->productoModel->actualizar($data)
            ){

                $_SESSION['success'] =
                    'Producto actualizado correctamente';

                header('Location: ' . URL . '/productos');

                exit;
            }
        }

        $data = [

            'contenido' => 'productos/editar',

            'producto' => $producto

        ];

        $this->view('layouts/app', $data);
    }

    // ======================================
    // ELIMINAR
    // ======================================

    public function eliminar($id)
    {
        $this->productoModel->eliminar(
            $id,
            $_SESSION['empresa_id']
        );

        $_SESSION['success'] =
            'Producto eliminado correctamente';

        header('Location: ' . URL . '/productos');

        exit;
    }
}