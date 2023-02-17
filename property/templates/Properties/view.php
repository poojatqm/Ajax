<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $property->has('user') ? $this->Html->link($property->user->id, ['controller' => 'Users', 'action' => 'view', $property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Title') ?></th>
                    <td><?= h($property->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Description') ?></th>
                    <td><?= h($property->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Category') ?></th>
                    <td><?= h($property['property_category']->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Image') ?></th>
                    <td><?= $this->Html->image(($property->image), array('width' => '80px')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Tags') ?></th>
                    <td><?= h($property->tags) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>