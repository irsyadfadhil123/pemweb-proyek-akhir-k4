        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL;?>/home/editProfil" method="post" class="d-flex flex-column border border-secondary rounded p-5 shadow" style="width: 50vw;">
                <a href="<?= BASEURL;?>/home/profil" class="btn btn-outline-warning align-self-start mb-3">Kembali</a>
                <input type="hidden" name="password" value="<?= $data['profil']['password'] ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input type="text"name="username" value="<?= $data['profil']['username'] ?>" placeholder="Username" required class="form-control">
                </div>
                <input type="text" name="nama" value="<?= $data['profil']['nama'] ?>" placeholder="Nama" required class="form-control mb-3">
                <div class="input-group mb-3">
                    <input type="password" name="newPassword" id="" placeholder="Password Baru" class="form-control">
                    <input type="password" name="confirmPasword" placeholder="Konfirmasi Password" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="oldPassword" id="" placeholder="Password Lama" required class="form-control">
                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                </div>
            </form>
        </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: block;
        }
        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Foto Profil</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileToUpload">Pilih Foto Profil:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
                <input type="submit" value="Upload Foto" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
