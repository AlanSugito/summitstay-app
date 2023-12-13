<div class="col-8 py-4 px-5">
  <h2 class="text-md text-dark">Transaksi</h2>
  <div class="overflow-y-scroll d-flex flex-column gap-2 h-75 p-2">
    <?php foreach ($transactions as $transaction): ?>
              <div class="card cursor-pointer" data-bs-toggle="modal" data-bs-target="#transactionModal<?= $transaction->id ?>">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-column align-items-between gap-2">
                    <h4 class="text-mid"><?= $transaction->cabin_name ?></h4>
                    <div>
                      <?php $check_in = date_format(date_create($transaction->check_in), "d/m/Y") ?>
                      <?php $check_out = date_format(date_create($transaction->check_out), "d/m/Y") ?>
                      <span class="text-mid"><?= $check_in ?></span>
                      <span class="text-mid">-</span>
                      <span class="text-mid"><?= $check_out ?></span>
                    </div>
                  </div>
                  <h4><?= formatToIDR($transaction->amount) ?></h4>
                </div>
              </div>
              <?php $days = date_diff(date_create($transaction->check_in), date_create($transaction->check_out))->days; ?>
              <?php ?>
              <?php $data = [
                "id" => $transaction->id,
                "check_in" => $check_in,
                "check_out" => $check_out,
                "first_name" => $transaction->first_name,
                "last_name" => $transaction->last_name,
                "days" => $days,
                "price_per_night" => $transaction->cabins_price,
                "discount" => $transaction->discount / 100,
                "amount" => $transaction->amount,
                "transaction_id" => $transaction->transaction_id
              ] ?>
              <?php $this->load->view("modals/transaction_detail", $data) ?>
    <?php endforeach; ?>
  </div>
</div>