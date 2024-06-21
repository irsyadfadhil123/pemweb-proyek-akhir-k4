    <a href="<?= BASEURL; ?>/home/index" class="back btn btn-outline-warning">Kembali</a>
</div>

<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<!-- flasher -->

<div class="content">
    <div class="profile-card">
        <img src="<?= BASEURL . '/img/' . $data['profil']['gambar'] ?>" alt="Profile Picture" class="profile-img">
        <h2 class="display-6 mb-3"><?= $data['profil']['nama'] ?></h2>
        <div class="mb-3" style="width: 400px; margin: auto;">
            <label class="lead">Username: </label>
            <input type="text" class="form-control" placeholder="<?= $data['profil']['username'] ?>" disabled>
        </div>
        <a href="<?= BASEURL; ?>/home/edit" class="btn btn-success mt-3">Edit Profile</a>
    </div>
</div>
<style>
        body {
            background-color: #212529;
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 85vh;
        }
        .profile-card {
            text-align: center;
        }
        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 2px solid #6c757d;
            margin-bottom: 20px;
        }
        .profile-card input[type="text"] {
            background-color: #494949;
            border: none;
            color: white;
            text-align: center;
        }
        .btn-custom {
            background-color: #ffc107;
            border: none;
            color: black;
        }
        .reminder {
            background-color: #343a40;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }
        .back {
        margin: 10px;
        }
    </style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
