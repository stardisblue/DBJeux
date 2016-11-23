<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Objects User'), ['action' => 'edit', $objectsUser->object_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Objects User'), ['action' => 'delete', $objectsUser->object_id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectsUser->object_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Objects Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Objects User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['controller' => 'BorrowedStatus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="objectsUsers view large-9 medium-8 columns content">
    <h3><?= h($objectsUser->object_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Object') ?></th>
            <td><?= $objectsUser->has('object') ? $this->Html->link($objectsUser->object->id, ['controller' => 'Objects', 'action' => 'view', $objectsUser->object->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $objectsUser->has('user') ? $this->Html->link($objectsUser->user->id, ['controller' => 'Users', 'action' => 'view', $objectsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Borrowed Status') ?></th>
            <td><?= $objectsUser->has('borrowed_status') ? $this->Html->link($objectsUser->borrowed_status->id, ['controller' => 'BorrowedStatus', 'action' => 'view', $objectsUser->borrowed_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Begin') ?></th>
            <td><?= h($objectsUser->date_begin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date End') ?></th>
            <td><?= h($objectsUser->date_end) ?></td>
        </tr>
    </table>
</div>
