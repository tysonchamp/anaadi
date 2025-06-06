<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Tours
 * Tours class to control to authenticate user credentials and starts user's session.
 */
class Tours extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tours_model');
        $this->load->model('category_model');
        $this->load->model('tourcategory_model');
        $this->load->model('tourtypes_model');
        $this->load->model('meals_model');
        $this->load->model('accomodation_model');
        $this->load->model('activities_model');
        $this->load->model('places_model');
        $this->load->model('gst_model');
        $this->load->model('tcs_model');
        $this->load->model('inclusion_model');
        $this->load->model('exclusion_model');
        $this->load->model('age_range_model');
        $this->load->model('airticket_model');
        $this->load->model('transfer_model');
        $this->load->model('insurance_model');
        $this->load->model('visa_model');
        $this->load->model('FixedDateTour_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Tours";
            $data['records'] = $this->tours_model->getWorld();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/tours', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getIndia()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Tours";
            $data['records'] = $this->tours_model->getIndia();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/toursindia', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    /**
     * Index Page for this controller.
     */
    public function addtour($id)
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Add Tour";
            
            // Handle string parameter for id
            if($id == "India") {
                $categoryId = 1;
            } else if($id == "World") {
                $categoryId = 2;
            } else {
                $categoryId = intval($id);
            }
            
            $data['categoryid'] = isset($categoryId) ? $categoryId : null;
            $data['category'] = $this->category_model->getAll();
            $data['tour_types'] = $this->tourtypes_model->getAll();
            $data['continents'] = $this->category_model->getAllcontinent();
            if(isset($categoryId) && $categoryId == 1) {
                $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($categoryId);
            } else if(isset($categoryId) && $categoryId == 2) {
                $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($categoryId);
            }
            // Add DB-driven select options
            $data['meals_list'] = $this->meals_model->getAll();
            $data['accomodation_list'] = $this->accomodation_model->getAll();
            $data['activities_list'] = $this->activities_model->getAll();
            $data['places_list'] = $this->places_model->getAll();
            $data['gst'] = $this->gst_model->getAll();
            $data['tcs'] = $this->tcs_model->getAll();
            $data['inclusion_list'] = $this->inclusion_model->getAll();
            $data['exclusion_list'] = $this->exclusion_model->getAll();
            $data['age_range_list'] = $this->age_range_model->getAll();
            $data['airticket_list'] = $this->airticket_model->getAll();
            $data['transfer_list'] = $this->transfer_model->getAll();
            $data['insurance_list'] = $this->insurance_model->getAll();
            $data['visa_list'] = $this->visa_model->getAll();
            $data['fixeddatetour_list'] = $this->FixedDateTour_model->getAll();
            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/addtour', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    /**
     * Index Page for this controller.
     */
    public function edittour()
    {
        $record_id = intval($this->uri->segment(4));
        if( $record_id == 0 )
        {   
            $this->session->set_flashdata("error", "Record not found.");
            redirect('admin/Tours');
        }

        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Add Tour";
            $data['category'] = $this->category_model->getAll();
            $data['record'] = $this->tours_model->getById($record_id);
            $data['tourcategory'] = $this->tourcategory_model->getByCategoryId($data['record']['category_id']);
            $data['tour_types'] = $this->tourtypes_model->getAll();
            $data['continents'] = $this->category_model->getAllcontinent();

            
            // Add DB-driven select options
            $data['meals_list'] = $this->meals_model->getAll();
            $data['accomodation_list'] = $this->accomodation_model->getAll();
            $data['activities_list'] = $this->activities_model->getAll();
            $data['places_list'] = $this->places_model->getAll();
            $data['gst'] = $this->gst_model->getAll();
            $data['tcs'] = $this->tcs_model->getAll();
            $data['inclusion_list'] = $this->inclusion_model->getAll();
            $data['exclusion_list'] = $this->exclusion_model->getAll();
            $data['age_range_list'] = $this->age_range_model->getAll();
            $data['airticket_list'] = $this->airticket_model->getAll();
            $data['transfer_list'] = $this->transfer_model->getAll();
            $data['insurance_list'] = $this->insurance_model->getAll();
            $data['visa_list'] = $this->visa_model->getAll();
            $data['fixeddatetour_list'] = $this->FixedDateTour_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/addtour', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getTourCategory()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
        if( $id )
        {
            $record = $this->tourcategory_model->getByCategoryId($id);
            $response['error'] = 0;
            $response['error_message'] = "";
            $response['success_message'] = "Success";
            $response['record'] = $record;
            die(json_encode($response));
        }
        else
        {
            $response['error'] = 1;
            $response['error_message'] = "Invalid Request";
            die(json_encode($response));
        }
    }

    public function getTourCategoryByContinent()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $continent_id = isset($_POST['continent_id']) ? intval($_POST['continent_id']) : 0;
        
        if($continent_id) {
            // Get tour categories based on continent ID
            $record = $this->tourcategory_model->getBySubCategory($continent_id);
            $response['error'] = 0;
            $response['error_message'] = "";
            $response['success_message'] = "Success";
            $response['record'] = $record;
        } else {
            $response['error'] = 1;
            $response['error_message'] = "Invalid Request";
        }
        
        die(json_encode($response));
    }

    public function getTourContinent()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_POST['category']) ? intval($_POST['category']) : 0;
        if( $id )
        {
            $record = $this->tourcategory_model->getByContinentId($id);
            $response['error'] = 0;
            $response['error_message'] = "";
            $response['success_message'] = "Success";
            $response['record'] = $record;
            die(json_encode($response));
        }
        else
        {
            $response['error'] = 1;
            $response['error_message'] = "Invalid Request";
            die(json_encode($response));
        }
    }

    public function getContinentFromTourCategory()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $tourcategory_id = isset($_POST['tourcategory_id']) ? intval($_POST['tourcategory_id']) : 0;
        
        if($tourcategory_id) {
            $tourCategory = $this->tourcategory_model->getById($tourcategory_id);
            if(!empty($tourCategory)) {
                $response['error'] = 0;
                $response['continent_id'] = $tourCategory['sub_category'];
                $response['success_message'] = "Success";
            } else {
                $response['error'] = 1;
                $response['error_message'] = "Tour category not found";
            }
        } else {
            $response['error'] = 1;
            $response['error_message'] = "Invalid Request";
        }
        
        die(json_encode($response));
    }

    public function validate_images($tour_images)
    {
        $error = "";
        $total = count($tour_images['name']);
        if( $total == 0 )
        {
            return "Please upload Tour images";
        }
        for( $i=0 ; $i < $total ; $i++ ) 
        {
            $image = $tour_images['name'][$i];
            $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
            {
                return "Image file type not supported. Upload jpg/jpeg/png.";
            }

            // Check file size
            if ( $tour_images["size"][$i] > 2000000 || $tour_images["error"][$i] == 1) 
            {
                return "Image size too large. Upload size less than 2MB.";
            }
        }
        return "valid";
    }

    public function save_record()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $this->load->library('form_validation');       
        $id = $this->security->xss_clean($this->input->post('record_id'));     

        // Form validation rules based on addtour.php fields
        $this->form_validation->set_rules('category_id','Category','trim|required|max_length[12]');
        $this->form_validation->set_rules('tourcategory_id','Tour Category','trim|required|max_length[12]');
        $this->form_validation->set_rules('type_id','Tour Type','trim|required|max_length[12]');
        $this->form_validation->set_rules('title','Title','trim|required|max_length[255]');
        $this->form_validation->set_rules('duration_days','Days','trim|required|integer');
        $this->form_validation->set_rules('duration_nights','Nights','trim|required|integer');
        $this->form_validation->set_rules('min_adults','Min. Adults','trim|required|integer');
        $this->form_validation->set_rules('price','Price Per Adult','trim|required|numeric');
        $this->form_validation->set_rules('price_child_with_bed','Child Price With Bed','trim|numeric');
        $this->form_validation->set_rules('price_child_without_bed','Child Price Without Bed','trim|numeric');
        $this->form_validation->set_rules('price_infant_without_bed','Infant Price Without Bed','trim|numeric');
        $this->form_validation->set_rules('start_location','Start Location','trim|required|max_length[250]');
        $this->form_validation->set_rules('arrival_location','Arrival Location','trim|max_length[250]');
        $this->form_validation->set_rules('destination_location','Destination Location','trim|max_length[255]');
        $this->form_validation->set_rules('tour_start_place','Tour Starts (Place)','trim|max_length[255]');
        $this->form_validation->set_rules('tour_end_place','Tour Ends (Place)','trim|max_length[255]');
        $this->form_validation->set_rules('covered_locations','Covered Locations','trim|max_length[500]');
        $this->form_validation->set_rules('accomodations[]','Accommodations','trim');
        $this->form_validation->set_rules('meals','Meals','trim');
        $this->form_validation->set_rules('transfers','Transfers','trim');
        $this->form_validation->set_rules('visa','VISA','trim');
        $this->form_validation->set_rules('air_ticket','Air Ticket','trim');
        $this->form_validation->set_rules('travel_insurance','Travel Insurance','trim');
        $this->form_validation->set_rules('gst_id','GST','trim');
        $this->form_validation->set_rules('tcs_id','TCS','trim');
        $this->form_validation->set_rules('inclusions[]','Inclusions','trim');
        $this->form_validation->set_rules('exclusions[]','Exclusions','trim');
        $this->form_validation->set_rules('booking_validity_from','Booking Validity From','trim');
        $this->form_validation->set_rules('booking_validity_to','Booking Validity To','trim');
        $this->form_validation->set_rules('package_validity_from','Package Validity From','trim');
        $this->form_validation->set_rules('package_validity_to','Package Validity To','trim');
        $this->form_validation->set_rules('fixed_date_tours[]','Fixed Date Tours','trim');
        $this->form_validation->set_rules('itinerary','Itinerary','trim');

        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $target_folder = IMAGE_UPLOAD_PATH."tours/";
        $result = $this->validate_images($_FILES['tour_images']);

        if( $id == "" && $result != "valid" )
        {
            $response["error"] = 1;
            $response["error_message"] = $result;
            die(json_encode($response));
        }
        
        if( $id == "" || $result == "valid" )
        {
            $tour_images_array = [];
            $tour_images = $_FILES['tour_images'];
            $total = count($tour_images['name']);
            for( $i=0 ; $i < $total ; $i++ ) 
            {
                $image = $tour_images['name'][$i];
                $tmp_name = $tour_images['tmp_name'][$i];
                $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                
                $result = getNewImage($target_folder, $this->security->xss_clean(trim($this->input->post('title'))), $imageFileType);
                $new_image_name = $result[0];
                $target_file = $result[1];

                // upload file
                if (move_uploaded_file($tmp_name, $target_file)) 
                {
                    // upload suuccess 
                    $tour_images_array[] = $new_image_name;
                } 
                else 
                {
                    $response["error"] = 1;
                    $response["error_message"] = "Image upload failed";
                    die(json_encode($response));
                }
            }
        }
        else
        {
            $data['record'] = $this->tours_model->getById($id);
            $tour_images_array = explode(",", $data['record']['images']);
        }

        $user = $this->session->userdata();

        // Get all fields from form
        $category_id = $this->security->xss_clean($this->input->post('category_id'));
        $tourcategory_id = $this->security->xss_clean($this->input->post('tourcategory_id'));
        $type_id = $this->security->xss_clean($this->input->post('type_id'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $duration_days = $this->security->xss_clean($this->input->post('duration_days'));
        $duration_nights = $this->security->xss_clean($this->input->post('duration_nights'));
        $min_adults = $this->security->xss_clean($this->input->post('min_adults'));
        $price = $this->security->xss_clean($this->input->post('price'));
        $price_child_with_bed = $this->security->xss_clean($this->input->post('price_child_with_bed'));
        $price_child_without_bed = $this->security->xss_clean($this->input->post('price_child_without_bed'));
        $price_infant_without_bed = $this->security->xss_clean($this->input->post('price_infant_without_bed'));
        $start_location = $this->security->xss_clean($this->input->post('start_location'));
        $arrival_location = $this->security->xss_clean($this->input->post('arrival_location'));
        $destination_location = $this->security->xss_clean($this->input->post('destination_location'));
        $tour_start_place = $this->security->xss_clean($this->input->post('tour_start_place'));
        $tour_end_place = $this->security->xss_clean($this->input->post('tour_end_place'));
        $covered_locations = $this->security->xss_clean($this->input->post('covered_locations'));
        $accomodations = $this->input->post('accomodations'); // array
        $meals = $this->security->xss_clean($this->input->post('meals'));
        $transfers = $this->security->xss_clean($this->input->post('transfers'));
        $visa = $this->security->xss_clean($this->input->post('visa'));
        $air_ticket = $this->security->xss_clean($this->input->post('air_ticket'));
        $travel_insurance = $this->security->xss_clean($this->input->post('travel_insurance'));
        $gst_id = $this->security->xss_clean($this->input->post('gst_id'));
        $tcs_id = $this->security->xss_clean($this->input->post('tcs_id'));
        $inclusions = $this->input->post('inclusions'); // array of names
        $exclusions = $this->input->post('exclusions'); // array of names
        $booking_validity_from = $this->security->xss_clean($this->input->post('booking_validity_from'));
        $booking_validity_to = $this->security->xss_clean($this->input->post('booking_validity_to'));
        $package_validity_from = $this->security->xss_clean($this->input->post('package_validity_from'));
        $package_validity_to = $this->security->xss_clean($this->input->post('package_validity_to'));
        $fixed_date_tours = $this->input->post('fixed_date_tours'); // array
        $itinerary = $this->security->xss_clean($this->input->post('itinerary'));

        // Prepare record info array
        $recordInfo = array(
            'category_id' => $category_id,
            'tourcategory_id' => $tourcategory_id,
            'type_id' => $type_id,
            'title' => $title,
            'url_title' => create_slug($title),
            'duration_days' => $duration_days,
            'duration_nights' => $duration_nights,
            'min_adults' => $min_adults,
            'price' => $price,
            'price_child_with_bed' => $price_child_with_bed,
            'price_child_without_bed' => $price_child_without_bed,
            'price_infant_without_bed' => $price_infant_without_bed,
            'start_location' => $start_location,
            'arrival_location' => $arrival_location,
            'destination_location' => $destination_location,
            'tour_start_place' => $tour_start_place,
            'tour_end_place' => $tour_end_place,
            'covered_locations' => $covered_locations,
            'accomodations' => is_array($accomodations) ? json_encode($accomodations) : '',
            'meals' => $meals,
            'transfers' => $transfers,
            'visa' => $visa,
            'air_ticket' => $air_ticket,
            'travel_insurance' => $travel_insurance,
            'gst_id' => $gst_id,
            'tcs_id' => $tcs_id,
            'inclusions' => is_array($inclusions) ? json_encode($inclusions) : '',
            'exclusions' => is_array($exclusions) ? json_encode($exclusions) : '',
            'booking_validity_from' => $booking_validity_from,
            'booking_validity_to' => $booking_validity_to,
            'package_validity_from' => $package_validity_from,
            'package_validity_to' => $package_validity_to,
            'fixed_dates' => is_array($fixed_date_tours) ? json_encode($fixed_date_tours) : '',
            'itinerary' => $itinerary,
            'images' => implode(",", $tour_images_array),
            'created_by' => $user['userId']
        );

        if( $id == "" )
        {
            if( $this->tours_model->checkRecordExists($title) )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists.";
            }
            else
            {
                $result = $this->tours_model->addNew($recordInfo);
                if($result > 0)
                {
                    $response["error"] = 0;
                    $response["error_message"] = "";
                    $response["success_message"] = "Record added successfully";
                } 
                else 
                {
                    $response["error"] = 1;
                    $response["error_message"] = "Record add failed.";
                }
            }    
        }
        else
        {
            $result = $this->tours_model->checkRecordExists1($title, $id);
            if( $result )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists";
                $response["success_message"] = "";
            }
            else
            {
                $result = $this->tours_model->updateRecord($recordInfo, $id);
                if($result > 0)
                {
                    $response["error"] = 0;
                    $response["error_message"] = "";
                    $response["success_message"] = "Record updated successfully";
                } 
                else 
                {
                    $response["error"] = 1;
                    $response["error_message"] = "Record update failed.";
                }
            }                
        }            
        die(json_encode($response));
    }

    public function deleteRecord()
    {
        $record_id = intval($this->uri->segment(4));
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $user = $this->session->userdata();

        if( $user['user_type'] !== "Admin" )
        {
            $response["error"] = 1;
            $response["error_message"] = "Your have no permission.";   
            die(json_encode($response));
        }
        if( $record_id == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Invalid Request";
            die(json_encode($response));
        }
        
        $data['record'] = $this->tours_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->tours_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>