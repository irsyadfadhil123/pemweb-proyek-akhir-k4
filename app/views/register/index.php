        <div id="app">
            <div class="d-flex">
                <div class="flex-fill d-flex align-items-center justify-content-center">
                    <Transition name="slide-fade-quotes">
                        <figure v-if="show" class="text-end">
                            <blockquote class="blockquote">
                                <p>Anyone who has never made a mistake has never tried anything new.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <label>Albert Einstein</label>
                            </figcaption>
                        </figure>
                    </Transition>
                </div>
                <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
                    <Transition name="slide-fade">
                        <form v-if="show" action="<?= BASEURL; ?>/register/tambah" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                            <p class="text-light fs-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Register</p>
                            <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                            <input type="text" name="nama" placeholder="Name" class="form-control mb-2 shadow" required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                            <a href="<?= BASEURL; ?>/login" class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I already have an account</a>
                            <?php Flasher::flash();?>
                            <button type="submit" class="btn btn-outline-warning align-self-start shadow">Register</button>
                        </form>
                    </Transition>
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
                },
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
              transform: translateX(-30px);
              opacity: 0;
            }

            .slide-fade-quotes-enter-active {
              transition: all 0.3s ease-out;
            }

            .slide-fade-quotes-leave-active {
              transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
            }

            .slide-fade-quotes-enter-from,
            .slide-fade-quotes-leave-to {
              transform: translateX(30px);
              opacity: 0;
            }
        </style>