<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Gst extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gst_model');
    }

    public function index()
    {
        if(!$this->session->userdata('isLoggedIn')) {
            redirect('admin');
        }
        $data = [
            'user' => $this->session->userdata(),
            'page_title' => "GST",
            'records' => $this->Gst_model->getAll()
        ];
        $this->load->view('layout_admin/header', $data);
        $this->load->view('backend/gst', $data);
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
            $record = $this->Gst_model->getById($id);
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
        $this->form_validation->set_rules('title','GST Title','trim|required|max_length[255]');
        $this->form_validation->set_rules('tax_percentage','Tax Percentage','trim|required|max_length[255]');

        $response = ["error" => 0, "error_message" => "", "success_message" => ""];

        if($this->form_validation->run() == FALSE) {
            $response["error"] = 1;
            $response["error_message"] = $this->form_validation->error_string();
            die(json_encode($response));
        }

        $title = $this->security->xss_clean($this->input->post('title'));
        $tax_percentage = $this->security->xss_clean($this->input->post('tax_percentage'));
        $recordInfo = ['title' => $title, 'tax_percentage' => $tax_percentage];

        if(empty($id)) {
            if($this->Gst_model->checkExists($title)) {
                $response["error"] = 1;
                $response["error_message"] = "GST title already exists.";
            } else {
                $result = $this->Gst_model->addNew($recordInfo);
                if($result) {
                    $response["success_message"] = "GST added successfully";
                } else {
                    $response["error"] = 1;
                    $response["error_message"] = "Add failed.";
                }
            }
        } else {
            if($this->Gst_model->checkExistsExcept($title, $id)) {
                $response["error"] = 1;
                $response["error_message"] = "GST title already exists.";
            } else {
                $result = $this->Gst_model->updateRecord($recordInfo, $id);
                if($result) {
                    $response["success_message"] = "GST updated successfully";
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

        $record = $this->Gst_model->getById($record_id);
        if(empty($record)) {
            $response["error"] = 1;
            $response["error_message"] = "Record not found";
        } else {
            if($this->Gst_model->deleteRecord($record_id)) {
                $response["success_message"] = "GST deleted successfully";
            } else {
                $response["error"] = 1;
                $response["error_message"] = "Delete failed.";
            }
        }
        die(json_encode($response));
    }
}
