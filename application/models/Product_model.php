<?php

class Product_model extends CI_Model
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

    function get_producto($id_producto)
    { // Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT productos.usuario_id, productos.producto_id, productos.nombre, productos.descripcion, productos.fecha_publicacion, productos.unidades, productos.ubicacion_actual, productos.precio, productos.tiempo_envio, productos.costo_envio, categorias.categoria, productos.unidades_vendidas, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        join categorias
        on categorias.categoria_id = productos.categoria_id
        WHERE productos.producto_id = $id_producto")->result_array();
    }

    function get_fotos_producto($id_producto)
    { // Obtiene la lista de fotos de los productos
        return $this->db->query("SELECT fotos.foto
        FROM fotos
        WHERE fotos.producto_id = $id_producto")->result_array();
    }

    function add_carrito($params)
    {
        $this->db->insert('carritos', $params);
        return $this->db->insert_id();
    }

    function add_deseo($params)
    {
        $this->db->insert('deseos', $params);
        return $this->db->insert_id();
    }

    function add_suscripcion($params)
    {
        $this->db->insert('suscripciones', $params);
        return $this->db->insert_id();
    }

    function add_calificacion_producto($params)
    {

        $this->db->insert('calificaciones_productos', $params);
        return $this->db->insert_id();
    }

    function existe_calificacion($id_producto, $id_usuario)
    {
        return $this->db->query("SELECT*
        FROM calificaciones_productos
        WHERE calificaciones_productos.usuario_id = $id_usuario AND calificaciones_productos.producto_id =$id_producto")->result_array();
    }

    function get_calificacion($usuario_id)
    {
        return $this->db->query("SELECT *
        FROM calificaciones_productos
        WHERE calificaciones_productos.usuario_id = $usuario_id")->result_array();
    }

    function no_existe_calificacion($id_usuario)
    {
        return $this->db->query("SELECT*
        FROM calificaciones_productos
        WHERE calificaciones_productos.usuario_id != $id_usuario")->result_array();
    }

    function update_user($id_calificacion, $params)
    {
        $this->db->where('calificacion_producto_id', $id_calificacion);
        return $this->db->update('calificaciones_productos', $params);
    }


    function get_id($usuario_id, $producto_id)
    {
        $this->db->query("SELECT calificaciones_productos.calificacion_producto_id
        FROM calificaciones_productos
        where calificaciones_productos.usuario_id = $usuario_id and calificaciones_productos.producto_id =$producto_id")->result_array();
    }

    function get_suscripciones($id_comprador, $id_tienda)
    {
        return $this->db->query("SELECT*
        FROM suscripciones
        WHERE suscripciones.tienda_id = $id_tienda and suscripciones.comprador_id =$id_comprador")->result_array();
    }

    function get_deseos($id_producto, $id_usuario)
    {
        return $this->db->query("SELECT *
        FROM deseos
        where deseos.producto_id = $id_producto and deseos.usuario_id = $id_usuario")->result_array();
    }

    function get_carritos($id_producto, $id_usuario)
    {
        return $this->db->query("SELECT *
        FROM carritos
        where carritos.producto_id = $id_producto and carritos.usuario_id = $id_usuario")->result_array();
    }

}
