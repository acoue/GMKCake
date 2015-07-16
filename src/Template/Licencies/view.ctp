<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Licency'), ['action' => 'edit', $licency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Licency'), ['action' => 'delete', $licency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Licencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Licency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="licencies view large-10 medium-9 columns">
    <h2><?= h($licency->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Prenom') ?></h6>
            <p><?= h($licency->prenom) ?></p>
            <h6 class="subheader"><?= __('Nom') ?></h6>
            <p><?= h($licency->nom) ?></p>
            <h6 class="subheader"><?= __('Club') ?></h6>
            <p><?= $licency->has('club') ? $this->Html->link($licency->club->name, ['controller' => 'Clubs', 'action' => 'view', $licency->club->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($licency->id) ?></p>
        </div>
    </div>
</div>
