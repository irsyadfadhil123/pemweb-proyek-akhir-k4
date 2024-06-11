<div id="app">
    <div style="position: relative;">
        <nav class="navbar navbar-dark bg-dark navbar-custom">
            <div class="container-fluid">
                <a href="<?= BASEURL;?>/home/index" class="btn btn-warning rounded-0 me-auto">
                    &larr; Halaman Utama
                </a>
                <a href="<?= BASEURL; ?>/home/profil" class="btn btn-warning rounded-0 mx-2">
                    Profil
                </a>
            </div>
        </nav>

        <div class="bg-dark text-light p-4" style="min-height: 100vh; position: relative;">
            <transition name="slide-fade">
                <h1 v-if="show" class="mt-5 mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Kelas</h1>
            </transition>

            <transition name="slide-fade">
                <div v-if="show" class="mb-4">
                    <a href="<?= BASEURL;?>/tugas/tambahTugas" class="btn btn-outline-success me-3 custom-btn">Tambah Tugas</a>
                    <a href="<?= BASEURL;?>/tugas/buatTugas" class="btn btn-outline-info custom-btn">Buat Tugas</a>
                </div>
            </transition>
            
            <div class="bg-black bg-opacity-10 p-4 rounded mb-5">
                <transition name="slide-fade">
                    <div v-if="show">
                        <h2 class="mb-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Tugas yang Ditambahkan</h2>
                        <?php if (!empty($data['hasilTugasNonAdmin'])): ?>
                            <div class='d-flex mb-3 overflow-scroll'>
                                <?php foreach ($data['hasilTugasNonAdmin'] as $tugas_tergabung): ?>
                                    <div class="d-flex flex-column flex-shrink-0 me-4" style="width: 300px; height: 250px;">
                                        <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light overflow-scroll">
                                            <label class="lead fw-semibold"><?= $tugas_tergabung['judul']; ?></label>
                                            <hr>
                                            <p class="lead fs-6"><?= $tugas_tergabung['deskripsi']; ?></p>
                                        </div>
                                        <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                                            <label class="align-self-center text-dark"><?= $tugas_tergabung['deadline']; ?></label>
                                            <a href="<?= BASEURL;?>/tugas/upload/<?= $tugas_tergabung['tugas_id'];?>" class="btn btn-secondary">Unggah</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <hr>
                            <label>Data tidak Tersedia</label>
                        <?php endif; ?>                                    

                    </div>
                </transition>
            </div>

            <!-- pagination nonAdmin -->
            <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugasNonAdmin']; $i++): ?>
                <?php if ($i == $data['pagination']['halamanAktifTugasNonAdmin']): ?>
                    <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>" style="font-weight: bold;"><?= $i; ?></a>
                <?php else: ?>
                    <a href="<?= BASEURL ?>/tugas/index/<?= $i ?>/<?= $data['pagination']['halamanAktifTugasAdmin'] ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- pagination nonAdmin -->

            <div class="bg-black bg-opacity-10 p-4 rounded">
                <transition name="slide-fade">
                    <div v-if="show">
                        <h2 class="mb-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Tugas yang Dibuat</h2>
                        <?php if (!empty($data['hasilTugasAdmin'])): ?>
                            <div class='d-flex mb-3 overflow-scroll'>
                                <?php foreach ($data['hasilTugasAdmin'] as $tugas_dibuat): ?>
                                    <div class="d-flex flex-column flex-shrink-0 me-4" style="width: 300px; height: 250px;">
                                        <div class="d-flex flex-column bg-secondary p-3 flex-fill text-light overflow-scroll">
                                            <label class="lead fw-semibold"><?= $tugas_dibuat['judul']; ?></label>
                                            <hr>
                                            <p class="lead fs-6"><?= $tugas_dibuat['deskripsi']; ?></p>
                                        </div>
                                        <div class="d-flex bg-warning p-3 pt-2 pb-2 justify-content-between">
                                            <label class="align-self-center text-dark"><?= $tugas_dibuat['deadline']; ?></label>
                                            <a href="<?= BASEURL;?>/tugas/lihat/<?= $tugas_dibuat['tugas_id'];?>" class="btn btn-secondary">Lihat</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <hr>
                            <label>Data tidak Tersedia</label>
                        <?php endif; ?>
                    </div>
                </transition>
            </div>

            <!-- pagination admin -->
            <?php for ($i = 1; $i <= $data['pagination']['jumlahHalamanTugasAdmin']; $i++): ?>
                <?php if ($i == $data['pagination']['halamanAktifTugasAdmin']): ?>
                    <a href="<?= BASEURL ?>/tugas/index/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>/<?= $i ?>" style="font-weight: bold;"><?= $i; ?></a>
                <?php else: ?>
                    <a href="<?= BASEURL ?>/tugas/index/<?= $data['pagination']['halamanAktifTugasNonAdmin'] ?>/<?= $i ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- pagination admin -->

            <?php if (isset($_SESSION["flash"])): ?>
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
            <?php endif; ?>
        </div>
    </div>
</div>

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

    .overflow-scroll::-webkit-scrollbar {
        width: 0;
        height: 0;
    }

    .overflow-scroll {
        scrollbar-width: none;
    }

    .overflow-scroll {
        -ms-overflow-style: none;
    }

    .overflow-scroll {
        overflow: auto;
    }

    .custom-btn {
    border-radius: 10px; /* Rounded corners */
    margin: 0 3px; /* Narrow margin */
    padding: 3px 10px; /* Smaller padding for thinner appearance */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Consistent font */
    font-size: 14px; /* Smaller font size */
    min-width: auto; /* Ensure button width adjusts to content */
    }
</style>

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
