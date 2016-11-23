<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Objects Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objectsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($objectsUser) ?>
    <fieldset>
        <legend><?= __('Add Objects User') ?></legend>
        <?php
            echo $this->Form->input('date_begin');
            echo $this->Form->input('date_end');
            echo $this->Form->input('borrowed_status_id', ['options' => $borrowedStatus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
