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
                                <h4 class="font-weight-bolder">Add Property</h4>
                            </div>
                            <div class="card-body">
                                <?= $this->Form->create($property, ['enctype' => 'multipart/form-data','id'=>'propertyadd']) ?>
                                <fieldset>
                                   
                                    <!-- insert into users table -->
                                    <div class="form-group">
                                        <?php echo $this->Form->control('title', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?Php echo $this->Form->control('description', ['type'=>'textarea','calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <select name="category_id" id="">
                                            <option value="">choose one</option>
                                            <?php foreach($categories as $category):?>
                                                <option value="<?= h($category->id)?>"><?= h($category->name)?></option>
                                                <?php endforeach;?>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <?php echo $this->Form->control('image_file', ['calss' => 'form-control', 'type'=>'file','required' => false]); ?>
                                    </div><br>
                                    <div class="form-group">
                                        <?php echo $this->Form->control('tags', ['calss' => 'form-control', 'required' => false]); ?>
                                    </div><br>
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