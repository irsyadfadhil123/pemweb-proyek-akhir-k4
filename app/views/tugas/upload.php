<a href="<?= BASEURL?>/tugas/index">Kembali</a>
<h1><?= $data['tugas']['tugas_id'] ?></h1>
<a href="<?= BASEURL?>/tugas/kehadiran/<?= $data['tugas']['tugas_id'];?>">Kehadiran</a>


<h2><?= $data['tugas']['judul'] ?></h2>
<h2><?= $data['tugas']['deskripsi'] ?></h2>
<h2><?= $data['tugas']['deadline'] ?></h2>

<h1>Forum Diskusi:</h1>