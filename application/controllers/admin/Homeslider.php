<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Homeslider
 * Homeslider class to control to authenticate user credentials and starts user's session.
 */
class Homeslider extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homeslider_model');
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
            $data['page_title'] = "Homeslider";
            $data['records'] = $this->homeslider_model->getAll();

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/homeslider', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getRecord()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if( $id )
        {
            $record = $this->homeslider_model->getById($id);
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
        $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
        $this->form_validation->set_rules('sub_title','Sub Title','trim|required|max_length[500]');
                
        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $image = "";
        $image_type = "";
        $target_folder = IMAGE_UPLOAD_PATH."homeslider/";

        $slider_image = $_FILES['image']; // Get the uploaded file
        if ( $slider_image && $slider_image['name']) 
        {
            $image = trim($slider_image['name']);
            $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            
            $result = getNewImage($target_folder, $this->security->xss_clean(trim($this->input->post('title'))), $imageFileType);
            $new_image_name = $result[0];
            $target_file = $result[1];
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
            {
                $response["error"] = 1;
                $response["error_message"] = "Image format invalid. Upload jpg/jpeg/png.";
                die(json_encode($response));
            }

            $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            if ($width < "1280" || $height < "720") {
                $response["error"] = 1;
                $response["error_message"] = "Image dimension should be greater or equal to 1280X720";
                die(json_encode($response));
            }

            // Check file size
            if ( $slider_image["size"] > 2000000 || $slider_image["error"] == 1) 
            {
                $response["error"] = 1;
                $response["error_message"] = "Image size too large. Upload size less than 2MB.";
                die(json_encode($response));
            }

            // upload file
            if (move_uploaded_file($slider_image["tmp_name"], $target_file)) 
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
                $srecord = $this->homeslider_model->getById($id);
                $image = $srecord['image'];
            }
        }
        
        $user = $this->session->userdata();
        $id = $this->security->xss_clean($this->input->post('record_id'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $sub_title = $this->security->xss_clean($this->input->post('sub_title'));
                
        $recordInfo = array(
                'title' => $title,
                'sub_title' => $sub_title,
                'image' => $image,
                'created_by' => $user['userId']
            );

        if( $id == "" )
        {
            if( $this->homeslider_model->checkRecordExists($title) )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists.";
            }
            else
            {
                $result = $this->homeslider_model->addNew($recordInfo);
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
            $result = $this->homeslider_model->checkRecordExists1($title,$id);
            if( $result )
            {
                $response["error"] = 1;
                $response["error_message"] = "Record already exists";
                $response["success_message"] = "";
            }
            else
            {
                $result = $this->homeslider_model->updateRecord($recordInfo, $id);
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
        
        $data['record'] = $this->homeslider_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->homeslider_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>