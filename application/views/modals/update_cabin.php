<div class="modal" tabindex="-1" id="updateCabinModal<?= $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kabin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 d-flex flex-column">
        <?php if ($this->session->flashdata("updateCabinError")): ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata("updateCabinError") ?>
          </div>
        <?php endif; ?>
        <?= form_open_multipart("cabinservice/update_cabin/" . $id) ?>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Nama Kabin</label>
                <input type="text" name="name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('name', $cabin_name) ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Harga per malam</label>
                <input type="number" name="price_per_night" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan harga" value="<?= set_value('price_per_night', $price_per_night) ?>">
              </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Diskon (%)</label>
                <input type="number" min="0"  name="discount" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan diskon" value="<?= set_value('discount', $discount) ?>">
              </div>

          </div>
 
          <div class="d-flex flex-column gap-2 w-100 mb-3">
              <label for="name">Deskripsi</label>
              <textarea name="description" style="height: 150px;" class="rounded border-secondary py-2 px-3"><?= $description ?></textarea>
          </div>
          <button type="submit" class="btn bg-primary w-100 mt-3 mb-2"><span class="text-btn">Simpan</span></button>
        </form>
      </div>
    </div>
  </div>
</div>