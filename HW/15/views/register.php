<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f093fb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }
</style>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Please Register</h3>
                        <form method="POST">

                            <div class="form-outline">
                                <input type="text" name="username" id="username" class="form-control form-control-lg" />
                                <label class="form-label" for="username">Username</label>
                            </div>


                            <div class="form-outline mt-3">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="form-outline mt-3">
                                <input type="password" name="password-confirmation" id="password-confirmation" class="form-control form-control-lg" />
                                <label class="form-label" for="password-confirmation">Password Confirm</label>
                            </div>


                            <div>

                                <h6 class="mb-2 pb-1 mt-3">Role: </h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="patient" value="user" checked />
                                    <label class="form-check-label" for="patient">Patient</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="doctor" value="doctor" />
                                    <label class="form-check-label" for="doctor">Doctor</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="manager" value="admin" />
                                    <label class="form-check-label" for="manager">Manager</label>
                                </div>

                            </div>
                            <?php if ($errors->hasErrorName('register')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $errors->getError('register')[0]; ?>
                                </div>
                            <?php } ?>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="/login" class="link-danger">Login</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>