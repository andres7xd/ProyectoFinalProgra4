<?php

Class Auth extends CI_Controller {
	

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Auth_model');
	}

	//Muestra la vista del Login
	public function index() {
		$this->load->view('auth/login');
	}


	function load_data_view($view)
    {
    	//precarga todos los datos con los que la vista debe iniciar
    	// $this->load->model('Buyer_model');
       	// $data['usuarios_compradores'] = $this->Buyer_model->get_usuario_tienda();
        // $data['_view'] = $view;
		// $this->load->view('layouts/main',$data);
    }

	//Proceso de autenticación Login
	public function login() {

		$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) { //Si No se cumple la validación

			//Si autenticamos vamos a la vista principal
			//Sino nos devielve al login
			//Esto es para el caso de si la sesión aún está activa
			if(isset($this->session->userdata['logged_in'])){
				 //Función propia para cargar la vista indicada con datos precargados
				$this->load_data_view('buyer/index');
				$this->load_data_view('store/index');
			}else{
				$this->load->view('auth/login');
			}

		} else {

			//Si se cumple la validación procedemos a comprobar la autenticación
			$data = array(
				'nombre_usuario' => $this->input->post('txt_username'),
				'contrasena' => $this->input->post('txt_password')
			);

			$result = $this->Auth_model->login($data); //Función login del Modelo Auth

			if ($result == TRUE) { //Si autenticamos

				$nombre_usuario = $this->input->post('txt_username');
				$result = $this->Auth_model->get_user_information($nombre_usuario); //Función read_user_information del Modelo Auth

				//leemos los datos del usuario auntenticado y los ingresamos en las Variables de Sesion
				if ($result != false) {
					$session_data = array(
						'logged_in' => TRUE,
						'usuario_id' => $result[0]->usuario_id,
						'nombre_usuario' => $result[0]->nombre_usuario,
						'nombre_real' => $result[0]->nombre_real,
						'foto' => $result[0]->foto,
						'tipo_usuario'  => $result[0]->tipo_usuario,
						'cantidad_denuncias' =>  $result[0]->cantidad_denuncias,
						
					);

					// Agregamos la infomación del usuario en forma de arreglo a la Variable de Sesion con nombre logged_in
					$this->session->set_userdata('logged_in', $session_data);
					//Función propia para cargar la vista indicada con datos precargados
					
					if($session_data['cantidad_denuncias'] < 10){
						if($session_data['tipo_usuario']== 'Comprador'){
							redirect('buyer/index', 'refresh'); //redireccionamos a la URL raíz para evitar que nos quede auth/login/ en la URL
						}
	
						else{
							redirect('store/index', 'refresh');
						}
					}
					else{
						
						$data = array(
							'error_message' => 'Empresa Bloqueada'
						);
		
						$this->load->view('auth/login', $data);
						
					}
					$this->load_data_view('buyer/index'); //luego cargamos la vista
				}
			} else { //Si No autenticamos regreamos a la vista Login con un mensaje de error seteado
				$data = array(
					'error_message' => 'Usuario o Contraseña incorrectos'
				);

				$this->load->view('auth/login', $data);
			}
		}
	}

	//Proceso de Logout 
	public function logout() {

		// Removemos los datos de la sesion
		$sess_array = array(
			'logged_in' => FALSE,
			'nombre_usuario' => '',
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->sess_destroy();
		$data['message_display'] = 'Inicio de sesión.';
		$this->load->view('auth/login', $data);
	}

}

?>