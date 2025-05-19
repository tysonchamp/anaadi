<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Gallery';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');
		$this->load->model('gallery_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

		$data['gallery'] = $this->gallery_model->getAll();
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/gallery', $data);
        $this->load->view('layout/footer');
	}

	public function album()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Gallery';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');
		$this->load->model('gallery_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

		$data['album'] = urldecode($this->uri->segment(3));
		$gallery = $this->gallery_model->getAlbum($data['album']);
		if( count($gallery) == 0 )
		{
			redirect('Gallery');
		}

		$data['gallery'] = explode(",", $gallery[0]['images']);
		
        $this->load->view('layout/header', $data);
        $this->load->view('front/gallery_detail', $data);
        $this->load->view('layout/footer');
	}
}
