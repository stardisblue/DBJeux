<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Info Game'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infoGames index large-9 medium-8 columns content">
    <h3><?= __('Info Games') ?></h3>
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
            <?php foreach ($infoGames as $infoGame): ?>
            <tr>
                <td><?= $this->Number->format($infoGame->id) ?></td>
                <td><?= h($infoGame->title) ?></td>
                <td><?= h($infoGame->description) ?></td>
                <td><?= $this->Number->format($infoGame->isbn) ?></td>
                <td><?= $this->Number->format($infoGame->price) ?></td>
                <td><?= h($infoGame->nsfw) ?></td>
                <td><?= h($infoGame->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $infoGame->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $infoGame->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $infoGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoGame->id)]) ?>
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
