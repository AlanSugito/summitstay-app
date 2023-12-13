<?php

class Service extends CI_Controller
{
  public function update_service()
  {
    $service_id = $this->uri->segment(3);
    $data["name"] = $this->input->post("name", true);
    $data["short_desc"] = $this->input->post("short_desc", true);

    $this->ServiceModel->update_service($service_id, $data);

    redirect("admin/services");
  }




  public function add_service()
  {
    $this->form_validation->set_rules("name", "Name", "required", ["required" => "Nama layanan harus di isi"]);
    $this->form_validation->set_rules("short_desc", "Short Desc", "required", ["required" => "Deskripsi singkat harus di isi"]);
    $config['upload_path'] = './assets/icons';
    $config['allowed_types'] = 'jpg|png|jpeg';

    $this->load->library('upload', $config);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("addServiceError", $message[0]);

      redirect(base_url("admin/services#addService"));
      return;
    }


    if (!$this->upload->do_upload("icon")) {
      $this->session->set_flashdata("addServiceError", "Icon harus di isi");
      redirect("admin/services#addService");
      return;
    }
    $data["name"] = $this->input->post("name", true);
    $data["short_desc"] = $this->input->post("short_desc", true);
    $data["icon"] = $this->upload->data("file_name");

    $isSuccess = $this->ServiceModel->add($data);

    if (!$isSuccess) {
      $this->session->set_flashdata("ServiceError", "Oopss, server sedang bermasalah");
      redirect("admin/services");
      return;
    }

    redirect("admin/services");
  }

  public function delete_service()
  {
    $serviceId = $this->uri->segment(3);

    $isSuccess = $this->ServiceModel->delete($serviceId);

    if (!$isSuccess) {
      $this->session->set_flashdata("ServiceError", "Oopss, server sedang bermasalah");
      redirect("admin/services");
      return;
    }

    redirect("admin/services");
  }
}