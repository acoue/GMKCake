<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Competition'), ['action' => 'edit', $competition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Competition'), ['action' => 'delete', $competition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Competitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="competitions view large-10 medium-9 columns">
    <h2><?= h($competition->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($competition->name) ?></p>
            <h6 class="subheader"><?= __('Lieux') ?></h6>
            <p><?= h($competition->lieux) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($competition->id) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $this->Number->format($competition->type) ?></p>
            <h6 class="subheader"><?= __('Selected') ?></h6>
            <p><?= $this->Number->format($competition->selected) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Datecompetition') ?></h6>
            <p><?= h($competition->datecompetition) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($competition->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($competition->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($competition->description)); ?>

        </div>
    </div>
</div>
