<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shop->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shop->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shops'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shops form large-9 medium-8 columns content">
    <?= $this->Form->create($shop) ?>
    <fieldset>
        <legend><?= __('Edit Shop') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('city');
            echo $this->Form->input('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
