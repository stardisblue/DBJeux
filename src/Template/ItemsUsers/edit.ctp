<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $users
 * @var \App\Model\Entity\Item $items
 * @var \App\Model\Entity\BorrowedStatus $borrowedStatus
 * @var \App\Model\Entity\ItemsUser $itemsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemsUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemsUser->id)]
            )
            ?></li>
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
        <legend><?= __('Edit Items User') ?></legend>
        <?php
        echo $this->Form->input('user.username', ['disabled', 'value' => $itemsUser->user->username]);
        echo $this->Form->input('item.full_info', ['disabled', 'value' => $itemsUser->item->full_info]);
        echo $this->Form->input('date_begin');
        echo $this->Form->input('date_end');
        echo $this->Form->input('borrowed_status_id', ['options' => $borrowedStatus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
