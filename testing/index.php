<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <!-- Login, Register, Profile, Edit Profile, Tambah, Buat, Upload, Index -->

        
        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Aplikasi Pengumpul Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="d-flex flex-column align-items-start p-4">
            
            <div class="d-flex mb-3">
                <a href="" class="btn btn-outline-success me-3">Tambah Tugas</a>
                <a href="" class="btn btn-outline-info">Buat Tugas</a>
            </div>

            <h3 class="display-6 fw-semibold mb-3">Tugas yang ditambahkan</h3>

            <div class="d-flex mb-3">
            <?php 
            if (!empty($data['tugas'])) {
                foreach ($data['tugas'] as $tugas_tergabung) {
                    if ($tugas_tergabung['admin'] !== $_COOKIE['id']) {
            ?>
                <div class="d-flex flex-column me-4" style="width: 250px; height: 250px;">
                    <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light">
                        <label class="lead fw-semibold">JUDUL TUGAS</label>
                        <label class="lead fs-6">DESKRIPSI</label>
                    </div>
                    <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                        <label class="align-self-center">DEADLINE</label>
                        <a href="" class="btn btn-secondary">Upload</a>
                    </div>
                </div>
            <?php 
                    }
                }
            } else {
                echo "Data tugas tidak tersedia.";
            }
            ?>
            </div>

            <h3 class="display-6 fw-semibold mb-3">Tugas yang dibuat</h3>

            <div class="d-flex mb-3">
            <?php 
            if (!empty($data['tugas'])) {
                foreach ($data['tugas'] as $tugas_dibuat) {
                    if ($tugas_dibuat['admin'] == $_COOKIE['id']) {
            ?>
                <div class="d-flex flex-column me-4" style="width: 250px; height: 250px;">
                    <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light">
                        <label class="lead fw-semibold">JUDUL TUGAS</label>
                        <label class="lead fs-6">DESKRIPSI</label>
                    </div>
                    <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                        <label class="align-self-center">DEADLINE</label>
                        <a href="" class="btn btn-secondary">Lihat</a>
                    </div>
                </div>
            <?php 
                    }
                }
            } else {
                echo "Data tugas tidak tersedia.";
            }
            ?>
            </div>
        </div>


        <!--  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>