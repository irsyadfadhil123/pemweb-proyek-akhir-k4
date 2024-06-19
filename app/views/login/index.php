<div id="app" style="opacity: 0;">
    <div class="d-flex">
        <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/login/verifikasi" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                <p class="text-light fs-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Masuk</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                <div class="form-check mb-2">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label text-light">Ingat Saya</label>
                </div>
                <a class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-2" style="cursor: pointer;">Buat Akun</a>
                <label class="text-danger mt-1 mb-2"><?php Flasher::flash();?></label>
                <button type="submit" class="btn btn-outline-warning align-self-start shadow mt-2">Masuk</button>
            </form>
        </div>
        <div class="flex-fill d-flex align-items-center justify-content-center" style="width: 35vw;">
            <figure class="text-end">
                <blockquote class="blockquote">
                    <p>Mendidik pikiran tanpa mendidik hati bukanlah sebuah pendidikan.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <label>Aristotle</label>
                </figcaption>
            </figure>
        </div>
    </div>
</div>

<script>
    $("#app").fadeTo(500, 1);

    $("a").on("click", function() {
        $("#app").fadeTo(500, 0, function() {
            $(location).prop("href", "<?= BASEURL; ?>/register");
        });
    });
</script>