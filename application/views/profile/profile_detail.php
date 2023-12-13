<div class="col-4">
  <div class="py-4 px-5 d-flex flex-column gap-5">
    <?= $this->session->flashdata("uploadError") ?>
    <?= $this->session->flashdata("updateError") ?>
    <div class="card border-0 shadow" style="width: 400px;">
      <div class="card-body">
        <div class="d-flex flex-column gap-3 align-items-center">
          <div class="position-relative">
            <img class="profile-img rounded-circle" src="<?= base_url("/assets/images/profile_pictures") ?>/<?= $user->profile_picture ?>" alt="">
              <button class="btn img-profile-input bg-primary d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#uploadPictureModal">
                <img src="<?= base_url("/assets/icons/solar_pen-linear.png") ?>" alt="" srcset="">
              </button>
          </div>
          <div>
            <h2><?= $user->first_name . " " . $user->last_name ?></h2>
            <p class="text-mid text-center">Guest</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card p-3" style="width: 400px;">
      <h3 class="text-md">Profil</h3>
      <div class="d-flex flex-column gap-3">
        <div class="d-flex justify-content-between">
          <span class="text-mid">Email</span>
          <span class="text-mid"><?= $user->email ?></span>
        </div>
        <div class="d-flex justify-content-between">
          <span class="text-mid">No. Telephone</span>
          <span class="text-mid"><?= $user->phone ?></span>
        </div>
        <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal"><span class="text-btn">Ubah</span></button>
      </div>
    </div>
  </div>
</div>