        <div id="app">
            <div class="d-flex">
                <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
                    <Transition name="slide-fade">
                        <form v-if="show" action="<?= BASEURL; ?>/login/verifikasi" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                            <p class="display-5 text-light">Login</p>
                            <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                            <div class="form-check mb-2">
                                <input type="checkbox" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label text-light">Ingat saya</label>
                            </div>
                            <a href="<?= BASEURL; ?>/register" class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I don't have an account</a>
                            <button type="submit" class="btn btn-outline-warning align-self-start shadow">Login</button>
                        </form>
                    </Transition>
                </div>
                <div class="flex-fill">
                    
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
              transform: translateX(20px);
              opacity: 0;
            }
        </style>