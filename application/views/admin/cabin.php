<div class="col-9 py-4 d-flex flex-column ">
  <h3>Kabin</h3>
<div class="card border-0 overflow-y-auto shadow w-100 m-2" style="max-height: 500px">
    <div class="card-body p-3">
      <div class="d-flex justify-content-between align-items-center">
        <button class="btn bg-primary my-4" data-bs-toggle="modal" data-bs-target="#addCabinModal"><span class="text-btn">Tambah</span></button>
        <form action="" method="get">
            <div class="d-flex align-items-center gap-2">
            <input class="p-2 rounded border-1 border-secondary outline-none" type="text" name="search" placeholder="Cari fasilitas">
            <button class="btn bg-primary p-2"><span class="text-btn">Cari</span></button>
          </div>
          </form>
      </div>
        <div>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col" class="text-center">Nama Kabin</th>
              <th scope="col" class="text-center">Jumlah Kamar</th>
              <th scope="col" class="text-center">Jumlah Kamar Mandi</th>
              <th scope="col" class="text-center">Jumlah tamu Max</th>
              <th scope="col" class="text-center">Harga per Malam</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($cabins) == 0): ?>
                      <td class="text-center" colspan="7">Belum ada data kabin</td>

            <?php endif; ?>
            <?php $no = 1 ?>
            <?php foreach ($cabins as $cabin): ?>
                                        <tr>
                                          <th scope="row" class="text-center"><?= $no++ ?></th>
                                          <td class="text-center"><?= $cabin->name ?></td>
                                          <td class="text-center"><?= $cabin->bedrooms_total ?></td>
                                          <td class="text-center"><?= $cabin->bathrooms_total ?></td>
                                          <td class="text-center"><?= $cabin->max_guest ?></td>
                                          <td class="text-center"><?= formatToIDR($cabin->price_per_night) ?></td>
                                          <td class="d-flex gap-2 justify-content-center align-items-center">
                                            <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateCabinModal<?= $cabin->id ?>"><img src="<?= base_url("/assets/icons/solar_pen-linear.png") ?>" alt=""></button>
                                            <button data-bs-toggle="modal" data-bs-target="#deleteCabinModal<?= $cabin->id ?>" class="btn bg-danger delete-cabin-btn"><img src="<?= base_url("/assets/icons/ph_trash.png") ?>" alt=""></button>
                                          </td>
                                        </tr>
                                      <?php $data = ["name" => "kabin", "modalId" => "deleteCabinModal", "controller" => "cabinservice", "method" => "delete_cabin", "id" => $cabin->id, "cabin_name" => $cabin->name, "discount" => $cabin->discount, "price_per_night" => $cabin->price_per_night, "description" => $cabin->description] ?>
                                      <?php $this->load->view("modals/alert_delete", $data) ?>
                                      <?php $this->load->view("modals/update_cabin", $data) ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</div>