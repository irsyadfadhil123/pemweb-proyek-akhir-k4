<a href="<?= BASEURL;?>/home/index">Kembali</a><br>
<a href="<?= BASEURL;?>/tugas/tambahTugas">Tambah Tugas</a>
<a href="<?= BASEURL;?>/tugas/buatTugas">Buat Tugas</a>


<h3>Tugas yang tergabung</h3>
<?php 
if (!empty($data['tugas'])) {
    foreach ($data['tugas'] as $tugas_tergabung) {
        if ($tugas_tergabung['admin'] !== $_COOKIE['id']) {
?>
<p><?= $tugas_tergabung['judul']; ?></p>
<p><?= $tugas_tergabung['deskripsi']; ?></p>
<p><?= $tugas_tergabung['deadline']; ?></p>
<a href="<?= BASEURL;?>/tugas/upload/<?= $tugas_tergabung['tugas_id'];?>">upload</a>
<?php 
        }
    }
} else {
    echo "Data tugas tidak tersedia.";
}
?>

<h3>Tugas yang dibuat</h3>
<?php 
if (!empty($data['tugas'])) {
    foreach ($data['tugas'] as $tugas_dibuat) {
        if ($tugas_dibuat['admin'] == $_COOKIE['id']) {
?>
<p><?= $tugas_dibuat['judul']; ?></p>
<p><?= $tugas_dibuat['deskripsi']; ?></p>
<p><?= $tugas_dibuat['deadline']; ?></p>
<a href="<?= BASEURL;?>/tugas/lihat/<?= $tugas_dibuat['tugas_id'];?>">lihat</a>
<?php 
        }
    }
} else {
    echo "Data tugas tidak tersedia.";
}
?>
