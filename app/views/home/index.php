        <div id="app">
            <div style="position: relative;">

                <div class="d-flex bg-dark z-1" style="box-shadow: 0px 10px 30px rgb(25, 25, 25); position: relative;">
                    <a href="<?= BASEURL; ?>/home/logout" class="p-3 btn btn-warning rounded-0 me-auto">
                        &larr; Keluar
                    </a>
                    <a href="<?= BASEURL; ?>/tugas/index" class="p-3 btn btn-warning rounded-0">
                        Kelas
                    </a>
                    <a href="<?= BASEURL; ?>/home/profil" class="p-3 btn btn-warning rounded-0">
                        Profil
                    </a>
                </div>

                <div class="bg-dark text-light p-4" style="min-height: 100vh; position: relative;">
                    <Transition name="slide-fade">
                        <h1 v-if="show" class="mt-5 mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Selamat Datang, [INSERT NAME HERE]</h1>
                    </Transition>
                    
                    <div class="bg-black bg-opacity-10 p-4 rounded">
                        <Transition name="slide-fade">
                            <div v-if="show">
                                <h2 class="mb-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pengingat</h2>
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
                                    <label style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Anda tidak memiliki tugas saat ini</label>
                                <?php
                                }
                                ?>
                            </div>
                        </Transition>
                    </div>
                    
                    <?php if(isset($_SESSION["flash"])) { ?>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div class="toast align-items-center text-bg-success border-0 show align-self-end" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        <?php Flasher::flash();?>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
<!-- pagination pengingat -->
<?php for ( $i = 1; $i <= $data['pagination']['jumlahHalamanTugas']; $i++) : ?>
    <?php if ($i == $data['pagination']['halamanAktifTugas']) : ?>
        <a href="<?= BASEURL ?>/home/index/<?= $i ?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="<?= BASEURL ?>/home/index/<?= $i ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
<!-- pagination pengingat -->

        </div>

        <script>
            const app = Vue.createApp({
                data() {return {
                    show: false,
                }},

                mounted() {
                    this.show = true;
                }   
            });

            app.mount("#app");
        </script>

        <style>
            .slide-fade-enter-active {
              transition: all 0.3s ease-out;
            }

            .slide-fade-leave-active {
              transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
            }

            .slide-fade-enter-from,
            .slide-fade-leave-to {
              transform: translateX(30px);
              opacity: 0;
            }
        </style>