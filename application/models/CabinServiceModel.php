<?php

class CabinServiceModel extends CI_Model
{
  private $table = "cabin_services";

  public function add($data)
  {
    return $this->db->insert_batch($this->table, $data);
  }

  public function get($cabinId)
  {
    $this->db->join("services", "services.id=$this->table.service_id");
    $this->db->where("cabin_id=$cabinId");
    return $this->db->get($this->table);
  }

  public function delete($cabinId)
  {
    $this->db->where("id=$cabinId");
    return $this->db->delete($this->table);
  }
}