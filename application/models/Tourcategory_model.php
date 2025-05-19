<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Tourcategory_model (Login Model)
 * Tourcategory model class to manage Tour categories 
 */
class Tourcategory_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_tourcategory.id', 'DESC');
        $this->db->select('tbl_tourcategory.*, tbl_category.category,tbl_continent.continent, tbl_users.name as created_by');
        $this->db->from('tbl_tourcategory');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tourcategory.created_by',  'left');
        $this->db->join('tbl_continent', 'tbl_continent.id = tbl_tourcategory.sub_category',  'left');
        $this->db->join('tbl_category', 'tbl_tourcategory.category_id = tbl_category.id',  'left');
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
        $this->db->from('tbl_tourcategory');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function getByCategoryId($category_id)
    {
        $this->db->order_by('tbl_tourcategory.sub_category', 'ASC');
        $this->db->select('*');
        $this->db->from('tbl_tourcategory');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    
    public function getByContinentId($category)
    {
        $this->db->order_by('tbl_continent.continent', 'ASC');
        $this->db->select('*');
        $this->db->from('tbl_continent');
        $this->db->where('category_id', $category);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkRecordExists($sub_category)
    {
        $this->db->select('id');
        $this->db->where('sub_category', $sub_category);
        $query = $this->db->get('tbl_tourcategory');

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
    function checkRecordExists1($sub_category, $id)
    {
        $this->db->select('id');
        $this->db->where('sub_category', $sub_category);
        $this->db->where('id !=', $id);
        $query = $this->db->get('tbl_tourcategory');

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
        $this->db->insert('tbl_tourcategory', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_tourcategory', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_tourcategory');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>