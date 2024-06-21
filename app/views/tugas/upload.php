<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $data['type'] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL;?>/file/tambah/<?= $data['tugas']['tugas_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload File:</label>
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>
                    <?php if($data['type'] === "Edit Tugas") { ?>
                    <a href="<?= BASEURL ?>/files/<?= $data['file']['nama_file'] ?>" target="_blank"><button type="button" class="btn btn-primary">Lihat File</button></a>
                    <?php } ?>
                    <div class="col-auto">
                        <label for="catatan" class="col-form-label">Catatan:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="catatan" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload File</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="">
        <div class="task-details">
            <div class="row">
                <?php Flasher::flash();?>
            </div>
            <div class="detail">
                <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
                <div>
                    <h2><?= $data['tugas']['judul'] ?></h2>
                </div>
                <div>
                    <label class="lead">Kode Kelas</label>
                    <h3 class="display-7 text-secondary"><?= $data['tugas']['kode_tugas'] ?></h3>
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
                    <a href="<?= BASEURL?>/kehadiran/kehadiran/<?= $data['tugas']['tugas_id'];?>" class="btn btn-primary">Catat Kehadiran</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <?= $data['type'] ?>                        
                    </button>
                </div>
            </div>
        </div>

        <div class="discussion">
            <p class="diskusi fs-2 text">Forum Diskusi</p>
            <div class="new-discussion">
                <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post">
                    <input type="hidden" name="type" value="user">
                    <label class="fs-4 text" for="pesan">Buat Diskusi</label>
                    <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            <?php if (!empty($data['diskusi'])): ?>
    <?php foreach ($data['diskusi'] as $diskusi): ?>
        <div class="message">
            <img src="<?= BASEURL . "/img/" . $diskusi['gambar'] ?>" alt="User Image">
            <div>
                <p class="fs-4 text"><?= ($diskusi['user_id'] == $data['tugas']['admin']) ? $diskusi['nama'] . " (Pemberi Tugas)" : $diskusi['nama']?></p>
                <p class="fs-6 text"><?= $diskusi['username']?> | <?= $diskusi['waktu']?></p>
                <p class="pesan fs-5 text"><?= $diskusi['pesan']?></p>
            </div>
        </div>
        <form action="<?= BASEURL; ?>/diskusi/user/<?= $data['tugas']['tugas_id'] ?>" method="post" class="reply-form">
            <input type="hidden" name="type" value="user">
            <input type="hidden" name="reff" value="<?= $diskusi['diskusi_id'] ?>">
            <label for="pesan">Kirim Balasan</label><br>
            <input type="textarea" name="pesan" placeholder="Tulis pesan disini" required>
            <button type="submit" class="btn btn-primary">Balas</button>
        </form>

        <?php if (isset($diskusi['balasan'])): ?>
            <a class="btn-balasan btn btn-dark btn-sm" data-bs-toggle="collapse" href="#multiCollapseExample<?= $diskusi['diskusi_id'] ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample<?= $diskusi['diskusi_id'] ?>">Tampilkan Balasan</a>
            <div class="collapse multi-collapse" id="multiCollapseExample<?= $diskusi['diskusi_id'] ?>">
                <?php foreach ($diskusi['balasan'] as $reff): ?>
                    <div class="card card-body">
                        <div class="message reply">
                            <img src="<?= BASEURL . "/img/" . $reff['gambar'] ?>" alt="User Image">
                            <div>
                                <p class="fs-4 text"><?= ($reff['user_id'] == $data['tugas']['admin']) ? $reff['nama'] . " (Pemberi Tugas)" : $reff['nama']?></p>
                                <p class="fs-6 text"><?= $reff['username']?> | <?= $reff['waktu']?></p>
                                <p class="pesan fs-5 text"><?= $reff['pesan']?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tidak ada Diskusi</p>
<?php endif; ?>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #212529;
            color: white;
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
            color: white; /* Change header text color to white */
        }
        .header .lead {
            color: white;
        }
        .task-details {
            background-color: #1a1d20;
            padding: 0px 20px 20px 20px;
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
            background-color: #1a1d20;
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
            margin-top: 10px;
        }
        .discussion .reply-form input[type="textarea"] {
            margin-bottom: 10px;
            padding: 5px;
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
            margin: 0;
        }
        .modal-content {
            background-color: #212529;
        }
        .btn-close {
            background-color: white;
        }
        .discussion {
            margin: 20px;
        }
        p {
            margin: 0px;
        }
        .pesan {
            margin: 10px 0px 10px 0px;
        }
        .diskusi {
            margin: 0px 0px 20px 0px;
        }
        .reply {
            margin-left: 65px;
        }
        .reply-form {
            padding: 0px;
        }
        .card {
            background-color: #212529;
            border: none;
            padding: 20px 0px 20px 0px;
        }
        .btn-balasan {
            border: none;
            padding: 0px;
            color: #1860d4;
        }
        .btn-balasan:hover {
            background-color: #212529;
            border: none;
        }
    </style>
