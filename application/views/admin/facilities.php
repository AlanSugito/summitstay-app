<div class="col-9 py-4 d-flex flex-column gap-3">
  <h3>Fasilitas</h3>
<div class="card border-0 overflow-y-auto shadow w-100 mt-5" style="max-height: 500px">
    <div class="card-body p-3">
      <div class="d-flex justify-content-between align-items-center">
        <button class="btn bg-primary my-4" data-bs-toggle="modal" data-bs-target="#addFacilityModal"><span class="text-btn">Tambah</span></button>
        <form action="" method="get">
            <div class="d-flex align-items-center gap-2">
            <input class="p-2 rounded border-1 border-secondary outline-none" type="text" name="search" placeholder="Cari fasilitas">
            <button class="btn bg-primary p-2"><span class="text-btn">Cari</span></button>
          </div>
          </form>
      </div>
        <div>
        <table class="table table-hover table-bordered" ">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col" class="text-center">Nama</th>
              <th scope="col" class="text-center">Icon</th>
              <th scope="col" class="text-center">Aksi</th>

            </tr>
          </thead>
          <tbody >
          <?php if (count($facilities) == 0): ?>
                                        <td class="text-center" colspan="7">Belum ada data fasilitas</td>
            <?php endif; ?>
            <?php $no = 1 ?>
            <?php foreach ($facilities as $facility): ?>
                                      <tr>
                                        <th scope="row" class="text-center"><?= $no++ ?></th>
                                        <td class="text-center"><?= $facility->name ?></td>
                                        <td class="text-center"><img src="<?= base_url("/assets/icons/$facility->icon") ?>" alt="icon"></td>
                                        <td class="d-flex gap-2 justify-content-center align-items-center">
                                          <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateFacilityModal<?= $facility->id ?>"><img src="<?= base_url("/assets/icons/solar_pen-linear.png") ?>" alt=""></button>
                                          <button data-bs-toggle="modal" data-bs-target="#deleteFacilityModal<?= $facility->id ?>" class="btn bg-danger"><img src="<?= base_url("/assets/icons/ph_trash.png") ?>" alt=""></button>
                                        </td>
                                      </tr>
                                      <?php $data = ["name" => "fasilitas", "modalId" => "deleteFacilityModal", "controller" => "facilityservice", "method" => "delete_facility", "id" => $facility->id, "facility_name" => $facility->name] ?>
                                      <?php $this->load->view("modals/alert_delete", $data) ?>
                                      <?php $this->load->view("modals/update_facility", $data) ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</div>