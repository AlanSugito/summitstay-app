<div class="col-9 py-4 d-flex flex-column gap-3">
  <h3>Dashboard</h3>
  <div class="d-flex gap-3 align-items-center">
    <div class="card border-0 shadow" style="width: 270px; height: 130px;">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div class="d-flex flex-column gap-2">
          <h4 class="text-mid">Kabin</h4>
          <p><?= $cabin_total ?> Unit</p>
        </div>
        <img src="<?= base_url("/assets/icons/cabin.png") ?>" alt="Cabin">
      </div>
    </div>
    <div class="card border-0 shadow" style="width: 270px; height: 130px;">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div class="d-flex flex-column gap-2">
          <h4 class="text-mid">Fasilitas</h4>
          <p><?= $facility_total ?> Fasilitas</p>
        </div>
        <img src="<?= base_url("/assets/icons/facility.png") ?>" alt="Facility">
      </div>
    </div>
    <div class="card border-0 shadow" style="width: 270px; height: 130px;">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div class="d-flex flex-column gap-2">
          <h4 class="text-mid">Layanan</h4>
          <p><?= $service_total ?> Layanan</p>
        </div>
        <img src="<?= base_url("/assets/icons/material-symbols_room-service.png") ?>" alt="Cabin">
      </div>
    </div>
  </div>
  <div class="card border-0 shadow w-100 mt-5">
    <div class="card-body p-3">
        <h3 class="text-mid">Transaksi terbaru</h3>
        <div>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Transaction id</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">Email</th>
              <th scope="col">Kabin</th>
              <th scope="col">Check in</th>
              <th scope="col">Check out</th>
            </tr>
          </thead>
          <tbody>
          <?php if (count($transactions) == 0): ?>
                    <td class="text-center" colspan="7">Belum ada data transaksi</td>

            <?php endif; ?>
            <?php foreach ($transactions as $transaction): ?>
                        <tr>
                          <td class="text-center"><?= $transaction->transaction_id ?> </td>
                          <td class="text-center"><?= $transaction->first_name . " " . $transaction->last_name ?></td>
                          <td class="text-center"><?= $transaction->email ?></td>
                          <td class="text-center"><?= $transaction->cabin_name ?></td>
                          <td class="text-center"><?= date_format(date_create($transaction->check_in), "d/m/Y") ?></td>
                          <td class="text-center"><?= date_format(date_create($transaction->check_out), "d/m/Y") ?></td>
                        </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</div>