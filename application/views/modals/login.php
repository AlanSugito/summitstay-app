<div class="modal" tabindex="-1" id="loginModal">
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
        <h3 class="text-dark text-center my-4">Masuk</h3>
        <form action="<?= base_url("authservice/user_login") ?>" method="post">
          <div class="d-flex flex-column gap-3 px-4 align-items-center">
            <div class="d-flex flex-column gap-2 w-100">
              <label for="email">Email</label>
              <input type="email" name="email" value="<?= set_value("email") ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="password">Password</label>
              <input type="password" name="password" value="<?= set_value("password") ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Password">
            </div>
            <p class="text-danger align-self-start"><?= $this->session->flashdata("loginError") ?></p>
            <button class="btn bg-primary w-75"><span class="text-md text-white text-btn">Masuk</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>