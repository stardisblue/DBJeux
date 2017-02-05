<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item State'), ['action' => 'edit', $itemState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item State'), ['action' => 'delete', $itemState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemStates view large-9 medium-8 columns content">
    <h3><?= h($itemState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($itemState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemState->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Objects') ?></h4>
        <?php if (!empty($itemState->objects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Info Object Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Allow Borrow') ?></th>
                <th scope="col"><?= __('Item State Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($itemState->objects as $objects): ?>
            <tr>
                <td><?= h($objects->id) ?></td>
                <td><?= h($objects->info_object_id) ?></td>
                <td><?= h($objects->user_id) ?></td>
                <td><?= h($objects->allow_borrow) ?></td>
                <td><?= h($objects->item_state_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Objects', 'action' => 'view', $objects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Objects', 'action' => 'edit', $objects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Objects', 'action' => 'delete', $objects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
