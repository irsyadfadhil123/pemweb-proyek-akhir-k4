<div class="container mt-4">
        <a href="<?= BASEURL?>/tugas/upload/<?= $data['tugas']['tugas_id'] ?>/" class="btn btn-outline-warning">Kembali</a>
        <form action="<?= BASEURL;?>/file/tambah/<?= $data['tugas']['tugas_id'] ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="">
            <label for="catatan">Catatan: </label>
            <input type="text" name="catatan">
            <button type="submit">Upload File</button>
        </form>
        <!-- flasher -->
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash();?>
            </div>
        </div>
        <!-- flasher -->
    </div>

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            padding: 20px; /* padding untuk memberikan ruang di sekitar konten */
        }

        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #121212;
        }

        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        form input[type="file"],
        form input[type="text"],
        form button[type="submit"] {
            margin-top: 10px;
            margin-bottom: 10px;
            color: #e0e0e0;
            background-color: #333;
            border: 1px solid #666;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        form button[type="submit"] {
            background-color: #1a73e8;
            border-color: #1a73e8;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background-color: #155ab6;
            border-color: #155ab6;
        }

        .flash-message {
            background-color: #333;
            color: #e0e0e0;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
