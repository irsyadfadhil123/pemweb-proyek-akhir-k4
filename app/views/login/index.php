<div id="app">
            <div class="d-flex">
                <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
                    <Transition name="slide-fade">
                        <form v-if="show" action="<?= BASEURL; ?>/login/verifikasi" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                            <p class="text-light fs-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Masuk</p>
                            <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                            <div class="form-check mb-2">
                                <input type="checkbox" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label text-light">Ingat Saya</label>
                            </div>
                            <a href="<?= BASEURL; ?>/register" class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-2">Buat Akun</a>
                            <label class="text-danger mt-1 mb-2"><?php Flasher::flash();?></label>
                            <button type="submit" class="btn btn-outline-warning align-self-start shadow mt-2">Masuk</button>

                        </form>
                    </Transition>
                </div>
                <div class="flex-fill d-flex align-items-center justify-content-center" style="width: 35vw;">
                    <Transition name="slide-fade-quotes">
                        <figure v-if="show" class="text-end">
                            <blockquote class="blockquote">
                                <p>Mendidik pikiran tanpa mendidik hati bukanlah sebuah pendidikan.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <label>Aristotle</label>
                            </figcaption>
                        </figure>
                    </Transition>
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

        .slide-fade-quotes-enter-active {
            transition: all 0.3s ease-out;
        }

        .slide-fade-quotes-leave-active {
            transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
        }

        .slide-fade-quotes-enter-from,
        .slide-fade-quotes-leave-to {
            transform: translateX(-30px);
            opacity: 0;
        }

        .content {
            min-height: 100vh;
        }

        .form-login {
            max-width: 400px;
            margin: auto;
        }

        .blockquote {
            font-size: 1.5rem;
            font-style: italic;
        }

        .blockquote-footer {
            font-size: 1.1rem;
        }

        .background-section {
            background: url('fotobelajar.jpg') no-repeat center center;
            background-size: cover;
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
