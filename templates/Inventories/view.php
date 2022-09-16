<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>
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
                    <th><?= __('Item') ?></th>
                    <td><?= $inventory->has('item') ? $this->Html->link($inventory->item->id, ['controller' => 'Items', 'action' => 'view', $inventory->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
