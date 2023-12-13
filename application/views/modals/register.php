<div class="modal" tabindex="-1" id="registerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header position-relative">
        <div class="d-flex align-items-center gap-2">
          <img src="<?= base_url("/assets") ?>/images/logo.png" alt="">
          <h3 class="text-dark text-md"><a class="navbar-brand" href="#">SummitStay</a></h3>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-dark text-center my-4">Daftar</h3>
         <form action="<?= base_url("authservice/register") ?>" method="post">
          <div class="d-flex flex-column gap-3 px-3 align-items-center">
            <div class="d-flex gap-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="first_name">Nama Depan</label>
                <input type="text" name="first_name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('first_name') ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="last_name">Nama Belakang</label>
                <input type="text" name="last_name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('last_name') ?>">
              </div>
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="email">No. Hp</label>
              <input type="text" name="phone" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email" value="<?= set_value('phone') ?>">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="email">Email</label>
              <input type="email" name="email" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email" value="<?= set_value('email') ?>">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="password">Password</label>
              <input type="password" name="password" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Password" value="<?= set_value('password') ?>">
            </div>
            <p class="text-danger align-self-start"><?= $this->session->flashdata("registerError") ?></p>
            <button class="btn bg-primary w-75"><span class="text-md text-white text-btn">Daftar</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>