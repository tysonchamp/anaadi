<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Destination Tours';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
		$data['recent_tours'] = $this->tours_model->getLatest(5);
		
		$data['destination'] = urldecode($this->uri->segment(2));

		if( $data['destination'] != "" )
		{
			$data['tours'] = $this->tours_model->getDestinationTours($data['destination']);
		}
		else{
			redirect('/');
		}		
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/destinationtours', $data);
        $this->load->view('layout/footer');
	}
}
