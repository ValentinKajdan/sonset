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
    $this->db->select( 'posts.id as post_id, title, linkVideo, desc, author, date, refVideo, users.name as username' );
    $this->db->from('posts');
    $this->db->join('users', 'author = users.id' ,'inner');
    $this->db->order_by('date', 'DESC');

    $get = $this->db->get();
    return $get->result();
  }

  function getTags($idPost) {
      $this->db->select( 'tags.label' );
      $this->db->from('post_tags');
      $this->db->where('post_id = '.$idPost);
      $this->db->join('tags', 'tags.id = post_tags.tag_id' ,'inner');


      $get = $this->db->get();
      return $get->result();
  }
}
