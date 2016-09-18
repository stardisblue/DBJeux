<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Game'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Info Games'), ['controller' => 'InfoGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info Game'), ['controller' => 'InfoGames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="games index large-9 medium-8 columns content">
    <h3><?= __('Games') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info_game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allow_borrow') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= $this->Number->format($game->id) ?></td>
                <td><?= $game->has('info_game') ? $this->Html->link($game->info_game->title, ['controller' => 'InfoGames', 'action' => 'view', $game->info_game->id]) : '' ?></td>
                <td><?= $this->Number->format($game->user_id) ?></td>
                <td><?= h($game->allow_borrow) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $game->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $game->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?>
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
