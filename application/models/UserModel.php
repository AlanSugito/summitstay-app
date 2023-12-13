<?php

class UserModel extends CI_Model
{

  private $table = "users";

  public function register($data)
  {
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

    $result = $this->db->insert($this->table, $data);

    return $result;

  }

  public function login($email, $password)
  {
    $user = $this->getUserByEmail($email);

    if (!$user) {
      return false;
    }

    if (!password_verify($password, $user->password))
      return false;

    $credentials = $this->db->select("id, role")->where("email = '$email'")->from($this->table)->get()->row_array();
    return $credentials;
  }

  public function admin_login($email, $password)
  {
    $user = $this->getUserByEmail($email);

    if (!$user) {
      return false;
    }

    if ($user->role != "Admin")
      return false;

    if ($password != $user->password)

      return false;

    $credentials = $this->db->select("id, role")->where("email = '$email'")->from($this->table)->get()->row_array();
    return $credentials;
  }

  public function getUserByEmail($email)
  {
    return $this->db->get_where($this->table, ["email" => $email])->row();
  }

  public function get_user_profile($id)
  {
    $this->db->select("email, first_name, last_name, profile_picture, phone");
    $this->db->where("id = $id")->from($this->table);
    $data = $this->db->get()->row();

    return $data;
  }

  public function update_profile($userid, $data)
  {
    return $this->db->update($this->table, $data, "id = $userid");
  }

  public function update_profile_picture($userid, $filename)
  {
    return $this->db->update($this->table, ["profile_picture" => $filename], "id = $userid");
  }
}