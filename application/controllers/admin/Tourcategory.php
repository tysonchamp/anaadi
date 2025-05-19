<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Tourcategory
 * Tourcategory class to control to authenticate user credentials and starts user's session.
 */
class Tourcategory extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('tourcategory_model');
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
            $data['page_title'] = "Tour Category";
            $data['category'] = $this->category_model->getAll();
            $data['continent'] = $this->category_model->getAllcontinent();
            $data['records'] = $this->tourcategory_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/tourcategory', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getRecord()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if( $id )
        {
            $record = $this->tourcategory_model->getById($id);
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

    public function save_record()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $this->load->library('form_validation');       

        $id = $this->security->xss_clean($this->input->post('record_id'));     
        $this->form_validation->set_rules('category','Category','trim|required|max_length[128]');
        $this->form_validation->set_rules('continent','Continent','trim|required|max_length[128]');
        $this->form_validation->set_rules('country','Country','trim|required|max_length[128]');
                
        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $user = $this->session->userdata();
        $category = $this->security->xss_clean($this->input->post('category'));
        $continent = $this->security->xss_clean($this->input->post('continent'));
        $country = $this->security->xss_clean($this->input->post('country'));

        $recordInfo = array(
                'category_id' => $category,
                'sub_category' => $continent,
                'country'      => $country,
                'created_by' => $user['userId']
            );

        if( $id == "" )
        {
            if( $this->tourcategory_model->checkRecordExists($country))
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists.";
            }
            else
            {
                $result = $this->tourcategory_model->addNew($recordInfo);
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
            $result = $this->tourcategory_model->checkRecordExists1($country, $id);
            if( $result )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists";
                $response["success_message"] = "";
            }
            else
            {
                $result = $this->tourcategory_model->updateRecord($recordInfo, $id);
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
        
        $data['record'] = $this->tourcategory_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->tourcategory_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>