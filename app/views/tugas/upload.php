        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Upload Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="d-flex flex-column p-4" style="height: 100vh;">
                <!-- flasher -->
                <div class="row">
                    <div class="col-lg-6">
                        <?php Flasher::flash();?>
                    </div>
                </div>
                <!-- flasher -->
            <div class="d-flex mb-3">
                <div class="d-flex flex-column flex-grow-1 bg-dark-subtle rounded-start p-3">
                    <label class="lead"><?= $data['tugas']['tugas_id'] ?></label>
                    <label class="display-6 fw-medium"><?= $data['tugas']['judul'] ?></label>
                    <p class="lead"><?= $data['tugas']['deskripsi'] ?></p>
                </div>
                <div class="d-flex flex-column border border-dark-subtle rounded-end p-3">
                    <label class="lead align-self-center">Kode Kelas</label>
                    <hr>
                    <label class="display-6 text-secondary align-self-center">D-081</label>
                </div>
            </div>
            <div class="d-flex align-self-end mb-3">
                <a href="<?= BASEURL?>/kehadiran/kehadiran/<?= $data['tugas']['tugas_id'];?>" class="btn btn-info me-3">Catat Kehadiran</a>
                <a href="<?= BASEURL?>/tugas/uploadFile/<?= $data['tugas']['tugas_id'];?>" class="btn btn-info"><?= $data['type'] ?></a>
            </div>
            <div class="d-flex flex-column bg-dark-subtle rounded align-self-start p-3 mb-3">
                <label class="lead fw-medium">Deadline</label>
                <div class="border-bottom border-secondary lead"><?= $data['tugas']['deadline'] ?></div>
            </div>
            <div class="d-flex">
                <h1 class="display-6">Forum Diskusi</h1>
            </div>
            <div class="d-flex flex-column bg-dark-subtle rounded p-3 mb-3" style="height: 100%;">
                <label class="lead fw-semibold">Nama User</label>
                <p class="lead">Isi Diskusi</p>
            </div>
            <a href="" class="btn btn-info align-self-end">Buat Diskusi</a>
        </div>

<form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
    <input type="hidden" name="type" value="user">
    <label for="pesan">Kirim Pesan</label>
    <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
    <button type="submit">Kirim</button>
</form>

<?php
if (!empty($data['diskusi'])) {
    foreach ($data['diskusi'] as $diskusi) {
?>
<img src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>">
<p>Nama: <?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama']?></p>
<p>Username: <?= $diskusi['username']?></p>
<p>Pesan: <?= $diskusi['pesan']?></p>
<p>Waktu: <?= $diskusi['waktu']?></p><br>

<form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
    <input type="hidden" name="type" value="user">
    <input type="hidden" name="reff" value="<?= $diskusi['diskusi_id'] ?>">
    <label for="pesan">Kirim Balasan</label>
    <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
    <button type="submit">Balas</button>
</form><br>

<?php 
        if (isset($diskusi['balasan'])) {
            foreach ($diskusi['balasan'] as $reff) {
?>
<img src="<?= BASEURL . "/img/" . $reff['gambar'] ?>">
<p>Nama: <?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama']?></p>
<p>Username: <?= $reff['username']?></p>
<p>Pesan: <?= $reff['pesan']?></p>
<p>Waktu: <?= $reff['waktu']?></p><br>
<?php
            }
        }

    }
} else {
?>
<p>Tidak ada Diskusi</p>
<?php
}
?>