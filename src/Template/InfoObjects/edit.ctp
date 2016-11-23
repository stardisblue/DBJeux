<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $infoObject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $infoObject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Info Objects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Object Types'), ['controller' => 'ObjectTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object Type'), ['controller' => 'ObjectTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoObjects form large-9 medium-8 columns content">
    <?= $this->Form->create($infoObject) ?>
    <fieldset>
        <legend><?= __('Edit Info Object') ?></legend>
        <?php
            echo $this->Form->input('object_type_id', ['options' => $objectTypes, 'empty' => true]);
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
