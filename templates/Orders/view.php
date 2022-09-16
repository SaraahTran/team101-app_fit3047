<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Orders Desc') ?></th>
                    <td><?= h($order->orders_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $order->has('customer') ? $this->Html->link($order->customer->id, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Total') ?></th>
                    <td><?= $this->Number->format($order->order_total) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($order->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Items Name') ?></th>
                            <th><?= __('Items Desc') ?></th>
                            <th><?= __('Items Type') ?></th>
                            <th><?= __('Items Price') ?></th>
                            <th><?= __('Items Quantity') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->items as $items) : ?>
                        <tr>
                            <td><?= h($items->id) ?></td>
                            <td><?= h($items->items_name) ?></td>
                            <td><?= h($items->items_desc) ?></td>
                            <td><?= h($items->items_type) ?></td>
                            <td><?= h($items->items_price) ?></td>
                            <td><?= h($items->items_quantity) ?></td>
                            <td><?= h($items->category_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?php if (!empty($order->invoices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Invoice Amount') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->invoices as $invoices) : ?>
                        <tr>
                            <td><?= h($invoices->id) ?></td>
                            <td><?= h($invoices->invoice_amount) ?></td>
                            <td><?= h($invoices->order_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($order->quotes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Amount') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->quotes as $quotes) : ?>
                        <tr>
                            <td><?= h($quotes->id) ?></td>
                            <td><?= h($quotes->quote_amount) ?></td>
                            <td><?= h($quotes->order_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quotes', 'action' => 'view', $quotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quotes', 'action' => 'edit', $quotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quotes', 'action' => 'delete', $quotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotes->id)]) ?>
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
