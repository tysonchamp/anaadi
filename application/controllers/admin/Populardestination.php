<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Populardestination
 * Gallery class to control to authenticate user credentials and starts user's session.
 */
class Populardestination extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
         $this->load->model('tours_model');
        $this->load->model('Populardestination_model');
        
        $this->load->model('tourcategory_model');
        $this->load->model('Booknow_model');
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
            $data['page_title'] = "Populardestination";
            $data['records'] = $this->Populardestination_model->getAll();
            
            $data['package'] = $this->tours_model->getAll();
            
            

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/popular', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    public function getRecord()
    {
        $response = array("error" => 0, "error_message" => "", "success_message" => "");
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if( $id )
        {
            $record = $this->Populardestination_model->getById($id);
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
        $this->form_validation->set_rules('album','Album','trim|required|max_length[255]');
        $this->form_validation->set_rules('package','Package','trim|required|max_length[255]');

        if($this->form_validation->run() == FALSE)
        {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }
        
        $image = "";
        $image_type = "";
        $target_folder = IMAGE_UPLOAD_PATH."popular/";

        $result = $this->validate_images($_FILES['images']);
        if( $result != "valid" )
        {
            $response["error"] = 1;
            $response["error_message"] = $result;
            die(json_encode($response));
        }

        $gallery_images_array = [];
        $gallery_images = $_FILES['images'];
        $total = count($gallery_images['name']);
        for( $i=0 ; $i < $total ; $i++ ) 
        {
            $image = $gallery_images['name'][$i];
            $tmp_name = $gallery_images['tmp_name'][$i];
            $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            
            $result = getNewImage($target_folder, $this->security->xss_clean(trim($this->input->post('album'))), $imageFileType);
            $new_image_name = $result[0];
            $target_file = $result[1];

            // upload file
            if (move_uploaded_file($tmp_name, $target_file)) 
            {
                // upload suuccess 
                $gallery_images_array[] = $new_image_name;
            } 
            else 
            {
                $response["error"] = 1;
                $response["error_message"] = "Image upload failed";
                die(json_encode($response));
            }
        }

        if( count($gallery_images_array) == 0 )
        {
            $response["error"] = 1;
            $response["error_message"] = "Images not uploaded";
            die(json_encode($response));
        }
        
        $user = $this->session->userdata();
        $album = $this->security->xss_clean($this->input->post('album'));
        $package = $this->security->xss_clean($this->input->post('package'));
        if( $id != "" )
        {
            $recordInfo = array(
                'album' => $album,
                'images' => implode(",", $gallery_images_array),
                'package' => implode(",", $package),
                'created_by' => $user['userId']
            );
            $result = $this->Populardestination_model->updateRecord($recordInfo, $id);
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
        else
        {
            $recordInfo = array(
                'album' => $album,
                'package' => $package,
                'images' => implode(",", $gallery_images_array),
                'created_by' => $user['userId']
            );

            $result = $this->Populardestination_model->addNew($recordInfo);
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
        
        $data['record'] = $this->Populardestination_model->getById($record_id);
        if( count($data['record']) == 0 )
        {   
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        }
        else
        {
            $this->Populardestination_model->deleteRecord($record_id);
            $response["error"] = 0;
            $response["error_message"] = "";
            $response["success_message"] = "Record deleted successfully";
        }
        
        die(json_encode($response));
    }
    
}

?>