<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Category_model
 * Category model class to manage Tour categories 
 */
class Category_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_category.id', 'ASC');
        $this->db->select('tbl_category.*, tbl_users.name as created_by');
        $this->db->from('tbl_category');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_category.created_by',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getAllcontinent()
    {
        $this->db->order_by('tbl_continent.id', 'ASC');
        $this->db->select('tbl_continent.*');
        $this->db->from('tbl_continent');
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
        $this->db->from('tbl_category');
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
    function checkRecordExists($category)
    {
        $this->db->select('id');
        $this->db->where('category', $category);
        $query = $this->db->get('tbl_category');

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
    function checkRecordExists1($category, $id)
    {
        $this->db->select('id');
        $this->db->where('category', $category);
        $this->db->where('id !=', $id);
        $query = $this->db->get('tbl_category');

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
        $this->db->insert('tbl_category', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_category', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_category');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>