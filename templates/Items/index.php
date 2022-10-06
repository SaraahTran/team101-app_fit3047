<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
//echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>




<div class="orders index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Items') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="button float-right btn btn-primary"><i
                class="fas fa-solid fa-plus fa-sm text-white-50"></i> New Item</a>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
            <tr>
                <th><?= h('id') ?></th>
                <th><?= h('name') ?></th>
                <th><?= h('item quantity') ?></th>
                <th><?= h('item price($)') ?></th>
                <th><?= h('Inventory Alert Threshold') ?></th>
                <th><?= h('description') ?></th>
                <th><?= h('category') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $this->Number->format($item->id) ?></td>
                    <td><?= h($item->name) ?></td>
                    <td><?= $this->Number->format($item->item_quantity) ?></td>
                    <td><?= $this->Number->format($item->item_price) ?></td>
                    <td><?= $this->Number->format($item->quantity_threshold) ?></td>
                    <td><?= h($item->description) ?></td>
                    <td><?= h($item->category->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['class' => 'btn btn-primary btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>
</div>

