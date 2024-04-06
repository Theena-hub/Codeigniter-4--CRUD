<?php
namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    protected $table = "tbl_users";
    public function insertValue($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
    public function updateValue($where,$data)
    {
        $builder = $this->db->table($this->table);        
        $builder->where($where);
        return $builder->update($data);
    }
    public function deleteValue($where)
    {
        $builder = $this->db->table($this->table);        
        $builder->where($where);
        return $builder->delete();
    }
    public function getValue($where)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*");
        $builder->where($where);
        return $builder->get()->getRow();
    }
    public function getAllValue($where = [])
    {
        $builder = $this->db->table($this->table);
        $builder->select("*");
        $builder->where($where);
        return $builder->get()->getResult();
    }
}