        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/register/tambah" method="post" class="d-flex flex-column border border-secondary-subtle p-4">
                <p class="fs-1">Register</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                <a href="<?= BASEURL; ?>/login" class="align-self-end link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I already have an account</a>
                <button type="submit" class="btn btn-success align-self-start">Register</button>
            </form>
        </div>