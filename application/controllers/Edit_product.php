<?php

class Edit_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Edit_product_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['producto'] = $this->Edit_product_model->get_producto($id);
        $data['fotos_productos'] = $this->Edit_product_model->get_fotos_producto($id);
        $data['categorias'] = $this->Edit_product_model->get_categorias();
        $data['_view'] = 'edit_product/index';
        $this->load->view('layouts/main', $data);
    }

    function upload_photo($producto_id)
    {
        $config['upload_path']          = './resources/img_productos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000; //2MB
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('txt_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $params = array(
                'foto' => $this->upload->data('file_name'),
                'producto_id' => $producto_id,
            );
            $this->Edit_product_model->add_photo($params);

            $this->session->set_flashdata('success', "Archivo cargado al sistema exitosamente.");
        }
        redirect('edit_product/index/' . $producto_id);
    }

    function edit_producto($id_producto)
    {
        $params = array(
            'nombre' => $this->input->post('txt_prod_nombre'),
            'descripcion' =>  $this->input->post('txt_prod_descripcion'),
            'unidades' =>  $this->input->post('txt_prod_unidades'),
            'ubicacion_actual' =>  $this->input->post('txt_prod_ubicacion'),
            'precio' =>  $this->input->post('txt_prod_precio'),
            'tiempo_envio' => $this->input->post('txt_prod_tenvio'),
            'costo_envio' =>  $this->input->post('txt_prod_cenvio'),
            'categoria_id' =>  $this->input->post("select_categoria"),
        );
        $this->Edit_product_model->update_producto($id_producto, $params);
        $this->index($id_producto);
    }
}
