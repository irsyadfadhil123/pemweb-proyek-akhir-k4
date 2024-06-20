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
            <label class="form-control bg-dark text-light" style="cursor: pointer; width: 30%;" for="file-upload">Browse File</label>
            <input  type="file" style="display: none;" name="gambar" id="file-upload" onchange="displayFileName()">
            <span class="form-control bg-dark text-secondary" style="width: 70%;" id="file-name">File Name</span>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text bg-dark text-light" style="width: 30%;">Username</span>
            <input class="form-control bg-dark text-light" style="width: 70%;" type="text" name="username" value="<?= $data['profil']['username'] ?>" required>
          </div>
          <div class="input-group mb-2">
          <span class="input-group-text bg-dark text-light" style="width: 30%;">Nama</span>
            <input class="form-control bg-dark text-light" style="width: 70%;" type="text" name="nama" value="<?= $data['profil']['nama'] ?>" required>
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





<!-- ---------------------------------------------------------------------------------------------------- -->

<div class="header">
    <a href="<?= BASEURL;?>/home/profil" class="btn btn-outline-warning">Kembali</a>
    <h3 class="display-6 fs-4 fw-semibold">Edit Profile</h3>
    <label class="lead fw-medium">Nama User</label>
</div>

<div class="content">
    <form action="<?= BASEURL;?>/home/editProfil" method="post" enctype="multipart/form-data" class="form-container">
        <h3 class="display-5 mb-3">Edit Profile</h3>
        <!-- fitur update gambar -->
        <input type="file" name="gambar" class="form-control">
        <!-- fitur update gambar -->                
        <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">
        <div class="form-group">
            <input type="text" name="username" value="<?= $data['profil']['username'] ?>" placeholder="Username" required class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="nama" value="<?= $data['profil']['nama'] ?>" placeholder="Nama" required class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="newPassword" placeholder="Password Baru" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="confirmPassword" placeholder="Konfirmasi Password" class="form-control">
        </div>
        <div class="input-group">
            <input type="password" name="oldPassword" placeholder="Password Lama" required class="form-control">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher --> 

<style>
    body {
        background-color: #2c2c2c;
        color: white;
        }
    .header {
        background-color: #343a40;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header h3, .header label {
        color: white;
    }
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 85vh;
        }
        .form-container {
        background-color: #343a40;
        padding: 20px;
        border-radius: 5px;
        width: 75vw;
    }
    .form-container h3 {
        color: white;
        text-align: center;
        margin-bottom: 20px;
    }
    .form-container input, .form-container button {
        margin-bottom: 15px;
    }
    .form-container input[type="file"] {
        border: none;
    }
    .btn-outline-warning, .btn-outline-secondary {
        border-color: #ffc107;
        color: #ffc107;
    }
    .btn-outline-warning:hover, .btn-outline-secondary:hover {
        background-color: #ffc107;
        color: black;
    }
</style>
