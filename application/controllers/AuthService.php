<?php

class AuthService extends CI_Controller
{
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
      redirect(base_url("home#register"));
      return;
    }


    if ($this->isUserExist($data["email"])) {
      $this->session->set_flashdata("validation", "Email sudah terpakai");
      redirect(base_url("home#register"));
      return;
    }

    $success = $this->UserModel->register($data);

    if ($success) {
      $this->session->set_flashdata("registration", "<div class='alert alert-success' role='alert>Akun sukses terdaftar</div>");
      redirect(base_url("home"));
    } else {
      $this->session->set_flashdata("registration", "<div class='alert alert-danger' role='alert>Oopss ada masalah di server</div>");
      redirect(base_url("home#register"));
    }
  }

  public function user_login()
  {
    setLoginRules($this);
    $email = $this->input->post("email", true);
    $password = $this->input->post("password", true);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("loginError", $message[0]);
      redirect(base_url("home#login"));
      return;
    }

    $userData = $this->UserModel->login($email, $password);

    if (!$userData) {
      $this->session->set_flashdata("loginError", "Email atau Password salah");
      redirect(base_url("home#login"));
      return;
    }

    $this->session->set_userdata($userData);
    redirect(base_url("home"));
  }

  public function admin_login()
  {
    $email = $this->input->post("email", true);
    $password = $this->input->post("password", true);

    $userData = $this->UserModel->admin_login($email, $password);

    if (!$userData) {
      $this->session->set_flashdata("adminLoginError", "Email atau Password salah");
      redirect("admin/login");
      return;
    }

    $this->session->set_userdata($userData);

    redirect("admin/dashboard");
  }

  public function user_logout()
  {
    $this->session->unset_userdata(["id", "role"]);
    redirect(base_url("home"));
  }

  public function admin_logout()
  {
    $this->session->unset_userdata(["id", "role"]);
    redirect("admin/login");
  }
}