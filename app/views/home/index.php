    <div id="app">
        <div class="position-relative">
            <nav class="navbar navbar-dark bg-dark navbar-custom">
                <div class="container-fluid">
                    <a href="<?= BASEURL; ?>/home/logout" class="btn btn-warning rounded-0 me-auto">
                        &larr; Keluar
                    </a>
                    <a href="<?= BASEURL; ?>/tugas/index" class="btn btn-warning rounded-0 mx-2">
                        Kelas
                    </a>
                    <a href="<?= BASEURL; ?>/home/profil" class="btn btn-warning rounded-0">
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

    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.37/dist/vue.global.prod.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    show: false,
                };
            },
            mounted() {
                this.show = true;
            }
        });

        app.mount("#app");
    </script>