<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Items User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemsUsers index large-9 medium-8 columns content">
    <h3><?= __('Items Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('borrowed_status_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_begin') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_end') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($itemsUsers as $itemsUser): ?>
            <tr>
                <td><?= $itemsUser->has('item') ? $this->Html->link($itemsUser->item->full_info, ['controller' => 'Items', 'action' => 'view', $itemsUser->item->id]) : '' ?></td>
                <td><?= $itemsUser->has('user') ? $this->Html->link($itemsUser->user->username, ['controller' => 'Users', 'action' => 'view', $itemsUser->user->id]) : '' ?></td>
                <td><?= $itemsUser->has('borrowed_status') ? $this->Html->link($itemsUser->borrowed_status->name, ['controller' => 'BorrowedStatus', 'action' => 'view', $itemsUser->borrowed_status->id]) : '' ?></td>
                <td><?= h($itemsUser->date_begin) ?></td>
                <td><?= h($itemsUser->date_end) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemsUser->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
