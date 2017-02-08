<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item State'), ['action' => 'edit', $itemState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item State'), ['action' => 'delete', $itemState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemStates view large-9 medium-8 columns content">
    <h3><?= h($itemState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($itemState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemState->id) ?></td>
        </tr>
    </table>
</div>
