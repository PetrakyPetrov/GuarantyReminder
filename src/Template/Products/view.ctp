<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
		<tr>
            <th><?= __('Img') ?></th>
            <td><img src="<?= h($product->img) ?>"  height="100" width="100" ></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
		<tr>
            <th><?= __('Manufacturer') ?></th>
            <td><?= h($product->manufacturer->name) ?></td>
        </tr>
		<tr>
            <th><?= __('Shop') ?></th>
            <td><?= h($product->shop->name) ?></td>
        </tr>
		<tr>
            <th><?= __('Category') ?></th>
            <td><?= $product->category->name ?></td>
        </tr>
        <tr>
            <th><?= __('Warranty Months') ?></th>
            <td><?= $this->Number->format($product->warranty_months) ?></td>
        </tr>
        <tr>
            <th><?= __('Days Left') ?></th>
            <td><?= $this->Number->format($product->days_left) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Expired') ?></th>
            <td><?= $this->Number->format($product->is_expired) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($product->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($product->end_date) ?></td>
        </tr>
    </table>
</div>
