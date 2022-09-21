<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>




<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <h3><?= h($item->id) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($item->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($item->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($item->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Item Quantity') ?></th>
                        <td><?= $this->Number->format($item->item_quantity) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Item Price') ?></th>
                        <td><?= $this->Number->format($item->item_price) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Quantity Threshold') ?></th>
                        <td><?= $this->Number->format($item->quantity_threshold) ?></td>
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
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Date') ?></th>
                                    <th><?= __('Total') ?></th>
                                    <th><?= __('Customer Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($item->orders as $orders) : ?>
                                    <tr>
                                        <td><?= h($orders->id) ?></td>
                                        <td><?= h($orders->date) ?></td>
                                        <td><?= h($orders->total) ?></td>
                                        <td><?= h($orders->customer_id) ?></td>
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
</div>
<div class="row">
    <aside class="column">

        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>


    </aside>

</div>
