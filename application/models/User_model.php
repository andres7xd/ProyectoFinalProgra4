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
}
