<?php

class Store_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_usuario_tienda()
    {
        return $this->db->query("SELECT usuarios.usuario_id, usuarios.cedula, usuarios.nombre_usuario, usuarios.nombre_real, usuarios.direccion, usuarios.telefono, usuarios.email,usuarios.foto
        FROM usuarios
        WHERE usuarios.tipo_usuario = 'Empresa'
        ORDER BY usuarios.nombre_real ASC")->result_array();
    }

    function get_productos_vendidos($id_store)
    { // Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE productos.usuario_id = $id_store
        ORDER BY productos.nombre ASC")->result_array();
    }


    function buscar_productos($data, $usuario_id)
    {
        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE  productos.nombre LIKE '%" . $data . "%' AND productos.usuario_id = $usuario_id
        ORDER BY productos.nombre ASC")->result_array();
    }

    function get_fotos_producto()
    { // Obtiene la lista de fotos de los productos
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function delete($id_prodcuto)
    {
        $this->db->delete('productos', array('producto_id' => $id_prodcuto));
    }

    function create_categoria($params)
    {
        $this->db->insert('categorias', $params);
        return $this->db->insert_id();
    }

    function get_categoria($nombre)
    {
        return $this->db->query("SELECT * 
        FROM categorias 
        where categorias.categoria = '$nombre'")->result_array();
    }
}
