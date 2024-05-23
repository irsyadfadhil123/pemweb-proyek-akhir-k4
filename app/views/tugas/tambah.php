        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/tugas/tambah" method="post" class="d-flex flex-column p-5 border border-secondary-subtle rounded align-items-center shadow" style="width: 50vw;">
                <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning align-self-start">Kembali</a>
                <h3 class="display-5">Tambah Tugas</h3>
                <br class="mb-4">
                <input type="text" name="kode_tugas" placeholder="Kode Tugas" required class="form-control align-self-center">
                <br class="mb-5">
                <button type="submit" class="btn btn-success align-self-end">Tambah Tugas</button>
            </form>
        </div>