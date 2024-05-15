<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="" method="post" class="d-flex flex-column border border-secondary-subtle p-4">
                <p class="fs-1">Login</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                <div class="form-check mb-2">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>
                <a href="" class="align-self-end link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I don't have an account</a>
                <button type="submit" class="btn btn-primary align-self-start">Login</button>
            </form>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="" method="post" class="d-flex flex-column border border-secondary-subtle p-4">
                <p class="fs-1">Register</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                <a href="" class="align-self-end link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I already have an account</a>
                <button type="submit" class="btn btn-success align-self-start">Register</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>