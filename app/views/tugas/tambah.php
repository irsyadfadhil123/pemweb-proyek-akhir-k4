        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Tambah Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>
        <!-- flasher -->
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash();?>
            </div>
        </div>
        <!-- flasher -->

        <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
            <form action="<?= BASEURL; ?>/tugas/tambah" method="post" class="d-flex flex-column" style="width: 75vw;">
                <h3 class="display-5">Tambah Tugas</h3>
                <br class="mb-3">
                <input type="text" name="kode_tugas" placeholder="Kode Tugas" required class="form-control align-self-center">
                <br class="mb-3">
                <button type="submit" class="btn btn-success align-self-end">Tambah Tugas</button>
            </form>
        </div>