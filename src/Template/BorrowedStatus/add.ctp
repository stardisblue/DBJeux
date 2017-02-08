<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items Users'), ['controller' => 'ItemsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Items User'), ['controller' => 'ItemsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="borrowedStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($borrowedStatus) ?>
    <fieldset>
        <legend><?= __('Add Borrowed Status') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
