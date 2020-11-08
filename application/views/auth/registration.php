<div class="login_wrapper mx-auto" style="max-width: 700px; ">
    <div class="animate form login_form">
        <section class="login_content">

            <div class="container">

                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5">Registrasi Akun!</h1>
                                </div>

                                <div class="">
                                    <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="" href="<?= base_url('auth/index') ?>">Sudah memiliki akun? Login!</a>
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