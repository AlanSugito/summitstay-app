<div class="modal" tabindex="-1" id="addCabinModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kabin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 d-flex flex-column">
        <?php if ($this->session->flashdata("addCabinError")): ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata("addCabinError") ?>
              </div>
        <?php endif; ?>
        <?= form_open_multipart("cabinservice/add_cabin") ?>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Nama Kabin</label>
                <input type="text" name="name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('name') ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Harga per malam</label>
                <input type="number" name="price_per_night" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan harga" value="<?= set_value('price_per_night') ?>">
              </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Diskon (%)</label>
                <input type="number" min="0"  name="discount" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan diskon" value="<?= set_value('discount', 0) ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Fasilitas</label>
                <button class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown"><span class="text-btn">Pilih</span></button>
                <div class="dropdown-menu overflow-y-scroll overflow-x-hidden p-2" style="width: 400px; height: 200px;">
              <div class="row gap-3">
                <?php foreach ($facilities as $facility): ?>    
                          <div class="col-4 d-flex align-items-center gap-2">
                            <input type="checkbox" class="form-check-input" name="facilities[]" value="<?= $facility->id ?>" >
                            <div class="d-flex align-items-center gap-2">
                              <img src="<?= base_url("/assets/icons/$facility->icon") ?>" alt="">
                              <span><?= $facility->name ?></span>
                            </div>
                          </div>
               <?php endforeach; ?>
              </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Jumlah Kamar</label>
                <input type="number" min="1"  name="bedrooms_total" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan jumlah kamar" value="<?= set_value('bedrooms_total', 2) ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Layanan</label>
                <button class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown"><span class="text-btn">Pilih</span></button>
                <div class="dropdown-menu overflow-y-scroll overflow-x-hidden p-2" style="width: 400px; height: 200px;">
              <div class="row gap-3">

                <?php foreach ($services as $service): ?>
                    <div class="col-4 d-flex align-items-center gap-2">
                      <input type="checkbox" class="form-check-input" value="<?= $service->id ?>" name="services[]" >
                      <div class="d-flex align-items-center gap-2">
                        <img src="<?= base_url("/assets/icons/$service->icon") ?>" alt="">
                        <span><?= $service->name ?></span>
                      </div>
                    </div>
               <?php endforeach; ?>
                </div>
            </div>
                </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Jumlah Kamar Mandi</label>
                <input type="number" name="bathrooms_total" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('bathrooms_total', 1) ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Gambar (max 5)</label>
                <div class="d-flex flex-column gap-3 align-items-center">
                  <div class="btn position-relative bg-primary d-flex justify-content-center w-100 overflow-hidden">
                <input type="file" multiple class="position-absolute opacity-0" name="cabin_pictures[]">
                <span class="text-btn">Upload</span>
              </div>
              </div>
            </div>
          </div>  
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Jumlah Tamu Maksimal</label>
                <input type="number" min="1" name="max_guest" class="border border-secondary px-3 py-2 rounded w-25" placeholder="Masukan jumlah tamu maksimal" value="<?= set_value('max_guest', 1) ?>">
              </div>
          </div>  
          <div class="d-flex flex-column gap-2 w-100 mb-3">
              <label for="name">Deskripsi</label>
              <textarea name="description" style="height: 150px;" class="rounded border-secondary py-2 px-3"></textarea>
          </div>
          <button type="submit" class="btn bg-primary w-100 mt-3 mb-2"><span class="text-btn">Simpan</span></button>
        </form>
      </div>
    </div>
  </div>
</div>