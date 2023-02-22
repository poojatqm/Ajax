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
                            <h6 class="text-white text-capitalize ps-3">Following are the active Properties related to this category</h6>
                            <?= $this->Html->link(__('inactive all properties'), ['controller' => 'properties', 'action' => 'inactive',$id], ['class' => 'side-nav-item btn btn-secondary']) ?>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Property Title</th>
                                        <th scope="col">Property Category</th>
                                        <th scope="col">Property Description</th>
                                        <th scope="col">Property Image</th>
                                        <th scope="col">Property Tags</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sn = 1;
                                    foreach ($properties as $show) :
                                        if ($show->status == 1) {
                                    ?>
                                            <tr id="data<?= h($show->id) ?>">
                                                <td scope="row"><?= $sn++; ?></td>
                                                <td><?= h($show->title) ?></td>
                                                <td><?= h($show['property_category']->name) ?></td>
                                                <td><?= h($show->description) ?></td>
                                                <td><?= $this->Html->image(($show->image), array('width' => '80px')) ?></td>
                                                <td><?= h($show->tags) ?></td>
                                               
                                                
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

<!-- Button trigger modal -->


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
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary','id'=>'btnclick']) ?>
                <?= $this->Form->end() ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>