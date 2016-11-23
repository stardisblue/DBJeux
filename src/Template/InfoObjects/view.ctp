<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Info Object'), ['action' => 'edit', $infoObject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Info Object'), ['action' => 'delete', $infoObject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoObject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Info Objects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Object'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Object Types'), ['controller' => 'ObjectTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object Type'), ['controller' => 'ObjectTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="infoObjects view large-9 medium-8 columns content">
    <h3><?= h($infoObject->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Object Type') ?></th>
            <td><?= $infoObject->has('object_type') ? $this->Html->link($infoObject->object_type->id, ['controller' => 'ObjectTypes', 'action' => 'view', $infoObject->object_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($infoObject->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($infoObject->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($infoObject->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($infoObject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= $this->Number->format($infoObject->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($infoObject->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nsfw') ?></th>
            <td><?= $infoObject->nsfw ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Objects') ?></h4>
        <?php if (!empty($infoObject->objects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Info Object Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Allow Borrow') ?></th>
                <th scope="col"><?= __('Item State Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($infoObject->objects as $objects): ?>
            <tr>
                <td><?= h($objects->id) ?></td>
                <td><?= h($objects->info_object_id) ?></td>
                <td><?= h($objects->user_id) ?></td>
                <td><?= h($objects->allow_borrow) ?></td>
                <td><?= h($objects->item_state_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Objects', 'action' => 'view', $objects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Objects', 'action' => 'edit', $objects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Objects', 'action' => 'delete', $objects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
