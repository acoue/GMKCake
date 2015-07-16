<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Licencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="licencies form large-10 medium-9 columns">
    <?= $this->Form->create($licency); ?>
    <fieldset>
        <legend><?= __('Add Licency') ?></legend>
        <?php
            echo $this->Form->input('prenom');
            echo $this->Form->input('nom');
            echo $this->Form->input('club_id', ['options' => $clubs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
