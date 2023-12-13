<?php

class Admin extends CI_Controller
{

  public function login()
  {
    $this->load->view("partials/header");
    $this->load->view("admin/login");
    $this->load->view("partials/footer");
  }


  public function dashboard()
  {
    checkAdminLogin();

    $data["cabin_total"] = $this->CabinModel->getCabinsCount();
    $data["facility_total"] = $this->FacilityModel->getFacilitiesCount();
    $data["service_total"] = $this->ServiceModel->getServicesCount();
    $data["transactions"] = $this->TransactionModel->getAllTransactions();
    $this->load->view("partials/header");
    $this->load->view("admin/admin_container_start");
    $this->load->view("navigation/sidebar");
    $this->load->view("admin/dashboard", $data);
    $this->load->view("admin/admin_container_end");
    $this->load->view("partials/footer");
  }
  public function cabins()
  {
    checkAdminLogin();
    $search = "";
    if (isset($_GET["search"])) {
      $search = $_GET["search"];
    }
    $data["cabins"] = $this->CabinModel->getCabins($search);
    $data["facilities"] = $this->FacilityModel->getFacilities();
    $data["services"] = $this->ServiceModel->get();



    $this->load->view("partials/header");
    $this->load->view("admin/admin_container_start");
    $this->load->view("navigation/sidebar");
    $this->load->view("admin/cabin", $data);
    $this->load->view("modals/add_cabin", $data);
    $this->load->view("admin/admin_container_end");
    $this->load->view("partials/footer");
  }
  public function facilities()
  {
    checkAdminLogin();
    $search = "";
    if (isset($_GET["search"])) {
      $search = $_GET["search"];
    }
    $data["facilities"] = $this->FacilityModel->getFacilities($search);
    $this->load->view("partials/header");
    $this->load->view("admin/admin_container_start");
    $this->load->view("navigation/sidebar");
    $this->load->view("admin/facilities", $data);
    $this->load->view("modals/add_facility");
    $this->load->view("admin/admin_container_end");
    $this->load->view("partials/footer");
  }
  public function services()
  {
    checkAdminLogin();
    $search = "";
    if (isset($_GET["search"])) {
      $search = $_GET["search"];
    }
    $data["services"] = $this->ServiceModel->get($search);

    $this->load->view("partials/header");
    $this->load->view("admin/admin_container_start");
    $this->load->view("navigation/sidebar");
    $this->load->view("admin/services", $data);
    $this->load->view("modals/add_service");
    $this->load->view("admin/admin_container_end");
    $this->load->view("partials/footer");
  }



}