<?php

class Twitter_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function add_tweet($params)
    {
        $this->db->insert('tweets',$params);
        return $this->db->insert_id();
    }

    public function add_reac($params)// agregar raccion
    {
        $this->db->insert('reacciones',$params);
        return $this->db->insert_id();
    }

    public function edit_tweet($params, $id)
    {   
      $this->db->where('tweets_id', $id);
        $this->db->update('tweets', $params);
      
    }

    public function delete_tweet($id)
    {
        $this->db->delete('tweets', array('tweets_id' => $id));
    }

    function get_all_tweets()
    {
        return $this->db->query("SELECT tweets.tweets_id, tweets.post, tweets.date, users.users_id, users.username, users.realname, users.photo,tweets.archivo
                                FROM tweets, users
                                WHERE tweets.users_id = users.users_id
                                ORDER BY tweets.tweets_id DESC")->result_array();

    }

    function search_tweets($data)
    {
        return $this->db->query("SELECT tweets.tweets_id, tweets.post, tweets.date, users.users_id, users.username, users.realname, users.photo,tweets.archivo
                                FROM tweets, users
                                WHERE tweets.users_id = users.users_id
                                AND tweets.post LIKE '%" . $data . "%'
                                ORDER BY tweets.tweets_id DESC")->result_array();

    }

    function get_data_tweet($id)
    {
        return $this->db->query("SELECT tweets.tweets_id, tweets.post, users.users_id
                                FROM tweets, users
                                WHERE tweets.users_id = users.users_id
                                AND tweets.tweets_id = " .$id)->row_array();

    }

    function reaccion_existe($post_id,$user_id){
        return $this->db->query("SELECT reacciones.estado_reaccion
                                 FROM reacciones
                                WHERE reacciones.tweets_id = $post_id
                                AND reacciones.users_id = " . $user_id)->row_array();
    }

    function update_reaccion($post_id, $params, $iduser){
        $this->db->where('tweets_id', $post_id);
        $this->db->where('users_id', $iduser);
        $this->db->update('reacciones', $params);
    }

    function get_nombres(){
        return $this->db->query("SELECT users.realname, reacciones.estado_reaccion, reacciones.tweets_id
                                 FROM reacciones join users on users.users_id = reacciones.users_id
                               ")->result_array();
    }

    function get_reacciones_usuario($id){
        return $this->db->query("SELECT reacciones.estado_reaccion, reacciones.tweets_id, reacciones.users_id
                                 FROM reacciones 
                                 WHERE reacciones.users_id = $id
                               ")->result_array();

    }
}
