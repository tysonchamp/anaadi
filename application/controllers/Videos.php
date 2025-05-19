<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Videos';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');
		$this->load->model('videos_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

		$data['videos'] = $this->videos_model->getAll();
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/videos', $data);
        $this->load->view('layout/footer');
	}
}
