<?php

class ServiceModel extends CI_Model
{
  private $table = "services";

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function get($search = "")
  {
    $this->db->like("name", $search);
    $this->db->order_by("created_at", "DESC");
    return $this->db->get($this->table)->result();
  }

  public function getServicesCount()
  {
    return $this->db->count_all($this->table);
  }

  public function update_service($id, $data)
  {
    return $this->db->where("id = $id")->update($this->table, $data);
  }

  public function delete($serviceId)
  {
    $this->db->where("id = $serviceId");
    return $this->db->delete($this->table);
  }
}