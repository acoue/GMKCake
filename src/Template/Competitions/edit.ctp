<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $competition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $competition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="competitions form large-10 medium-9 columns">
    <?= $this->Form->create($competition); ?>
    <fieldset>
        <legend><?= __('Edit Competition') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('datecompetition');
            echo $this->Form->input('lieux');
            echo $this->Form->input('type');
            echo $this->Form->input('description');
            echo $this->Form->input('selected');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
