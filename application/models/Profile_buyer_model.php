<?php

class Profile_buyer_model extends CI_Model
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

    function get_info_usuario($id_usuario){// Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT*
        FROM usuarios
        WHERE usuarios.usuario_id = $id_usuario")->result_array();
    }

    function get_productos_vendidos()
    { 
        return $this->db->query("SELECT productos.usuario_id, productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
                                 FROM productos
                                 JOIN usuarios
                                 ON productos.usuario_id = usuarios.usuario_id
                                 WHERE productos.unidades != 0  
                                 ORDER BY productos.nombre ASC")->result_array();
    }


    function buscar_productos($data, $usuario_id)
    {
        return $this->db->query("SELECT productos.usuario_id, productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
                                 FROM productos
                                 JOIN usuarios
                                 ON productos.usuario_id = usuarios.usuario_id
                                 WHERE  productos.usuario_id = $usuario_id 
                                 AND productos.nombre LIKE '%" . $data . "%'
                                 ORDER BY productos.nombre DESC")->result_array();
    }

    function get_fotos_producto(){
        return $this->db->query("SELECT *
                                 FROM fotos
                                 JOIN productos
                                 ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function get_calificacion(){
        return $this->db->query("SELECT *
                                 FROM calificaciones_productos")->result_array();
    }

    function get_calificacion_tienda($comprador_id, $tienda_id)
    {
        return $this->db->query("SELECT * 
        FROM calificaciones_tiendas 
        WHERE calificaciones_tiendas.comprador_id = $comprador_id and calificaciones_tiendas.tienda_id = $tienda_id")->result_array();
    }

    function add_calificacion_tienda($params)
    {
        $this->db->insert('calificaciones_tiendas', $params);
        return $this->db->insert_id();
    }

    function existe_calificacion($id_comprador, $id_tienda)
    {
        return $this->db->query("SELECT*
        FROM calificaciones_tiendas
        WHERE calificaciones_tiendas.comprador_id = $id_comprador AND calificaciones_tiendas.tienda_id = $id_tienda")->result_array();
    }

    function update_calificacion($id_calificacion, $params)
    {
        $this->db->where('calificacion_tienda_id', $id_calificacion);
        return $this->db->update('calificaciones_tiendas', $params);
    }

}