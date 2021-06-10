
<?php

class Store extends CI_Controller
{

    // function load_data_view($view)
    //     {
    //     	//precarga todos los datos con los que la vista debe iniciar
    //     	$this->load->model('Home_model');
    //        	$data['nombre_usuario'] = $this->Home_model->get_usuario_tienda();
    //         $data['_view'] = $view;
    // 		$this->load->view('layouts/main',$data);
    //     }




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
        $result = $this->Store_model->buscar_productos($this->input->post('txt_nombre'),$this->session->userdata['logged_in']['usuario_id'] );
        $this->index($result);
    }

    function delete($id_producto)
    {
        $this->Store_model->delete($id_producto);
        $result = $this->Store_model->buscar_productos($this->input->post('txt_nombre'),$this->session->userdata['logged_in']['usuario_id']);
        $this->index($result);
    }
}
