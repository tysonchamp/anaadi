<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Login Model)
 * Contact model class to get to authenticate user credentials 
 */
class Booking_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_booknow.id', 'ASC');
        $this->db->select('tbl_booknow.*, 
            tbl_category.category as category_name,
            tbl_tourcategory.country as tour_category_name,
            tbl_tours.title as tour_package_name,
            tbl_tour_types.type as tour_type_name');
        $this->db->from('tbl_booknow');
        $this->db->join('tbl_category', 'tbl_category.id = tbl_booknow.category', 'left');
        $this->db->join('tbl_tourcategory', 'tbl_tourcategory.id = tbl_booknow.tour_category', 'left');
        $this->db->join('tbl_tours', 'tbl_tours.id = tbl_booknow.tour_package', 'left');
        $this->db->join('tbl_tour_types', 'tbl_tour_types.id = tbl_booknow.typeof_tour', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getAll_by_status($status)
    {
        $this->db->order_by('tbl_booknow.id', 'ASC');
        $this->db->select('tbl_booknow.*, 
            tbl_category.category as category_name,
            tbl_tourcategory.country as tour_category_name,
            tbl_tours.title as tour_package_name,
            tbl_tour_types.type as tour_type_name');
        $this->db->from('tbl_booknow');
        $this->db->join('tbl_category', 'tbl_category.id = tbl_booknow.category', 'left');
        $this->db->join('tbl_tourcategory', 'tbl_tourcategory.id = tbl_booknow.tour_category', 'left');
        $this->db->join('tbl_tours', 'tbl_tours.id = tbl_booknow.tour_package', 'left');
        $this->db->join('tbl_tour_types', 'tbl_tour_types.id = tbl_booknow.typeof_tour', 'left');
        $this->db->where('tbl_booknow.payment_status', $status);
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
        $this->db->from('tbl_booknow');
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
        $this->db->insert('tbl_booknow', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_booknow', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_booknow');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>