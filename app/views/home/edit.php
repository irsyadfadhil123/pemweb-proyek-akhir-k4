<div class="bg-dark">
  <div id="content" style="opacity: 0;">

    <div class="d-flex shadow" style="position: relative;">
      <a id="back" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0 me-auto">&larr; Kembali</a>
      <a id="home" class="btn btn-warning pt-3 pb-3 ps-4 pe-4 rounded-0">Halaman Utama</a>
    </div>

    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
      <form class="d-flex" style="width: 1400px;" action="<?= BASEURL;?>/home/editProfil" method="post" enctype="multipart/form-data">

        <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">

        <div class="flex-fill border border-info rounded-3 p-5 me-3">
          <span class="lead fs-1 text-info">Profil</span>

          <div class="input-group mb-2 mt-2">
            <label class="form-control bg-dark text-light" style="cursor: pointer; width: 20%;" for="file-upload">Browse File</label>
            <input type="file" style="display: none;" onchange="displayFileName()" name="gambar" id="file-upload">
            <span class="form-control bg-dark text-secondary" style="width: 80%;" id="file-name">File Name</span>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text bg-dark text-light" style="width: 20%;">Username</span>
            <input class="form-control bg-dark text-light" style="width: 80%;" type="text" name="username" value="<?= $data['profil']['username'] ?>" required>
          </div>
          <div class="input-group mb-2">
          <span class="input-group-text bg-dark text-light" style="width: 20%;">Nama</span>
            <input class="form-control bg-dark text-light" style="width: 80%;" type="text" name="nama" value="<?= $data['profil']['nama'] ?>" required>
          </div>
        </div>

        <div class="flex-fill">
          <div class="border border-danger rounded-3 p-5 mb-3">
            <span class="lead fs-1 text-danger">Keamanan</span>
            <div class="input-group mb-2 mt-2">
              <span class="input-group-text bg-dark text-light" style="width: 30%;">Password Baru</span>
              <input class="form-control bg-dark text-light" style="width: 70%;" type="password" name="newPassword">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text bg-dark text-light" style="width: 30%;">Konfirmasi Password</span>
              <input class="form-control bg-dark text-light" style="width: 70%;" type="password" name="confirmPassword">
            </div>
          </div>
          
          <div class="input-group">
            <span class="input-group-text bg-dark text-light">Password Lama</span>
            <input class="form-control form-control bg-dark text-light" type="password" name="oldPassword" required>
            <button type="submit" class="btn btn-outline-light">Submit</button>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>

<script>
  $("#content").fadeTo(500, 1);

  $("#back").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", history.back());
    });
  });

  $("#home").on("click", function() {
    $("#content").fadeTo(500, 0, function() {
      $(location).prop("href", "<?= BASEURL; ?>/home/index");
    });
  });

  function displayFileName() {
    var input = document.getElementById('file-upload');
    var fileName = input.files[0].name;
    document.getElementById('file-name').innerText = fileName;
  }
</script>
