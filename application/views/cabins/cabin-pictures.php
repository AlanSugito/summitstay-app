<div class="row py-4"></div>
<div class="row py-4"></div>

<div class="p-4">

  <div class="d-flex gap-2 images-container">
    <img class="main-img object-fit-cover fade-slide" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][0]["source"] ?>" alt="cabin">
    <div class="d-flex flex-wrap gap-2">
      <?php if (count($cabin["pictures"]) < 2) { ?>
                    <img class="sub-img object-fit-cover fade delay-1s" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][0]["source"] ?>" alt="cabin">
                    <img class="sub-img object-fit-cover fade delay-1s" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][0]["source"] ?>" alt="cabin">
                    <img class="sub-img object-fit-cover fade delay-1s" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][0]["source"] ?>" alt="cabin">
                    <img class="sub-img object-fit-cover fade delay-1s" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][0]["source"] ?>" alt="cabin">
        <?php } else { ?>

                    <?php for ($i = 1; $i < count($cabin["pictures"]); $i++): ?>
                                  <img class="sub-img object-fit-cover fade delay-1s" src="<?= base_url("/assets/images/cabins") ?>/<?= $cabin["pictures"][$i]["source"] ?>" alt="cabin">
                    <?php endfor; ?>
        <?php } ?>
    </div>
  </div>
</div>