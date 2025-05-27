<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Contact';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
        
        $this->load->view('layout/header', $data);
        $this->load->view('front/contact', $data);
        $this->load->view('layout/footer');
	}

	public function send_message()
	{
		$response = array("error" => 0, "error_message" => "", "success_message" => "");
		$this->load->model('contact_model');
        $this->load->library('form_validation');       
        $name = $this->security->xss_clean($this->input->post('name'));     
        $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('phone','Phone','trim|required|max_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[200]');
        $this->form_validation->set_rules('subject','Subject','trim|required|max_length[200]');
        $this->form_validation->set_rules('message','Message','trim|max_length[250]');

        if($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata("error", $this->form_validation->error_string());
            redirect('Contact');
        }

        $name = $this->security->xss_clean($this->input->post('name'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $subject = $this->security->xss_clean($this->input->post('subject'));
        $message = $this->security->xss_clean($this->input->post('message'));
                
        $recordInfo = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            );

        $result = $this->contact_model->addNew($recordInfo);
        if($result > 0)
        {
            $this->session->set_flashdata("success", "Thank you for Contacting us. Our team will get in touch with you soon.");
        } 
        else 
        {
            $this->session->set_flashdata("error", "OOps!! Message sending failed.");
        }
        redirect('Contact');
	}
}
