<?php

class CabinFacilityModel extends CI_Model
{
  private $table = "cabin_facilities";

  public function add($data)
  {
    return $this->db->insert_batch($this->table, $data);
  }
  public function get($cabinId)
  {
    $this->db->join("facilities", "facilities.id=$this->table.facility_id");
    $this->db->where("cabin_id=$cabinId");
    return $this->db->get($this->table);
  }

  public function delete($cabinId)
  {
    $this->db->where("id=$cabinId");
    return $this->db->delete($this->table);
  }
}