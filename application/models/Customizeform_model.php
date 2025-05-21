<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Customizeform_model (Login Model)
 * Contact model class to get to authenticate user credentials 
 */
class Customizeform_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_customize.id', 'ASC');
        $this->db->select('*');
        $this->db->from('tbl_customize');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customize');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        } else {
            return array();
        }
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNew($info)
    {
        $this->db->trans_start();
        
        // Add created_at timestamp
        $info['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert('tbl_customize', $info);
        
        $insert_id = $this->db->insert_id();
        
        // Send email notification
        $this->sendNotificationEmail($info, $insert_id);
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_customize', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_customize');
        
        $this->db->trans_complete();
        
        return true;
    }
    
    /**
     * Send notification email to admin and confirmation to customer
     */
    private function sendNotificationEmail($info, $id)
    {
        // Load email library
        $this->load->library('email');

        // Admin notification
        $this->email->clear();
        $this->email->from('noreply@anaadi.com', 'Anaadi Tours and Travels');
        $this->email->to('info@anaadi.com'); // Admin email
        $this->email->subject('New Customize Tour Request #' . $id);
        
        $message = "New customize tour request details:\n\n";
        $message .= "Request ID: " . $id . "\n";
        $message .= "Name: " . $info['name'] . "\n";
        $message .= "Email: " . $info['email'] . "\n";
        $message .= "Phone: " . $info['phone'] . "\n";
        $message .= "Travel Date: " . $info['travel_date'] . "\n";
        $message .= "Adults: " . $info['adults'] . "\n";
        $message .= "Days/Nights: " . $info['howmany_days'] . "D/" . $info['howmany_night'] . "N\n";
        $message .= "Destination: " . $info['place'] . "\n";
        
        $this->email->message($message);
        $this->email->send();
        
        // Customer confirmation
        $this->email->clear();
        $this->email->from('info@anaadi.com', 'Anaadi Tours and Travels');
        $this->email->to($info['email']);
        $this->email->subject('Your Tour Request Confirmation');
        
        $message = "Dear " . $info['name'] . ",\n\n";
        $message .= "Thank you for your customize tour request. Your request has been received and our team will get back to you shortly.\n\n";
        $message .= "Your request details:\n";
        $message .= "Destination: " . $info['place'] . "\n";
        $message .= "Travel Date: " . $info['travel_date'] . "\n";
        $message .= "Duration: " . $info['howmany_days'] . " Days / " . $info['howmany_night'] . " Nights\n\n";
        $message .= "Best Regards,\nAnaadi Tours and Travels Team";
        
        $this->email->message($message);
        $this->email->send();
    }
}
?>