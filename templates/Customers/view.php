<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */

$formTemplate =
    [

        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
        'input' => '<input type="{{type}}" name="{{name}}"  class="form-control" {{attrs}} />',
        'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
        'label' => '<label{{attrs}} class="form-label"> {{text}}</label>',
        'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
        'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
        'textarea' => '<textarea name="{{name}}" class="form-control" {{attrs}}>{{value}}</textarea>',
    ];

$this->Form->setTemplates($formTemplate);
?>

<legend><?= __('View Customer') ?></legend>


<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View Customer</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>




        <div class="card-body">

            <div class = "modal-body">
                <h3><?= __('Customer Information') ?></h3>

                <table class="table table-bordered" id="dataTable" width="100%">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($customer->cust_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($customer->cust_email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ID') ?></th>
                        <td><?= $this->Number->format($customer->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Orders') ?></h4>
                    <?php if (!empty($customer->orders)) : ?>
                        <div class="table table-bordered" id="dataTable" width="100%">
                            <table>
                                <tr>
                                    <th><?= __('ID') ?></th>
                                    <th><?= __('Date') ?></th>
                                    <th><?= __('Total') ?></th>
                                    <th><?= __('Customer ID') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($customer->orders as $orders) : ?>
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

                                <?php endforeach; ?>
                                    </tr>
                        </div>   </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <aside class="column">

        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>


    </aside>



