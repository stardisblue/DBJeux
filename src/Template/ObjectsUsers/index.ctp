<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Objects User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objectsUsers index large-9 medium-8 columns content">
    <h3><?= __('Objects Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('object_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_begin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('borrowed_status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objectsUsers as $objectsUser): ?>
            <tr>
                <td><?= $objectsUser->has('object') ? $this->Html->link($objectsUser->object->id, ['controller' => 'Objects', 'action' => 'view', $objectsUser->object->id]) : '' ?></td>
                <td><?= $objectsUser->has('user') ? $this->Html->link($objectsUser->user->id, ['controller' => 'Users', 'action' => 'view', $objectsUser->user->id]) : '' ?></td>
                <td><?= h($objectsUser->date_begin) ?></td>
                <td><?= h($objectsUser->date_end) ?></td>
                <td><?= $objectsUser->has('borrowed_status') ? $this->Html->link($objectsUser->borrowed_status->id, ['controller' => 'BorrowedStatus', 'action' => 'view', $objectsUser->borrowed_status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $objectsUser->object_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $objectsUser->object_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $objectsUser->object_id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectsUser->object_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
