        <div id="app">
            <div style="position: relative;">
                <div class="d-flex bg-dark z-1" style="box-shadow: 0px 10px 30px rgb(25, 25, 25); position: relative;">
                    <a href="<?= BASEURL; ?>/home/logout" class="p-3 btn btn-warning rounded-0 me-auto">
                        &larr; Logout
                    </a>

                    <a href="<?= BASEURL; ?>/home/profil" class="p-3 btn btn-warning rounded-0">
                        Profile
                    </a>
                    <a href="<?= BASEURL; ?>/tugas/index" class="p-3 btn btn-warning rounded-0">
                        Class List
                    </a>
                </div>

                <div class="bg-dark text-light p-4" style="min-height: 100vh; position: relative;">
                    <Transition name="slide-fade">
                        <h1 v-if="show" class="mt-5 mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Welcome!, [ INSERT NAME HERE ]</h1>
                    </Transition>
                    
                    
                        <div class="bg-black bg-opacity-10 p-4 rounded">
                            <Transition name="slide-fade">
                                <div v-if="show">
                                    <h2 class="mb-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pengingat</h2>
                                    <?php 
                                        if (!empty($data['pengingat'])) {
                                            foreach ($data['pengingat'] as $tugas) {
                                    ?>
                                                <hr>
                                                <label class="fs-5"><?= $tugas['judul'] ?></label><br>
                                                <label><?= $tugas['deadline'] ?></label>
                                                <label><?= $tugas['selisih'] ?></label>
                                    <?php
                                            }
                                        } else {
                                    ?>      
                                            <hr>
                                            <label style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pengingat tidak ditemukan</label>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </Transition>
                        </div>


                    
                    
                </div>
            </div>
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