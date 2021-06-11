<?php

class Deseos_tienda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_deseos_tienda($usuario_id)
    {
        return $this->db->query("SELECT productos.producto_id, productos.nombre, COUNT(productos.nombre)
                                 FROM deseos
                                 JOIN productos
                                 ON deseos.producto_id = productos.producto_id
                                 JOIN usuarios
                                 ON productos.usuario_id = usuarios.usuario_id
                                 WHERE usuarios.usuario_id = $usuario_id")->result_array();
    }

    function get_fotos_producto()
    {
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
    }

    public function delete_deseo($id)
    {
        $this->db->delete('deseos', array('deseo_id' => $id));
    }
}