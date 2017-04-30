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

    $get = $this->db->get();
    return $get->result();
  }
}
