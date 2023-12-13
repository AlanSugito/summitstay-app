<?php


function setRegisterRules($instance)
{
  $instance->form_validation->set_rules("first_name", "First name", 'required', ["required" => "Nama depan harus di isi"]);
  $instance->form_validation->set_rules("phone", "Phone", 'required|is_natural', ["required" => "No Hp harus di isi", "is_natural" => "Format No Hp harus benar"]);
  $instance->form_validation->set_rules("email", "Email", 'required|valid_email', ["required" => "Email harus di isi", "valid_email" => "Format email harus benar"]);
  $instance->form_validation->set_rules("password", "Password", 'required|min_length[6]', ["required" => "Password harus di isi", "min_length" => "Password harus setidaknya 6 karakter"]);
}

function setLoginRules($instance)
{
  $instance->form_validation->set_rules("email", "Email", 'required|valid_email', ["required" => "Email harus di isi", "valid_email" => "Format email harus benar"]);
  $instance->form_validation->set_rules("password", "Password", 'required', ["required" => "Password harus di isi"]);
}

function setUpdateProfileRule($instance)
{
  $instance->form_validation->set_rules("first_name", "First name", 'required', ["required" => "Nama depan harus di isi"]);
  $instance->form_validation->set_rules("phone", "Phone", 'required|is_natural', ["required" => "No Hp harus di isi", "is_natural" => "Format No Hp harus benar"]);
  $instance->form_validation->set_rules("email", "Email", 'required|valid_email', ["required" => "Email harus di isi", "valid_email" => "Format email harus benar"]);
}

function setAddCabinRules($instance)
{
  $instance->form_validation->set_rules("name", "Cabin name", "required", ["required" => "Nama Kabin harus diisi"]);
  $instance->form_validation->set_rules("price_per_night", "Price per night", "required", ["required" => "Harga per malam Kabin harus diisi"]);
  $instance->form_validation->set_rules("description", "Description", "required", ["required" => "Deskripsi Kabin harus diisi"]);
  $instance->form_validation->set_rules("facilities[]", "Facilities", "required", ["required" => "Pilih fasilitas kabin minimal 1"]);
  $instance->form_validation->set_rules("services[]", "Services", "required", ["required" => "Pilih layanan kabin minimal 1"]);
}
function setUpdateCabinRules($instance)
{
  $instance->form_validation->set_rules("name", "Cabin name", "required", ["required" => "Nama Kabin harus diisi"]);
  $instance->form_validation->set_rules("price_per_night", "Price per night", "required", ["required" => "Harga per malam Kabin harus diisi"]);
  $instance->form_validation->set_rules("description", "Description", "required", ["required" => "Deskripsi Kabin harus diisi"]);
}

function setCheckInRules($instance)
{
  $instance->form_validation->set_rules("check_in", "Check In", "required", ["required" => "Tanggal Check In Wajib Diisi"]);
  $instance->form_validation->set_rules("check_out", "Check Out", "required", ["required" => "Tanggal Check Out Wajib Diisi"]);
}