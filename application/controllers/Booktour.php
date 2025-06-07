<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booktour extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model : tours_model
        $this->load->model('tours_model');
    }

    public function index()
    {
        $data['page_title'] = 'Anaadi Tours and Travels | Book Tour';
        $data['user'] = $this->session->userdata("Auth");
        $this->load->model('tours_model');
        $this->load->model('tourcategory_model');
        $this->load->model('Booknow_model');
        $this->load->model('Tourtypes_model');
        $this->load->model('meals_model');
        $this->load->library('form_validation');
        $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
        $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);

        $uri = $this->uri->segment(2);
        $data['tour'] = $this->tours_model->getTour($uri);
        if (count($data['tour']) > 0) {
            $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($data['tour']['category_id']);
        }
        $data['india_states'] = $this->tourcategory_model->getByCategoryId(1);
        $data['tour_types'] = $this->Tourtypes_model->getAll(); // Get all tour types
        $data['meals'] = $this->meals_model->getAll(); // Get all meal options

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
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[200]');
        // $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
        // $this->form_validation->set_rules('typeof_tour', 'Typeof_tour', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[250]');
        
        $category = $this->input->post('category', true);
        if ($category == 2) { // If World is selected
            $this->form_validation->set_rules('continent', 'Continent', 'trim|required|max_length[250]');
        }
        
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|max_length[250]');
        // $this->form_validation->set_rules('howmany_days', 'How many Days', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('howmany_night', 'How many Night', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('passengers', 'No Passenger', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tourcategory', 'Tour Category', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('tour', 'Tour Package', 'trim|required|max_length[250]');
 
        // $this->form_validation->set_rules('hotel', 'Hotel', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('meals', 'Meals', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('typeof_transfers', 'Type Of Transfers', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('adults', 'Adults', 'trim|required|max_length[250]');
        // $this->form_validation->set_rules('children', 'Children', 'trim|max_length[250]');
        
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("error", $this->form_validation->error_string());
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
            $continent = $this->input->post('continent', true);
            $children_withbed = $this->input->post('children_withbed', true);

            $recordInfo = array(
                'departure_city' => $departure_city,
                'arrival_city' => $return_date,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'departure_date' => $departure_date,
                'return_date' => $return_date,
                'no_passenger' => $no_passenger,
                'category' => $category,
                'continent' => $continent,
                'tour_category' => $tourcategory,
                'tour_package' => $tour_package,
                'adults' => $adults,
                'children_withbed' => $children_withbed,
                
                'children' => $children,
                'hotel' => $hotel,
                'meals' => $meals,
                'typeof_tranfers' => $typeof_tranfers,
                'price' => $price,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'typeof_tour' => $typeof_tour,
                'country' => $country,
                'city' => $city,

            );
            // echo "<pre>";
            // print_r($recordInfo);
            // echo "</pre>";
            $result = $this->Booknow_model->addNew($recordInfo);
            if ($result > 0) {
                $this->session->set_flashdata("success", "Thank you for Booking. Our team will get in touch with you soon.");
                // redirect to gateway page
                redirect("Booktour/paymentgateway/".$result);

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
        
        $category = $this->input->post('category', true);
        if ($category == 2) { // If World is selected
            $this->form_validation->set_rules('continent', 'Continent', 'trim|required|max_length[250]');
        }
        
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
            $continent = $this->input->post('continent', true);

            $recordInfo = array(
                
                'departure_city' => $departure_city,
                'arrival_city' => $return_date,
                'howmany_days' => $howmany_days,
                'howmany_night' => $howmany_night,
                'departure_date' => $departure_date,
                'return_date' => $return_date,
                'no_passenger' => $no_passenger,
                'category' => $category,
                'continent' => $continent,
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

    public function paymentgateway($id){
        $this->load->model('Booknow_model');
        $this->load->model('Tours_model');
        $this->load->model('Payment_model');
        
        $data['page_title'] = 'Anaadi Tours and Travels | Payment';
        $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
        $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
        $record = $this->Booknow_model->getById($id);
        $tour_package = $record['tour_package'];
        $data['bookingData'] = $record;
        $data['tour'] = $this->Tours_model->getById($tour_package);
        
        // Set up Razorpay
        $razorpay_key_id = $this->config->item('razorpay_key_id');
        $razorpay_key_secret = $this->config->item('razorpay_key_secret');
        $data['razorpay_key'] = $razorpay_key_id;
        
        // Calculate amount in paise (Razorpay uses smallest currency unit)
        $price = $record['price'];
        $amount = $price * 100; // Converting to paise
        $data['amount'] = $amount;
        
        // Create order in Razorpay
        require_once APPPATH . 'third_party/razorpay/Razorpay.php';
        
        $api = new Razorpay\Api\Api($razorpay_key_id, $razorpay_key_secret);
        $receipt_id = 'rcpt_' . $id . '_' . time();
        
        try {
            $order = $api->order->create([
                'receipt' => $receipt_id,
                'amount' => $amount,
                'currency' => 'INR',
                'notes' => [
                    'booking_id' => $id
                ]
            ]);
            
            // Save order details in database
            $this->Payment_model->createOrder($amount/100, $id, $receipt_id);
            
            // Pass order ID to view
            $data['order_id'] = $order->id;
            
            $this->load->view('layout/header', $data);
            $this->load->view('front/gateway', $data);
            $this->load->view('layout/footer');
        } catch (Exception $e) {
            // Log the error and show error page
            log_message('error', 'Razorpay Error: ' . $e->getMessage());
            $this->session->set_flashdata("error", "Unable to create payment order. Please try again later.");
            redirect('Booktour');
        }
    }
    
    public function payment_callback()
    {
        $this->load->model('Payment_model');
        $this->load->model('Booknow_model');
        
        $razorpay_key_id = $this->config->item('razorpay_key_id');
        $razorpay_key_secret = $this->config->item('razorpay_key_secret');
        
        // Get payment details from POST
        $razorpay_payment_id = $this->input->post('razorpay_payment_id');
        $razorpay_order_id = $this->input->post('razorpay_order_id');
        $razorpay_signature = $this->input->post('razorpay_signature');
        $booking_id = $this->input->post('booking_id');
        
        // Verify signature
        require_once APPPATH . 'third_party/razorpay/Razorpay.php';
        $api = new Razorpay\Api\Api($razorpay_key_id, $razorpay_key_secret);
        
        try {
            $attributes = array(
                'razorpay_payment_id' => $razorpay_payment_id,
                'razorpay_order_id' => $razorpay_order_id,
                'razorpay_signature' => $razorpay_signature
            );
            
            $api->utility->verifyPaymentSignature($attributes);
            
            // Payment successful, update database
            $this->Payment_model->updatePayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature, 'paid', $booking_id);
            $this->Payment_model->updateBookingPaymentStatus($booking_id, 'paid');
            
            // Redirect to success page
            redirect('Booktour/payment_success/' . $booking_id);
        } catch (Exception $e) {
            // Log the error
            log_message('error', 'Razorpay Error: ' . $e->getMessage());
            
            // Update payment status
            $this->Payment_model->updatePayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature, 'failed', $booking_id);
            $this->Payment_model->updateBookingPaymentStatus($booking_id, 'failed');
            
            // Redirect to failure page
            redirect('Booktour/payment_failed/' . $booking_id);
        }
    }
    
    public function payment_success($booking_id)
    {
        $this->load->model('Booknow_model');
        $this->load->model('Tours_model');
        
        $data['page_title'] = 'Payment Success';
        $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
        $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
        $record = $this->Booknow_model->getById($booking_id);
        $tour_package = $record['tour_package'];
        $data['bookingData'] = $record;
        $data['tour'] = $this->Tours_model->getById($tour_package);
        
        $this->load->view('layout/header', $data);
        $this->load->view('front/payment_success', $data);
        $this->load->view('layout/footer');
    }
    
    public function payment_failed($booking_id)
    {
        $this->load->model('Booknow_model');
        $this->load->model('Tours_model');
        
        $data['page_title'] = 'Payment Failed';
        $data['domestic_tours'] = $this->tours_model->getMenuByCategoryId(1);
        $data['international_tours'] = $this->tours_model->getMenuByCategoryId(2);
        $record = $this->Booknow_model->getById($booking_id);
        $tour_package = $record['tour_package'];
        $data['bookingData'] = $record;
        $data['tour'] = $this->Tours_model->getById($tour_package);
        
        $this->load->view('layout/header', $data);
        $this->load->view('front/payment_failed', $data);
        $this->load->view('layout/footer');
    }
}
