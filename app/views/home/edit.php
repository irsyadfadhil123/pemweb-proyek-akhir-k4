        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL;?>/home/profil" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Edit Profile</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
            <form action="<?= BASEURL;?>/home/editProfil" method="post" class="d-flex flex-column" style="width: 75vw;">
                <h3 class="display-5 mb-3">Edit Profile</h3>
                <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">
                <div class="d-flex mb-3">
                    <input type="text"name="username" value="<?= $data['profil']['username'] ?>" placeholder="Username" required class="form-control">
                    <br class="m-2">
                    <input type="text" name="nama" value="<?= $data['profil']['nama'] ?>" placeholder="Nama" required class="form-control">
                </div>
                <div class="d-flex mb-3">
                    <input type="password" name="newPassword" placeholder="Password Baru" class="form-control">
                    <br class="m-2">
                    <input type="password" name="confirmPasword" placeholder="Konfirmasi Password" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="oldPassword" placeholder="Password Lama" required class="form-control">
                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                </div>
            </form>
        </div>