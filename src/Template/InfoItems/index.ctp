<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Info Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoItems index large-9 medium-8 columns content">
    <h3><?= __('Info Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('item_type_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('description') ?></th>
            <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
            <th scope="col"><?= $this->Paginator->sort('price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nsfw') ?></th>
            <th scope="col"><?= $this->Paginator->sort('author') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($infoItems as $infoItem): ?>
            <tr>
                <td><?= $this->Number->format($infoItem->id) ?></td>
                <td><?= $infoItem->has('item_type') ? $this->Html->link($infoItem->item_type->name, ['controller' => 'ItemTypes', 'action' => 'view', $infoItem->item_type->id]) : '' ?></td>
                <td><?= h($infoItem->title) ?></td>
                <td><?= h($infoItem->description) ?></td>
                <td><?= $this->Number->format($infoItem->isbn) ?></td>
                <td><?= $this->Number->format($infoItem->price) ?></td>
                <td><?= h($infoItem->nsfw) ?></td>
                <td><?= h($infoItem->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $infoItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $infoItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $infoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoItem->id)]) ?>
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
