<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Object'), ['action' => 'edit', $object->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Object'), ['action' => 'delete', $object->id], ['confirm' => __('Are you sure you want to delete # {0}?', $object->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Objects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Info Objects'), ['controller' => 'InfoObjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Object'), ['controller' => 'InfoObjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item States'), ['controller' => 'ItemStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item State'), ['controller' => 'ItemStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="objects view large-9 medium-8 columns content">
    <h3><?= h($object->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Info Object') ?></th>
            <td><?= $object->has('info_object') ? $this->Html->link($object->info_object->title, ['controller' => 'InfoObjects', 'action' => 'view', $object->info_object->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item State') ?></th>
            <td><?= $object->has('item_state') ? $this->Html->link($object->item_state->id, ['controller' => 'ItemStates', 'action' => 'view', $object->item_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($object->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($object->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allow Borrow') ?></th>
            <td><?= $object->allow_borrow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($object->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Id Card') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($object->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->id_card) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
