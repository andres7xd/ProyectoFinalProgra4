<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user($users_id)
    {
        return $this->db->query("SELECT usuarios.* FROM usuarios WHERE usuarios.usuario_id = " . $users_id)->row_array();
    }

    function add_user($params)
    {
        $this->db->insert('usuarios', $params);
        return $this->db->insert_id();
    }

    function update_user($users_id, $params)
    {
        $this->db->where('usuario_id', $users_id);
        return $this->db->update('usuarios', $params);
    }

    function delete_user($users_id)
    {
        return $this->db->delete('usuarios', array('usuario_id' => $users_id));
    }

    function get_redes($usuario_id)
    {
      return $this->db->query("SELECT * 
                               FROM redes_sociales
                               WHERE redes_sociales.usuario_id = $usuario_id")->result_array();
    }

    function add_red($params)
    {
        $this->db->insert('redes_sociales', $params);
        return $this->db->insert_id();
    }

    function delete_red($red_id)
    {
        return $this->db->delete('redes_sociales', array('red_social_id' => $red_id)); 
    }
}
