<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <!--  -->
        
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="#" method="post" class="d-flex flex-column border border-secondary rounded p-5 shadow" style="width: 50vw;">
                <a href="#" class="btn btn-outline-warning align-self-start mb-3">Kembali</a>
                <input type="hidden" name="password" value="">
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input type="text"name="username" value="" placeholder="Username" required class="form-control">
                </div>
                <input type="text" name="nama" value="" placeholder="Nama" required class="form-control mb-3">
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

        <!--  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>