        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/login/verifikasi" method="post" class="d-flex flex-column border border-secondary-subtle p-4">
                <p class="fs-1">Login</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                <div class="form-check mb-2">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>
                <a href="<?= BASEURL; ?>/register" class="align-self-end link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I don't have an account</a>
                <button type="submit" class="btn btn-primary align-self-start">Login</button>
            </form>
        </div>