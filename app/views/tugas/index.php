        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL;?>/home/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Aplikasi Pengumpul Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>
       <!-- flasher -->
       <div class="row">
           <div class="col-lg-6">
               <?php Flasher::flash();?>
           </div>
       </div>
       <!-- flasher -->

        <div class="d-flex flex-column align-items-start p-4">
            
            <div class="d-flex mb-3">
                <a href="<?= BASEURL;?>/tugas/tambahTugas" class="btn btn-outline-success me-3">Tambah Tugas</a>
                <a href="<?= BASEURL;?>/tugas/buatTugas" class="btn btn-outline-info">Buat Tugas</a>
            </div>
            <!-- pagination nonAdmin -->
<?php for ( $i = 1; $i <= $data['pagination']['jumlahHalamanTugasNonAdmin']; $i++) : ?>
    <?php if ($i == $data['pagination']['halamanAktifTugasNonAdmin']) : ?>
        <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
            <!-- pagination nonAdmin -->
            <h3 class="display-6 fw-semibold mb-3">Tugas yang ditambahkan</h3>

            <div class="d-flex mb-3">
            <?php 
            if (!empty($data['hasilTugasNonAdmin'])) {
                foreach ($data['hasilTugasNonAdmin'] as $tugas_tergabung) {
            ?>
                <div class="d-flex flex-column me-4" style="width: 250px; height: 250px;">
                    <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light">
                        <label class="lead fw-semibold"><?= $tugas_tergabung['judul']; ?></label>
                        <label class="lead fs-6"><?= $tugas_tergabung['deskripsi']; ?></label>
                    </div>
                    <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                        <label class="align-self-center"><?= $tugas_tergabung['deadline']; ?></label>
                        <a href="<?= BASEURL;?>/tugas/upload/<?= $tugas_tergabung['tugas_id'];?>" class="btn btn-secondary">Upload</a>
                    </div>
                </div>
            <?php 
                }
            } else {
                echo "Data tugas tidak tersedia.";
            }
            ?>
            </div>

            <h3 class="display-6 fw-semibold mb-3">Tugas yang dibuat</h3>

            <div class="d-flex mb-3">
            <!-- pagination admin -->
<?php for ( $i = 1; $i <= $data['pagination']['jumlahHalamanTugasAdmin']; $i++) : ?>
    <?php if ($i == $data['pagination']['halamanAktifTugasAdmin']) : ?>
        <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
            <!-- pagination admin -->
            <?php 
            if (!empty($data['hasilTugasAdmin'])) {
                foreach ($data['hasilTugasAdmin'] as $tugas_dibuat) {
            ?>
                <div class="d-flex flex-column me-4" style="width: 250px; height: 250px;">
                    <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light">
                        <label class="lead fw-semibold"><?= $tugas_dibuat['judul']; ?></label>
                        <label class="lead fs-6"><?= $tugas_dibuat['deskripsi']; ?></label>
                    </div>
                    <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                        <label class="align-self-center"><?= $tugas_dibuat['deadline']; ?></label>
                        <a href="<?= BASEURL;?>/tugas/lihat/<?= $tugas_dibuat['tugas_id'];?>" class="btn btn-secondary">Lihat</a>
                    </div>
                </div>
            <?php 
                }
            } else {
                echo "Data tugas tidak tersedia.";
            }
            ?>
            </div>
        </div>