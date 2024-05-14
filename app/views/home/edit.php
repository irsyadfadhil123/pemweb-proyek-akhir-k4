<a href="<?= BASEURL;?>/home/profil">Kembali</a><br>

<form action="<?= BASEURL;?>/home/editProfil" method="post">
    <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">
    <label for="username">Username</label>
    <input type="text"name="username" value="<?= $data['profil']['username'] ?>" required>
    <label for="nama">Nama</label>
    <input type="text" name="nama" value="<?= $data['profil']['nama'] ?>" required>
    <label for="newPassword">Password Baru</label>
    <input type="password" name="newPassword" id=""placeholder="Password Baru">
    <label for="confirmPassword">Konfirmasi Password</label>
    <input type="password" name="confirmPasword" placeholder="Konfirmasi Password">
    <label for="oldPassword">Password Lama</label>
    <input type="password" name="oldPassword" id=""placeholder="Password Lama" required>
    <input type="submit">
</form>