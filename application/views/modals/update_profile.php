<div class="modal" tabindex="-1" id="updateProfileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-dark text-center my-4">Ubah Profile</h3>
        <form action="<?= base_url("profile/update_profile") ?>" method="post">
          <div class="d-flex flex-column gap-3 px-4 align-items-center">
            <div class="d-flex flex-column gap-2 w-100">
              <label for="frist_name">Nama depan</label>
              <input type="text" name="first_name" value="<?= set_value("first_name", $user->first_name) ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="last_name">Nama Belakang</label>
              <input type="text" name="last_name" value="<?= set_value("last_name", $user->last_name) ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="email">Email</label>
              <input type="email" name="email" value="<?= set_value("email", $user->email) ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email">
            </div>
            <div class="d-flex flex-column gap-2 w-100">
              <label for="phone">Phone</label>
              <input type="text" name="phone" value="<?= set_value("phone", $user->phone) ?>" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan no hp">
            </div>
            <p class="text-danger align-self-start"><?= $this->session->flashdata("updateProfileError") ?></p>
            <button class="btn bg-primary w-75"><span class="text-md text-white text-btn">Ubah</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>