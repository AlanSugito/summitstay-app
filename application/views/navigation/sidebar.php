<div class="col-3 d-flex">
  <nav class="nav bg-primary flex-column rounded w-75" style="height: 90vh;">
  <div class="d-flex flex-column gap-2 align-items-center py-3">
    <div class="bg-white rounded-circle p-2">
      <img src="<?= base_url("/assets/images/logo.png") ?>" alt="">
    </div>
    <h3 class="text-mid text-white">SummitStay</h3>
  </div>
  <div class="w-75 mx-auto bg-white mb-3" style="height: 2px"></div>
  <div class="d-flex flex-column gap-4 px-4">
    <div class="d-flex gap-2 align-items-center">
      <img src="<?= base_url("/assets/icons/dashboard.png") ?>" alt="dashboard">
      <a class="text-mid text-white text-decoration-none" href="<?= base_url("admin/dashboard") ?>">Dashboard</a>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <img src="<?= base_url("/assets/icons/cabin-nav.png") ?>" alt="cabin">
      <a class="text-mid text-white text-decoration-none" href="<?= base_url("admin/cabins") ?>">Kabin</a>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <img src="<?= base_url("/assets/icons/bed-nav.png") ?>" alt="facility">
      <a class="text-mid text-white text-decoration-none" href="<?= base_url("admin/facilities") ?>">Fasilitas</a>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <img src="<?= base_url("/assets/icons/service-nav.png") ?>" alt="service">
      <a class="text-mid text-white text-decoration-none" href="<?= base_url("admin/services") ?>">Layanan</a>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <img src="<?= base_url("/assets/icons/logout-nav.png") ?>" alt="logout">
      <a class="text-mid text-white text-decoration-none" href="<?= base_url("authservice/admin_logout") ?>">Keluar</a>
    </div>
  </div>
</nav>
</div>