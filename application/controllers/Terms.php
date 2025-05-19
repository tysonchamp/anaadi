<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Terms of Service';
		$data['user'] = $this->session->userdata("Auth");
		
		$this->load->model('tours_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/terms', $data);
        $this->load->view('layout/footer');
	}
}
