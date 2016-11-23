<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Info Object'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Object Types'), ['controller' => 'ObjectTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object Type'), ['controller' => 'ObjectTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Objects'), ['controller' => 'Objects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Object'), ['controller' => 'Objects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoObjects index large-9 medium-8 columns content">
    <h3><?= __('Info Objects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('object_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nsfw') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infoObjects as $infoObject): ?>
            <tr>
                <td><?= $this->Number->format($infoObject->id) ?></td>
                <td><?= $infoObject->has('object_type') ? $this->Html->link($infoObject->object_type->id, ['controller' => 'ObjectTypes', 'action' => 'view', $infoObject->object_type->id]) : '' ?></td>
                <td><?= h($infoObject->title) ?></td>
                <td><?= h($infoObject->description) ?></td>
                <td><?= $this->Number->format($infoObject->isbn) ?></td>
                <td><?= $this->Number->format($infoObject->price) ?></td>
                <td><?= h($infoObject->nsfw) ?></td>
                <td><?= h($infoObject->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $infoObject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $infoObject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $infoObject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoObject->id)]) ?>
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
