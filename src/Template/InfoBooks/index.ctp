<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Info Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoBooks index large-9 medium-8 columns content">
    <h3><?= __('Info Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
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
            <?php foreach ($infoBooks as $infoBook): ?>
            <tr>
                <td><?= $this->Number->format($infoBook->id) ?></td>
                <td><?= h($infoBook->title) ?></td>
                <td><?= h($infoBook->description) ?></td>
                <td><?= $this->Number->format($infoBook->isbn) ?></td>
                <td><?= $this->Number->format($infoBook->price) ?></td>
                <td><?= h($infoBook->nsfw) ?></td>
                <td><?= h($infoBook->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $infoBook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $infoBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $infoBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoBook->id)]) ?>
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
