<?php
class Pago_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_card($users_id)
    {

      $this->db->query("SELECT  tarjetas.numero_tarjeta, tarjetas.fecha_vencimiento, tarjetas.saldo FROM tarjetas WHERE usuarios.usuario_id = " . $users_id)->row_array();
        
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