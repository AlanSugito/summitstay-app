<?php

class PictureModel extends CI_Model
{
  private $table = "pictures";

  public function add($cabin_id, $sources)
  {
    var_dump($sources);
    $data = [];
    foreach ($sources as $source) {
      $data[] = ["source" => $source, "cabin_id" => $cabin_id];
    }

    return $this->db->insert_batch($this->table, $data);
  }
}