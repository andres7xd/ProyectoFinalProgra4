
<?php

class Store extends CI_Controller
{
    public $mensaje = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->load->model('Store_model');
    }

    function index($productos_data = array())
    {
        $data['usuarios'] = $this->Store_model->get_usuario_tienda();
        $data['fotos_producto'] = $this->Store_model->get_fotos_producto();
        $data['message_display'] = $this->mensaje;
        if ($productos_data == null) {
            $data['productos'] = $this->Store_model->get_productos_vendidos($this->session->userdata['logged_in']['usuario_id']);
        } else
            $data['productos'] = $productos_data;

        $data['_view'] = 'store/index';
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
        $result = $this->Store_model->buscar_productos($this->input->post('txt_nombre'), $this->session->userdata['logged_in']['usuario_id']);
        $this->index($result);
    }

    function delete($id_producto)
    {
        $this->Store_model->delete($id_producto);
        $result = $this->Store_model->buscar_productos($this->input->post('txt_nombre'), $this->session->userdata['logged_in']['usuario_id']);
        $this->index($result);
    }

    function add_categoria()
    {
        $params = array(
            'categoria' => $this->input->post('txt_create_categoria'),
        );
        $this->Store_model->create_categoria($params);
        $this->mensaje = "Categría creada con éxito";
        $this->index('');
    }
}
