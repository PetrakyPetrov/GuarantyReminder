<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
		<img src="<?= h($product->img) ?>"  height="100" width="100" >
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
			echo $this->Form->input('manufacturer_id');
            echo $this->Form->input('shop_id');
			echo $this->Form->input('category_id');
        ?>
        <?php 
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('warranty_months');
            // echo $this->Form->input('days_left');
            // echo $this->Form->input('is_expired');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit')) ?>
    <?= $this->Form->end() ?>
</div>
