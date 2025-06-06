<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Airticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Airticket_model');
    }

    public function index()
    {
        if(!$this->session->userdata('isLoggedIn')) {
            redirect('admin');
        }
        $data = [
            'user' => $this->session->userdata(),
            'page_title' => "Air Ticket",
            'records' => $this->Airticket_model->getAll()
        ];
        $this->load->view('layout_admin/header', $data);
        $this->load->view('backend/airticket', $data);
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
            $record = $this->Airticket_model->getById($id);
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
        $this->form_validation->set_rules('title','Air Ticket Title','trim|required|max_length[255]');

        $response = ["error" => 0, "error_message" => "", "success_message" => ""];

        if($this->form_validation->run() == FALSE) {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $title = $this->security->xss_clean($this->input->post('title'));
        $recordInfo = ['title' => $title];

        if(empty($id)) {
            if($this->Airticket_model->checkExists($title)) {
                $response["error"] = 1;
                $response["error_message"] = "Air Ticket already exists.";
            } else {
                $result = $this->Airticket_model->addNew($recordInfo);
                if($result) {
                    $response["success_message"] = "Air Ticket added successfully";
                } else {
                    $response["error"] = 1;
                    $response["error_message"] = "Add failed.";
                }
            }
        } else {
            if($this->Airticket_model->checkExistsExcept($title, $id)) {
                $response["error"] = 1;
                $response["error_message"] = "Air Ticket already exists.";
            } else {
                $result = $this->Airticket_model->updateRecord($recordInfo, $id);
                if($result) {
                    $response["success_message"] = "Air Ticket updated successfully";
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

        $record = $this->Airticket_model->getById($record_id);
        if(empty($record)) {
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        } else {
            if($this->Airticket_model->deleteRecord($record_id)) {
                $response["success_message"] = "Air Ticket deleted successfully";
            } else {
                $response["error"] = 1;
                $response["error_message"] = "Delete failed.";
            }
        }
        die(json_encode($response));
    }
}
