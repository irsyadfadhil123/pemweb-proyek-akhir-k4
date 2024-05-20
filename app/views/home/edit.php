        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL;?>/home/editProfil" method="post" class="d-flex flex-column border border-secondary rounded p-5 shadow" style="width: 50vw;">
                <a href="<?= BASEURL;?>/home/profil" class="btn btn-outline-warning align-self-start mb-3">Kembali</a>
                <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input type="text"name="username" value="<?= $data['profil']['username'] ?>" placeholder="Username" required class="form-control">
                </div>
                <input type="text" name="nama" value="<?= $data['profil']['nama'] ?>" placeholder="Nama" required class="form-control mb-3">
                <div class="input-group mb-3">
                    <input type="password" name="newPassword" id="" placeholder="Password Baru" class="form-control">
                    <input type="password" name="confirmPasword" placeholder="Konfirmasi Password" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="oldPassword" id="" placeholder="Password Lama" required class="form-control">
                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                </div>
            </form>
        </div>