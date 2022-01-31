<?php

class EmployeeModel extends CI_Model
{

    public function get_employee()
    {
        $query = $this->db->get("employee");
        return $query->result();
    }

    public function insert_emp($data)
    {
        return $this->db->insert('employee', $data);
    }

    public function find_emp($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('employee');
        return $query->row();
    }

    public function update_emp($id, $data)
    {
        // $this->db->where('id', $id);
        // $q = $this->db->update('employee', $data);
        // print_r($q);
        // die;
        // return $q;
        return $this->db->where('id', $id)->update('employee', $data);
    }

    public function delete_emp($id)
    {
        return $this->db->delete('employee', ['id' => $id]);
    }
}
