<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Articles_model');
    }

    public function index()
    {
        if(!$this->session->userdata('isLoggedIn')) {
            redirect('admin');
        }
        $data = [
            'user' => $this->session->userdata(),
            'page_title' => "Articles",
            'records' => $this->Articles_model->getAll()
        ];
        $this->load->view('layout_admin/header', $data);
        $this->load->view('backend/articles', $data);
        $this->load->view('layout_admin/footer');
    }

    public function getRecord()
    {
        $id = intval($this->input->get('id'));
        $response = [
            "error" => 0,
            "error_message" => "",
            "success_message" => "",
            "record" => null
        ];
        if($id) {
            $record = $this->Articles_model->getById($id);
            if($record) {
                $response['record'] = $record;
                $response['success_message'] = "Success";
            } else {
                $response['error'] = 1;
                $response['error_message'] = "Record not found";
            }
        } else {
            $response['error'] = 1;
            $response['error_message'] = "Invalid Request";
        }
        die(json_encode($response));
    }

    public function save_record()
    {
        $this->load->library('form_validation');
        $id = $this->security->xss_clean($this->input->post('record_id'));
        $this->form_validation->set_rules('name','Article Name','trim|required|max_length[128]');

        $response = ["error" => 0, "error_message" => "", "success_message" => ""];

        if($this->form_validation->run() == FALSE) {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $name = $this->security->xss_clean($this->input->post('name'));
        $recordInfo = ['name' => $name];

        if(empty($id)) {
            if($this->Articles_model->checkExists($name)) {
                $response["error"] = 1;
                $response["error_message"] = "Article already exists.";
            } else {
                $result = $this->Articles_model->addNew($recordInfo);
                if($result > 0) {
                    $response["success_message"] = "Article added successfully";
                } else {
                    $response["error"] = 1;
                    $response["error_message"] = "Add failed.";
                }
            }
        } else {
            if($this->Articles_model->checkExistsExcept($name, $id)) {
                $response["error"] = 1;
                $response["error_message"] = "Article already exists.";
            } else {
                $result = $this->Articles_model->updateRecord($recordInfo, $id);
                if($result) {
                    $response["success_message"] = "Article updated successfully";
                } else {
                    $response["error"] = 1;
                    $response["error_message"] = "Update failed.";
                }
            }
        }
        die(json_encode($response));
    }

    public function deleteRecord()
    {
        $record_id = intval($this->uri->segment(4));
        $response = ["error" => 0, "error_message" => "", "success_message" => ""];
        $user = $this->session->userdata();

        if($user['user_type'] !== "Admin") {
            $response["error"] = 1;
            $response["error_message"] = "You have no permission.";
            die(json_encode($response));
        }
        if($record_id == 0) {
            $response["error"] = 1;
            $response["error_message"] = "Invalid Request";
            die(json_encode($response));
        }

        $record = $this->Articles_model->getById($record_id);
        if(empty($record)) {
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        } else {
            $this->Articles_model->deleteRecord($record_id);
            $response["success_message"] = "Article deleted successfully";
        }
        die(json_encode($response));
    }
}
