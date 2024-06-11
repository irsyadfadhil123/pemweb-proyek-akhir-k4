<div class="header">
    <a href="<?= BASEURL?>/tugas/index" class="btn btn-outline-warning">Kembali</a>
    <label class="lead fw-medium">Nama User</label>
</div>

<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher -->

<div class="content">
    <form action="<?= BASEURL; ?>/tugas/tambah" method="post" class="form-container">
        <h3 class="display-5">Tambah Tugas</h3>
        <input type="text" name="kode_tugas" placeholder="Kode Tugas" required class="form-control align-self-center mb-3">
        <button type="submit" class="btn btn-success align-self-end">Tambah Tugas</button>
    </form>
</div>

<style>
    body {
        background-color: #2c2c2c;
        color: white;
    }
    .header {
        background-color: #343a40;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header h3, .header label {
        color: white;
    }
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 85vh;
    }
    .form-container {
        background-color: #343a40;
        padding: 20px;
        border-radius: 5px;
        width: 75vw;
    }
    .form-container h3 {
        color: white;
        text-align: center;
        margin-bottom: 20px;
        }
    .form-container input, .form-container button {
        margin-bottom: 15px;
    }
    .btn-outline-warning {
        border-color: #ffc107;
        color: #ffc107;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: black;
    }
    .btn-success {
        align-self: flex-end;
    }
</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
