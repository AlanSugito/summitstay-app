<?php

function checkIsUserLogin()
{
  $instance = get_instance();
  $isGuest = $instance->session->userdata("role") == "Guest";

  if (!$instance->session->has_userdata("id") || !$isGuest) {
    $instance->session->unset_userdata(["id", "role"]);
    redirect(base_url("home"));
    return;
  }

}

function checkAdminLogin()
{
  $instance = get_instance();
  $isAdmin = $instance->session->userdata("role") == "Admin";

  if (!$instance->session->has_userdata("id") || !$isAdmin) {
    $instance->session->unset_userdata(["id", "role"]);
    redirect(base_url("admin/login"));
    return;
  }

}