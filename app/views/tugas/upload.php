<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="kelas" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">Kelas</a>
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Halaman Utama</a>
    </div>

    <div class="d-flex text-white p-5" style="height: 100vh;">

      <div class="d-flex flex-column" style="width: 25vw;">

        <div class="d-flex border border-success p-3 mb-1">
          <span class="fw-semibold me-auto">ID : <?= $data['tugas']['tugas_id'] ?></span>
          <span class="fw-semibold"><?= $data['tugas']['deadline'] ?></span>
        </div>
        <div class="d-flex flex-column border border-success p-3 mb-1 flex-fill">
          <span class="fs-3 fw-semibold"><?= $data['tugas']['judul'] ?></span>
          <hr>
          <span class="mb-auto"><?= $data['tugas']['deskripsi'] ?></span>
        </div class="d-flex border border-success">
        <div class="d-flex">
          <a class="btn btn-outline-success flex-fill rounded-0" href="<?= BASEURL?>/kehadiran/kehadiran/<?= $data['tugas']['tugas_id'];?>">Catat Kehadiran</a>
          <a class="btn btn-outline-success flex-fill rounded-0" href="<?= BASEURL?>/tugas/uploadFile/<?= $data['tugas']['tugas_id'];?>"><?= $data['type'] ?></a>
        </div>


      </div>

      <div class="d-flex flex-column flex-fill ms-5">

        <div class="border border-light p-3 mb-1">
          <span class="fw-semibold">Forum Diskusi</span>
        </div>

        <div class="border border-light flex-fill mb-1 overflow-scroll">
        <br>
        <?php if (!empty($data['diskusi'])): ?>
          <?php foreach ($data['diskusi'] as $diskusi): ?>

            <div class="d-flex align-items-center p-3 border border-secondary ms-3 me-3 rounded">
              <img class="rounded-circle me-3" style="height: 75px; width: 75px;" src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>" alt="User Image">
              <div class="d-flex flex-column flex-fill">
                <span class="fw-semibold"><?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama']?> - <?= $diskusi['username']?></span>
                <hr>
                <span><?= $diskusi['pesan']?></span>
                <span class="align-self-end"><?= $diskusi['waktu']?></span>
              </div>
            </div>
            <form class="input-group p-3" action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
              <input type="hidden" name="type" value="user">
              <input type="hidden" name="reff" value="<?= $diskusi['diskusi_id'] ?>">
              <span class="input-group-text bg-dark text-light rounded-start">Kirim Balasan</span>
              <input class="form-control bg-dark text-light" type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
              <button class="input-group-text text-light bg-dark" type="submit">Balas</button>
            </form>

            <?php if (isset($diskusi['balasan'])): ?>
              <?php foreach ($diskusi['balasan'] as $reff): ?>
                <div class="d-flex align-items-center p-3 bg-success bg-opacity-25 border border-secondary ms-5 me-3 mb-3 rounded">
                  <img class="rounded-circle me-3" style="height: 75px; width: 75px;" src="<?= BASEURL . "/img/" . $reff['gambar'] ?>" alt="User Image">
                  <div class="d-flex flex-column flex-fill">
                    <span class="fw-semibold"><?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama']?> - <?= $reff['username']?></span>
                    <hr>
                    <span><?= $reff['pesan']?></span>
                    <span class="align-self-end"><?= $reff['waktu']?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          <?php endforeach; ?>
        <?php else: ?>
          <span>Tidak ada Diskusi</span>
        <?php endif; ?>
        </div>

        <form class="border border-light p-3" action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
          <input type="hidden" name="type" value="user">
          <div class="input-group">
            <input class="form-control bg-dark text-light" type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
            <button class="btn btn-outline-light" type="submit">Kirim</button>
          </div>

        </form>
      </div>
    </div>
    
    <?php if (isset($_SESSION["flash"])) { ?>
      <?php if ($_SESSION["flash"]["tipe"] == "warning") { ?>
        <div class="toast align-items-center text-bg-danger border-0 show bottom-0 end-0 m-3 z-3" style="position: fixed;" role="alert" aria-live="assertive" aria-atomic="true">
      <?php } else { ?>
        <div class="toast align-items-center text-bg-success border-0 show bottom-0 end-0 m-3 z-3" style="position: fixed;" role="alert" aria-live="assertive" aria-atomic="true">
      <?php } ?>
      
        <div class="d-flex">
          <span class="toast-body"><?php Flasher::flash(); ?></span>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<script>
  $("#content").fadeTo(500, 1);

  $("#home").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/index");
    });
  });

  $("#kelas").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/tugas/index");
    });
  });
</script>

<style>
  .form-control::placeholder {
    color: grey;
  }

  .input-group-text::placeholder {
    color: grey;
  }
</style>