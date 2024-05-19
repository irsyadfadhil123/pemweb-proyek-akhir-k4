<a href="<?= BASEURL?>/tugas/index">Kembali</a>

<h1><?= $data['tugas']['tugas_id'] ?></h1>


<h2><?= $data['tugas']['judul'] ?></h2>
<h2><?= $data['tugas']['deskripsi'] ?></h2>
<h2><?= $data['tugas']['deadline'] ?></h2>

<a href="<?= BASEURL?>/tugas/listKehadiran/<?= $data['tugas']['tugas_id'] ?>">Daftar Kehadiran</a>

<h1>Forum Diskusi:</h1>