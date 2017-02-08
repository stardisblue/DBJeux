<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $infoItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $infoItem->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Info Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoItems form large-9 medium-8 columns content">
    <?= $this->Form->create($infoItem) ?>
    <fieldset>
        <legend><?= __('Edit Info Item') ?></legend>
        <?php
        echo $this->Form->input('item_type_id', ['options' => $itemTypes]);
        echo $this->Form->input('title');
        echo $this->Form->input('description');
        echo $this->Form->input('isbn');
        echo $this->Form->input('price');
        echo $this->Form->input('nsfw');
        echo $this->Form->input('author');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
