<div class="container mt-4">
    <a href="<?= BASEURL ?>/tugas/index" class="btn btn-secondary mb-4">Kembali</a>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lihat Tugas</h1>
        <div>Nama User <i class="fas fa-user"></i></div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"><?= $data['tugas']['judul'] ?></h5>
            <p class="card-text"><?= $data['tugas']['deskripsi'] ?></p>
            <p>Kode Kelas: <?= $data['tugas']['tugas_id'] ?></p>
            <p>Deadline: <span class="badge badge-danger"><?= $data['tugas']['deadline'] ?></span></p>
            <a href="<?= BASEURL ?>/tugas/listKehadiran/<?= $data['tugas']['tugas_id'] ?>" class="btn btn-secondary">Daftar Kehadiran</a>
        </div>
    </div>
    <div>
        <h2>Forum Diskusi</h2>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <i class="fas fa-user fa-2x mr-3"></i>
                    <div class="media-body">
                        <h5 class="mt-0">Nama User</h5>
                        <p>Isi Diskusi</p>
                        <button class="btn btn-primary">Jawab</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
