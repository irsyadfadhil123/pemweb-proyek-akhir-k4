<body class="bg-dark text-light">
    <div class="container mt-4">
        <a href="<?= BASEURL ?>/tugas/lihat/<?= $data['tugas_id'] ?>" class="btn btn-secondary mb-4">Kembali</a>

        <?php if (!empty($data['files'])): ?>
            <?php foreach($data['files'] as $file): ?>
                <div class="card mb-4 bg-secondary text-light">
                    <div class="card-body">
                        <img src="<?= BASEURL . "/img/" . $file['gambar'] ?>" class="img-thumbnail mb-2" alt="User Image">
                        <p><strong>Nama:</strong> <?= $file['nama'] ?></p>
                        <p><strong>Username:</strong> <?= $file['username'] ?></p>
                        <p><strong>Nilai:</strong> <?= (isset($file['nilai'])) ? $file['nilai'] : "Belum dinilai" ?></p>
                        <a href="<?= BASEURL . "/files/" . $file['nama_file'] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Lihat File</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-warning">File Tugas tidak ditemukan</p>
        <?php endif; ?>

        <!-- pagination  -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanFile']; $i++): ?>
                    <li class="page-item <?= ($i == $data['pagination']['halamanAktifFile']) ? 'active' : '' ?>">
                        <a class="page-link" href="<?= BASEURL ?>/tugas/lihatFile/<?= $data['tugas_id'] ?>/<?= $i ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
        <!-- pagination  -->
    </div>

    <style>
        /* Styling the card for each file */
        .card {
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .card-body {
            padding: 15px;
        }

        .img-thumbnail {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #555;
        }

        p {
            margin: 0 0 10px;
            color: #e0e0e0;
        }

        .btn-primary {
            margin-top: 10px;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .page-link {
            color: #007bff;
            background-color: #2c2c2c;
            border: 1px solid #444;
        }

        .page-link:hover {
            text-decoration: none;
            background-color: #444;
        }

        .page-item:not(.active) .page-link {
            color: #007bff;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
