<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller'=>'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shops'), ['controller'=>'Shops', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
<?php
        echo $this->Form->create('Product',array('url'=>'/products/search'));
        echo $this->Form->input('name', ['label' => false, 'placeholder' => 'Search by product name', 'style'=>'width: 300px;']);
        echo $this->Form->submit('Search', ['class'=>'btn btn-primary']);
        echo $this->Form->end();
    ?>
	<!--
	
	<form method='post' action="products/search">
<input type="text" name="name"/>
<button type="submit">search</button>
</form>
	
	--!>
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= 'Image'?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('manufacturer_id') ?></th>
                <th><?= $this->Paginator->sort('shop_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><img src='<?= h($product->img) ?>' width=60></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= h($product->manufacturer->name) ?></td>
                <td><?= h($product->shop->name) ?></td>
                <td><?= $product->category->name ?></td>
                <td><?= h($product->start_date) ?></td>
                <td><?= h($product->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
