<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="clubs form large-10 medium-9 columns">
    <?= $this->Form->create($club); ?>
    <fieldset>
        <legend><?= __('Add Club') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('region_id', ['options' => $regions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
