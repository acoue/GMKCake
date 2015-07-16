<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Competition'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="competitions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('datecompetition') ?></th>
            <th><?= $this->Paginator->sort('lieux') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('selected') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($competitions as $competition): ?>
        <tr>
            <td><?= $this->Number->format($competition->id) ?></td>
            <td><?= h($competition->name) ?></td>
            <td><?= h($competition->datecompetition) ?></td>
            <td><?= h($competition->lieux) ?></td>
            <td><?= $this->Number->format($competition->type) ?></td>
            <td><?= $this->Number->format($competition->selected) ?></td>
            <td><?= h($competition->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $competition->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $competition->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $competition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competition->id)]) ?>
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
