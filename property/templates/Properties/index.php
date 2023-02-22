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
                            <h6 class="text-white text-capitalize ps-3">Property Mangement</h6>
                            <div class='text-end pe-5'>
                                <?= $this->Html->link(__('Add New Property'), ['controller' => 'properties', 'action' => 'add'], ['class' => 'side-nav-item btn btn-secondary']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0" id='showproperty'>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Property Title</th>
                                        <th scope="col">Property Category</th>
                                        <th scope="col">Property Description</th>
                                        <th scope="col">Property Image</th>
                                        <th scope="col">Property Tags</th>
                                        <th scope="col">Active/Inactive</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sn = 1;
                                    foreach ($properties as $show) :
                                        if ($show->property_status == 1) {
                                    ?>
                                            <tr id="data<?= h($show->id) ?>">
                                                <td scope="row"><?= $sn++; ?></td>
                                                <td><?= h($show->title) ?></td>
                                                <td><?= h($show['property_category']->name) ?></td>
                                                <td><?= h($show->description) ?></td>
                                                <td><?= $this->Html->image(($show->image), array('width' => '80px')) ?></td>
                                                <td><?= h($show->tags) ?></td>
                                                <?php if ($show->status == 1) : ?>
                                                    <td> <?= $this->Form->postLink(__('Active'), ['action' => 'propertyStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $show->id)]) ?></td>
                                                <?php else : ?>
                                                    <td> <?= $this->Form->postLink(__('Inactive'), ['action' => 'propertyStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to active # {0}?', $show->id)]) ?></td>
                                                <?php endif; ?>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('view'),  ['controller' => 'properties', 'action' => 'view', $show->id], ['class' => 'fa-regular fa-eye btn btn-primary']) ?>
                                                    <!-- <button type="button" data-toggle="modal" data-target="#editmodel", data-id="<?= $show->id ?>"  class="btn btn-success">Edit</button> -->
                                                    <a href="javascript:void(0)" class="btn btn-success editProperty" data-toggle="modal" data-target="#editmodel" data-id="<?= $show->id ?>">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-delete-property" status-id="<?= $show->property_status ?>" data-id="<?= $show->id ?>">Delete</a>
                                                </td>
                                            </tr>
                                </tbody>
                        <?php }
                                    endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Edit Modal -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null, ['enctype' => 'multipart/form-data', 'id' => 'property-edit']) ?>
                <fieldset>
                    <input type="hidden" id="imagedd" name="imagedd">
                    <input type="hidden" id="iddd" name="iddd">
                    <legend><?= __('Edit Property') ?></legend>

                    <div class="form-group">
                        <?php echo $this->Form->control('title'); ?>
                    </div><br>
                    <div class="form-group">
                        <?php echo $this->Form->control('description'); ?>
                    </div><br>
                    <div class="form-group">
                        <?php echo $this->Form->control('category'); ?>
                    </div><br>
                    <div class="form-group">
                        <img src="" id="showimg" width="100px" alt="">
                        <?php echo $this->Form->control('image', ['calss' => 'form-control', 'type' => 'file', 'required' => false]); ?>
                    </div><br>
                    <div class="form-group">
                        <?php echo $this->Form->control('tags'); ?>
                    </div><br>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'btnclick']) ?>
                <?= $this->Form->end() ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>