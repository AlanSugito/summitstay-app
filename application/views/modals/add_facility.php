<div class="modal" tabindex="-1" id="addFacilityModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Fasilitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3 d-flex flex-column gap-3">
      <?php if ($this->session->flashdata("addFacilityError")): ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata("addFacilityError") ?>
          </div>
        <?php endif; ?>
        <?= form_open_multipart("facilityservice/add_facility") ?>
          <div class="d-flex align-items-center gap-3">
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Nama</label>
                <input type="text" name="name" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan nama" value="<?= set_value('first_name') ?>">
              </div>
              <div class="d-flex flex-column gap-2 w-100">
                <label for="name">Icon</label>
                <div class="d-flex flex-column gap-3 align-items-center">
                <div class="btn position-relative bg-primary d-flex justify-content-center w-100 overflow-hidden">
                  <input type="file" name="icon" class="position-absolute opacity-0">
                  <span class="text-btn">Upload</span>
              </div>
              </div>
            </div>
          </div>               
             <button type="submit" class="btn bg-primary w-100 mt-3 mb-2"><span class="text-btn">Simpan</span></button>
        </form>
      </div>
    </div>
  </div>
</div>