<div class="login_wrapper mx-auto" style="max-width: 500px; ">
    <div class="animate form login_form">
        <section class="login_content">

            <div class="container">

                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5">Login</h1>
                                </div>
                                <div class="">


                                    <form class="user" action="<?= base_url('auth/index') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="" href="<?= base_url('auth/registration') ?>">Registrasi Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
</div>