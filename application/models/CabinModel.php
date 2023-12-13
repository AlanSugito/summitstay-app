<?php


class CabinModel extends CI_Model
{
  private $table = "cabins";

  public function addCabin($data)
  {
    $success = $this->db->insert($this->table, $data);
    if (!$success)
      return false;

    $cabin = $this->db->get_where($this->table, ["name" => $data["name"]])->row();
    return $cabin;
  }

  private function getCabinFacilities($cabinId)
  {
    $this->db->select("*")->from("cabin_facilities")->join("facilities", "facilities.id=cabin_facilities.facility_id");
    $facilities = $this->db->where("cabin_id=$cabinId")->get()->result_array();

    return $facilities;
  }

  private function getCabinServices($cabinId)
  {
    $this->db->select("*")->from("cabin_services")->join("services", "services.id=cabin_services.service_id");
    $services = $this->db->where("cabin_id=$cabinId")->get()->result_array();

    return $services;
  }
  private function getCabinPictures($cabinId)
  {
    $this->db->where("cabin_id = $cabinId");
    $pictures = $this->db->get("pictures")->result_array();

    return $pictures;
  }

  public function getDetail($cabinId)
  {
    $cabin = $this->db->get_where($this->table, ["id" => $cabinId])->row_array();
    $facilities = $this->getCabinFacilities($cabinId);
    $services = $this->getCabinServices($cabinId);
    $pictures = $this->getCabinPictures($cabinId);

    $cabin["facilities"] = $facilities;
    $cabin["services"] = $services;
    $cabin["pictures"] = $pictures;

    return $cabin;
  }

  public function getCabins($search = "")
  {
    $this->db->order_by("created_at", "DESC")->like("name", $search);
    return $this->db->get($this->table)->result();
  }

  public function getCabinsWithPictures($search = "", $limited = true)
  {
    if ($limited) {
      $this->db->limit(8);
    }
    $cabins = $this->db->like("name", $search)->get($this->table)->result_array();
    for ($i = 0; $i < count($cabins); $i++) {
      $cabins[$i]["pictures"] = $this->db->get_where("pictures", ["cabin_id" => $cabins[$i]["id"]])->result_array();
    }

    return $cabins;
  }

  public function delete_cabin($cabin_id)
  {
    $this->db->where("cabin_id=$cabin_id")->delete("pictures");
    $this->db->where("cabin_id = $cabin_id")->delete("cabin_services");
    $this->db->where("cabin_id = $cabin_id")->delete("cabin_facilities");
    $this->db->where("id = $cabin_id");
    $this->db->delete($this->table);
  }

  public function update_cabin($cabinId, $data)
  {
    return $this->db->where("id = $cabinId")->update($this->table, $data);
  }

  public function getCabinsCount()
  {
    return $this->db->count_all($this->table);
  }
}