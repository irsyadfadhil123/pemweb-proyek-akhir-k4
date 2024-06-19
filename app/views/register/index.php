<div id="app" style="opacity: 0;">
    <div class="d-flex">
        <div class="flex-fill d-flex align-items-center justify-content-center" style="width: 35vw;">
            <figure class="text-end">
                <blockquote class="blockquote">
                    <p>Seseorang yang tidak pernah melakukan kesalahan berarti tidak pernah mencoba hal baru.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <label>Albert Einstein</label>
                </figcaption>
            </figure>
        </div>
        <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/register/tambah" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                <p class="text-light fs-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Buat Akun</p>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                <input type="text" name="nama" placeholder="Nama" class="form-control mb-2 shadow" required>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                <a class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-2" style="cursor: pointer;">Masuk</a>
                <label class="text-danger mt-1 mb-2"><?php Flasher::flash();?></label>
                <button type="submit" class="btn btn-outline-warning align-self-start shadow mt-2">Buat Akun</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#app").fadeTo(500, 1);

    $("a").on("click", function() {
        $("#app").fadeTo(500, 0, function() {
            $(location).prop("href", "<?= BASEURL; ?>/login");
        });
    });
</script>