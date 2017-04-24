<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Info Items'), ['controller' => 'InfoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Item'), ['controller' => 'InfoItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item States'), ['controller' => 'ItemStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item State'), ['controller' => 'ItemStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('info_item_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('allow_borrow') ?></th>
            <th scope="col"><?= $this->Paginator->sort('item_state_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Html->link($item->info_item->author_title_type, ['controller' => 'InfoItems', 'action' => 'view', $item->info_item->id]) ?></td>
                <td><?= $this->Html->link($item->owner->username, ['controller' => 'Users', 'action' => 'view', $item->owner->id]) ?></td>
                <td><?= h($item->allow_borrow) ? 'yes' :
                        'no' ?></td>
                <td><?= $this->Html->link($item->item_state->name, ['controller' => 'ItemStates', 'action' => 'view', $item->item_state->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
