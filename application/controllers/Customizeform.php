<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customizeform extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('tourcategory_model');
        // Add CSRF token name to header for AJAX requests
        header('X-CSRF-Token: ' . $this->security->get_csrf_hash());
    }

    public function index()
    {
        $data['page_title'] = 'Anaadi Tours and Travels | Customize Form';
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
        // $name = $this->input->post('name');
        $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[200]');
        $this->form_validation->set_rules('typeof_tour', 'Typeof_tour', 'trim|max_length[250]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('place', 'Place', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('adults', 'Adults', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('travel_date', 'Travel Date', 'trim|required');
        $this->form_validation->set_rules('howmany_days', 'How many Days', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_night', 'How many Night', 'trim|required|max_length[250]');

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("error", $this->form_validation->error_string());
            $messge['name'] = array('message' => 'Please Enter the name','class' => 'border border-danger','value' =>$this->input->post('name'));
            $messge['phone'] = array('message' => 'Please Enter the phone','class' => 'border border-danger','value' =>$this->input->post('phone'));
            $messge['email'] = array('message' => 'Please Enter the emailID','class' => 'border border-danger','value' =>$this->input->post('email'));
            $messge['typeof_tour'] = array('message' => 'Select the Type of Tour','class' => 'border border-danger','value' =>$this->input->post('typeof_tour'));
            $messge['category'] = array('message' => 'Please Select Category','class' => 'border border-danger','value' =>$this->input->post('category'));
            $messge['country'] = array('message' => 'Please Select Country','class' => 'border border-danger','value' =>$this->input->post('country'));
            $messge['place'] = array('message' => 'Please Select the place','class' => 'border border-danger','value' =>$this->input->post('place'));
            $messge['adults'] = array('message' => 'Please Enter how many adults','class' => 'border border-danger','value' =>$this->input->post('adults'));
            $messge['travel_date'] = array('message' => 'Please Select Travel Date','class' => 'border border-danger','value' =>$this->input->post('travel_date'));
            $messge['howmany_days'] = array('message' => 'Please Enter the Total days','class' => 'border border-danger','value' =>$this->input->post('howmany_days'));
            $messge['howmany_nights'] = array('message' => 'Please Enter the Total Nights','class' => 'border border-danger','value' =>$this->input->post('howmany_night'));
            $messge['visa'] = array('message' => 'Please Enter the Visa','class' => 'border border-danger','value' =>$this->input->post('visa'));
            $messge['Airfare'] = array('message' => 'Please Enter the Airfare','class' => 'border border-danger','value' =>$this->input->post('Airfare'));
            $messge['meals'] = array('message' => 'Please Enter the Meals','class' => 'border border-danger','value' =>$this->input->post('meals'));
            $messge['Transfers'] = array('message' => 'Please Select the Transfers','class' => 'border border-danger','value' =>$this->input->post('Transfers'));
            $messge['Hotels'] = array('message' => 'Please Select the Hotels','class' => 'border border-danger','value' =>$this->input->post('Hotels'));
            $messge['budget'] = array('message' => 'Please Enter Budget','class' => 'border border-danger','value' =>$this->input->post('budget'));
            
            // Add the new fields to the flash data
            $messge['children_with_bed'] = array('value' =>$this->input->post('children_with_bed'));
            $messge['children_without_bed'] = array('value' =>$this->input->post('children_without_bed'));
            $messge['infants'] = array('value' =>$this->input->post('infants'));
            $messge['continent'] = array('value' =>$this->input->post('continent'));
            $messge['any_other'] = array('value' =>$this->input->post('any_other'));
            
            $this->session->set_flashdata('item',$messge);
            redirect('Customizeform');
        } else {
            $name = $this->security->xss_clean($this->input->post('name'));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $travel_date = $this->security->xss_clean($this->input->post('travel_date'));
            $typeof_tour = $this->security->xss_clean($this->input->post('typeof_tour'));
            $category = $this->security->xss_clean($this->input->post('category'));
            $continent = $this->security->xss_clean($this->input->post('continent'));
            $country = $this->security->xss_clean($this->input->post('country'));
            $place = $this->security->xss_clean($this->input->post('place'));
            $adults = $this->security->xss_clean($this->input->post('adults'));
            $children_with_bed = $this->security->xss_clean($this->input->post('children_with_bed'));
            $children_without_bed = $this->security->xss_clean($this->input->post('children_without_bed'));
            $infants = $this->security->xss_clean($this->input->post('infants'));
            $howmany_days = $this->security->xss_clean($this->input->post('howmany_days'));
            $howmany_night = $this->security->xss_clean($this->input->post('howmany_night'));
            $visa = $this->security->xss_clean($this->input->post('visa'));
            $Airfare = $this->security->xss_clean($this->input->post('Airfare'));
            $meals = $this->security->xss_clean($this->input->post('meals'));
            $Transfers = $this->security->xss_clean($this->input->post('Transfers'));
            $Hotels = $this->security->xss_clean($this->input->post('Hotels'));
            $budget = $this->security->xss_clean($this->input->post('budget'));
            $any_other = $this->security->xss_clean($this->input->post('any_other'));
              
            $recordInfo = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'travel_date' => $travel_date,
                'typeof_tour' => $typeof_tour,
                'category' => $category,
                'continent' => $continent,
                'country' => $country,
                'place' => $place,
                'adults' => $adults,
                'children_with_bed' => $children_with_bed,
                'children_without_bed' => $children_without_bed,
                'infants' => $infants,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'visa' => $visa,
                'Airfare' => $Airfare,
                'meals' => $meals,
                'Transfers' => $Transfers,
                'Hotels' => $Hotels,
                'budget' => $budget,
                'any_other' => $any_other
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

    // AJAX endpoint to get continents based on category
    public function getContinents()
    {
        $response = array('success' => false, 'data' => array());
        
        $category_id = $this->input->post('category_id');
        
        if ($category_id == 2) { // International
            $continents = $this->category_model->getAllcontinent();
            $response['success'] = true;
            $response['data'] = $continents;
        }
        
        // Add CSRF hash to response
        $response['csrf_hash'] = $this->security->get_csrf_hash();
        
        echo json_encode($response);
    }
    
    // AJAX endpoint to get tour categories based on category/continent
    public function getTourCategories()
    {
        $response = array('success' => false, 'data' => array());
        
        $category_id = $this->input->post('category_id');
        
        if ($category_id == 1) { // India
            // Get all states/tour categories for India
            $tourCategories = $this->tourcategory_model->getByCategoryId($category_id);
            $response['success'] = true;
            $response['data'] = $tourCategories;
        }
        
        // Add CSRF hash to response
        $response['csrf_hash'] = $this->security->get_csrf_hash();
        
        echo json_encode($response);
    }
    
    // AJAX endpoint to get countries based on continent
    public function getCountriesByContinent()
    {
        $response = array('success' => false, 'data' => array());
        
        $continent_id = $this->input->post('continent_id');
        
        if ($continent_id > 0) {
            $countries = $this->tourcategory_model->getBySubCategory($continent_id);
            $response['success'] = true;
            $response['data'] = $countries;
        }
        
        // Add CSRF hash to response
        $response['csrf_hash'] = $this->security->get_csrf_hash();
        
        echo json_encode($response);
    }
}
