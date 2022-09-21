<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>






<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <h3><?= __('Item Information') ?></h3>

                <table class="table table-bordered" id="dataTable" width="100%">


                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($order->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Customer Id') ?></th>
                        <td><?= $this->Number->format($order->customer_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Customer Name') ?></th>
                        <td><?= h($order->customer->cust_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Total') ?></th>
                        <td><?= $this->Number->format($order->total) ?></td>
                    </tr>

                    <tr>
                        <th><?= __('Date') ?></th>
                        <td><?= h($order->date) ?></td>
                    </tr>

                </table>
                <div class="related">
                    <h4><?= __('Related Items') ?></h4>
                    <?php if (!empty($order->items)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Item Quantity') ?></th>
                                    <th><?= __('Item Price($)') ?></th>

                                    <th><?= __('Sub Total') ?></th>
                                    <th><?= __('Category Name') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($order->items as $items) : ?>
                                    <tr>
                                        <td><?= h($items->id) ?></td>
                                        <td><?= h($items->name) ?></td>
                                        <td><?= h($items->_joinData->line_quantity) ?></td>
                                        <td><?= h($items->item_price) ?></td>

                                        <td><?= h($items->_joinData->line_price) ?></td>
                                        <td><?= h($items->category_id) ?></td>

                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <h3>Total: $<?= $order->total ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Invoices') ?></h4>
                    <?php if (!empty($order->invoices)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
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
                            <table class="table table-bordered" id="dataTable" width="100%">
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
</div>
<div class="row">
    <aside class="column">

        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>


    </aside>

</div>



