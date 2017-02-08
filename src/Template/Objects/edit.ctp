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
                ['action' => 'delete', $object->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $object->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Objects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Info Objects'), ['controller' => 'InfoObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Object'), ['controller' => 'InfoObjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item States'), ['controller' => 'ItemStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item State'), ['controller' => 'ItemStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objects form large-9 medium-8 columns content">
    <?= $this->Form->create($object) ?>
    <fieldset>
        <legend><?= __('Edit Object') ?></legend>
        <?php
        echo $this->Form->input('info_object_id', ['options' => $infoObjects]);
        echo $this->Form->input('user_id');
        echo $this->Form->input('allow_borrow');
        echo $this->Form->input('item_state_id', ['options' => $itemStates]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
