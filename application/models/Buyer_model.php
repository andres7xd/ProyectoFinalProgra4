<?php

class Buyer_model extends CI_Model
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

    function get_productos_vendidos()
    { // Obtiene la informacion de los productos mas vendidos
        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
                                 FROM productos
                                JOIN usuarios
                                ON productos.usuario_id = usuarios.usuario_id
                                WHERE productos.unidades != 0  
                                ORDER BY productos.unidades_vendidas DESC")->result_array();
    }


    function buscar_productos($data)
    {
        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
                                 FROM productos
                                 JOIN usuarios
                                 ON productos.usuario_id = usuarios.usuario_id
                                 WHERE  productos.nombre LIKE '%" . $data . "%'
                                 ORDER BY productos.nombre DESC")->result_array();
    }

    function get_fotos_producto()
    { // Obtiene la lista de fotos de los productos
        return $this->db->query("SELECT *
                                 FROM fotos
                                 JOIN productos
                                 ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function get_deseos($id_producto, $id_usuario)
    {
        return $this->db->query("SELECT *
                                 FROM deseos
                                 WHERE deseos.producto_id = $id_producto and deseos.usuario_id = $id_usuario")->result_array();
    }

    function get_carritos($id_producto, $id_usuario)
    {
        return $this->db->query("SELECT *
                                 FROM carritos
                                 where carritos.producto_id = $id_producto and carritos.usuario_id = $id_usuario")->result_array();
    }

    function get_calificacion()
    {
        return $this->db->query("SELECT *
                                 FROM calificaciones_productos")->result_array();
    }

    function get_calificacion_tienda()
    {
        return $this->db->query("SELECT *
                                 FROM calificaciones_tiendas")->result_array();
    }

    function get_notificaciones($id_usuario, $nombre_usuario)
    {
        return $this->db->query("SELECT  productos.nombre, notificaciones.descripcion, notificaciones.notificacion_id
        FROM notificaciones
        JOIN deseos
        ON deseos.producto_id = notificaciones.producto_id
        JOIN usuarios
        ON usuarios.usuario_id = deseos.usuario_id
        JOIN productos
        ON productos.producto_id = notificaciones.producto_id
        WHERE usuarios.usuario_id = $id_usuario and notificaciones.nombre_usuario = '$nombre_usuario'")->result_array();
    }


    function get_notificaciones_activas($id_usuario)
    {
        return $this->db->query("SELECT  productos.nombre, notificaciones.descripcion, notificaciones.notificacion_id
        FROM notificaciones
        JOIN deseos
        ON deseos.producto_id = notificaciones.producto_id
        JOIN usuarios
        ON usuarios.usuario_id = deseos.usuario_id
        JOIN productos
        ON productos.producto_id = notificaciones.producto_id
        WHERE usuarios.usuario_id = $id_usuario AND notificaciones.Estado = true")->result_array();
    }

    function delete_notificaion($id_notificacion)
    {
        $this->db->delete('notificaciones', array('notificacion_id' => $id_notificacion));
    }

    function get_categorias()
    {
        return $this->db->query("SELECT *
        FROM categorias")->result_array();
    }

    function buscar_tiendas($data)
    {
        return $this->db->query("SELECT usuarios.usuario_id, usuarios.cedula, usuarios.nombre_usuario, usuarios.nombre_real, usuarios.direccion, usuarios.telefono, usuarios.email, usuarios.foto
                                 FROM usuarios
                                 WHERE usuarios.tipo_usuario = 'Empresa'
                                 AND usuarios.nombre_real LIKE '%" . $data . "%'
                                 ORDER BY usuarios.nombre_real ASC")->result_array();
    }


    function get_denuncias($id_usuario)
    {
        return $this->db->query("SELECT  usuarios.cantidad_denuncias
        FROM usuarios
        WHERE usuarios.usuario_id =$id_usuario")->result_array();
    }


    function get_all_productos($id_producto)
    {
       return $this->db->query("SELECT *
       FROM productos
       WHERE productos.producto_id =$id_producto")->result_array();
    }

    function delete_notificaciones($nombre_usuario)
    {
        $this->db->query("DELETE notificaciones 
        FROM notificaciones
        WHERE notificaciones.nombre_usuario = '$nombre_usuario'");
    }
}
