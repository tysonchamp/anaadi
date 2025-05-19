<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function index()
	{
		$this->load->model('subscribers_model');
        $this->load->library('form_validation');       
        $name = $this->security->xss_clean($this->input->post('name'));     
        $this->form_validation->set_rules('subscribe_email','Email','trim|required|valid_email|max_length[200]');
        
        if($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata("error", $this->form_validation->error_string());
            redirect('/');
        }

        $email = $this->security->xss_clean($this->input->post('subscribe_email'));
                
        $recordInfo = array(
                'email' => $email,
            );

        $result = $this->subscribers_model->addNew($recordInfo);
        if($result > 0)
        {
            $this->session->set_flashdata("success", "Thank you for Subscribering to us.");
        } 
        else 
        {
            $this->session->set_flashdata("error", "OOps!! Something gone wrong.");
        }
        redirect('/');
	}
}
