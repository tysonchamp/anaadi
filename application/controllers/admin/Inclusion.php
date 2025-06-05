<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Inclusion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inclusion_model');
    }

    public function index()
    {
        if(!$this->session->userdata('isLoggedIn')) {
            redirect('admin');
        }
        $data = [
            'user' => $this->session->userdata(),
            'page_title' => "Inclusions",
            'records' => $this->Inclusion_model->getAll()
        ];
        $this->load->view('layout_admin/header', $data);
        $this->load->view('backend/inclusion', $data);
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
            $record = $this->Inclusion_model->getById($id);
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
        $this->form_validation->set_rules('name','Inclusion Name','trim|required|max_length[255]');

        $response = ["error" => 0, "error_message" => "", "success_message" => ""];

        if($this->form_validation->run() == FALSE) {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $name = $this->security->xss_clean($this->input->post('name'));
        $recordInfo = ['name' => $name];

        if(empty($id)) {
            if($this->Inclusion_model->checkExists($name)) {
                $response["error"] = 1;
                $response["error_message"] = "Inclusion already exists.";
            } else {
                $result = $this->Inclusion_model->addNew($recordInfo);
                if($result) {
                    $response["success_message"] = "Inclusion added successfully";
                } else {
                    $response["error"] = 1;
                    $response["error_message"] = "Add failed.";
                }
            }
        } else {
            if($this->Inclusion_model->checkExistsExcept($name, $id)) {
                $response["error"] = 1;
                $response["error_message"] = "Inclusion already exists.";
            } else {
                $result = $this->Inclusion_model->updateRecord($recordInfo, $id);
                if($result) {
                    $response["success_message"] = "Inclusion updated successfully";
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
        $record_id = intval($this->input->post('id'));
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

        $record = $this->Inclusion_model->getById($record_id);
        if(empty($record)) {
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        } else {
            if($this->Inclusion_model->deleteRecord($record_id)) {
                $response["success_message"] = "Inclusion deleted successfully";
            } else {
                $response["error"] = 1;
                $response["error_message"] = "Delete failed.";
            }
        }
        die(json_encode($response));
    }
}
