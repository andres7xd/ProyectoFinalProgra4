
<?php

Class Buyer extends CI_Controller {

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
        $this->load->model('Buyer_model');
    }

    function index($productos_data = array())
    {   
        $data['usuarios'] = $this->Home_model->get_usuario_tienda();
        
        if ($productos_data == null){
            $data['productos'] = $this->Home_model->get_productos_vendidos();
                
                }
                   
        
                else
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

}
