<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="kelas" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">Kelas</a>
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Halaman Utama</a>
    </div>

    <div class="d-flex flex-column text-white align-items-center justify-content-center" style="height: 100vh;">
      <form class="d-flex flex-column border border-info p-4 rounded-4" style="width: 50vw;" action="<?= BASEURL; ?>/tugas/buat" method="post">
        <span class="fs-3 lead mb-2">Buat Tugas</span>

        <input class="form-control bg-dark text-light border border-secondary mb-2" type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
        <input class="form-control bg-dark text-light border border-secondary mb-2" type="text" name="judul" placeholder="Judul">
        <textarea class="form-control bg-dark text-light border border-secondary mb-2" name="deskripsi" placeholder="Deskripsi" rows="8"></textarea>
        <input class="form-control bg-dark text-light border border-secondary mb-2" type="text" name="kode_tugas" placeholder="Kode Tugas">
        <span class="lead mb-2">Deadline</span>
        <input class="form-control bg-dark text-light border border-secondary mb-2" type="datetime-local" name="deadline" placeholder="Deadline">

        <button class="btn btn-outline-info align-self-end" type="submit">Buat Tugas</button>
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