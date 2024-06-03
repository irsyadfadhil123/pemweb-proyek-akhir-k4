<a href="<?= BASEURL?>/tugas/upload/<?= $data['tugas']['tugas_id'] ?>/" class="btn btn-outline-warning">Kembali</a>
<form action="<?= BASEURL;?>/file/tambah/<?= $data['tugas']['tugas_id'] ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="">
    <button type="submit">Upload File</button>
</form>
<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher -->
