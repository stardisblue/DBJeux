<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Borrowed Status'), ['action' => 'edit', $borrowedStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Borrowed Status'), ['action' => 'delete', $borrowedStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Objects Users'), ['controller' => 'ObjectsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Objects User'), ['controller' => 'ObjectsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="borrowedStatus view large-9 medium-8 columns content">
    <h3><?= h($borrowedStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($borrowedStatus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Objects Users') ?></h4>
        <?php if (!empty($borrowedStatus->objects_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Object Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Date Begin') ?></th>
                <th scope="col"><?= __('Date End') ?></th>
                <th scope="col"><?= __('Borrowed Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($borrowedStatus->objects_users as $objectsUsers): ?>
            <tr>
                <td><?= h($objectsUsers->object_id) ?></td>
                <td><?= h($objectsUsers->user_id) ?></td>
                <td><?= h($objectsUsers->date_begin) ?></td>
                <td><?= h($objectsUsers->date_end) ?></td>
                <td><?= h($objectsUsers->borrowed_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ObjectsUsers', 'action' => 'view', $objectsUsers->object_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ObjectsUsers', 'action' => 'edit', $objectsUsers->object_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ObjectsUsers', 'action' => 'delete', $objectsUsers->object_id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectsUsers->object_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
