<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Auth (AuthController)
 * Auth class to control to authenticate user credentials and starts user's session.
 */
class Auth extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('customers_model');
    }
    
    /**
     * This function used to logged in user
     */
    public function login()
    {
        $response = array('error' => 0, 'error_message' => 'Invalid Request', 'success_message' => '');
        if ($this->input->is_ajax_request()) 
        {
            if ($this->input->method(TRUE) == "POST") 
            {
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|trim');
                $this->form_validation->set_rules('current-password', 'Password', 'required|max_length[10]');
                
                if($this->form_validation->run() == FALSE)
                {
                    $response["error"] = 1;
                    $response["error_message"] = $this->form_validation->error_string();
                    die(json_encode($response));
                }
                else
                {
                    $password = $this->security->xss_clean($this->input->post('current-password'));
                    $email = $this->security->xss_clean($this->input->post('email'));

                    $recordInfo = array(
                    'email' => $email,
                    'password' => getHashedPassword($password) );

                    if( $this->customers_model->checkEmailExists($email) )
                    {
                        $result = $this->customers_model->loginMe($email, $password);
                        if (!empty($result))
                        {
                            $response["error"] = 0;
                            $response["error_message"] = "";
                            $response["success_message"] = "Login successful";
                            $sessionArray = array( 'userId'=>$result->id,
                                            'name'=>$result->name,
                                            'email'=>$result->email,
                                            'phone'=>$result->phone,
                                            'Authorization' => true
                                    );

                            $this->session->set_userdata("Auth", $sessionArray);
                        } 
                        else 
                        {
                            $response["error"] = 1;
                            $response["error_message"] = "Email/Password Incorrect";
                        }
                    } 
                    else
                    {
                        $response["error"] = 1;
                        $response["error_message"] = "Email is not registered.";
                    }
                }
            }
        }
        die(json_encode($response));   
    }

    function signoff()
    {
        $sessionArray = array('userId' => 0, 'Authorization' => false);
        $this->session->set_userdata("Auth", $sessionArray);
        unset($sessionArray['userId'], $sessionArray['Authorization']);
        
        $this->session->set_flashdata('success', 'Logged Out');
        redirect();
    }

 }

?>