<nav class="navbar bg-body-tertiary shadow px-4 fixed-top">
  <div class="container-fluid">
    <div class="d-flex align-items-center gap-2">
      <img src="<?= base_url("/assets") ?>/images/logo.png" alt="">
      <h3 class="text-dark"><a class="navbar-brand" href="<?= base_url("home") ?>">SummitStay</a></h3>
    </div>
    <div>
      <form action="<?= base_url("home") ?>" method="GET" class="search-bar shadow rounded-pill p-2">
        <input class="w-100" type="text" placeholder="Cari kamar favorit anda...." name="search">
        <button class="btn rounded-circle bg-primary p-2">
          <img src="<?= base_url("/assets") ?>/icons/search.png" alt="search-icon">
        </button>
      </form>
    </div>
    <div class="shadow rounded-pill d-flex align-items-center px-3 py-1 gap-3 cursor-pointer dropdown">
      <button class="border-0 bg-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url("/assets") ?>/icons/hamburger.png" alt="humberger-menu">
      </button>
      <div class="rounded-circle overflow-hidden">
        <?php $profile_picture = $this->session->has_userdata("id") ? $user->profile_picture : "avatar.png" ?>
        <img class="topbar-picture" src="<?= base_url("/assets/images/profile_pictures") ?>/<?= $profile_picture ?>" alt="" class="avatar">
      </div>
      <ul class="dropdown-menu border-0 shadow">
        <?php if (!$this->session->has_userdata("id")) { ?>
                  <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</li>
                  <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</li>
        <?php } else { ?>
                  <li class="dropdown-item"><a class="text-decoration-none text-dark" href="<?= base_url() ?>profile">Profil</a></li>
                <li class="dropdown-item"><a class="text-decoration-none text-dark" href="<?= base_url() ?>authservice/user_logout">Keluar</a></li>
        <?php } ?>
        <hr>
        <li><a class="dropdown-item" href="#">Pusat Bantuan</a></li>
      </ul>
    </div>
  </div>
</nav>