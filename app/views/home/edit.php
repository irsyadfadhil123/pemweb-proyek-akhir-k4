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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
