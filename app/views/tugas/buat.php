    <a href="<?= BASEURL?>/tugas/index" class="back btn btn-outline-warning">Kembali</a>

<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher -->

<div class="content">
    <form action="<?= BASEURL; ?>/tugas/buat" method="post" class="form-container">
        <h3 class="display-5 mb-3">Buat Tugas</h3>
        <input type="hidden" name="id" value="<?= $_COOKIE['id'] ?>">
        <input type="text" name="judul" placeholder="Judul" class="form-control mb-3">
        <textarea name="deskripsi" placeholder="Deskripsi" rows="8" class="form-control mb-3"></textarea>
        <input type="text" name="kode_tugas" placeholder="Kode Tugas" class="form-control mb-3">
        <h3 class="lead mb-3">Deadline</h3>
        <input type="datetime-local" name="deadline" placeholder="Deadline" class="form-control mb-3">
        <button type="submit" class="btn btn-success">Buat Tugas</button>
    </form>
</div>

<style>
    body {
        background-color: #212529;
        color: #212529;
    }
    .header {
        background-color: #343a40;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header a, .header label {
        color: white;
    }
    .content {
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .form-container {
        background-color: #383c44;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
    }
    .btn-outline-warning {
        border-color: #ffc107;
        color: white;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: black;
    }
    .back {
        margin: 20px;
    }
    h3 {
        color: white;
    }
</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
