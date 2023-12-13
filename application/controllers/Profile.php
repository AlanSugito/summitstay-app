<?php

class Profile extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    checkIsUserLogin();
  }

  public function index()
  {
    $userid = $this->session->userdata("id");
    $data["user"] = $this->UserModel->get_user_profile($userid);
    $data["transactions"] = $this->TransactionModel->getUserTransactions($userid);


    $this->load->view("partials/header");
    $this->load->view("navigation/topbar", $data);
    $this->load->view("modals/update_profile", $data);
    $this->load->view("modals/upload_picture");
    $this->load->view("profile/profile_container_start");
    $this->load->view("profile/profile_detail", $data);
    $this->load->view("profile/profile_transaction");
    $this->load->view("profile/profile_container_end");
    $this->load->view("partials/footer");
  }

  public function update_profile()
  {
    setUpdateProfileRule($this);
    $data["first_name"] = $this->input->post("first_name", true);
    $data["last_name"] = $this->input->post("last_name", true);
    $data["email"] = $this->input->post("email", true);
    $data["phone"] = $this->input->post("phone", true);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("updateProfileError", $message[0]);

      redirect("profile#update");
      return;
    }

    $userid = $this->session->userdata("id");
    $isSuccess = $this->UserModel->update_profile($userid, $data);

    if (!$isSuccess) {
      $this->session->set_flashdata("updateError", "<div class='alert alert-danger' role='alert'>
      Ooopss, server sedang ada masalah
    </div>");
    }

    redirect("profile");
  }

  public function update_profile_picture()
  {
    $config['upload_path'] = './assets/images/profile_pictures';
    $config['allowed_types'] = 'jpg|png|jpeg';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('profile_picture')) {
      $this->session->set_flashdata("uploadError", $this->upload->display_errors());
      redirect("profile");
      return;
    }

    $id = $this->session->userdata("id");
    $filename = $this->upload->data("file_name");
    $isSuccess = $this->UserModel->update_profile_picture($id, $filename);

    if (!$isSuccess) {
      $this->session->set_flashdata("updateError", "<div class='alert alert-danger' role='alert'>
      Ooopss, server sedang ada masalah
    </div>");
    }

    redirect("profile");
  }


}