<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exclusion_model extends CI_Model
{
    protected $table = 'tbl_exclusion';

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

    public function checkExists($name)
    {
        return $this->db->get_where($this->table, ['name' => $name])->num_rows() > 0;
    }

    public function checkExistsExcept($name, $id)
    {
        $this->db->where('name', $name);
        $this->db->where('id !=', $id);
        return $this->db->get($this->table)->num_rows() > 0;
    }
}
