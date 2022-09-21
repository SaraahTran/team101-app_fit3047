<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <legend><?= __('Add Customer') ?></legend>
                </div>
                <div class = "modal-body">
                    <?= $this->Form->create($customer) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->control('cust_name');
                        echo $this->Form->control('cust_email');
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
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>
    </aside>

</div>

