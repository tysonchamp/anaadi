<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact
 * Contact class to manage contact messages
 */
class Booking extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
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
            $data['page_title'] = "Booknow";
            $data['records'] = $this->Booking_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/booking', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    /**
     * Display Customize Form Data
     */
    public function customize()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Customize Tour Requests";
            $this->load->model('Customizeform_model');
            $data['records'] = $this->Customizeform_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/customize', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    /**
     * Delete a customize form record
     */
    public function deleteCustomize()
    {
        $record_id = intval($this->uri->segment(4));
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $user = $this->session->userdata();

        if($user['user_type'] !== "Admin")
        {
            $response["error"] = 1;
            $response["error_message"] = "Your have no permission.";   
            die(json_encode($response));
        }
        if($record_id == 0)
        {   
            $response["error"] = 1;
            $response["error_message"] = "Invalid Request";
            die(json_encode($response));
        }
        
        $this->load->model('Customizeform_model');
        $data['record'] = $this->Customizeform_model->getById($record_id);
        if(empty($data['record']))
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->Customizeform_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }

    /**
     * View Customize form record details
     */
    public function viewCustomize()
    {
        $record_id = intval($this->uri->segment(4));
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            echo "Access Denied";
            return;
        }
        
        $user = $this->session->userdata();
        if($user['user_type'] !== "Admin")
        {
            echo "Permission Denied";
            return;
        }
        
        if($record_id == 0)
        {   
            echo "Invalid Record ID";
            return;
        }
        
        $this->load->model('Customizeform_model');
        $record = $this->Customizeform_model->getById($record_id);
        
        if(empty($record))
        {
            echo "Record not found";
            return;
        }
        
        // Format the data for display
        $output = '<div class="table-responsive">';
        $output .= '<table class="table table-bordered">';
        
        $output .= '<tr><th colspan="2" class="bg-light">Personal Information</th></tr>';
        $output .= '<tr><th width="30%">Name</th><td>'.$record['name'].'</td></tr>';
        $output .= '<tr><th>Email</th><td>'.$record['email'].'</td></tr>';
        $output .= '<tr><th>Phone</th><td>'.$record['phone'].'</td></tr>';
        
        $output .= '<tr><th colspan="2" class="bg-light">Tour Details</th></tr>';
        $output .= '<tr><th>Travel Date</th><td>'.$record['travel_date'].'</td></tr>';
        $output .= '<tr><th>Type of Tour</th><td>'.$record['typeof_tour'].'</td></tr>';
        $output .= '<tr><th>Category</th><td>'.$record['category'].'</td></tr>';
        $output .= '<tr><th>Continent</th><td>'.$record['continent'].'</td></tr>';
        $output .= '<tr><th>Country</th><td>'.$record['country'].'</td></tr>';
        $output .= '<tr><th>Place</th><td>'.$record['place'].'</td></tr>';
        
        $output .= '<tr><th colspan="2" class="bg-light">Travel Group</th></tr>';
        $output .= '<tr><th>Adults</th><td>'.$record['adults'].'</td></tr>';
        $output .= '<tr><th>Children</th><td>'.$record['children'].'</td></tr>';
        $output .= '<tr><th>Children With Bed</th><td>'.$record['children_with_bed'].'</td></tr>';
        $output .= '<tr><th>Children Without Bed</th><td>'.$record['children_without_bed'].'</td></tr>';
        $output .= '<tr><th>Infants</th><td>'.$record['infants'].'</td></tr>';
        
        $output .= '<tr><th colspan="2" class="bg-light">Trip Duration</th></tr>';
        $output .= '<tr><th>Days</th><td>'.$record['howmany_days'].'</td></tr>';
        $output .= '<tr><th>Nights</th><td>'.$record['howmany_night'].'</td></tr>';
        
        $output .= '<tr><th colspan="2" class="bg-light">Requirements</th></tr>';
        $output .= '<tr><th>Visa</th><td>'.$record['visa'].'</td></tr>';
        $output .= '<tr><th>Airfare</th><td>'.$record['Airfare'].'</td></tr>';
        $output .= '<tr><th>Meals</th><td>'.$record['meals'].'</td></tr>';
        $output .= '<tr><th>Transfers</th><td>'.$record['Transfers'].'</td></tr>';
        $output .= '<tr><th>Hotels</th><td>'.$record['Hotels'].'</td></tr>';
        $output .= '<tr><th>Budget</th><td>'.$record['budget'].'</td></tr>';
        
        $output .= '<tr><th colspan="2" class="bg-light">Additional Information</th></tr>';
        $output .= '<tr><th>Other Details</th><td>'.nl2br($record['any_other']).'</td></tr>';
        
        $output .= '<tr><th>Created At</th><td>'.$record['created_at'].'</td></tr>';
        
        $output .= '</table>';
        $output .= '</div>';
        
        echo $output;
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
        
        $data['record'] = $this->Booking_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->Booking_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>