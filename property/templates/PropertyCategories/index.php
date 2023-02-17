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
                            <?= $this->Html->link(__('Add New Category'), ['controller' => 'property-categories', 'action' => 'add'], ['class' => 'side-nav-item btn btn-secondary']) ?>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Active/Inactive</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $show) : ?>
                                        <tr>
                                            <td scope="row"><?= h($show->id) ?></td>
                                            <td><?= h($show->name) ?></td>
                                            <td><?= h($show->status) ?></td>
                                            <?php if ($show->status == 1) : ?>
                                                <td> <?= $this->Form->postLink(__('Active'), ['action' => 'categoryStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $show->id)]) ?></td>
                                            <?php else : ?>
                                                <td> <?= $this->Form->postLink(__('Inactive'), ['action' => 'categoryStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to active # {0}?', $show->id)]) ?></td>
                                            <?php endif; ?>
                                            <td class="actions">
                                                <?= $this->Html->link(__('view'),  ['action' => 'view', $show->id], ['class' => 'fa-regular fa-eye btn btn-primary']) ?>
                                                <?= $this->Html->link(__('edit'), ['action' => 'edit', $show->id], ['class' => 'fa-solid fa-pen-to-square btn btn-success']) ?>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-delete-category" data-id="<?= $show->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>