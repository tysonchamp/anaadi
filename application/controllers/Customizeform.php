<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customizeform extends CI_Controller {

	public function index2()
	{
		$data['page_title'] = 'Anaadi Tours and Travels | Customizeform';
		$data['user'] = $this->session->userdata("Auth");

		$this->load->model('tours_model');

		$data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
		$data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
        
        $this->load->view('layout/header', $data);
        $this->load->view('front/cutomizeform', $data);
        $this->load->view('layout/footer');
	}

	public function enquiry()
	{
		$response = array("error" => 0, "error_message" => "", "success_message" => "");
		$this->load->model('Customizeform_model');
        $this->load->library('form_validation');       
        $name = $this->input->post('name');     
        $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('phone','Phone','trim|required|max_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[200]');
        $this->form_validation->set_rules('typeof_tour', 'Typeof_tour', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('place', 'Place', 'trim|required|max_length[250]');
         $this->form_validation->set_rules('adults', 'Adults', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('children', 'Children', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_days', 'How many Days', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_night', 'How many Night', 'trim|required|max_length[250]');


        // set session 
        
        

        if($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata("error", $this->form_validation->error_string());
            $messge['name'] = array('message' => 'Please Enter the name','class' => 'border border-danger','value' =>$this->input->post('name'));
            $messge['phone'] = array('message' => 'Please Enter the phone','class' => 'border border-danger','value' =>$this->input->post('phone'));
            $messge['email'] = array('message' => 'Please Enter the emailID','class' => 'border border-danger','value' =>$this->input->post('email'));
            $messge['typeof_tour'] = array('message' => 'Select the Type of Tour','class' => 'border border-danger','value' =>$this->input->post('typeof_tour'));
            $messge['country'] = array('message' => 'Please Select Country','class' => 'border border-danger','value' =>$this->input->post('country'));
            $messge['place'] = array('message' => 'Please Select the place','class' => 'border border-danger','value' =>$this->input->post('place'));
            $messge['adults'] = array('message' => 'Please Eneter how many adults','class' => 'border border-danger','value' =>$this->input->post('adults'));
            $messge['children'] = array('message' => 'Please Enter how many children','class' => 'border border-danger','value' =>$this->input->post('children'));
            $messge['howmany_days'] = array('message' => 'Please Enter the Total days','class' => 'border border-danger','value' =>$this->input->post('howmany_days'));
            $messge['howmany_nights'] = array('message' => 'Please Enter the Tottal Nights','class' => 'border border-danger','value' =>$this->input->post('howmany_night'));
            $messge['visa'] = array('message' => 'Please Enter the Visa','class' => 'border border-danger','value' =>$this->input->post('visa'));
            $messge['Airfare'] = array('message' => 'Please Enter the Airfare','class' => 'border border-danger','value' =>$this->input->post('Airfare'));
            $messge['meals'] = array('message' => 'Please Enter the Meals','class' => 'border border-danger','value' =>$this->input->post('meals'));
            $messge['Transfers'] = array('message' => 'Please Select the Transfers','class' => 'border border-danger','value' =>$this->input->post('Transfers'));
            $messge['Hotels'] = array('message' => 'Please Select the Hotels','class' => 'border border-danger','value' =>$this->input->post('Hotels'));
            $messge['budget'] = array('message' => 'Please Eneter Budget','class' => 'border border-danger','value' =>$this->input->post('budget'));
            $this->session->set_flashdata('item',$messge);
            redirect('Customizeform');
        }else{
        //$this->session->keep_flashdata('item',$messge);
        $name = $this->security->xss_clean($this->input->post('name'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $typeof_tour = $this->security->xss_clean($this->input->post('typeof_tour'));
        $country = $this->security->xss_clean($this->input->post('country'));
        $place = $this->security->xss_clean($this->input->post('place'));
        $adults = $this->security->xss_clean($this->input->post('adults'));
        $children = $this->security->xss_clean($this->input->post('children'));
        $howmany_days = $this->security->xss_clean($this->input->post('howmany_days'));
        $howmany_night = $this->security->xss_clean($this->input->post('howmany_night'));
        $visa = $this->security->xss_clean($this->input->post('visa'));
        $Airfare = $this->security->xss_clean($this->input->post('Airfare'));
        $meals = $this->security->xss_clean($this->input->post('meals'));
        $Transfers = $this->security->xss_clean($this->input->post('Transfers'));
        $Hotels = $this->security->xss_clean($this->input->post('Hotels'));
        $budget = $this->security->xss_clean($this->input->post('budget'));
          
        $recordInfo = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'typeof_tour' => $typeof_tour,
                'country' => $country,
                'place' => $place,
                'adults' => $adults,
                'children' => $children,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'visa' => $visa,
                'Airfare' => $Airfare,
                'meals' => $meals,
                'Transfers' => $Transfers,
                'Hotels' => $Hotels,
                'budget' => $budget,
                
            );

        $result = $this->Customizeform_model->addNew($recordInfo);
        if($result > 0)
        {
            $this->session->set_flashdata("success", "Thank you for Contacting us. Our team will get in touch with you soon.");
        } 
        else 
        {
            $this->session->set_flashdata("error", "OOps!! Message sending failed.");
        }
        redirect('Customizeform','refresh');
        }

       
	}
    
}
