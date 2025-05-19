<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Services
 * Services class to control to authenticate user credentials and starts user's session.
 */
class Services extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('services_model');
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
            $data['page_title'] = "Services";
            $data['records'] = $this->services_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/services', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getRecord()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if( $id )
        {
            $record = $this->services_model->getById($id);
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
        $this->form_validation->set_rules('service_name','Service Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('description','Description','trim|required|max_length[500]');
                
        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $image = "";
        $image_type = "";
        $target_folder = IMAGE_UPLOAD_PATH."services/";

        $service_image = $_FILES['service_image']; // Get the uploaded file
        if ( $service_image && $service_image['name']) 
        {
            $image = trim($service_image['name']);
            $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            
            $result = getNewImage($target_folder, $this->security->xss_clean(trim($this->input->post('service_name'))), $imageFileType);
            $new_image_name = $result[0];
            $target_file = $result[1];
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
            {
                $response["error"] = 1;
                $response["error_message"] = "Image format invalid. Upload jpg/jpeg/png.";
                die(json_encode($response));
            }
            
            // Check file size
            if ( $service_image["size"] > 2000000 || $service_image["error"] == 1) 
            {
                $response["error"] = 1;
                $response["error_message"] = "Image size too large. Upload size less than 2MB.";
                die(json_encode($response));
            }

            // upload file
            if (move_uploaded_file($service_image["tmp_name"], $target_file)) 
            {
                // upload suuccess 
                $image = $new_image_name;
            } else {
                $response["error"] = 1;
                $response["error_message"] = "Image upload failed";
                die(json_encode($response));
            }
        } 
        else 
        {
            if( $id == "" )
            {
                $response["error"] = 1;
                $response["error_message"] = "Please upload Image";
                die(json_encode($response));
            }
            else
            {
                $srecord = $this->services_model->getById($id);
                $image = $srecord['image'];
            }
        }
        
        $user = $this->session->userdata();
        $id = $this->security->xss_clean($this->input->post('record_id'));
        $service_name = $this->security->xss_clean($this->input->post('service_name'));
        $description = $this->security->xss_clean($this->input->post('description'));
                
        $recordInfo = array(
                'service_name' => $service_name,
                'description' => $description,
                'image' => $image,
                'created_by' => $user['userId']
            );

        if( $id == "" )
        {
            if( $this->services_model->checkRecordExists($service_name) )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists.";
            }
            else
            {
                $result = $this->services_model->addNew($recordInfo);
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
            $result = $this->services_model->checkRecordExists1($service_name,$id);
            if( $result )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists";
                $response["success_message"] = "";
            }
            else
            {
                $result = $this->services_model->updateRecord($recordInfo, $id);
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
        
        $data['record'] = $this->services_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->services_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>