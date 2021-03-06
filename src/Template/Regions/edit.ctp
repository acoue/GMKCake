<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $region->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="regions form large-10 medium-9 columns">
    <?= $this->Form->create($region); ?>
    <fieldset>
        <legend><?= __('Edit Region') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
