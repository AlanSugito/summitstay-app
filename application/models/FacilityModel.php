<?php

class FacilityModel extends CI_Model
{
  private $table = "facilities";

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function getFacilities($search = "")
  {
    $this->db->like("name", $search);
    $this->db->order_by("created_at", "DESC");
    return $this->db->get($this->table)->result();
  }

  public function getFacilitiesCount()
  {
    return $this->db->count_all($this->table);
  }

  public function update_facility($id, $data)
  {
    return $this->db->where("id = $id")->update($this->table, $data);
  }

  public function delete_facility($facilityId)
  {
    $this->db->where("id=$facilityId");
    return $this->db->delete($this->table);
  }
}