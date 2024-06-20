<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        h5.mt-0 {
        color: #DDE7EA; /* Change this to your desired color */
        }

        ::selection {
            background: #ffbb33;
            color: #121212;
        }

        .card-title, .card-text, p {
            color: #e0e0e0;
        }

        .media {
            margin-bottom: 20px;
        }

        .media-body {
            padding-top: 10px;
        }

        .btn-primary,
        .btn-secondary,
        .btn-info,
        .btn-reply {
            margin-top: 10px;
            color: #fff;
        }

        .btn-primary {
            background-color: #1a73e8;
            border-color: #1a73e8;
        }

        .btn-primary:hover {
            background-color: #155ab6;
            border-color: #155ab6;
        }

        .btn-secondary {
            background-color: #ff8c00;
            border-color: #ff8c00;
        }

        .btn-secondary:hover {
            background-color: #e07b00;
            border-color: #e07b00;
        }

        .btn-info {
            background-color: #00bcd4;
            border-color: #00bcd4;
        }

        .btn-info:hover {
            background-color: #0097a7;
            border-color: #0097a7;
        }

        .btn-reply {
            background-color: #4caf50;
            border-color: #4caf50;
        }

        .btn-reply:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: #1e1e1e;
        }

        .card-body {
            padding: 20px;
        }

        .card-title,
        .card-text,
        .text-warning {
            color: #e0e0e0;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        form {
            margin-bottom: 20px;
        }

        form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #666;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            background-color: #333;
            color: #e0e0e0;
        }

        form button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background-color: #555;
        }

        .img-thumbnail {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #555;
        }
    </style>
</head>
<body>
    <!-- flasher -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <!-- flasher -->
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
                <div class="d-flex">
                    <a href="<?= BASEURL ?>/kehadiran/listKehadiran/<?= $data['tugas']['tugas_id'] ?>" class="btn btn-info mr-2">Daftar Kehadiran</a>
                    <a href="<?= BASEURL; ?>/tugas/lihatFile/<?= $data['tugas']['tugas_id'] ?>" class="btn btn-primary">Lihat Tugas</a>
                </div>
            </div>
        </div>
        <div>
            <h2>Forum Diskusi</h2>
            <div class="card mb-3">
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
        <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post" class="mb-4">
            <label for="pesan">Kirim Pesan</label>
            <textarea name="pesan" class="form-control" placeholder="Tulis pesan disini" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
        </form>
        <?php
        if (!empty($data['diskusi'])) {
            foreach ($data['diskusi'] as $diskusi) {
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <img src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>" class="img-thumbnail mb-2" alt="User Image">
                <p>Nama: <?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama']?></p>
                <p>Username: <?= $diskusi['username']?></p>
                <p>Pesan: <?= $diskusi['pesan']?></p>
                <p>Waktu: <?= $diskusi['waktu']?></p>
                <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post" class="mt-2">
                    <input type="hidden" name="reff" value="<?= $diskusi['diskusi_id'] ?>">
                    <label for="pesan">Kirim Balasan</label>
                    <textarea name="pesan" class="form-control" placeholder="Tulis pesan disini" required></textarea>
                    <button type="submit" class="btn btn-reply mt-2">Balas</button>
                </form>
                <?php 
                    if (isset($diskusi['balasan'])) {
                        foreach ($diskusi['balasan'] as $reff) {
                ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <img src="<?= BASEURL . "/img/" . $reff['gambar'] ?>" class="img-thumbnail mb-2" alt="User Image">
                        <p>Nama: <?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama']?></p>
                        <p>Username: <?= $reff['username']?></p>
                        <p>Pesan: <?= $reff['pesan']?></p>
                        <p>Waktu: <?= $reff['waktu']?></p>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <?php
            }
        } else {
        ?>
        <p class="text-warning">Tidak ada Diskusi</p>
        <?php
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
