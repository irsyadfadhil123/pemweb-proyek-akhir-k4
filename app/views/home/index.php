<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="logout" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">&larr; Keluar</a>
      <a id="kelas" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Kelas</a>
      <a id="profil" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Profil</a>
    </div>

    <div class="d-flex flex-column text-white p-5" style="min-height: 100vh;">
      <span class="fs-1">Selamat Datang, [INSERT NAME HERE]!</span>

      <div class="border border-secondary p-4 rounded-4 mt-5">
        <span class="fs-3 fw-semibold">Pengingat</span>

        <?php
          if (!empty($data['pengingat'])) {
            foreach ($data['pengingat'] as $tugas) {
              if (!($tugas['hari'] < 1)) {
        ?>

          <hr>
          <div class="d-flex flex-column">
            <span class="fw-bold"><?= $tugas['judul'] ?></span>
            <span>Deadline: <?= $tugas['deadline'] ?></span>
            <span>Tersisa <?= $tugas['hari'] ?> hari lagi</span>
          </div>

        <?php
              } else if (!($tugas['jam'] < 1)) {
        ?>

          <hr>
          <div class="d-flex flex-column">
            <span class="fw-bold"><?= $tugas['judul'] ?></span>
            <span>Deadline: <?= $tugas['deadline'] ?></span>
            <span>Tersisa <?= $tugas['jam'] ?> jam lagi</span>
          </div>

        <?php
              } else {
        ?>

          <hr>
          <div class="d-flex flex-column">
            <span class="fw-bold"><?= $tugas['judul'] ?></span>
            <span>Deadline: <?= $tugas['deadline'] ?></span>
            <span>Tersisa <?= $tugas['menit'] ?> menit lagi</span>
          </div>

        <?php
              }
            }
          } else {
        ?>

          <hr>
          <div class="d-flex flex-column">
            <span>Anda tidak memiliki tugas saat ini</span>
          </div>

        <?php
          }
        ?>

      </div>

      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-4">
          <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugas']; $i++) : ?>
            <li class="page-item <?= ($i == $data['pagination']['halamanAktifTugas']) ? 'active' : ''; ?>">
                <a class="page-link" href="<?= BASEURL ?>/home/index/<?= $i; ?>"><?= $i; ?></a>
            </li>
          <?php endfor; ?>
        </ul>
      </nav>

    </div>



    <?php if (isset($_SESSION["flash"])) { ?>
      <div class="toast align-items-center text-bg-success border-0 show bottom-0 end-0 m-3" style="position: fixed;" role="alert" aria-live="assertive" aria-atomic="true">
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

  $("#logout").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/logout");
    });
  });

  $("#kelas").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/tugas/index");
    });
  });

  $("#profil").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/profil");
    });
  });

</script>