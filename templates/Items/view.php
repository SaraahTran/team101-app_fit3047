<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Items Name') ?></th>
                    <td><?= h($item->items_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Items Desc') ?></th>
                    <td><?= h($item->items_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Items Type') ?></th>
                    <td><?= h($item->items_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Items Price') ?></th>
                    <td><?= $this->Number->format($item->items_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Items Quantity') ?></th>
                    <td><?= $this->Number->format($item->items_quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($item->category_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Orders') ?></h4>
                <?php if (!empty($item->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Orders Desc') ?></th>
                            <th><?= __('Custs Id') ?></th>
                            <th><?= __('Order Total') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->orders as $orders) : ?>
                        <tr>
                            <td><?= h($orders->id) ?></td>
                            <td><?= h($orders->orders_desc) ?></td>
                            <td><?= h($orders->custs_id) ?></td>
                            <td><?= h($orders->order_total) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
