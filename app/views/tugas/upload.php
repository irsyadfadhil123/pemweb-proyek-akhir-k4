<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        h5.mt-0,
        h5.card-title {
            color: #DDE7EA;
        }

        ::selection {
            background: #ffbb33;
            color: #121212;
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
        .text-warning,
        p {
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
            background-color: #1a73e8;
            color: white;
        }

        form button[type="submit"]:hover {
            background-color: #155ab6;
        }

        .img-thumbnail {
            max-width: 64px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #555;
        }

        .media-body h5,
        .media-body p {
            color: #e0e0e0;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="<?= BASEURL ?>/tugas/index" class="btn btn-secondary mb-4">Kembali</a>
            <div>
                <h1 class="d-inline">Upload Tugas</h1>
            </div>
            <div>Nama User <i class="fas fa-user"></i></div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><?= isset($data['tugas']['judul']) ? $data['tugas']['judul'] : '' ?></h5>
                <p class="card-text"><?= isset($data['tugas']['deskripsi']) ? $data['tugas']['deskripsi'] : '' ?></p>
                <p>Kode Kelas: <span class="text-secondary"><?= $data['tugas']['kode_tugas'] ?></span></p>
                <p>Deadline: <span class="badge badge-danger"><?= isset($data['tugas']['deadline']) ? $data['tugas']['deadline'] : '' ?></span></p>
                <div class="d-flex">
                    <a href="<?= BASEURL ?>/kehadiran/kehadiran/<?= $data['tugas']['tugas_id']; ?>" class="btn btn-info mr-2">Catat Kehadiran</a>
                    <a href="<?= BASEURL ?>/tugas/uploadFile/<?= $data['tugas']['tugas_id']; ?>" class="btn btn-primary"><?= isset($data['type']) ? $data['type'] : '' ?></a>
                </div>
            </div>
        </div>
        <div>
            <h2>Forum Diskusi</h2>
            <?php if (!empty($data['diskusi'])) : ?>
                <?php foreach ($data['diskusi'] as $diskusi) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="media">
                                <img src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>" class="mr-3 img-thumbnail" alt="User Image">
                                <div class="media-body">
                                    <h5 class="mt-0">Nama: <?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama'] ?></h5>
                                    <p>Username: <?= $diskusi['username'] ?></p>
                                    <p>Pesan: <?= $diskusi['pesan'] ?></p>
                                    <p>Waktu: <?= $diskusi['waktu'] ?></p>
                                    <button class="btn btn-primary">Jawab</button>
                                </div>
                            </div>
                            <?php if (isset($diskusi['balasan'])) : ?>
                                <?php foreach ($diskusi['balasan'] as $reff) : ?>
                                    <div class="media mt-4">
                                        <img src="<?= BASEURL . "/img/" . $reff['gambar'] ?>" class="mr-3 img-thumbnail" alt="User Image">
                                        <div class="media-body">
                                            <h5 class="mt-0">Nama: <?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama'] ?></h5>
                                            <p>Username: <?= $reff['username'] ?></p>
                                            <p>Pesan: <?= $reff['pesan'] ?></p>
                                            <p>Waktu: <?= $reff['waktu'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-warning">Tidak ada Diskusi</p>
            <?php endif; ?>
        </div>
        <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post" class="mb-4">
            <input type="hidden" name="type" value="user">
            <label for="pesan">Kirim Pesan</label>
            <textarea name="pesan" class="form-control" placeholder="Tulis pesan disini" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
