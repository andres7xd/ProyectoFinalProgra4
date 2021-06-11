
<?php

class Buyer extends CI_Controller
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
        $this->load->model('Product_model');
        $this->load->model('Buyer_model');
        
    }

    function index($productos_data = array())
    {
        $id_producto = $this->input->post('id_h');
        $data['usuarios'] = $this->Buyer_model->get_usuario_tienda();
        $data['fotos_producto'] = $this->Buyer_model->get_fotos_producto();
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

    function add_carrito($id){
        $params = array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
            'cantidad_productos' =>  1,
        );

     
        $this->Product_model->add_carrito($params);
        $params = array();
        $this->index('');



    }


    function add_deseo($id){
        $params_deseos =array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
        );


        $this->Product_model->add_deseo($params_deseos);
        $params_deseos = array();
        $this->index('');

    }
}
