<?php
//    echo '<pre>';
//    print_r($user);
//    die;
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Category Mangement</h6>
                            <div class='text-end pe-5'>
                                <a href="javascript:void(0)" class="btn btn-secondary add-category" data-toggle="modal" data-target="#add-category-modal">Add New Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0" id = 'showdata'>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sn.</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Active/Inactive</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sn = 1;
                                    foreach ($categories as $show) :  if ($show->category_status == 0) {
                                        ?>
                                        <tr>
                                            <td class='ps-4' scope="row"><?= h($sn++) ?></td>
                                            <td class='ps-5' id='showname'><?= h($show->name) ?></td>
                                            <td class='ps-5'><?= h($show->status) ?></td>
                                            <?php if ($show->status == 1) : ?>
                                                <td class='ps-5'> <?= $this->Form->postLink(__('Active'), ['action' => 'categoryStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $show->id)]) ?></td>
                                            <?php else : ?>
                                                <td class='ps-5'> <?= $this->Form->postLink(__('Inactive'), ['action' => 'categoryStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to active # {0}?', $show->id)]) ?></td>
                                            <?php endif; ?>
                                            <td class="actions">
                                                <a href="javascript:void(0)" class="btn btn-primary view-category" data-toggle="modal" data-target="#view-category-model" data-id="<?= $show->id ?>">View</a>
                                                <!-- <?= $this->Html->link(__('edit'), ['action' => 'edit', $show->id], ['class' => 'fa-solid fa-pen-to-square btn btn-success']) ?> -->
                                                <a href="javascript:void(0)" class="btn btn-success fatch-category" data-toggle="modal" data-target="#edit-category-model" data-id="<?= $show->id ?>">Edit</a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-delete-category" status-id="<?= $show->category_status ?>" data-id="<?= $show->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php } endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--------------------------------- View Modal ---------------------------------->
<div class="modal fade" id="view-category-model" tabindex="-1" role="dialog" aria-labelledby="view-category-model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h6>Category Id: <span id="idd"></span></h6>
                <h6>Category Name: <span id="category_name"></span></h6>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!------------------------------- Edit Modal ------------------------------->
<div class="modal fade" id="edit-category-model" tabindex="-1" role="dialog" aria-labelledby="edit-category-model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?= $this->Form->create(null, ['enctype' => 'multipart/form-data', 'id' => 'category-edit']) ?>
                <input type="hidden" id="iddd" name="iddd">
                <fieldset>
                    <legend><?= __('Edit Category') ?></legend>
                    <div class="form-group">
                        <?php echo $this->Form->control('name'); ?>
                    </div><br>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary category-edit-btn']) ?>
                <?= $this->Form->end() ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>



<!------------------------------------ Add Modal --------------------------------->
<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="add-category-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?= $this->Form->create(null, ['id' => 'categoryadd']) ?>
                <fieldset>
                    <div class="form-group">
                        <?php echo $this->Form->control('name', ['calss' => 'form-control', 'required' => false]); ?>
                    </div><br>
                </fieldset>
                <div class="col-md-12 row-block">
                    <div class="row">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'btnadd']) ?>
                    </div>
                    <br>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>