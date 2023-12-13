<?php

class Home extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata("role") != "Guest") {
      $this->session->unset_userdata(["id", "role"]);
    }
    $userid = $this->session->userdata("id");
    $isLimited = true;
    $search = "";
    if (isset($userid)) {
      $data["user"] = $this->UserModel->get_user_profile($userid);
      $isLimited = false;
    }


    if (isset($_GET["search"])) {
      $search = $_GET["search"];
    }

    $data["cabins"] = $this->CabinModel->getCabinsWithPictures($search, $isLimited);
    $this->load->view("partials/header");
    $this->load->view("modals/login");
    $this->load->view("modals/register");
    $this->load->view("navigation/topbar", $data);
    $this->load->view("cabins/cabins", $data);
    if (!$this->session->has_userdata("id")) {
      $this->load->view("cabins/cta");
    }
    $this->load->view("partials/footer");
  }

  private function isUserExist($email)
  {
    $user = $this->UserModel->getUserByEmail($email);

    if (!$user)
      return false;

    return true;
  }

  public function register()
  {
    setRegisterRules($this);

    $data["first_name"] = $this->input->post("first_name", true);
    $data["last_name"] = $this->input->post("last_name", true);
    $data["phone"] = $this->input->post("phone", true);
    $data["email"] = $this->input->post("email", true);
    $data["password"] = $this->input->post("password", true);
    $data["role"] = "Guest";

    if ($this->form_validation->run() === false) {

      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("registerError", $message[0]);
      redirect("home#register");
      return;
    }


    if ($this->isUserExist($data["email"])) {
      $this->session->set_flashdata("validation", "Email sudah terpakai");
      redirect("home#register");
      return;
    }

    $success = $this->UserModel->register($data);

    if ($success) {
      $this->session->set_flashdata("registration", "<div class='alert alert-success' role='alert>Akun sukses terdaftar</div>");
      redirect("home");
    } else {
      $this->session->set_flashdata("registration", "<div class='alert alert-danger' role='alert>Oopss ada masalah di server</div>");
      redirect("home#register");
    }
  }

  public function login()
  {
    setLoginRules($this);
    $email = $this->input->post("email", true);
    $password = $this->input->post("password", true);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("loginError", $message[0]);
      redirect("home#login");
      return;
    }

    $userData = $this->UserModel->login($email, $password);

    if (!$userData) {
      $this->session->set_flashdata("loginError", "Email atau Password salah");
      redirect("home#login");
      return;
    }

    $this->session->set_userdata($userData);
    redirect("home");
  }

  public function logout()
  {
    $this->session->unset_userdata(["id", "role"]);
    redirect("home");
  }
}