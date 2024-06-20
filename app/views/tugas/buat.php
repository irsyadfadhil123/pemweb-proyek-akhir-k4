<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212; /* Latar belakang untuk dark mode */
            color: #e0e0e0; /* Warna teks */
            padding-top: 20px; /* Ruang atas */
        }

        .header {
            background-color: #1e1e1e; /* Warna header */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a,
        .header label {
            color: #ffc107; /* Warna teks header */
        }

        .content {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #333; /* Warna latar belakang form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container input[type="datetime-local"] {
            background-color: #444; /* Warna latar belakang input dan textarea */
            color: #e0e0e0; /* Warna teks input dan textarea */
            border: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            width: 100%;
        }

        .btn-outline-warning {
            border-color: #ffc107; /* Warna border tombol outline */
            color: #ffc107; /* Warna teks tombol outline */
        }

        .btn-outline-warning:hover {
            background-color: #ffc107; /* Warna latar belakang tombol outline saat dihover */
            color: #121212; /* Warna teks tombol outline saat dihover */
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
        <label class="lead fw-medium">Nama User</label>
    </div>

    <!-- flasher -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>
    <!-- flasher -->

    <div class="content">
        <form action="<?= BASEURL; ?>/tugas/buat" method="post" class="form-container">
            <h3 class="display-5 mb-3">Buat Tugas</h3>
            <input type="hidden" name="id" value="$_SESSION['id']">
            <input type="text" name="judul" placeholder="Judul" class="form-control mb-3">
            <textarea name="deskripsi" placeholder="Deskripsi" rows="8" class="form-control mb-3"></textarea>
            <input type="text" name="kode_tugas" placeholder="Kode Tugas" class="form-control mb-3">
            <h3 class="lead mb-3">Deadline</h3>
            <input type="datetime-local" name="deadline" placeholder="Deadline" class="form-control mb-3">
            <button type="submit" class="btn btn-success">Buat Tugas</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
