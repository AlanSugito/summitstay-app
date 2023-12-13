<?php

class CabinService extends CI_Controller
{
  private function parseFacilites($cabinId, $facilities)
  {
    $data = [];
    foreach ($facilities as $facility) {
      $data[] = ["cabin_id" => $cabinId, "facility_id" => $facility];
    }

    return $data;
  }
  private function parseServices($cabinId, $services)
  {
    $data = [];
    foreach ($services as $service) {
      $data[] = ["cabin_id" => $cabinId, "service_id" => $service];
    }

    return $data;
  }

  public function add_cabin()
  {
    setAddCabinRules($this);
    $cabin["name"] = $this->input->post("name", true);
    $cabin["bedrooms_total"] = $this->input->post("bedrooms_total", true);
    $cabin["bathrooms_total"] = $this->input->post("bathrooms_total", true);
    $cabin["price_per_night"] = $this->input->post("price_per_night", true);
    $cabin["description"] = $this->input->post("description", true);
    $cabin["discount"] = $this->input->post("discount", true);
    $cabin["max_guest"] = $this->input->post("max_guest", true);
    $cabin_pictures = $this->upload_cabin_pictures($_FILES["cabin_pictures"]);
    $cabin_facilities = $this->input->post("facilities[]", true);
    $cabin_services = $this->input->post("services[]", true);

    if (!$cabin_pictures) {
      $this->session->set_flashdata("addCabinError", "Masukan Gambar minimal 1 gambar");

      redirect("admin/cabins#addCabin");
      return;
    }



    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("addCabinError", $message[0]);

      redirect("admin/cabins#addCabin");
      return;
    }

    $cabin_id = $this->CabinModel->addCabin($cabin)->id;

    if (!$cabin_id) {
      $this->session->set_flashdata("addCabinError", "Oopss, server sedang bermasalah");
      redirect("admin/cabins#addCabin");
      return;
    }

    $cabin_facilities = $this->parseFacilites($cabin_id, $cabin_facilities);
    $cabin_services = $this->parseServices($cabin_id, $cabin_services);


    $this->CabinFacilityModel->add($cabin_facilities);
    $this->CabinServiceModel->add($cabin_services);

    $isSuccess = $this->PictureModel->add($cabin_id, $cabin_pictures);

    if (!$isSuccess) {
      $this->session->set_flashdata("addCabinError", "Oopss, server sedang bermasalah");
      redirect(base_url("admin/cabins#addCabin"));
      return;
    }

    redirect("admin/cabins");
  }

  private function upload_cabin_pictures($files)
  {
    $config['upload_path'] = './assets/images/cabins';
    $config['allowed_types'] = 'jpg|png|jpeg';

    $this->load->library('upload', $config);
    $images = [];
    foreach ($files['name'] as $key => $image) {
      $_FILES['cabin_pictures[]']['name'] = $files['name'][$key];
      $_FILES['cabin_pictures[]']['type'] = $files['type'][$key];
      $_FILES['cabin_pictures[]']['tmp_name'] = $files['tmp_name'][$key];
      $_FILES['cabin_pictures[]']['error'] = $files['error'][$key];
      $_FILES['cabin_pictures[]']['size'] = $files['size'][$key];

      $splittedName = explode(" ", $image);

      $fileName = uniqid("cabin_") . join("_", $splittedName);

      $images[] = $fileName;

      $config['file_name'] = $fileName;

      $this->upload->initialize($config);

      if ($this->upload->do_upload('cabin_pictures[]')) {
        $this->upload->data();

      } else {
        return false;
      }
    }

    return $images;

  }

  public function update_cabin()
  {
    setUpdateCabinRules($this);

    $cabin_id = $this->uri->segment(3);
    $cabin["name"] = $this->input->post("name", true);
    $cabin["price_per_night"] = $this->input->post("price_per_night", true);
    $cabin["description"] = $this->input->post("description", true);
    $cabin["discount"] = $this->input->post("discount", true);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("updateCabinError", $message[0]);

      redirect(base_url("admin/cabins#updateCabin"));
      return;
    }

    $this->CabinModel->update_cabin($cabin_id, $cabin);

    redirect("admin/cabins");
  }

  public function delete_cabin()
  {
    $cabin_id = $this->uri->segment(3);

    $this->CabinModel->delete_cabin($cabin_id);

    redirect("admin/cabins");
  }

}