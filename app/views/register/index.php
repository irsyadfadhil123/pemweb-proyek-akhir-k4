        <div class="register-flex-main">
            <form action="<?= BASEURL; ?>/register/tambah" method="post" class="register-flex-box">
                <p class="register-register-text">Register</p>
                <input type="text" name="username" placeholder="Username" class="register-text-input">
                <input type="text" name="nama" placeholder="Nama" class="register-text-input">
                <input type="password" name="password" placeholder="Password" class="register-text-input">
                <div class="register-remember">
                    <input type="checkbox" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>
                <a href="<?= BASEURL; ?>/login" class="register-account-link">I already have an account</a>
                <button type="submit" class="register-submit-button">Register</button>
            </form>
        </div>