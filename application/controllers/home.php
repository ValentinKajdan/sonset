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
		$data['posts'] = $this->home->getPosts();

		//Datas
		$data['title'] = "Sonset - Partage, découvre et regroupe tes sons préférés !";
		$data['linkcss'] =	array( 'rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'assets/css/style.css' );
		$data['main_content'] = "home";

		$this->load->view('template', $data);
	}
}
