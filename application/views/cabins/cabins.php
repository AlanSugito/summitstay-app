<div class="row py-4 w-100"></div>
<div class="row py-5 w-100"></div>
<div class="px-4">
  <?php if ($this->session->has_userdata("id")): ?>
      <div class="pb-3 px-4">
        <h3 class="text-md my-3 fade-slide">Selamat Datang, <?= $user->first_name ?></h3>
        <p class="text-mid fade delay-1s">Siap memulai perjalanan baru?</p>
      </div>
  <?php endif; ?>
  <div class="row">
    <?php foreach ($cabins as $cabin): ?>
                          <div class="col-3 mb-5 ">
                              <a href="cabin/detail/<?= $cabin["id"] ?>" class="text-decoration-none">
                                <div class="card border-0 rounded-3 overflow-hidden cursor-pointer" style="width: 19rem;">
                                <div id="carouselExample<?= $cabin["id"] ?>" class="carousel slide">
                                    <div class="carousel-inner">
                                      <?php for ($i = 0; $i < count($cabin["pictures"]); $i++): ?>
                                                  <?php $picture = $cabin["pictures"][$i] ?>
                                                  <div class="carousel-item <?= $i == 0 ? "active" : "" ?> card-img">
                                                    <img src="<?= base_url("/assets/images/cabins") ?>/<?= $picture["source"] ?>" class="d-block card-img" alt="...">
                                                  </div>
                                      <?php endfor; ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $cabin["id"] ?>" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon slide-btn" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $cabin["id"] ?>" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                                  <div class="card-body px-0 py-2">
                                    <h4 class="card-text text-md"><?= $cabin["name"] ?></h4>
                                    <p class="text-secondary text-sm"><?= $cabin["bedrooms_total"] ?> Kamar Tidur, <?= $cabin["bathrooms_total"] ?> Kamar mandi</p>
                              
                                    <h4 class="card-text text-mid"><?= formatToIDR($cabin["price_per_night"]) ?> / <span class="text-thick">Malam</span></h4>
                                  </div>
                                </div>
                              </a>
                            </div>
      <?php endforeach; ?>
</div>