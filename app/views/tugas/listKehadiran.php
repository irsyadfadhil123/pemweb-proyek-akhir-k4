<div id="attendance-app">
    <div style="position: relative;">
        <div class="d-flex bg-dark z-1" style="box-shadow: 0px 10px 30px rgb(25, 25, 25); position: relative;">
            <a href="javascript:history.go(-1)" class="p-3 btn btn-warning custom-btn me-auto">
                &larr; Back
            </a>
        </div>

        <div class="bg-dark text-light p-4" style="min-height: 100vh; position: relative;">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <?php Flasher::flash();?>
                </div>
            </div>

            <h2 class="mt-5 mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Attendance List</h2>

            <div class="pagination mb-4">
                <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanListKehadiran']; $i++): ?>
                    <a href="<?= BASEURL ?>/kehadiran/listKehadiran/<?= $data['tugas_id'] ?>/<?= $i ?>" class="btn btn-outline-secondary custom-btn <?= $i == $data['pagination']['halamanAktifListKehadiran'] ? 'active' : '' ?>">
                        <?= $i; ?>
                    </a>
                <?php endfor; ?>
            </div>

            <?php if (!empty($data['user'])): ?>
                <div class="row">
                    <?php foreach ($data['user'] as $userList): ?>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card bg-secondary text-light">
                                <img src="<?= BASEURL ?>/img/<?= $userList['gambar'] ?>" class="card-img-top" alt="<?= $userList['nama']; ?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $userList['nama']; ?></h4>
                                    <h5 class="card-text"><?= $userList['username']; ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    Attendance list is empty.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .custom-btn {
        border-radius: 10px; /* Rounded corners */
        margin: 0 3px; /* Narrow margin */
        padding: 3px 10px; /* Smaller padding for thinner appearance */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Consistent font */
        font-size: 14px; /* Smaller font size */
        min-width: auto; /* Ensure button width adjusts to content */
    }

    .pagination .btn.active {
        font-weight: bold;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
    }

    .alert {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
