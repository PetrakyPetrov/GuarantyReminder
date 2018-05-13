<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('manufacturer_id');
            echo $this->Form->input('shop_id');
			echo $this->Form->input('category_id');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('myimage', ['type' => 'file']); 
            echo $this->Form->input('user_id', ['type' => 'hidden', 'value'=>$user_id]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add')) ?>
    <?= $this->Form->end() ?>
</div>
