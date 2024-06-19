<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <div class="position-relative">
                <nav class="navbar navbar-dark bg-dark navbar-custom">
                    <div class="container-fluid">
                        <a class="btn btn-warning rounded-0 me-auto">
                            &larr; Keluar
                        </a>
                        <a class="btn btn-warning rounded-0 mx-2">
                            Kelas
                        </a>
                        <a class="btn btn-warning rounded-0">
                            Profil
                        </a>
                    </div>
                </nav>

                <div class="bg-dark text-light p-4 content">
                    <div class="container">
                        <transition name="slide-fade">
                            <h1 v-if="show" class="welcome-text mt-5 mb-5 text-center">Selamat Datang, [ INSERT NAME HERE ]</h1>
                        </transition>

                        <div class="reminder-box">
                            <transition name="slide-fade">
                                <div v-if="show">
                                    <h2 class="reminder-title mb-3">Pengingat</h2>
                                    <?php
                                    if (!empty($data['pengingat'])) {
                                        foreach ($data['pengingat'] as $tugas) {
                                            if (!($tugas['hari'] < 1)) {
                                    ?>
                                                <hr>
                                                <label class="fs-5"><?= $tugas['judul'] ?></label><br>
                                                <label>Deadline: <?= $tugas['deadline'] ?></label><br>
                                                <label>Tersisa <?= $tugas['hari'] ?> hari lagi</label>
                                    <?php
                                            } else if (!($tugas['jam'] < 1)) {
                                    ?>
                                                <hr>
                                                <label class="fs-5"><?= $tugas['judul'] ?></label><br>
                                                <label>Deadline: <?= $tugas['deadline'] ?></label><br>
                                                <label>Tersisa <?= $tugas['jam'] ?> jam lagi</label>
                                    <?php
                                            } else {
                                    ?>
                                                <hr>
                                                <label class="fs-5"><?= $tugas['judul'] ?></label><br>
                                                <label>Deadline: <?= $tugas['deadline'] ?></label><br>
                                                <label>Tersisa <?= $tugas['menit'] ?> menit lagi</label>
                                    <?php
                                            }
                                        }
                                    } else {
                                    ?>
                                        <hr>
                                        <label>Anda tidak memiliki tugas saat ini</label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </transition>
                        </div>

                        <?php if (isset($_SESSION["flash"])) { ?>
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div class="toast align-items-center text-bg-success border-0 show align-self-end" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            <?php Flasher::flash(); ?>
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- pagination pengingat -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-4">
                                <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugas']; $i++) : ?>
                                    <li class="page-item <?= ($i == $data['pagination']['halamanAktifTugas']) ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?= BASEURL ?>/home/index/<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                        <!-- pagination pengingat -->
                    </div>
                </div>
            </div>
        </div>

        <style>
            body {
                background-color: #343a40;
                color: #fff;
            }

            .navbar-custom {
                background-color: #343a40 !important;
            }

            .content {
                min-height: calc(100vh - 56px);
            }

            .reminder-box {
                background-color: rgba(255, 255, 255, 0.1);
                padding: 1.5rem;
                border-radius: 0.5rem;
                margin-top: 50px;
            }

            .reminder-title {
                font-size: 1.8rem;
                font-weight: bold;
                color: #fff;
            }

            .reminder-content {
                font-size: 1.2rem;
                color: #fff;
            }
            
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>