<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>

<legend><?= __('View Inventory') ?></legend>











<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inventories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventories view content">
            <h3><?= h($inventory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($inventory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($inventory->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity Threshold') ?></th>
                    <td><?= $this->Number->format($inventory->quantity_threshold) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Id') ?></th>
                    <td><?= $this->Number->format($inventory->item_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>










<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <h3><?= __('Inventory Information') ?></h3>
                <table class="table table-bordered" id="dataTable" width="100%">

                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($inventory->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($inventory->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Quantity') ?></th>
                            <td><?= $this->Number->format($inventory->quantity) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Quantity Threshold') ?></th>
                            <td><?= $this->Number->format($inventory->quantity_threshold) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Item Id') ?></th>
                            <td><?= $this->Number->format($inventory->item_id) ?></td>
                        </tr>

                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <aside class="column">

        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id], ['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>

        </div>


    </aside>

</div>
