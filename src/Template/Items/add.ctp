<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Info Items'), ['controller' => 'InfoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Item'), ['controller' => 'InfoItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item States'), ['controller' => 'ItemStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item State'), ['controller' => 'ItemStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="items form large-9 medium-8 columns content">
    <?= $this->Html->link(__('New Info Item'), ['controller' => 'InfoItems', 'action' => 'add']) ?>
    <?= /** @var \App\Model\Entity\Item $item */
    $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
        /** @var \App\Model\Entity\InfoItem $infoItems */
        echo $this->Form->input('info_item_id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('allow_borrow');
        /** @var \App\Model\Entity\ItemState $itemStates */
        echo $this->Form->input('item_state_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
