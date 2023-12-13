<div class="vh-100 d-flex justify-content-center align-items-center">
  <div class="card border-0 shadow" style="width: 25rem">
  <div class="d-flex align-items-center">
    <img class="object-fit-contain" style="width: 100px" src="<?= base_url("/assets/images/logo.png") ?>" alt="Logo" >
    <h3 class="text-mid">SummitStay</h3>
  </div>
  <hr class="w-75 mx-auto">
    <div class="card-body p-3">
      <h3 class="text-center">Admin</h3>
      <form action="<?= base_url("authservice/admin_login") ?>" method="post">
      <div class="d-flex flex-column gap-3">
        <div class="d-flex flex-column gap-2">
          <label for="email">Email</label>
          <input class="py-2 px-3 border-1 border-secondary outline-none rounded" type="email" name="email">
        </div>
        <div class="d-flex flex-column gap-2">
          <label for="email">Password</label>
          <input class="py-2 px-3 border-1 border-secondary outline-none rounded" type="password" name="password">
        </div>
        <span class="text-danger"><?= $this->session->flashdata("adminLoginError") ?></span>
        <button class="btn bg-primary w-100 my-3"><span class="text-btn">Masuk</span></button>
      </div>
    </form>
    </div>
  </div>
</div>