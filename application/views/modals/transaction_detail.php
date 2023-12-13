<div class="modal" tabindex="-1" id="transactionModal<?= $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column">
      <div class="d-flex flex-column gap-2">
            <h3 class="text-mid">ID Transaksi</h3>
            <h3 class="text-mid"><?= $transaction_id ?></h3>
          </div>
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex flex-column gap-2">
            <h3 class="text-mid">Check In</h3>
            <p><?= $check_in ?></p>
          </div>
          <div class="d-flex flex-column gap-2">
            <h3 class="text-mid">Check Out</h3>
            <p><?= $check_out ?></p>
          </div>
        </div>
        <div class="d-flex flex-column gap-1">
            <h3 class="text-mid">Atas Nama</h3>
            <p><?= $first_name . " " . $last_name ?></p>
        </div>
        <h3 class="text-mid">Detail Pembayaran</h3>
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="text-mid">Sewa Kabin <?= $days ?> malam</h3>
          <p><?= formatToIDR($price_per_night * $days) ?></p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="text-mid">Diskon</h3>
          <p><?= formatToIDR($price_per_night * $discount) ?></p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="text-mid">PPN</h3>
          <p><?= formatToIDR($price_per_night * 0.1) ?></p>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="text-mid">TOTAL</h3>
          <h3 class="text-mid"><?= formatToIDR($amount) ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>