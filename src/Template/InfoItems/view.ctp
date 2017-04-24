<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Info Item'), ['action' => 'edit', $infoItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Info Item'), ['action' => 'delete', $infoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Info Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="infoItems view large-9 medium-8 columns content">
    <h3><?= h($infoItem->author_title_type) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item Type') ?></th>
            <td><?= $infoItem->has('item_type') ? $this->Html->link($infoItem->item_type->name, ['controller' => 'ItemTypes', 'action' => 'view', $infoItem->item_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($infoItem->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($infoItem->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($infoItem->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= is_null($infoItem->isbn) ? __('unknown') : $this->Number->format($infoItem->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($infoItem->float_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nsfw') ?></th>
            <td><?= $infoItem->nsfw ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($infoItem->items)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Allow Borrow') ?></th>
                    <th scope="col"><?= __('Item State Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($infoItem->items as $items): ?>
                    <tr>
                        <td><?= h($items->owner->username) ?></td>
                        <td><?= $items->allow_borrow ? __('yes') : __('no') ?></td>
                        <td><?= $items->item_state->name ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
