<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $infoGame->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $infoGame->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Info Games'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoGames form large-9 medium-8 columns content">
    <?= $this->Form->create($infoGame) ?>
    <fieldset>
        <legend><?= __('Edit Info Game') ?></legend>
        <?php
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
