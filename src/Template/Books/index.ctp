<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Info Books'), ['controller' => 'InfoBooks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Book'), ['controller' => 'InfoBooks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books index large-9 medium-8 columns content">
    <h3><?= __('Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info_book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allow_borrow') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $this->Number->format($book->id) ?></td>
                <td><?= $book->has('info_book') ? $this->Html->link($book->info_book->title, ['controller' => 'InfoBooks', 'action' => 'view', $book->info_book->id]) : '' ?></td>
                <td><?= $this->Number->format($book->user_id) ?></td>
                <td><?= h($book->allow_borrow) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
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
