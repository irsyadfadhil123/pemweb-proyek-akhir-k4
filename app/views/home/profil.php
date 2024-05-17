        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="d-flex flex-column align-items-center border border-secondary rounded p-5 shadow" style="width: 50vw;">
                <a href="<?= BASEURL;?>/home/index" class="btn btn-outline-warning align-self-start">Kembali</a>
                <br class="m-3">
                <img src="..." class="rounded-circle" style="width: 200px; height: 200px;">
                <br class="m-3">
                <h2 class="display-6"><?= $data['profil']['nama'] ?></h2>
                <br class="m-3">
                <div style="width: 400px;">
                    <label class="lead">Username: </label>
                    <input type="text" class="form-control" placeholder="<?= $data['profil']['username'] ?>" disabled>
                </div>
                <br class="m-4">
                <a href="<?= BASEURL; ?>/home/edit" class="btn btn-success">Edit Profile</a>
            </div>
        </div>