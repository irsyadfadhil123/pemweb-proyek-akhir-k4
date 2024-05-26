        <div class="p-4" style="height: 100vh;">
            <div class="d-flex flex-column p-4 border" style="height: 100%;">

                <div class="d-flex mb-3 justify-content-between">
                    <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
                    <div class="align-self-center">
                        <label class="lead fw-semibold">Nama User</label>
                    </div>
                    
                </div>
                
                <div class="d-flex mb-3">
                    <div class="d-flex flex-column flex-grow-1 bg-dark-subtle rounded-start p-3">
                        <label class="lead"><?= $data['tugas']['tugas_id'] ?></label>
                        <label class="display-6 fw-medium"><?= $data['tugas']['judul'] ?></label>
                        <p class="lead"><?= $data['tugas']['deskripsi'] ?></p>
                    </div>
                    <div class="d-flex flex-column border border-dark-subtle rounded-end p-3">
                        <label class="lead">Kode Kelas</label>
                        <hr>
                        <label class="display-6 text-secondary">D081</label>
                    </div>
                </div>

                <div class="d-flex align-self-end mb-3">
                    <a href="<?= BASEURL?>/tugas/kehadiran/<?= $data['tugas']['tugas_id'];?>" class="btn btn-info me-3">Catat Kehadiran</a>
                    <a href="" class="btn btn-info">Upload File</a>
                </div>


                <div class="d-flex flex-column bg-dark-subtle rounded align-self-start p-2 mb-3">
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
        </div>