<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">&larr; Halaman Utama</a>
      <a id="profil" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Profil</a>
    </div>

    <div class="d-flex flex-column text-white p-5" style="min-height: 100vh;">
      <span class="fs-1">Kelas</span>

      <div class="d-flex mt-5">
          <a class="btn btn-outline-success me-2" href="<?= BASEURL;?>/tugas/tambahTugas">Tambah Tugas</a>
          <a class="btn btn-outline-info" href="<?= BASEURL;?>/tugas/buatTugas">Buat Tugas</a>
      </div>

      <div class="d-flex flex-column border border-secondary p-4 rounded-2 mt-5">
        <span class="fs-4 mb-4">Tugas yang Ditambahkan</span>

        <?php if (!empty($data['hasilTugasNonAdmin'])): ?>
        <div class="d-flex">
          <?php foreach ($data['hasilTugasNonAdmin'] as $tugas_tergabung): ?>
          <div class="me-2">
            <div class="d-flex flex-column border border-secondary overflow-scroll p-3 rounded-top-2 mb-1" style="height: 200px; width: 300px;">
              <span class="fw-semibold"><?= $tugas_tergabung['judul']; ?></span>
              <hr>
              <span><?= $tugas_tergabung['deskripsi']; ?></span>
            </div>
            <div class="d-flex align-items-center border border-warning p-3 rounded-bottom-2">
              <span class="me-2"><?= $tugas_tergabung['deadline']; ?></span>
              <a class="btn btn-outline-warning ms-auto" href="<?= BASEURL;?>/tugas/upload/<?= $tugas_tergabung['tugas_id'];?>">Unggah</a>
            </div>
          </div>
          <?php endforeach; ?>
          
        </div>
        <?php else: ?>
        <hr>
        <span>Data tidak tersedia</span>
        <?php endif; ?>
      </div>
      
      <div class="d-flex input-group mt-5">
      <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugasNonAdmin']; $i++): ?>
        <?php if ($i == $data['pagination']['halamanAktifTugasNonAdmin']): ?>
          <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>" class="input-group-text border border-warning bg-transparent text-light" style="text-decoration: none;"><?= $i; ?></a>
        <?php else: ?>
          <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>" class="input-group-text border border-secondary bg-transparent text-light" style="text-decoration: none;"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>
      </div>

      <div class="d-flex flex-column border border-secondary p-4 rounded-2 mt-5">
        <span class="fs-4 mb-4">Tugas yang Dibuat</span>

        <?php if (!empty($data['hasilTugasAdmin'])): ?>
        <div class="d-flex">
          <?php foreach ($data['hasilTugasAdmin'] as $tugas_dibuat): ?>
          <div class="me-2">
            <div class="d-flex flex-column border border-secondary overflow-scroll p-3 rounded-top-2 mb-1" style="height: 200px; width: 300px;">
              <span class="fw-semibold"><?= $tugas_dibuat['judul']; ?></span>
              <hr>
              <span><?= $tugas_dibuat['deskripsi']; ?></span>
            </div>
            <div class="d-flex align-items-center border border-warning p-3 rounded-bottom-2">
              <span class="me-2"><?= $tugas_dibuat['deadline']; ?></span>
              <a class="btn btn-outline-warning ms-auto" href="<?= BASEURL;?>/tugas/upload/<?= $tugas_dibuat['tugas_id'];?>">Lihat</a>
            </div>
          </div>
          <?php endforeach; ?>
          
        </div>
        <?php else: ?>
        <hr>
        <span>Data tidak tersedia</span>
        <?php endif; ?>
      </div>
      
      <div class="d-flex input-group mt-5">
        <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugasAdmin']; $i++): ?>
            <?php if ($i == $data['pagination']['halamanAktifTugasAdmin']): ?>
                <a href="<?= BASEURL ?>/tugas/index/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>/<?= $i ?>" class="input-group-text border border-warning bg-transparent text-light" style="text-decoration: none;"><?= $i; ?></a>
            <?php else: ?>
                <a href="<?= BASEURL ?>/tugas/index/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>/<?= $i ?>" class="input-group-text border border-secondary bg-transparent text-light" style="text-decoration: none;"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
      </div>

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

  $("#home").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/index");
    });
  });

  $("#profil").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/profil");
    });
  });
</script>




<style>
    .slide-fade-enter-active {
        transition: all 0.3s ease-out;
    }

    .slide-fade-leave-active {
        transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        transform: translateX(30px);
        opacity: 0;
    }

    .overflow-scroll::-webkit-scrollbar {
        width: 0;
        height: 0;
    }

    .overflow-scroll {
        scrollbar-width: none;
    }

    .overflow-scroll {
        -ms-overflow-style: none;
    }

    .overflow-scroll {
        overflow: auto;
    }

    .custom-btn {
    border-radius: 10px; /* Rounded corners */
    margin: 0 3px; /* Narrow margin */
    padding: 3px 10px; /* Smaller padding for thinner appearance */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Consistent font */
    font-size: 14px; /* Smaller font size */
    min-width: auto; /* Ensure button width adjusts to content */
    }
</style>

<script>
    const app = Vue.createApp({
        data() {
            return {
                show: false,
            };
        },
        mounted() {
            this.show = true;
        }
    });

    app.mount("#app");
</script>
