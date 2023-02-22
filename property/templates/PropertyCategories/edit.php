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
                                <h4 class="font-weight-bolder">Edit Category</h4>
                            </div>
                            <div class="card-body">
                                </style>
                                <div class="row">
                                    <div class="column-responsive column-80">
                                        <div class="properties form content">
                                            <?= $this->Form->create($category,['id'=>'category-edit']) ?>
                                            <fieldset>
                                                <legend><?= __('Edit Category') ?></legend>
                                                <div class="form-group">
                                                    <?php echo $this->Form->control('name'); ?>
                                                </div><br>
                                            </fieldset>
                                            <a href="javascript:void(0)" class="btn btn-danger" id= "category-edit-btn" data-id="<?= $category->id ?>">Edit</a>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


