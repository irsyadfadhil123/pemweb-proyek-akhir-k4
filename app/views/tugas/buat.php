<a href="<?= BASEURL?>/tugas/index">Kembali</a><br>

<form action="<?= BASEURL; ?>/tugas/buat" method="post">
    <input type="hidden" name="id" value="$_SESSION['id']">
    <input type="text" name="judul" placeholder="Judul">
    <input type="text" name="deskripsi" placeholder="Deskripsi">
    <input type="date" name="deadline" placeholder="Deadline">
    <input type="text" name="kode_tugas" placeholder="Kode Tugas">
    <button type="submit">Buat Tugas</button>
</form>