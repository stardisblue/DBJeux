<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Object Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Info Objects'), ['controller' => 'InfoObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Object'), ['controller' => 'InfoObjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objectTypes index large-9 medium-8 columns content">
    <h3><?= __('Object Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objectTypes as $objectType): ?>
            <tr>
                <td><?= $this->Number->format($objectType->id) ?></td>
                <td><?= h($objectType->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $objectType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $objectType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $objectType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
