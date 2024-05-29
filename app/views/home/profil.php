        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL;?>/home/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Profile</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
            <div class="d-flex flex-column align-items-center" style="width: 75vw;">
                <img src="..." class="rounded-circle mb-4 p-2 border border-dark-subtle" style="width: 200px; height: 200px;">
                <h2 class="display-6 mb-3"><?= $data['profil']['nama'] ?></h2>
                <div style="width: 400px;">
                    <label class="lead mb-3">Username: </label>
                    <input type="text" class="form-control" placeholder="<?= $data['profil']['username'] ?>" disabled>
                </div>
                <br class="m-3">
                <a href="<?= BASEURL; ?>/home/edit" class="btn btn-success">Edit Profile</a>
            </div>
        </div>