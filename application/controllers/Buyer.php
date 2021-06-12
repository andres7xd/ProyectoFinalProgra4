
<?php

class Buyer extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->load->model('Product_model');
        $this->load->model('Buyer_model');
    }

    function index($productos_data = array())
    {
        $data['usuarios'] = $this->Buyer_model->get_usuario_tienda();
        $data['fotos_producto'] = $this->Buyer_model->get_fotos_producto();
        $data['calificacion_producto'] = $this->Buyer_model->get_calificacion();
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
        if ($productos_data == null) {
            $data['productos'] = $this->Buyer_model->get_productos_vendidos();
        } else
            $data['productos'] = $productos_data;
        $data['_view'] = 'buyer/index';
        $this->load->view('layouts/main', $data);
    }

    function process()
    {
        if ($this->input->post('btn_search')) {
            $this->buscar();
        }
    }

    function buscar()
    {
        $result = $this->Buyer_model->buscar_productos($this->input->post('txt_nombre'));
        $this->index($result);
    }

    function add_carrito($id)
    {
        $existe = $this->Buyer_model->get_carritos($id, $this->session->userdata['logged_in']['usuario_id']);
        if (empty($existe)) {
            $params = array(
                'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
                'producto_id' =>  $id,
                'cantidad_productos' =>  1,
            );
            $this->Product_model->add_carrito($params);
            $params = array();
            $this->mensaje = "Se ha añadido el producto al carrito";
        }
        else{
            $this->mensaje_error = "El producto ya existe en carrito";
        }
        $this->index('');
    }


    function add_deseo($id)
    {
        $existe = $this->Buyer_model->get_deseos($id, $this->session->userdata['logged_in']['usuario_id']);
        if (empty($existe)) {
            $params_deseos = array(
                'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
                'producto_id' =>  $id,
            );
            $this->Product_model->add_deseo($params_deseos);
            $params_deseos = array();
            $this->mensaje = "Se ha añadido el producto a la lista de deseos";
        } else {
            $this->mensaje_error = "El producto ya existe en la lista de deseos";
        }
        $this->index('');
    }
}
