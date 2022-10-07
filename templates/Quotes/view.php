<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $cust_Q
 */
?>



<legend><?= __('View Quotes') ?></legend>



<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View Quotes</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>




        <div class="card-body">

            <div class = "modal-body">
                <h3><?= __('Quote Information') ?></h3>

                <table class="table table-bordered" id="dataTable" width="100%">
                    <tr>
                        <th><?= __('Quote ID') ?></th>
                        <td><?= $this->Number->format($quote->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Order ID') ?></th>
                        <td><?= $quote->has('order') ? $this->Html->link($quote->order->id, ['controller' => 'Orders', 'action' => 'view', $quote->order->id]) : '' ?></td>
                    </tr>
                    <tr>
                    <th><?= __('Customer ID') ?></th>

                    <td><?= $quote->order->has('customer_id') ? $this->Html->link($quote->order->customer_id, ['controller' => 'Customers', 'action' => 'view', $quote->order->customer_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Customer Name') ?></th>
                        <?php $cust = $quote->order->customer_id  ?>
                        <?php foreach ( $cust_Q as $custs) :
                            $custID = $custs->id;
                            ?>

                            <?php if ($custID == $cust) :  ?>
                            <td><?= h($custs->cust_name) ?></td>

                        <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                    <tr>
                        <th><?= __('Quote Amount($)') ?></th>
                        <td><?= h($quote->quote_amount) ?></td>
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
            <?= $this->Html->link(__('Edit Quote'), ['action' => 'edit', $quote->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Quote'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>


    </aside>

</div>
