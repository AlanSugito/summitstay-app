<div class="modal" tabindex="-1" id="<?= $modalId . $id ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus <?= $name ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-mid text-center">Yakin ingin menghapus data <?= $name ?>?</h4>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="text-btn">Batal</span></button>
          <a type="button" class="btn btn-danger" href="<?= base_url("$controller/$method/$id") ?>"><span class="text-btn">Hapus</span></a>
        </div>
      </div>
    </div>
  </div>