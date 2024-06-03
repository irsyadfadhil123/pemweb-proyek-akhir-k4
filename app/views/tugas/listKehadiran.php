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
<?php
if (!empty($data['user'])) {
    foreach ($data['user'] as $userList) {
?>
<h4><?= $userList['nama']; ?></h4>
<h4><?= $userList['username']; ?></h4>
<?php
    }
} else {
    echo "Daftar Kehadiran Kosong";
}
?>