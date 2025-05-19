<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | About Us';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');
		$this->load->model('testimonial_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
		$data['testimonial'] = $this->testimonial_model->getAll();
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/about', $data);
        $this->load->view('layout/footer');
	}
}
