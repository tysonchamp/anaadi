<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FixedDateTour_model extends CI_Model
{
    protected $table = 'tbl_fixed_date_tours';

    public function getAll()
    {
        return $this->db->order_by('date', 'asc')->get($this->table)->result_array();
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

    public function checkExists($date)
    {
        return $this->db->get_where($this->table, ['date' => $date])->num_rows() > 0;
    }

    public function checkExistsExcept($date, $id)
    {
        $this->db->where('date', $date);
        $this->db->where('id !=', $id);
        return $this->db->get($this->table)->num_rows() > 0;
    }
}
