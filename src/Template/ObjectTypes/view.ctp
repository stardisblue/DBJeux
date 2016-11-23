<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Object Type'), ['action' => 'edit', $objectType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Object Type'), ['action' => 'delete', $objectType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Object Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Object Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Info Objects'), ['controller' => 'InfoObjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Object'), ['controller' => 'InfoObjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="objectTypes view large-9 medium-8 columns content">
    <h3><?= h($objectType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($objectType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Info Objects') ?></h4>
        <?php if (!empty($objectType->info_objects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Object Type Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Isbn') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Nsfw') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($objectType->info_objects as $infoObjects): ?>
            <tr>
                <td><?= h($infoObjects->id) ?></td>
                <td><?= h($infoObjects->object_type_id) ?></td>
                <td><?= h($infoObjects->title) ?></td>
                <td><?= h($infoObjects->description) ?></td>
                <td><?= h($infoObjects->isbn) ?></td>
                <td><?= h($infoObjects->price) ?></td>
                <td><?= h($infoObjects->nsfw) ?></td>
                <td><?= h($infoObjects->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InfoObjects', 'action' => 'view', $infoObjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InfoObjects', 'action' => 'edit', $infoObjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InfoObjects', 'action' => 'delete', $infoObjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoObjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
