<a href="<?= BASEURL?>/tugas/upload/<?= $data['tugas']['tugas_id'] ?>/" class="btn btn-outline-warning">Kembali</a>
<form action="<?= BASEURL;?>/file/tambah/<?= $data['tugas']['tugas_id'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="edit">
    <input type="file" name="file" id="">
    <a href="<?= BASEURL ?>/files/<?= $data['type']['nama_file'] ?>" target="_blank" rel="noopener noreferrer" >Lihat File</a>
    <label for="catatan">Catatan: </label>
    <input type="text" name="catatan" value="<?= isset($data['type']['catatan']) ? $data['type']['catatan'] : "" ?>">
    <button type="submit">Upload File</button>
</form>
<!-- flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<!-- flasher -->
