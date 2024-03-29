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
        $data['comentarios'] = $this->Edit_product_model->get_lista_comentarios($id);
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
        $array_sc = $this->Edit_product_model->get_producto($id_producto);
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
        $array_cc = $this->Edit_product_model->get_producto($id_producto);
        $this->add_notificacion($array_sc, $array_cc, $id_producto);
        $this->index($id_producto);
    }

    function add_notificacion($array_sin_cambio, $array_con_cambio, $id_producto)
    {
        $deseadores = $this->Edit_product_model->get_lista_deseadores($id_producto);
        foreach ($deseadores as $de) {
            foreach ($array_sin_cambio as $sc) {
                foreach ($array_con_cambio as $cc) {
                    if ($sc['precio'] != $cc['precio']) {
                        $params = array(
                            'descripcion' => 'El precio del producto cambió',
                            'producto_id' => $id_producto,
                            'estado' => true,
                            'nombre_usuario' => $de['nombre_usuario'],
                        );
                        $this->Edit_product_model->add_notificacion($params);
                    }

                    if ($sc['costo_envio'] != $cc['costo_envio']) {
                        $params = array(
                            'descripcion' => 'El costo_envio del producto cambió',
                            'producto_id' => $id_producto,
                            'estado' => true,
                            'nombre_usuario' => $de['nombre_usuario'],
                        );
                        $this->Edit_product_model->add_notificacion($params);
                    }

                    if ($sc['descripcion'] != $cc['descripcion']) {
                        $params = array(
                            'descripcion' => 'La descripcion del producto cambió',
                            'producto_id' => $id_producto,
                            'estado' => true,
                            'nombre_usuario' => $de['nombre_usuario'],
                        );
                        $this->Edit_product_model->add_notificacion($params);
                    }
                }
            }
        }
    }


    function agregar_respuesta($id_calificacion,$id_producto){
      

        $params =array(
            'respuesta' =>  $this->input->post('txt_respuesta'),  
        );


        $this->Edit_product_model->update_calificacion($id_calificacion,$params);
        $this->index($id_producto);
    }
}
