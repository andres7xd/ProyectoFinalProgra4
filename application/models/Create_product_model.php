<?php

class Create_product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_product($params)
    {
        $this->db->insert('productos', $params);
        return $this->db->insert_id();
    }

    function get_categorias()
    {
        return $this->db->query("SELECT categorias.categoria_id, categorias.categoria
        FROM categorias")->result_array();
    }
}