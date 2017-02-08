<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemsUser $itemsUser
 * @var \App\Model\Entity\BorrowedStatus $borrowedStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($itemsUser) ?>
    <fieldset>
        <legend><?= __('Add Items User') ?></legend>
        <?php
        // TODO: to datepicker
        echo $this->Form->input('date_begin');
        // TODO: to datepicker
        echo $this->Form->input('date_end');
        echo $this->Form->input('borrowed_status_id', ['options' => $borrowedStatus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
