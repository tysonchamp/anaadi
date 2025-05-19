<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Gallery_model
 * Gallery_model model class to manage Tour categories 
 */
class Gallery_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_gallery.id', 'DESC');
        $this->db->select('tbl_gallery.*, tbl_users.name as created_by');
        $this->db->from('tbl_gallery');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_gallery.created_by',  'left');
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
        $this->db->from('tbl_gallery');
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
        $this->db->from('tbl_gallery');
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
        $this->db->insert('tbl_gallery', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_gallery', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_gallery');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>