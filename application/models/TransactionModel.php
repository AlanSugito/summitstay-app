<?php

class TransactionModel extends CI_Model
{
  private $table = "transactions";

  public function create($data)
  {
    $data["check_in"] = date_format($data["check_in"], 'Y-m-d H:i:s');
    $data["check_out"] = date_format($data["check_out"], 'Y-m-d H:i:s');
    $this->db->insert($this->table, $data);
  }

  public function getUserTransactions($userId)
  {
    $this->db->select("transactions.*, cabins.name as cabin_name, cabins.price_per_night as cabins_price, cabins.discount, users.first_name, users.last_name");
    $this->db->from($this->table);
    $this->db->join("cabins", "cabins.id=transactions.cabin_id");
    $this->db->join("users", "users.id=transactions.user_id");
    $this->db->where("user_id=$userId");
    $this->db->order_by("created_at", "DESC");

    return $this->db->get()->result();
  }

  public function getAllTransactions()
  {
    $this->db->select("transactions.*, cabins.name as cabin_name, users.first_name, users.last_name, users.email");
    $this->db->from($this->table);
    $this->db->join("cabins", "cabins.id=transactions.cabin_id");
    $this->db->join("users", "users.id=transactions.user_id");
    $this->db->order_by("created_at", "DESC");

    return $this->db->get()->result();
  }
}