        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form action="<?= BASEURL; ?>/tugas/buat" method="post" class="d-flex flex-column p-5 border border-secondary-subtle rounded align-items-center shadow" style="width: 50vw;">
                <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning align-self-start">Kembali</a>
                <h3 class="display-5 mb-3">Buat Tugas</h3>
                <input type="hidden" name="id" value="$_SESSION['id']">
                <input type="text" name="judul" placeholder="Judul" class="form-control align-self-center mb-3">
                <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control align-self-center mb-3">
                <input type="text" name="kode_tugas" placeholder="Kode Tugas" class="form-control align-self-center mb-3">
                <h3 class="lead align-self-start mb-3">Deadline</h3>
                <input type="date" name="deadline" placeholder="Deadline" class="form-control align-self-center mb-3 align-self-start">
                
                <button type="submit" class="btn btn-success align-self-end">Buat Tugas</button>
            </form>
        </div>