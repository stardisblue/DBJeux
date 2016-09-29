<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Game Info') ?></legend>
    <?php
        echo $this->Form->input('info_game.title');
        echo $this->Form->input('info_game.description');
        echo $this->Form->input('info_game.isbn');
        echo $this->Form->input('info_game.price');
        echo $this->Form->input('info_game.nsfw');
        echo $this->Form->input('info_game.author');
    ?>
  </fieldset>
  <fieldset>
      <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['label' => '__('owner')']);
            echo $this->Form->input('allow_borrow');
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
