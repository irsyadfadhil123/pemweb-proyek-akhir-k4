<a href="<?= BASEURL ?>/tugas/lihat/<?= $data['tugas_id'] ?>" class="btn btn-secondary mb-4">Kembali</a>

<?php 
if (!empty($data['files'])) {
    foreach($data['files'] as $file) { 
?>
<img src="<?= BASEURL . "/img/" . $file['gambar'] ?>" alt="">
<p><?= $file['nama']?></p>
<p><?= $file['username']?></p>

<p><<?= (isset($file['nilai'])) ? $file['nilai'] : "Belum dinilai"?></p>
<a href="<?= BASEURL . "/files/" . $file['nama_file'] ?>" target="_blank" rel="noopener noreferrer">Lihat File</a>
<?php 
    }
} else {
?>
<p>File Tugas tidak ditemukan</p>
<?php
}
?>

<!-- pagination  -->
<?php for ( $i = 1; $i <= $data['pagination']['jumlahHalamanFile']; $i++) : ?>
    <?php if ($i == $data['pagination']['halamanAktifFile']) : ?>
        <a href="<?= BASEURL ?>/tugas/lihatFile/<?= $data['tugas_id'] ?>/<?= $i ?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="<?= BASEURL ?>/tugas/lihatFile/<?= $data['tugas_id'] ?>/<?= $i ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
<!-- pagination  -->