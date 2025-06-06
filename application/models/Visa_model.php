<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visa_model extends CI_Model
{
    protected $table = 'tbl_visa';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function addNew($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function updateRecord($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function deleteRecord($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    public function checkExists($title)
    {
        return $this->db->get_where($this->table, ['title' => $title])->num_rows() > 0;
    }

    public function checkExistsExcept($title, $id)
    {
        $this->db->where('title', $title);
        $this->db->where('id !=', $id);
        return $this->db->get($this->table)->num_rows() > 0;
    }
}
