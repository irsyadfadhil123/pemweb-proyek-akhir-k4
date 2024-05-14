        <div class="login-flex-main">
            <form action="<?= BASEURL; ?>/login/verifikasi" method="post" class="login-flex-box">
                <p class="login-login-text">Login</p>
                <input type="text" name="username" placeholder="Username" class="login-text-input">
                <input type="password" name="password" placeholder="Password" class="login-text-input">
                <div class="login-remember">
                    <input type="checkbox" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>
                <a href="<?= BASEURL; ?>/register" class="login-account-link">I don't have an account</a>
                <button type="submit" class="login-submit-button">Login</button>
            </form>
        </div>