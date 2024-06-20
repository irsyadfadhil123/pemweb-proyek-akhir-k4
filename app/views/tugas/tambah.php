<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="kelas" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">Kelas</a>
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Halaman Utama</a>
    </div>

    <div class="d-flex flex-column text-white align-items-center justify-content-center" style="height: 100vh;">
      <form class="d-flex flex-column border border-success p-4 rounded-4" action="<?= BASEURL; ?>/tugas/tambah" method="post">
        <span class="fs-3 lead mb-2">Tambah Tugas</span>
        <input class="form-control border border-secondary bg-dark text-light mb-2" type="text" name="kode_tugas" placeholder="Kode Tugas" required>
        <button type="submit" class="btn btn-outline-success">Tambah Tugas</button>
      </form>
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
</style>