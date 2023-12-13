<?php

class Cabin extends CI_Controller
{

  public function detail()
  {
    if ($this->session->has_userdata("id")) {
      $userid = $this->session->userdata("id");
      $data["user"] = $this->UserModel->get_user_profile($userid);
    }

    $cabinid = $this->uri->segment(3);
    $data["cabin"] = $this->CabinModel->getDetail($cabinid);
    $data["cabin"]["discount"] = $data["cabin"]["discount"] / 100;

    $this->load->view("partials/header");
    $this->load->view("navigation/topbar", $data);
    $this->load->view("cabins/cabin-pictures", $data);
    $this->load->view("cabins/cabin-detail", $data);
    $this->load->view("modals/login");
    $this->load->view("modals/register");
    $this->load->view("partials/footer");
  }


  public function check_in()
  {
    setCheckInRules($this);
    $cabin_id = $this->uri->segment(3);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("checkInError", $message[0]);
      redirect(base_url("cabin/detail/$cabin_id"));
      return;
    }

    $cabin = $this->CabinModel->getDetail($cabin_id);
    $data["cabin"] = $cabin;
    $data["transaction"]["check_in"] = date_create($this->input->post("check_in", true));
    $data["transaction"]["check_out"] = date_create($this->input->post("check_out", true));
    $data["transaction"]["transaction_id"] = uniqid("#");
    $data["transaction"]["amount"] = date_create($this->input->post("check_in", true));
    $data["transaction"]["user_id"] = $this->session->userdata("id");
    $data["transaction"]["cabin_id"] = $cabin_id;
    $data["discount"] = $cabin["price_per_night"] * ($cabin["discount"] / 100);
    $data["PPN"] = $cabin["price_per_night"] * 0.1;

    $data["days"] = date_diff($data["transaction"]["check_in"], $data["transaction"]["check_out"])->days;
    $data["transaction"]["amount"] = $cabin["price_per_night"] * (int) $data["days"] + $data["PPN"] - $data["discount"];

    $this->load->view("partials/header");
    $this->load->view("modals/invoice", $data);
    $this->load->view("partials/footer");

    $this->TransactionModel->create($data["transaction"]);

  }
}