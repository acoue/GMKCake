<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Licency'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="licencies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('prenom') ?></th>
            <th><?= $this->Paginator->sort('nom') ?></th>
            <th><?= $this->Paginator->sort('club_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($licencies as $licency): ?>
        <tr>
            <td><?= $this->Number->format($licency->id) ?></td>
            <td><?= h($licency->prenom) ?></td>
            <td><?= h($licency->nom) ?></td>
            <td>
                <?= $licency->has('club') ? $this->Html->link($licency->club->name, ['controller' => 'Clubs', 'action' => 'view', $licency->club->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $licency->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $licency->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $licency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licency->id)]) ?>
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
