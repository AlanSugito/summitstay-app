<div class="py-4 px-5">
  <div class="row">
    <div class="col-5">
      <h2 class="text-lg"><?= $cabin["name"] ?></h2>
      <div>
        <span class="text-secondary text-sm"><?= $cabin["bedrooms_total"] ?> Kamar Tidur, <?= $cabin["bathrooms_total"] ?> Kamar Mandi</span>
      </div>
      <hr>
      <div class="d-flex flex-column py-3">
        <?php foreach ($cabin["services"] as $service): ?>
                                                                <div class="d-flex gap-2 align-items-start">
                                                                  <img src="<?= base_url("/assets/icons") ?>/<?= $service["icon"] ?>" alt="">
                                                                  <div class="d-flex flex-column gap-2">
                                                                    <span class="text-mid"><?= $service["name"] ?></span>
                                                                    <p class="text-mid"><?= $service["short_desc"] ?></p>
                                                                  </div>
                                                                </div>
          <?php endforeach; ?>
      </div>
      <hr>
      <div class="py-3">
        <h3 class="text-md">Tentang Tempat Ini</h3>
        <p class="text-mid"><?= $cabin["description"] ?></p>
      </div>
      <hr>
      <div class="py-3">
        <h3 class="text-md">Fasilitas</h3>
        <div class="py-3 row w-50">
          <?php foreach ($cabin["facilities"] as $facility): ?>
                                      <div class="col-6 mb-2 d-flex gap-2 align-items-center">
                                        <img src="<?= base_url("/assets/icons") ?>/<?= $facility["icon"] ?>" alt="">
                                          <span class="text-mid"><?= $facility["name"] ?></span>
                                      </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="col-7 d-flex justify-content-center position-relative">
    <div class="card checkout-card py-3 px-2 border-0 shadow" style="width: 65%; height: max-content;">
      <div class="card-body">

        <h5 class="card-title text-md"><?= formatToIDR($cabin["price_per_night"]) ?> / <span class="text-mid">Malam</span></h5>
        <?php if ($this->session->flashdata("checkInError")): ?>
          <div class="alert alert-danger">
            <?= $this->session->flashdata("checkInError") ?>
          </div>
        <?php endif; ?>
        <form action="<?= base_url("cabin/check_in/" . $cabin["id"]) ?>" method="POST">
          <div class="d-flex gap-2 align-items-center py-4">
            <div class="border border-dark p-2 d-flex flex-column gap-3 w-100">
              <p class="text-sm">Check In</p>
              <input class="date-input text-mid" type="date" name="check_in" value="<?= set_value("check_in") ?>">
            </div>
            <div class="border border-dark p-2 d-flex flex-column gap-3 w-100">
              <p class="text-sm">Check Out</p>
              <input class="date-input text-mid" type="date" name="check_out" value="<?= set_value("check_out") ?>">
            </div>
          </div>
            <div class="border border-dark p-2 d-flex flex-column gap-1 w-100">
              <p class="text-sm">Tamu</p>
              <p class="text-mid">Max <?= $cabin["max_guest"] ?> orang</p>
            </div>
            <div class="py-3">
              <?php if ($this->session->has_userdata("id")) { ?>
                                  <button class="btn bg-primary w-100"><span class="text-btn">Pesan</span></button>
              <?php } else { ?>
                                  <div class="btn bg-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal"><span class="text-btn">Pesan</span></div>
                <?php } ?>
            </div>
            <h3 class="py-3 text-mid">Total Biaya</h3>
          
            <div class="d-flex flex-column gap-3">
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-sm">Diskon</span>
                <span class="text-sm"><?= formatToIDR($cabin["price_per_night"] * $cabin["discount"], "IDR") ?></span>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-sm">PPN</span>
                <span class="text-sm"><?= formatToIDR($cabin["price_per_night"] * 0.1, "IDR") ?></span>
              </div>

        </form>
      </div>
    </div>
    </div>
  </div>
</div>