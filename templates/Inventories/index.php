<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory[]|\Cake\Collection\CollectionInterface $inventories
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="inventories index content">
    <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'button float-right btn btn-primary']) ?>
    <h3><?= __('Inventories') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('quantity_threshold') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventories as $inventory): ?>
                <tr>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                    <td><?= h($inventory->name) ?></td>
                    <td><?= $this->Number->format($inventory->quantity) ?></td>
                    <td><?= $this->Number->format($inventory->quantity_threshold) ?></td>
                    <td><?= $this->Number->format($inventory->item_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['class' => 'btn btn-primary'], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>
</div>
