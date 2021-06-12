<?php
class Direccion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_address()
    {

      return $this->db->query("SELECT * FROM direcciones_envio ")->result_array();
        
    }

    function add_address($params)
    {
        $this->db->insert('direcciones_envio', $params);
        return $this->db->insert_id();

    }

   

    function delete_address($id_address)
    {
        return $this->db->delete('direcciones_envio', array('direccion_envio_id' => $id_address));
      
    }
}