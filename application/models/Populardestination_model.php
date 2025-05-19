<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Populardestination_model
 * Gallery_model model class to manage Tour categories 
 */
class Populardestination_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_popular.id', 'DESC');
        $this->db->select('tbl_popular.*, tbl_users.name as created_by,tbl_tours.title');
        $this->db->from('tbl_popular');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_popular.created_by',  'left');
         $this->db->join('tbl_tours', 'tbl_tours.id = tbl_popular.package',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getAlbum($album)
    {
        $this->db->select('*');
        $this->db->from('tbl_popular');
        $this->db->where('album', $album);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } 
        else 
        {
            return array();
        }
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_popular');
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
        $this->db->insert('tbl_popular', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_popular', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_popular');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>