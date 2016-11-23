<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Object Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Info Objects'), ['controller' => 'InfoObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Object'), ['controller' => 'InfoObjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objectTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($objectType) ?>
    <fieldset>
        <legend><?= __('Add Object Type') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>