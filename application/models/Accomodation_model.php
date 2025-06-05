<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accomodation_model extends CI_Model
{
    protected $table = 'tbl_accomodation';

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
        return $this->db->insert_id();
    }

    public function updateRecord($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function deleteRecord($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
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
