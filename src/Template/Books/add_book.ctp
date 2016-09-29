<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Info Books'), ['controller' => 'InfoBooks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Book'), ['controller' => 'InfoBooks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->input('info_book.title');
            echo $this->Form->input('info_book.description');
            echo $this->Form->input('info_book.isbn');
            echo $this->Form->input('info_book.price');
            echo $this->Form->input('info_book.nsfw');
            echo $this->Form->input('info_book.author');
            ?>
    </fieldset>
    <fieldset>
        <legend><?= __('Add item') ?></legend>

        <?php
            echo $this->Form->input('user_id', ['label' => __('owner')]);
            echo $this->Form->input('allow_borrow');
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
