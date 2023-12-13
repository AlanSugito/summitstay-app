<div class="modal" tabindex="-1" id="uploadPictureModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-dark text-center my-4">Ubah Foto Profil</h3>
        <?php echo form_open_multipart('profile/update_profile_picture'); ?>
          <div class="d-flex flex-column gap-3 px-4 align-items-center">
            <div class="d-flex flex-column gap-2 w-100">
              <label for="profile_picture">Foto</label>
              <input type="file" name="profile_picture" accept=".jpg,.png, .jpeg" class="border border-secondary px-3 py-2 rounded" placeholder="Masukan Email">
            </div>
            <p class="text-danger align-self-start"><?= $this->session->flashdata("udpateProfileError") ?></p>
            <button class="btn bg-primary w-75"><span class="text-md text-white text-btn">Ubah</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>