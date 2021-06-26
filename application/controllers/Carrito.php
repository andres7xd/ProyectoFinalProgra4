<?php

class Carrito extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Carrito_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['productos'] = $this->Carrito_model->get_producto($this->session->userdata['logged_in']['usuario_id']);
        $data['tarjetas'] = $this->Carrito_model->get_tarjetas($this->session->userdata['logged_in']['usuario_id']);
        $data['fotos_producto'] = $this->Carrito_model->get_fotos_producto();
        $data['premios'] = $this->Carrito_model->get_premio($this->session->userdata['logged_in']['usuario_id']);
        $data['direcciones_envio'] = $this->Carrito_model->get_direccion_envio($this->session->userdata['logged_in']['usuario_id']);
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
        $data['_view'] = 'carrito/index';
        $this->load->view('layouts/main', $data);
    }

    function eliminar_producto($id_carrito)
    {
        $this->Carrito_model->delete($id_carrito);
        $this->index();
    }

    function aumentar_producto($id_carrito, $cantidad, $cantidad_maxima)
    {
        $this->Carrito_model->aumentar_cantidad_producto($id_carrito, $cantidad, $cantidad_maxima);
        $this->index();
    }

    function disminuir_producto($id_carrito, $cantidad)
    {
        $this->Carrito_model->disminuir_cantidad_producto($id_carrito, $cantidad);
        $this->index();
    }

    function comprar()
    {
        $productos = $this->Carrito_model->get_producto($this->session->userdata['logged_in']['usuario_id']);
        $num_compra = $this->Carrito_model->ultimo_numero_compra();
        $ult_num_compra = 0;
        $premios =  $this->Carrito_model->get_premio($this->session->userdata['logged_in']['usuario_id']);
        $bandera=true;

        foreach ($num_compra as $n) {
            $ult_num_compra = $n["numero_compra"];
        }

        $cvv_encriptado = $this->input->post('txt_cvv');
        $exist = $this->Carrito_model->get_claves();
        $tarjetas = $this->Carrito_model->get_tarjetas($this->session->userdata['logged_in']['usuario_id']);
        foreach ($exist as $e) {

            if (password_verify($cvv_encriptado, $e['codigo_cvv']))  {
                $puede_comprar = true;
                foreach ($tarjetas as $t) {
                    if ($t['numero_tarjeta'] == $this->input->post('select_categoria') and $t['saldo'] < $this->input->post('id_precio_compra')) {
                        $puede_comprar = false;
                    }
                }

                if ($puede_comprar == true) {
                    foreach ($productos as $p) {

                        for ($i = 0; $i < $p['cantidad_productos']; $i++) {
                            $params = array(
                                'usuario_id' => $this->session->userdata['logged_in']['usuario_id'],
                                'precio_compra' => $this->input->post('id_precio_compra'),
                                'numero_tarjeta' => $this->input->post('select_categoria'),
                                'fecha' => date('Y-m-d'),
                                'producto_id' => $p['producto_id'],
                                'precio_producto' => $p['precio'],
                                'numero_compra' => $ult_num_compra + 1,
                                'direccion' => $this->input->post('select_direccion'),
                            );

                            $params2 = array(
                                'unidades' =>   $p['unidades'] - $p['cantidad_productos'],
                                'unidades_vendidas' => $p['unidades_vendidas'] + $p['cantidad_productos'],
                            );

                            $params_not = array(
                                'descripcion' => 'Producto vendido',
                                'producto_id' => $p['producto_id'],
                                'estado' => true,
                                'nombre_usuario' => $p['nombre_real'],
                            );

                            $this->Carrito_model->add_notificacion($params_not);
                            $this->Carrito_model->update_unidades_producto($p['producto_id'], $params2);
                            $this->Carrito_model->add_compra($params);
                            $this->Carrito_model->delete($p['carrito_id']);
                        }
                    }

                    foreach ($tarjetas as $t) {
                        if ($t['numero_tarjeta'] == $this->input->post('select_categoria')) {

                            $monto = $t['saldo'] - $this->input->post('id_precio_compra');
                            $params = array(
                                'saldo' => $monto,
                            );
                            $this->Carrito_model->update_saldo($t['tarjeta_id'], $params);
                        }
                    }

                    foreach ($premios as $prem) {
                        if ($prem['premio'] == 'Desc 10%' || $prem['premio'] == 'Envío gratis') {
                            $params_premio = array(
                                'estado' => 0,
                            );
                            $this->Carrito_model->update_premio($this->session->userdata['logged_in']['usuario_id'], $params_premio);
                        }
                    }

                    $this->mensaje = "Compra realizada con éxito!";
                    $bandera = false;
                } else {
                    $this->mensaje_error = "El comprador posee saldo insuficiente para realizar la compra";
                }
            }
        }

        if ($bandera == true)  {
            $this->mensaje_error = "CVV Invalido";
        }
        $this->index();
    }



    function actualizar_monto_tarjeta()
    {

        $tarjetas = $this->Carrito_model->get_tarjetas($this->session->userdata['logged_in']['usuario_id']);
        $saldo = 0;
        foreach ($tarjetas as $t) {
            if ($t['numero_tarjeta'] == $this->input->post('select_tarjeta')) {
                $saldo = $t['saldo'] + 50;
            }
        }

        $params = array(
            'saldo' => $saldo,
        );

        $params_premio = array(
            'estado' => 0,
        );


        $this->Carrito_model->update_tarjeta($this->input->post('select_tarjeta'), $params);
        $this->Carrito_model->update_premio($this->session->userdata['logged_in']['usuario_id'], $params_premio);
        $this->index();
    }
}
