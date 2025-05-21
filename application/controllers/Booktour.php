<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booktour extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Anaadi Tours and Travels | Book Tour';
        $data['user'] = $this->session->userdata("Auth");
        $this->load->model('tours_model');
        $this->load->model('tourcategory_model');
        $this->load->model('Booknow_model');
        $this->load->library('form_validation');
        $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
        $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

        $uri = $this->uri->segment(2);
        $data['tour'] = $this->tours_model->getTour($uri);
        if (count($data['tour']) > 0) {
            $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($data['tour']['category_id']);
        }
       /* if (count($data['tour']) > 0) {
            $data['continent'] = $this->tourcategory_model->getByContinentId($data['tour']['category_id']);
        }*/

        $this->load->view('layout/header', $data);
        $this->load->view('front/booktour', $data);
        $this->load->view('layout/footer');
    }

    public function booknow()
	{
		$response = array("error" => 0, "error_message" => "", "success_message" => "");
        $this->load->model('Booknow_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[200]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('typeof_tour', 'Typeof_tour', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[250]');
        
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_days', 'How many Days', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_night', 'How many Night', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('passengers', 'No Passenger', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tourcategory', 'Tour Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tour', 'Tour Package', 'trim|required|max_length[250]');
 
        $this->form_validation->set_rules('hotel', 'Hotel', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('meals', 'Meals', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('typeof_transfers', 'Type Of Transfers', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('adults', 'Adults', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('children', 'Children', 'trim|required|max_length[250]');
        
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("error", $this->form_validation->error_string());
          //  echo $error;
           redirect('Booktour');
        } else {

            $this->load->model('tours_model');
            $this->load->model('tourcategory_model');
            $this->load->model('Booknow_model');
            $this->load->library('form_validation');
            $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
            $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
    
            $uri = $this->uri->segment(2);
            $data['tour'] = $this->tours_model->getTour($uri);
            if (count($data['tour']) > 0) {
                $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($data['tour']['category_id']);
            }
          
            $departure_city = $this->input->post('departure_city', true);
            $return_date = $this->input->post('return_date', true);
            $howmany_days = $this->input->post('howmany_days', true);
            $howmany_night = $this->input->post('howmany_night', true);
            $departure_date = $this->input->post('departure_date', true);
            $return_date = $this->input->post('return_date', true);
            $no_passenger = $this->input->post('passengers', true);
            $category = $this->input->post('category', true);
            $tourcategory = $this->input->post('tourcategory', true);
            $tour_package = $this->input->post('tour', true);
            $adults = $this->input->post('adults', true);
            $children = $this->input->post('children', true);
            $hotel = $this->input->post('hotel', true);
            $meals = $this->input->post('meals', true);
            $typeof_tranfers = $this->input->post('typeof_transfers', true);
            $price = $this->input->post('price', true);
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);
            $typeof_tour = $this->input->post('typeof_tour', true);
            $country = $this->input->post('country', true);
            $city = $this->input->post('city', true);

            $recordInfo = array(
                
                'departure_city' => $departure_city,
                'arrival_city' => $return_date,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'departure_date' => $departure_date,
                'return_date' => $return_date,
                'no_passenger' => $no_passenger,
                'category' => $category,
                
                'tour_category' => $tourcategory,
                'tour_package' => $tour_package,
                'adults' => $adults,
                
                'children' => $children,
                'hotel' => $hotel,
                'meals' => $meals,
                'typeof_tranfers' => $typeof_tranfers,
                'price' => '22344',
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'typeof_tour' => $typeof_tour,
                'country' => $country,
                'city' => $city,

            );
            $result = $this->Booknow_model->addNew($recordInfo);
            if ($result > 0) {
                $this->session->set_flashdata("success", "Thank you for Booking. Our team will get in touch with you soon.");
            } else {
                $this->session->set_flashdata("error", "OOps!! Message sending failed.");
            }
            redirect('Booktour');

        }
    
    }

    public function booknowall()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $this->load->model('Booknow_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[200]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('typeof_tour', 'Typeof_tour', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[250]');
        
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_days', 'How many Days', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('howmany_night', 'How many Night', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('passengers', 'No Passenger', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tourcategory', 'Tour Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tour', 'Tour Package', 'trim|required|max_length[250]');

        $this->form_validation->set_rules('hotel', 'Hotel', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('meals', 'Meals', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('typeof_transfers', 'Type Of Transfers', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('adults', 'Adults', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('children', 'Children', 'trim|required|max_length[250]');
        

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("error", $this->form_validation->error_string());
        //  echo $error;
        redirect('Booktour');
        } else {

        
            $departure_city = $this->input->post('departure_city', true);
            $return_date = $this->input->post('return_date', true);
            $howmany_days = $this->input->post('howmany_days', true);
            $howmany_night = $this->input->post('howmany_night', true);
            $departure_date = $this->input->post('departure_date', true);
            $return_date = $this->input->post('return_date', true);
            $no_passenger = $this->input->post('passengers', true);
            $category = $this->input->post('category', true);
            $tourcategory = $this->input->post('tourcategory', true);
            $tour_package = $this->input->post('tour', true);
            $adults = $this->input->post('adults', true);
            $children = $this->input->post('children', true);
            $hotel = $this->input->post('hotel', true);
            $meals = $this->input->post('meals', true);
            $typeof_tranfers = $this->input->post('typeof_transfers', true);
            $price = $this->input->post('price', true);
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);
            $typeof_tour = $this->input->post('typeof_tour', true);
            $country = $this->input->post('country', true);
            $city = $this->input->post('city', true);

            $recordInfo = array(
                
                'departure_city' => $departure_city,
                'arrival_city' => $return_date,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'departure_date' => $departure_date,
                'return_date' => $return_date,
                'no_passenger' => $no_passenger,
                'category' => $category,
                
                'tour_category' => $tourcategory,
                'tour_package' => $tour_package,
                'adults' => $adults,
                
                'children' => $children,
                'hotel' => $hotel,
                'meals' => $meals,
                'typeof_tranfers' => $typeof_tranfers,
                'price' => '22344',
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'typeof_tour' => $typeof_tour,
                'country' => $country,
                'city' => $city,

            );
            $result = $this->Booknow_model->addNew($recordInfo);
            if ($result > 0) {
                $this->session->set_flashdata("success", "Thank you for Booking. Our team will get in touch with you soon.");
            } else {
                $this->session->set_flashdata("error", "OOps!! Message sending failed.");
            }
            redirect('Booktour');

        }

    }
}
