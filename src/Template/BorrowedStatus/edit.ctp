<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $borrowedStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Objects Users'), ['controller' => 'ObjectsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Objects User'), ['controller' => 'ObjectsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="borrowedStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($borrowedStatus) ?>
    <fieldset>
        <legend><?= __('Edit Borrowed Status') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
