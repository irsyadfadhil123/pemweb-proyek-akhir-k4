<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher -->
<?php $previous = "javascript:history.go(-1)"; ?>
<a href="<?= $previous ?>">Kembali</a><br>

<h2>List Kehadiran:</h2>
<!-- pagination  -->
<?php for ( $i = 1; $i <= $data['pagination']['jumlahHalamanListKehadiran']; $i++) : ?>
    <?php if ($i == $data['pagination']['halamanAktifListKehadiran']) : ?>
        <a href="<?= BASEURL ?>/kehadiran/listKehadiran/<?= $data['tugas_id'] ?>/<?= $i ?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="<?= BASEURL ?>/kehadiran/listKehadiran/<?= $data['tugas_id'] ?>/<?= $i ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
<!-- pagination  -->

<?php
if (!empty($data['user'])) {
    foreach ($data['user'] as $userList) {
?>
<img src="<?= BASEURL ?>/img/<?= $userList['gambar'] ?>" alt="">
<h4><?= $userList['nama']; ?></h4>
<h4><?= $userList['username']; ?></h4>
<?php
    }
} else {
    echo "Daftar Kehadiran Kosong";
}
?>