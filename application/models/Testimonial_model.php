<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model
 * Testimonial_model model class to manage Tour categories 
 */
class Testimonial_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_testimonial.id', 'DESC');
        $this->db->select('tbl_testimonial.*, tbl_users.name as created_by');
        $this->db->from('tbl_testimonial');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_testimonial.created_by',  'left');
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
        $this->db->from('tbl_testimonial');
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
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkRecordExists($name)
    {
        $this->db->select('id');
        $this->db->where('name', $name);
        $query = $this->db->get('tbl_testimonial');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkRecordExists1($name, $id)
    {
        $this->db->select('id');
        $this->db->where('name', $name);
        $this->db->where('id !=', $id);
        $query = $this->db->get('tbl_testimonial');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNew($info)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_testimonial', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_testimonial', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_testimonial');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>