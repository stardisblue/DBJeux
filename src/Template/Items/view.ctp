<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Info Items'), ['controller' => 'InfoItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Item'), ['controller' => 'InfoItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item States'), ['controller' => 'ItemStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item State'), ['controller' => 'ItemStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">

    <h3><?= h($item->title_author_owner) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Info Item') ?></th>
            <td><?= $item->has('info_item') ? $this->Html->link($item->info_item->title, ['controller' => 'InfoItems', 'action' => 'view', $item->info_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item State') ?></th>
            <td><?= $item->has('item_state') ? $this->Html->link($item->item_state->name, ['controller' => 'ItemStates', 'action' => 'view', $item->item_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Owner') ?></th>
            <td><?= $this->Html->link($item->owner->username, ['controller' => 'Users', 'action' => 'view', $item->owner->id]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allow Borrow') ?></th>
            <td><?= $item->allow_borrow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($item->users)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id Card') ?></th>
                    <th scope="col"><?= __('Firstname') ?></th>
                    <th scope="col"><?= __('Lastname') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
                    <th scope="col"><?= __('Role') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($item->users as $users): ?>
                    <tr>
                        <td><?= h($users->id_card) ?></td>
                        <td><?= h($users->firstname) ?></td>
                        <td><?= h($users->lastname) ?></td>
                        <td><?= h($users->username) ?></td>
                        <td><?= h($users->role) ?></td>
                        <td><?= h($users->email) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
