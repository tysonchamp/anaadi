<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Tourtypes
 * Tourtypes model class to manage Tour categories 
 */
class Tourtypes_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_tour_types.id', 'DESC');
        $this->db->select('tbl_tour_types.*, tbl_users.name as created_by');
        $this->db->from('tbl_tour_types');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tour_types.created_by',  'left');
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
        $this->db->from('tbl_tour_types');
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
    function checkRecordExists($type)
    {
        $this->db->select('id');
        $this->db->where('type', $type);
        $query = $this->db->get('tbl_tour_types');

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
    function checkRecordExists1($type, $id)
    {
        $this->db->select('id');
        $this->db->where('type', $type);
        $this->db->where('id !=', $id);
        $query = $this->db->get('tbl_tour_types');

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
        $this->db->insert('tbl_tour_types', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_tour_types', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_tour_types');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>