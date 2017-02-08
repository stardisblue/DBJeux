<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Items User'), ['action' => 'edit', $itemsUser->item_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Items User'), ['action' => 'delete', $itemsUser->item_id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemsUser->item_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Items User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemsUsers view large-9 medium-8 columns content">
    <h3><?= h($itemsUser->item_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $itemsUser->has('item') ? $this->Html->link($itemsUser->item->id, ['controller' => 'Items', 'action' => 'view', $itemsUser->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $itemsUser->has('user') ? $this->Html->link($itemsUser->user->username, ['controller' => 'Users', 'action' => 'view', $itemsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Borrowed Status') ?></th>
            <td><?= $itemsUser->has('borrowed_status') ? $this->Html->link($itemsUser->borrowed_status->name, ['controller' => 'BorrowedStatus', 'action' => 'view', $itemsUser->borrowed_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Begin') ?></th>
            <td><?= h($itemsUser->date_begin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date End') ?></th>
            <td><?= h($itemsUser->date_end) ?></td>
        </tr>
    </table>
</div>
