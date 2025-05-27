<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Tours_model 
 * Tours_model model class to manage Tours 
 */
class Tours_model extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.sub_category as tourcategory,tbl_users.name as created_by');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tours.created_by',  'left');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getAllpackagetitle(){
        
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*');
        $this->db->from('tbl_tours');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
        
    }
    function getIndia()
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.country as tourcategory,tbl_users.name as created_by');
        $this->db->from('tbl_tours');
        $this->db->where('tbl_category.id', '1');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tours.created_by',  'left');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }

    }
    function getWorld()
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.sub_category as tourcategory,tbl_users.name as created_by');
        $this->db->from('tbl_tours');
        $this->db->where('tbl_category.id', '2');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tours.created_by',  'left');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }

    }
    function getLatest($limit)
    {
        $this->db->limit($limit);
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.sub_category as tourcategory,tbl_users.name as created_by');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tours.created_by',  'left');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
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
        $this->db->from('tbl_tours');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function getTour($url_title)
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.sub_category as tourcategory,tbl_users.name as created_by');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_users', 'tbl_users.userId = tbl_tours.created_by',  'left');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $this->db->where('tbl_tours.url_title', $url_title);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function getDestinationToursCount($limit)
    {
        $this->db->limit($limit);
        $this->db->group_by('tbl_tours.destination_location');
        $this->db->select('tbl_tours.images,tbl_tours.destination_location, count(*) as count');
        $this->db->from('tbl_tours');
        $this->db->where('tbl_tours.start_location != tbl_tours.destination_location');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getPopularToursCount($limit)
    {
       $this->db->order_by('tbl_popular.id', 'DESC');
        $this->db->select('tbl_popular.*');
        $this->db->from('tbl_popular');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return array();
        }
    }


    public function getDestinationTours($destination)
    {
        $this->db->group_by('tbl_tours.type_id');
        $this->db->select('tbl_tours.*, tbl_category.category, tbl_tour_types.type, tbl_tourcategory.sub_category as tourcategory');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_category', 'tbl_tours.category_id = tbl_category.id',  'left');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $this->db->where('tbl_tours.destination_location', $destination);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getMenuByCategoryId($category_id)
    {
        $this->load->model('tourcategory_model');
        $menu = array();
        $subcategorys = $this->tourcategory_model->getByCategoryId($category_id);
        // print_r($subcategorys);
        foreach($subcategorys as $row)
        {
            $result = $this->getByCategorySubId($category_id, $row['id']);
            if( count($result) > 0 ){
                $menu[ $row['id'] ] = $result;
            }
        }
        // echo "<pre>";
        // print_r($menu);
        return $menu;
    }

    public function getByTourTypesByCategory($category)
    {
        $this->db->group_by('tbl_tours.type_id');
        $this->db->select('tbl_tours.type_id, tbl_tour_types.type, count(*) as count');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $this->db->where('tbl_tourcategory.sub_category', $category);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getByTourTypes()
    {
        $this->db->group_by('tbl_tours.type_id');
        $this->db->select('tbl_tourcategory.sub_category as tourcategory,tbl_tours.type_id, tbl_tour_types.type, count(*) as count');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getByCategoryId($category_id)
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tours');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getByTourCategory($category, $limit = 0)
    {
        if( $limit > 0 )
        {
            $this->db->limit($limit);    
        }
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->where('tbl_tourcategory.id', $category);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getByTourCategoryType($category, $type, $limit = 0)
    {
        if( $limit > 0 )
        {
            $this->db->limit($limit);    
        }
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tours');
        $this->db->join('tbl_tourcategory', 'tbl_tours.tourcategory_id = tbl_tourcategory.id',  'left');
        $this->db->join('tbl_tour_types', 'tbl_tours.type_id = tbl_tour_types.id',  'left');
        $this->db->where('tbl_tourcategory.id', $category);
        $this->db->where('tbl_tour_types.type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getByCategorySubId($category_id, $subcategory_id)
    {
        $this->db->order_by('tbl_tours.id', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tours');
        $this->db->where('category_id', $category_id);
        $this->db->where('tourcategory_id', $subcategory_id);
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
    function checkRecordExists($title)
    {
        $this->db->select('id');
        $this->db->where('title', $title);
        $query = $this->db->get('tbl_tours');

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
        $query = $this->db->get('tbl_tours');

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
        $this->db->insert('tbl_tours', $info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function updateRecord($info, $id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update('tbl_tours', $info);
        
        $this->db->trans_complete();
        
        return true;
    }
    
    function deleteRecord($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete('tbl_tours');
        
        $this->db->trans_complete();
        
        return true;
    }

}

?>