        <div class="d-flex justify-content-between bg-light align-self-stretch p-3 shadow mb-3">
            <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
            <h3 class="display-6 fs-4 fw-semibold align-self-center">Buat Tugas</h3>
            <div class="align-self-center">
                <label class="lead fw-medium">Nama User</label>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
            <form action="<?= BASEURL; ?>/tugas/buat" method="post" class="d-flex flex-column" style="width: 75vw;">
                <h3 class="display-5 mb-3">Buat Tugas</h3>
                <input type="hidden" name="id" value="$_SESSION['id']">
                <input type="text" name="judul" placeholder="Judul" class="form-control align-self-center mb-3">
                <textarea name="deskripsi" placeholder="Deskripsi" rows="8" class="form-control align-self-center mb-3"></textarea>
                <input type="text" name="kode_tugas" placeholder="Kode Tugas" class="form-control align-self-center mb-3">
                <h3 class="lead align-self-start mb-3">Deadline</h3>
                <input type="datetime-local" name="deadline" placeholder="Deadline" class="form-control align-self-center mb-3 align-self-start">
                
                <button type="submit" class="btn btn-success align-self-end">Buat Tugas</button>
            </form>
        </div>