<?php

class Product extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Buyer_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['producto'] = $this->Product_model->get_producto($id);
        $data['fotos_productos'] = $this->Product_model->get_fotos_producto($id);
        $data['calificacion'] = $this->Product_model->existe_calificacion($id, $this->session->userdata['logged_in']['usuario_id']);
        $data['no_calificacion'] = $this->Product_model->no_existe_calificacion($this->session->userdata['logged_in']['usuario_id']);
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main', $data);
        if (isset($_POST['prod_carrito']) == true) {
            $this->add_carrito($id);
        }
        if (isset($_POST['prod_deseos']) == true) {
            $this->add_deseo($id);
        }
    }

    function add_carrito($id)
    {
        $existe = $this->Buyer_model->get_carritos($id, $this->session->userdata['logged_in']['usuario_id']);
        $productos = $this->Buyer_model->get_all_productos($id);

        
        foreach($productos as $p){
            $cantidad_denuncias = $this->Buyer_model->get_denuncias($p['usuario_id']);

        }

        if (empty($existe)) {
            foreach($cantidad_denuncias as $cd){
                if($cd['cantidad_denuncias']< 10  and $this->input->post('txt_cantidad_prod') != null){
            $params = array(
                'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
                'producto_id' =>  $id,
                'cantidad_productos' =>  $this->input->post('txt_cantidad_prod'),
            );
            $this->Product_model->add_carrito($params);
            $this->mensaje = "Se ha añadido el producto al carrito";

        }
        else{
            $this->mensaje_error = "El producto no se puede añadir al carrito por que la empresa distribuidora esta bloqueada";
        }
    }

        }
        else{
            $this->mensaje_error = "El producto ya existe en carrito";
        }

        
    }

    function add_deseo($id)
    {
        $existe = $this->Product_model->get_deseos($id, $this->session->userdata['logged_in']['usuario_id']);
        if (empty($existe)) {
            $params_deseos = array(
                'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
                'producto_id' =>  $id,
            );
            $this->Product_model->add_deseo($params_deseos);
            $params_deseos = array();
        }
    }

    function add_suscripciones($id, $id_producto)
    {
        $existe =  $this->Product_model->get_suscripciones($this->session->userdata['logged_in']['usuario_id'], $id);
        if (empty($existe)) {
            $params_suscripciones = array(
                'comprador_id' => $this->session->userdata['logged_in']['usuario_id'],
                'tienda_id' =>  $id,
            );
            $this->Product_model->add_suscripcion($params_suscripciones);
            $params_suscripciones = array();
            $this->mensaje = "Se ha suscrito a la tienda con exito";
        } else {
            $this->mensaje_error = "La suscripcion ya existe";
        }
        $this->index($id_producto);
    }

    function add_calificacion($id_producto, $id_usuario)
    {
        $existe =  $this->Product_model->existe_calificacion($id_producto, $id_usuario);

        if (empty($existe)) {
            $calificaciones = array(
                'usuario_id' => $id_usuario,
                'producto_id' =>  $id_producto,
                'calificacion' => $this->input->post('select_calificacion'),
            );
            $this->Product_model->add_calificacion_producto($calificaciones);
            $calificaciones = array();
        } else {
            foreach ($existe as $e) {
                $calificaciones = array(

                    'calificacion' => $this->input->post('select_calificacion'),
                );
                $this->Product_model->update_user($e['calificacion_producto_id'], $calificaciones);
                $calificaciones = array();
            }
        }
        $this->index($id_producto);
    }

    function agregar_comentario($id_producto, $id_usuario){
        $existe_calificaion = $this->Product_model->existe_calificacion($id_producto, $id_usuario);


        if(empty($extiste_calificaion)){
            foreach ($existe_calificaion as $e) {
            $params =array(
                'comentario' => $this->input->post('txt_comentario'),
            );
        
        $this->Product_model->update_user($e['calificacion_producto_id'], $params);

    }
        $this->index($id_producto);
        
    }
    else{
        $this->mensaje_error = "Primero debe asignar una cantidad de estrellas al producto";
    }
    }
}
