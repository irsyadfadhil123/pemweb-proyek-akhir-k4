        <div class="register-flex-main">
            <form action="<?= BASEURL; ?>/register/tambah" method="post" class="register-flex-box">
                <p class="register-register-text">Register</p>
                <input type="text" name="username" placeholder="Username" class="register-text-input" required>
                <input type="text" name="nama" placeholder="Nama" class="register-text-input" required>
                <input type="password" name="password" placeholder="Password" class="register-text-input" required>
                <a href="<?= BASEURL; ?>/login" class="register-account-link">I already have an account</a>
                <button type="submit" class="register-submit-button">Register</button>
            </form>
        </div>
