<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * HOME Controller
	 */
	public function index()
	{
		// Loads
    $this->load->model('Home_model', 'home');

		//Get posts
		$posts = $this->home->getPosts();

		//Get tags
		foreach ($posts as $post) {
			$post->tags = $this->home->getTags($post->post_id);
		}

		//Datas
		$data['title'] = "Sonset - Partage, découvre et regroupe tes sons préférés !";
		$data['linkcss'] =	array( 'rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'assets/css/style.css' );
		$data['posts'] = $posts;
		$data['main_content'] = "home";

		$this->load->view('template', $data);
	}
}
