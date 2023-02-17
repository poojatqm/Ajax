<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps-5">
    <?php
    $session = $this->request->getSession(); //read session data
    echo '<span>';
    echo 'welcome ' . '  ';
    echo '</span>';
    echo $session->read('user_details.user_profile.first_name');
    ?>
  

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">User Mangement</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Profile Image</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Active/Inactive</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $show) : ?>
                                        <div class="popular_2i clearfix">
                                            <div class="popular_2i1 clearfix">
                                                <tr>
                                                    <td scope="row"><?= h($show->id) ?></td>
                                                    <td>
                                                        <?= $this->Html->image(($show->user_profile->image), array('width' => '80px')) ?>
                                                    </td>
                                                    <td><?= h($show->user_profile->first_name) ?></td>
                                                    <td><?= h($show->user_profile->last_name) ?></td>
                                                    <td><?= h($show->email) ?></td>
                                                    <td><?= h($show->user_profile->contact_number) ?></td>

                                                    <?php if ($show->status == 1) : ?>
                                                        <td> <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to inactive # {0}?', $show->id)]) ?></td>
                                                    <?php else : ?>
                                                        <td> <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $show->id, $show->status], ['confirm' => __('Are you sure you want to active # {0}?', $show->id)]) ?></td>
                                                    <?php endif; ?>

                                                    <td class="actions">
                                                        <?= $this->Html->link('<i class="fa-sharp fa-solid fa-eye"></i>' . __('view'), ['action' => 'viewuser', $show->id], ['escape' => false, 'class' => 'btn btn btn-primary']) ?>
                                                        <a href="javascript:void(0)" class="btn btn-danger btn-delete-user" data-id="<?= $show->id ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            </div>
                                        </div>
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