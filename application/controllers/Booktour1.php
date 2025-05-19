<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booktour extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Book Tour';
		$data['user'] = $this->session->userdata("Auth");
		$this->load->model('tours_model');
		$this->load->model('tourcategory_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

		$uri = $this->uri->segment(2);
		$data['tour'] = $this->tours_model->getTour($uri);
		if( count($data['tour']) > 0 )
		{
			$data['tourcategory'] = $this->tourcategory_model->getByCategoryId($data['tour']['category_id']);
		}
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/booktour', $data);
        $this->load->view('layout/footer');
	}
}
