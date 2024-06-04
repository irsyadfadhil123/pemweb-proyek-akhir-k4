<a href="<?= BASEURL?>/tugas/index">Kembali</a><br>

<h2>Form Update Tugas:</h2>
<form action="<?= BASEURL; ?>/tugas/update" method="post">
    <input type="hidden" name="kode_tugas" value="<?= $data['kode_tugas']; ?>">
    <label for="judul">Judul:</label><br>
    <input type="text" id="judul" name="judul" value="<?= $data['judul']; ?>"><br>
    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi"><?= $data['deskripsi']; ?></textarea><br>
    <label for="deadline">Deadline:</label><br>
    <input type="date" id="deadline" name="deadline" value="<?= $data['deadline']; ?>"><br>
    <button type="submit">Update Tugas</button>
</form>