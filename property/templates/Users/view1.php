<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
// echo '<pre>'; 
// print_r($user['user_profile']->first_name);
// die;
?>
    <div class="row">
        <div class="column-responsive column-80">
            <div class="users view content">
            <?= $this->Html->image(($user['user_profile']->image), array('width' => '300px')) ?>
                <h3><?= h($user->id) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Image') ?></th>
                        <td><?= $this->Html->image(($user['user_profile']->image), array('width' => '80px')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('First Name') ?></th>
                        <td><?= h($user['user_profile']->first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Name') ?></th>
                        <td><?= h($user['user_profile']->last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Phone Number') ?></th>
                        <td><?= h($user['user_profile']->contact_number) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div> 