<?php

class FacilityService extends CI_Controller
{
  public function add_facility()
  {
    $this->form_validation->set_rules("name", "Name", "required", ["required" => "Nama fasilitas harus diisi"]);
    $config['upload_path'] = './assets/icons';
    $config['allowed_types'] = 'jpg|png|jpeg';

    $this->load->library('upload', $config);

    if ($this->form_validation->run() === false) {
      $message = explode("-", validation_errors("<span>", "</span>-"));
      $this->session->set_flashdata("addFacilityError", $message[0]);

      redirect(base_url("admin/facilities#addFacility"));
      return;
    }


    if (!$this->upload->do_upload("icon")) {
      $this->session->set_flashdata("addFacilityError", "Icon Harus diisi");
      redirect("admin/facilities#addFacility");
      return;
    }
    $data["name"] = $this->input->post("name", true);
    $data["icon"] = $this->upload->data("file_name");

    $isSuccess = $this->FacilityModel->add($data);

    if (!$isSuccess) {
      $this->session->set_flashdata("addFacilityError", "Oopss, server sedang bermasalah");
      redirect("admin/facilities");
      return;
    }

    redirect("admin/facilities");
  }
  public function update_facility()
  {
    $facility_id = $this->uri->segment(3);
    $data["name"] = $this->input->post("name", true);

    $this->FacilityModel->update_facility($facility_id, $data);

    redirect("admin/facilities");
  }

  public function delete_facility()
  {
    $facilityId = $this->uri->segment(3);

    $this->FacilityModel->delete_facility($facilityId);

    redirect("admin/facilities");
  }
}