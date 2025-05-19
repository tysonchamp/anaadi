<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Home';
		$data['user'] = $this->session->userdata("Auth");
		$this->load->model('tours_model');
		$this->load->model('homeslider_model');
		$this->load->model('testimonial_model');
		$this->load->model('gallery_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

		$data['domestic_tour_packages'] = $this->tours_model->getByCategoryId(1);
		$data['international_tour_packages'] = $this->tours_model->getByCategoryId(2);

		$data['destination_tours'] = $this->tours_model->getDestinationToursCount(10);
		$data['destination_package'] = $this->tours_model->getPopularToursCount(10);
				
		$data['homeslider'] = $this->homeslider_model->getAll();
		$data['testimonial'] = $this->testimonial_model->getAll();
		$data['gallery'] = $this->gallery_model->getAll();
			
        $this->load->view('layout/header', $data);
        $this->load->view('front/home', $data);
        $this->load->view('layout/footer');
	}
}
