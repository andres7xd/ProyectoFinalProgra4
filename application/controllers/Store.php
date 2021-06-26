
<?php

class Store extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;

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
        $data['notificaciones'] = $this->Store_model->get_notificaciones($this->session->userdata['logged_in']['nombre_real']);
        $data['notificaciones_disponibles'] =$this->Store_model->get_notificaciones_activas($this->session->userdata['logged_in']['usuario_id']);
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
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
        $existe =  $this->Store_model->get_categoria($this->input->post('txt_create_categoria'));

        if(empty($existe)){
            $params = array(
                'categoria' => $this->input->post('txt_create_categoria'),
            );
            $this->Store_model->create_categoria($params);
            $this->mensaje = "Categoría creada con éxito";
        }
        else{
            $this->mensaje_error = "Ya existe una categoría con ese mismo nombre";
        }
        
        $this->index('');
    }

    function delete_notificacion($id_notificacion)
    {
        $this->Store_model->delete_notificaion($id_notificacion);
        $this->mensaje = "La notificacion se eliminó correctamente";
        $this->index('');
    }

    function delete_notificaciones()
    {
        $this->Store_model->delete_notificaciones($this->session->userdata['logged_in']['nombre_usuario']);
        $this->mensaje = "Notificaciones eliminadas";
        $this->index('', '');
    }
}
