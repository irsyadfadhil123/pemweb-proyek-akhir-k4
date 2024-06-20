<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="kelas" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">Kelas</a>
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Halaman Utama</a>
    </div>

    <div class="d-flex flex-column text-white align-items-center justify-content-center" style="height: 100vh;">
      <img class="rounded-circle bg-secondary p-1 mb-4" style="height: 200px; width: 200px;" src="<?= BASEURL . '/img/' . $data['profil']['gambar'] ?>" alt="Profile Picture">
      <span class="fs-2 fw-semibold mb-4"><?= $data['profil']['nama'] ?></span>
      <div class="d-flex flex-column">
        <div class="input-group mb-2">
          <span class="input-group-text bg-dark text-secondary border border-secondary">Username</span>
          <input class="form-control bg-dark text-secondary border border-secondary" type="text" value="<?= $data['profil']['username'] ?>" disabled>
        </div>

        <a id="editProfile" class="btn btn-outline-info">Edit Profile</a>
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

  $("#editProfile").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/edit");
    });
  });
</script>