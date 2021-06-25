<?php

class Ruleta_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }



    function get_tarjetas(){
        return $this->db->query("SELECT * FROM tarjetas WHERE tarjetas.usuario_id = 4")->result_array();
    }

}