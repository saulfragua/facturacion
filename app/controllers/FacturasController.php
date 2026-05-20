<?php

class FacturasController extends Controller
{
    private $facturaModel;

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
        // MODELO
        // ======================================

        $this->facturaModel =
            $this->model('Factura');
    }

    // ======================================
    // INDEX
    // ======================================

    public function index()
    {
        $facturas =
            $this->facturaModel->listar(
                $_SESSION['empresa_id']
            );

        $data = [

            'contenido' =>
                'facturas/index',

            'facturas' =>
                $facturas

        ];

        $this->view(
            'layouts/app',
            $data
        );
    }

    // ======================================
    // CREAR FACTURA
    // ======================================

    public function crear()
    {
        // ======================================
        // MODELOS
        // ======================================

        $clienteModel =
            $this->model('Cliente');

        $productoModel =
            $this->model('Producto');

        // ======================================
        // CLIENTES
        // ======================================

        $clientes =
            $clienteModel->listar(
                $_SESSION['empresa_id']
            );

        // ======================================
        // PRODUCTOS
        // ======================================

        $productos =
            $productoModel->listar(
                $_SESSION['empresa_id']
            );

        // ======================================
        // GUARDAR
        // ======================================

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // ======================================
            // FACTURA
            // ======================================

            $factura = [

                'empresa_id' =>
                    $_SESSION['empresa_id'],

                'cliente_id' =>
                    trim($_POST['cliente_id']),

                'usuario_id' =>
                    $_SESSION['usuario_id'],

                'numero_factura' =>
                    time(),

                'prefijo' =>
                    'FV',

                'fecha' =>
                    trim($_POST['fecha']),

                'fecha_vencimiento' =>
                    !empty($_POST['fecha_vencimiento'])
                        ? $_POST['fecha_vencimiento']
                        : null,

                'subtotal' =>
                    trim($_POST['subtotal']),

                'iva' =>
                    trim($_POST['iva']),

                'descuento' =>
                    0,

                'total' =>
                    trim($_POST['total']),

                'metodo_pago' =>
                    trim($_POST['metodo_pago']),

                'estado' =>
                    'PENDIENTE',

                'observaciones' =>
                    trim($_POST['observaciones'])

            ];

            // ======================================
            // CREAR FACTURA
            // ======================================

            $factura_id =
                $this->facturaModel
                    ->crear($factura);

            // ======================================
            // DETALLES
            // ======================================

            if($factura_id){

                if(
                    isset($_POST['producto_id'])
                ){

                    foreach(
                        $_POST['producto_id']
                        as $index => $producto_id
                    ){

                        $detalle = [

                            'factura_id' =>
                                $factura_id,

                            'producto_id' =>
                                $producto_id,

                            'cantidad' =>
                                $_POST['cantidad'][$index],

                            'precio_unitario' =>
                                $_POST['precio'][$index],

                            'iva' =>
                                $_POST['iva'][$index],

                            'subtotal' =>
                                $_POST['subtotal_item'][$index],

                            'total' =>
                                $_POST['total_item'][$index]

                        ];

                        $this->facturaModel
                            ->guardarDetalle(
                                $detalle
                            );
                    }
                }

                $_SESSION['success'] =
                    'Factura creada correctamente';

                header(
                    'Location: ' .
                    URL .
                    '/facturas'
                );

                exit;
            }

            $_SESSION['error'] =
                'No fue posible crear la factura';
        }

        // ======================================
        // VIEW
        // ======================================

        $data = [

            'contenido' =>
                'facturas/crear',

            'clientes' =>
                $clientes,

            'productos' =>
                $productos

        ];

        $this->view(
            'layouts/app',
            $data
        );
    }

    // ======================================
    // VER FACTURA
    // ======================================

    public function ver($id = null)
    {
        if(!$id){

            header(
                'Location: ' .
                URL .
                '/facturas'
            );

            exit;
        }

        $factura =
            $this->facturaModel->obtener(
                $id,
                $_SESSION['empresa_id']
            );

        $detalle =
            $this->facturaModel->detalle(
                $id
            );

        $data = [

            'contenido' =>
                'facturas/ver',

            'factura' =>
                $factura,

            'detalle' =>
                $detalle

        ];

        $this->view(
            'layouts/app',
            $data
        );
    }

    // ======================================
    // ELIMINAR
    // ======================================

    public function eliminar($id)
    {
        $this->facturaModel->eliminar(
            $id,
            $_SESSION['empresa_id']
        );

        $_SESSION['success'] =
            'Factura eliminada correctamente';

        header(
            'Location: ' .
            URL .
            '/facturas'
        );

        exit;
    }
}