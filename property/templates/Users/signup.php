<style>
    .error {
        color: red
    }
</style>
<style>
    .error-message {
        color: red
    }
</style>

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p class="mb-0">Enter your email and password to register</p>
                            </div>
                            <div class="card-body">
                                <?= $this->Form->create($user, ['id' => 'myform','enctype' => 'multipart/form-data']) ?>
                                <fieldset>
                                    <legend><?= __('Add User') ?></legend>
                                    <!-- insert into users table -->
                                    <div class="form-group">
                                        <?php echo $this->Form->control('email', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('password', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('confirm_password', ['calss' => 'form-control', 'type'=>'password','required' => false]); ?>
                                    </div><br>
                                    <!-- insert into users profile table -->
                                    <div class="form-group">
                                        <?php echo $this->Form->control('user_profile.first_name', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('user_profile.last_name', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?php echo $this->Form->control('user_profile.contact_number', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('user_profile.address', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('user_profile.image', ['calss' => 'form-control', 'type' => 'file', 'required' => false]); ?>
                                    </div>
                                    <div class="form-check form-check-info text-start ps-0">
                                        <?php echo $this->Form->checkbox('done', ['class' => 'form-check-input', 'id' => 'done', 'value' => 'checked']); ?>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <div style="display:none; color:red" id="agree_chk_error">
                                        Can't proceed as you didn't agree to the terms!
                                    </div>
                                </fieldset>
                                <div class="col-md-12 row-block">
                                    <div class="row">
                                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                    </div>
                                    <br>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Already have an account?
                                    <a href="../pages/sign-in.html" class="text-primary text-gradient font-weight-bold">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>