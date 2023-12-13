<div class="d-flex flex-column gap-3 align-items-center justify-content-center vh-100">
  <div class="alert alert-success">
    Kabin Berhasil Dipesan!
  </div>
  <div class="card shadow border-0 fade" style="width: 25rem">
  <div class="card-header">
  <div class="d-flex align-items-center gap-2">
      <img src="<?= base_url("/assets") ?>/images/logo.png" alt="logo" style="width: 60px; height: 60px;">
      <h3 class="text-dark text-mid">SummitStay</h3>
    </div>
  </div>
    <div class="card-body p-3">
      <h3 class="text-md">Invoice</h3>
      <hr>
      <div class="d-flex justify-content-between">
        <div>
          <h4 class="text-mid">Total Biaya</h4>
          <h4 class="text-sm"><?= formatToIDR($transaction["amount"]) ?></h4>
        </div>
        <div>
          <h4 class="text-mid">ID Transaksi</h4>
          <h4 class="text-sm"><?= $transaction["transaction_id"] ?></h4>
        </div>
      </div>
      <hr>
      <div class="d-flex justify-content-between">
        <div class="text-center">
          <h4 class="text-mid">Check In</h4>
          <h4 class="text-sm"><?= date_format($transaction["check_in"], "d/m/Y") ?></h4>
        </div>
        <div class="text-center">
          <h4 class="text-mid">Check Out</h4>
          <h4 class="text-sm"><?= date_format($transaction["check_out"], "d/m/Y") ?></h4>
        </div>
      </div>
      <hr>
      <h4 class="text-mid">Keterangan</h4>
      <div class="d-flex flex-column">
        <div class="d-flex align-items-center justify-content-between">
          <p class="text-sm">Sewa Kabin</p>
          <p class="text-sm"><?= formatToIDR($cabin["price_per_night"]) ?> X <?= $days ?> malam</p>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <p class="text-sm">Diskon</p>
          <p class="text-sm"><?= formatToIDR($discount) ?></p>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <p class="text-sm">PPN</p>
          <p class="text-sm"><?= formatToIDR($PPN) ?></p>
        </div>
      </div>
    </div>
  </div>
  <a class="btn bg-primary" href="<?= base_url("profile") ?>"><span class="text-btn">Lihat Transaksi</span></a>
</div>