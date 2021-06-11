<?php
class Pago_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_card()
    {
       
    }

    function add_card($params)
    {
        $this->db->insert('tarjetas', $params);
        return $this->db->insert_id();

    }

    function update_card()
    {

    }

    function delete_card()
    {
      
    }
}