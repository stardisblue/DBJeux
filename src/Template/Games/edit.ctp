<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $game->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Games'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Info Games'), ['controller' => 'InfoGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Game'), ['controller' => 'InfoGames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="games form large-9 medium-8 columns content">
    <?= $this->Form->create($game) ?>
    <fieldset>
        <legend><?= __('Edit Game') ?></legend>
        <?php
            echo $this->Form->input('info_game_id', ['options' => $infoGames]);
            echo $this->Form->input('user_id', ['label' => '__('owner')']);
            echo $this->Form->input('allow_borrow');
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
