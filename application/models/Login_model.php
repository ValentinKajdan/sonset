<?php

class Login_model extends CI_Model
{

  function __construct()
  {
    /* Loads */
    $this->load->helper ('text');

    $this->db = $this->load->database('sonset', true);
  }

  function login($mail, $password)
  {
    $this->db->select('id, username, password, mail');
    $this->db->from('users');
    $this->db->where('mail', $mail);
    // $this->db->where('password', MD5($password));
    $this->db->where('password', $password);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
}
