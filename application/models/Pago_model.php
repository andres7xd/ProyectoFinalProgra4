<?php
class Pago_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_card()
    {

      return $this->db->query("SELECT * FROM tarjetas")->result_array();
        
    }

    function add_card($params)
    {
        $this->db->insert('tarjetas', $params);
        return $this->db->insert_id();

    }

   

    function delete_card($id_card)
    {
        return $this->db->delete('tarjetas', array('tarjeta_id' => $id_card));
      
    }
}