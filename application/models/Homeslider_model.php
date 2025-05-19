<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Homeslider_model
 * Homeslider_model model class to manage Tour categories 
 */
class Homeslider_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_homeslider.id', 'DESC');
        $this->db->select('tbl_homeslider.*, tbl_users.name as created_by');
        $this->db->from('tbl_homeslider');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_homeslider.created_by',  'left');
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
        $this->db->from('tbl_homeslider');
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
    function checkRecordExists($title)
    {
        $this->db->select('id');
        $this->db->where('title', $title);
        $query = $this->db->get('tbl_homeslider');

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
    function checkRecordExists1($title, $id)
    {
        $this->db->select('id');
        $this->db->where('title', $title);
        $this->db->where('id !=', $id);
        $query = $this->db->get('tbl_homeslider');

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
        $this->db->insert('tbl_homeslider', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_homeslider', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_homeslider');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>