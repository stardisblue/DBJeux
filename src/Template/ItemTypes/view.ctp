<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Type'), ['action' => 'edit', $itemType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Type'), ['action' => 'delete', $itemType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Info Items'), ['controller' => 'InfoItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Item'), ['controller' => 'InfoItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemTypes view large-9 medium-8 columns content">
    <h3><?= h($itemType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($itemType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Info Items') ?></h4>
        <?php if (!empty($itemType->info_items)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Isbn') ?></th>
                    <th scope="col"><?= __('Price') ?></th>
                    <th scope="col"><?= __('Nsfw') ?></th>
                    <th scope="col"><?= __('Author') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($itemType->info_items as $infoItems): ?>
                    <tr>
                        <td><?= h($infoItems->title) ?></td>
                        <td><?= h($infoItems->description) ?></td>
                        <td><?= h($infoItems->isbn) ?></td>
                        <td><?= h($infoItems->price) ?></td>
                        <td><?= h($infoItems->nsfw) ?></td>
                        <td><?= h($infoItems->author) ?></td>
                        <td class="actions">
                            <?php //TODO add exemplaire count?>
                            <?= $this->Html->link(__('View'), ['controller' => 'InfoItems', 'action' => 'view', $infoItems->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'InfoItems', 'action' => 'edit', $infoItems->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'InfoItems', 'action' => 'delete', $infoItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoItems->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
