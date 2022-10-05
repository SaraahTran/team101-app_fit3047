<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="row">
    <aside class="column">



<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <legend><?= __('Edit Items') ?></legend>
                </div>
                <div class = "modal-body">
                    <?= $this->Form->create($item) ?>
                    <fieldset>
                        <legend><?= __('Edit Item') ?></legend>
                        <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('item_quantity');
                        echo $this->Form->control('item_price');
                        echo $this->Form->control('quantity_threshold');
                        echo $this->Form->control('description');
                        echo $this->Form->control('category_id');
//                        echo $this->Form->control('orders_id', ['options' => $orders]);

                        ?>
                    </fieldset>
                </div>
                <div class = "modal-footer">
                    <?= $this->Form->button(__('Submit'),['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
            ) ?>

        </div>
        <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
    </aside>


</div>
