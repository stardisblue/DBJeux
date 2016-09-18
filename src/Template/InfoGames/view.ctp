<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Info Game'), ['action' => 'edit', $infoGame->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Info Game'), ['action' => 'delete', $infoGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infoGame->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Info Games'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info Game'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="infoGames view large-9 medium-8 columns content">
    <h3><?= h($infoGame->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($infoGame->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($infoGame->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($infoGame->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($infoGame->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= $this->Number->format($infoGame->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($infoGame->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nsfw') ?></th>
            <td><?= $infoGame->nsfw ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($infoGame->games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Info Game Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Allow Borrow') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($infoGame->games as $games): ?>
            <tr>
                <td><?= h($games->id) ?></td>
                <td><?= h($games->info_game_id) ?></td>
                <td><?= h($games->user_id) ?></td>
                <td><?= h($games->allow_borrow) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
