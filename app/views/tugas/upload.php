<div class="container">
        <div class="header">
            <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Upload Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="task-details">
            <div class="detail">
                <div>
                    <label class="lead"><?= $data['tugas']['tugas_id'] ?></label>
                    <h2><?= $data['tugas']['judul'] ?></h2>
                </div>
                <div>
                    <label class="lead">Kode Kelas</label>
                    <h3 class="display-6 text-secondary">D-081</h3>
                </div>
            </div>
            <div class="detail">
                <p><?= $data['tugas']['deskripsi'] ?></p>
            </div>
            <div class="detail buttons">
                <div>
                    <label class="lead fw-medium">Deadline</label>
                    <div class="border-bottom border-secondary lead"><?= $data['tugas']['deadline'] ?></div>
                </div>
                <div class="btn-group">
                    <a href="<?= BASEURL?>/kehadiran/kehadiran/<?= $data['tugas']['tugas_id'];?>" class="btn btn-info">Catat Kehadiran</a>
                    <a href="<?= BASEURL?>/tugas/uploadFile/<?= $data['tugas']['tugas_id'];?>" class="btn btn-info"><?= $data['type'] ?></a>
                </div>
            </div>
        </div>

        <div class="discussion">
            <h2>Forum Diskusi</h2>
            <?php if (!empty($data['diskusi'])): ?>
                <?php foreach ($data['diskusi'] as $diskusi): ?>
                    <div class="message">
                        <img src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>" alt="User Image">
                        <div>
                            <p>Nama: <?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama']?></p>
                            <p>Username: <?= $diskusi['username']?></p>
                            <p>Pesan: <?= $diskusi['pesan']?></p>
                            <p>Waktu: <?= $diskusi['waktu']?></p>
                        </div>
                    </div>
                    <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post" class="reply-form">
                        <input type="hidden" name="type" value="user">
                        <input type="hidden" name="reff" value="<?= $diskusi['diskusi_id'] ?>">
                        <label for="pesan">Kirim Balasan</label>
                        <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
                        <button type="submit" class="btn btn-info">Balas</button>
                    </form>
                    <?php if (isset($diskusi['balasan'])): ?>
                        <?php foreach ($diskusi['balasan'] as $reff): ?>
                            <div class="message reply">
                                <img src="<?= BASEURL . "/img/" . $reff['gambar'] ?>" alt="User Image">
                                <div>
                                    <p>Nama: <?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama']?></p>
                                    <p>Username: <?= $reff['username']?></p>
                                    <p>Pesan: <?= $reff['pesan']?></p>
                                    <p>Waktu: <?= $reff['waktu']?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada Diskusi</p>
            <?php endif; ?>
            <a href="" class="btn btn-info align-self-end">Buat Diskusi</a>
        </div>

        <div class="new-discussion">
            <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
                <input type="hidden" name="type" value="user">
                <label for="pesan">Kirim Pesan</label>
                <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header, .discussion, .task-details, .new-discussion {
            margin-bottom: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
        }
        .header a {
            margin-right: 10px;
        }
        .header h3 {
            color: black; /* Change header text color to black */
        }
        .header .lead {
            color: black;
        }
        .task-details {
            background-color: #f1f3f5;
            padding: 20px;
            border-radius: 5px;
        }
        .task-details h2, .discussion h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .task-details .detail {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .task-details .detail:last-child {
            border-bottom: none;
        }
        .task-details .detail p {
            margin: 0;
        }
        .task-details .buttons {
            display: flex;
            justify-content: space-between;
        }
        .task-details .btn-group {
            margin-top: 15px;
            display: flex;
            gap: 10px; /* Add gap between buttons */
        }
        .new-discussion {
            background-color: #f1f3f5;
            padding: 20px;
            border-radius: 5px;
        }
        .new-discussion form {
            display: flex;
            flex-direction: column;
        }
        .new-discussion label {
            margin-bottom: 5px;
        }
        .new-discussion input[type="textarea"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .discussion .reply-form {
            margin-left: 30px;
            margin-top: 10px;
        }
        .discussion .reply-form input[type="textarea"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .message img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .message {
            display: flex;
            align-items: center;
        }
    </style>
