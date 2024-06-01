<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body>
        <!-- Login, Register, Profile, Edit Profile, Tambah, Buat, Upload, Index -->
        <div id="app">
            <div class="d-flex">
                <div class="flex-fill">
                
                </div>
                <div class="d-flex justify-content-center align-items-center bg-dark flex-fill" style="height: 100vh;">
                    <Transition name="slide-fade">
                        <form v-if="show" action="" method="post" class="d-flex flex-column border border-secondary-subtle p-4 shadow">
                            <p class="display-5 text-light">Register</p>
                            <input type="text" name="username" placeholder="Username" class="form-control mb-2 shadow" required>
                            <input type="text" name="nama" placeholder="Nama" class="form-control mb-2 shadow" required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2 shadow" required>
                            <a href="" class="align-self-end link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mb-4">I already have an account</a>
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
              transform: translateX(-20px);
              opacity: 0;
            }
        </style>

        <!--  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>