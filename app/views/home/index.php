<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>

<a href="<?= BASEURL; ?>/home/logout">Logout</a><br>
<a href="<?= BASEURL; ?>/home/profil">Lihat Profil</a><br>
<a href="<?= BASEURL; ?>/tugas/index">Lihat daftar kelas</a>
<h1>home index</h1>

<h2>pengingat</h2>
<?php 
if (!empty($data['pengingat'])) {
    foreach ($data['pengingat'] as $tugas) {
?>

<p><?= $tugas['judul'] ?></p>
<p><?= $tugas['deadline'] ?></p>
<p><?= $tugas['selisih'] ?> hari lagi</p>

<?php
    }
} else {
?>
<p>pengingat tidak ditemukan</p>
<?php
}
?>