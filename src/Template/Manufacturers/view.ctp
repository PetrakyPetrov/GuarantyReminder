<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manufacturer'), ['action' => 'edit', $manufacturer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manufacturer'), ['action' => 'delete', $manufacturer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="manufacturers view large-9 medium-8 columns content">
    <h3><?= h($manufacturer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($manufacturer->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($manufacturer->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($manufacturer->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($manufacturer->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($manufacturer->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Img') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Manufacturer Id') ?></th>
                <th><?= __('Shop Id') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Warranty Months') ?></th>
                <th><?= __('Days Left') ?></th>
                <th><?= __('Is Expired') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($manufacturer->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->img) ?></td>
                <td><?= h($products->category_id) ?></td>
                <td><?= h($products->manufacturer_id) ?></td>
                <td><?= h($products->shop_id) ?></td>
                <td><?= h($products->start_date) ?></td>
                <td><?= h($products->end_date) ?></td>
                <td><?= h($products->warranty_months) ?></td>
                <td><?= h($products->days_left) ?></td>
                <td><?= h($products->is_expired) ?></td>
                <td><?= h($products->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
