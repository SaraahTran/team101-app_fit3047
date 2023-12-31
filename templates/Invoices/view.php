<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \Cake\Collection\CollectionInterface|string[] $cust_I
 */
?>
<legend><?= __('View Invoice') ?></legend>



<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View Invoice</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>




        <div class="card-body">

            <div class = "modal-body">

                <table class="table table-bordered" id="dataTable" width="100%">
                    <tr>
                        <th><?= __('Invoice ID') ?></th>
                        <td><?= $this->Number->format($invoice->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Order ID') ?></th>
                        <td><?= $invoice->has('order') ? $this->Html->link($invoice->order->id, ['controller' => 'Orders', 'action' => 'view', $invoice->order->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Customer ID') ?></th>

                        <td><?= $invoice->order->has('customer_id') ? $this->Html->link($invoice->order->customer_id, ['controller' => 'Customers', 'action' => 'view', $invoice->order->customer_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Customer Name') ?></th>
                        <?php $cust = $invoice->order->customer_id  ?>
                        <?php foreach ( $cust_I as $custs) :
                            $custID = $custs->id;
                            ?>

                        <?php if ($custID == $cust) :  ?>
                            <td><?= h($custs->cust_name) ?></td>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                    <tr>
                        <th><?= __('Invoice Amount($)') ?></th>
                        <td><?= $this->Number->format($invoice->invoice_amount) ?></td>
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
            <?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>


    </aside>

</div>
