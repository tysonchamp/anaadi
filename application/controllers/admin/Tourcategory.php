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
        
        // Only validate continent field when category is 2
        $category = $this->input->post('category');
        if($category == '2') {
            $this->form_validation->set_rules('continent','Continent','trim|required|max_length[128]');
        }
        
        $this->form_validation->set_rules('country','Country','trim|required|max_length[128]');
                
        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $user = $this->session->userdata();
        $category = $this->security->xss_clean($this->input->post('category'));
        
        // For category 2, use continent value; for others, use 0
        $continent = '0';
        if($category == '2') {
            $continent = $this->security->xss_clean($this->input->post('continent'));
        }
        
        $country = $this->security->xss_clean($this->input->post('country'));

        $recordInfo = array(
                'category_id' => $category,
                'sub_category' => $continent,
                'country'      => $country,
                'created_by' => $user['userId']
            );

        // Check if it's a new record (empty id) or an update
        if(empty($id))
        {
            // It's a new record
            if($this->tourcategory_model->checkRecordExists($country))
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
            // It's an update
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

    /**
     * Continents Page for this controller.
     */
    public function continents()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('admin');
        }
        else
        {
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Continents";
            $data['categories'] = $this->category_model->getAll();
            $data['records'] = $this->category_model->getAllContinentsWithCategory();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/continent', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getContinent()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if( $id )
        {
            $record = $this->category_model->getContinentById($id);
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

    public function save_continent()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $this->load->library('form_validation');       

        $id = $this->security->xss_clean($this->input->post('record_id'));     
        $this->form_validation->set_rules('category','Category','trim|required|max_length[128]');
        $this->form_validation->set_rules('continent','Continent Name','trim|required|max_length[128]');
                
        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $category = $this->security->xss_clean($this->input->post('category'));
        $continent = $this->security->xss_clean($this->input->post('continent'));

        $recordInfo = array(
                'category_id' => $category,
                'continent' => $continent
            );

        // Check if it's a new record (empty id) or an update
        if(empty($id))
        {
            // It's a new record
            if($this->category_model->checkContinentExists($continent, $category))
            {
                $response["error"] = 1;
                $response["error_message"] = "This continent already exists for the selected category.";
            }
            else
            {
                $result = $this->category_model->addNewContinent($recordInfo);
                if($result > 0)
                {
                    $response["error"] = 0;
                    $response["error_message"] = "";
                    $response["success_message"] = "Continent added successfully";
                } 
                else 
                {
                    $response["error"] = 1;
                    $response["error_message"] = "Continent add failed.";
                }
            }    
        }
        else
        {
            // It's an update
            if($this->category_model->checkContinentExists1($continent, $category, $id))
            {
                $response["error"] = 1;
                $response["error_message"] = "This continent already exists for the selected category.";
            }
            else
            {
                $result = $this->category_model->updateContinent($recordInfo, $id);
                if($result > 0)
                {
                    $response["error"] = 0;
                    $response["error_message"] = "";
                    $response["success_message"] = "Continent updated successfully";
                } 
                else 
                {
                    $response["error"] = 1;
                    $response["error_message"] = "Continent update failed.";
                }
            }                
        }            
        die(json_encode($response)); 
    }

    public function deleteContinent()
    {
        $record_id = intval($this->uri->segment(4));
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $user = $this->session->userdata();

        if( $user['user_type'] !== "Admin" )
        {
            $response["error"] = 1;
            $response["error_message"] = "You have no permission.";   
            die(json_encode($response));
        }
        if( $record_id == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Invalid Request";
            die(json_encode($response));
        }
        
        // Check if continent is used in any tour category
        if($this->tourcategory_model->isContinentUsed($record_id))
        {
            $response["error"] = 1;
            $response["error_message"] = "This continent is being used by one or more tour categories and cannot be deleted.";
            die(json_encode($response));
        }
        
        $continent = $this->category_model->getContinentById($record_id);
        if(empty($continent))
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->category_model->deleteContinent($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Continent deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>