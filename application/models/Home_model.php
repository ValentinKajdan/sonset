<?php

class Home_model extends CI_Model
{

  function __construct()
  {
    /* Loads */
    $this->load->helper ('text');
    $this->load->helper('url');

    $this->db = $this->load->database('sonset', true);
  }

  function getPosts() {
    $this->db->select( '*' );
    $this->db->from('post');
    $this->db->join('user', 'author = user.id' ,'inner');
    $this->db->order_by('date', 'DESC');

    $get = $this->db->get();
    return $get->result();
  }
}
