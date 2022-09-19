<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $items
 */

?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Add Order') ?></legend>

            </fieldset>

            <table class="table table-bordered" id="dataTable" width="100%">
                <tr>
                    <th><?= __('Add to order?') ?></th>
                    <th><?= __('Product Name') ?></th>
                    <th><?= __('Stock available') ?></th>
                    <th><?= __('Quantity') ?></th>
                </tr>
                <?php foreach ($items as $key=>$item) : ?>
                <tr>
                    <td><?= $this->Form->control('items.'.$key.'.id', ['type' => 'checkbox',  'value' => $item]) ?></td>
                    <td><?= h($item) ?></td>
                    <td><?= h($item->items_quantity) ?></td>
                    <td><?= $this->Form->control('items.'.$key.'._joinData.line_quantity') ?></td>


                    <?php endforeach; ?>

            </table>

            <fieldset>

                <?php
                echo $this->Form->control('date');
//                echo $this->Form->control('total');

                echo $this->Form->control('customer_id');


                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>


        </div>
    </div>
</div>

