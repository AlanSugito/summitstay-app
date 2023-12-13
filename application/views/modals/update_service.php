<div class="modal" tabindex="-1" id="updateServiceModal<?= $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 d-flex flex-column gap-3">
        <?= form_open_multipart("service/update_service/" . $id) ?>
          <div class="d-flex align-items-center gap-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Nama</label>
                <input type="text" name="name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('name', $service_name) ?>">
              </div>
          </div>               
          <div class="d-flex flex-column gap-2 w-100 my-3">
              <label for="name">Deskripsi Singkat</label>
              <input type="text" name="short_desc" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan deskripsi singkat" value="<?= set_value('short_desc', $short_desc) ?>">
            </div>
             <button type="submit" class="btn bg-primary w-100 mt-3 mb-2"><span class="text-btn">Simpan</span></button>
        </form>
      </div>
    </div>
  </div>
</div>