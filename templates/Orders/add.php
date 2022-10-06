<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $itemss
 * @var \Cake\Collection\CollectionInterface|string[] $customer
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



<legend><?= __('Add Order') ?></legend>
<div class="row">


    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">

            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Order</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class = "modal-body">
                    <div class="orders form content">
                        <?= $this->Form->create($order) ?>
                        <fieldset>

                        </fieldset>

                        <table class="table table-bordered" id="dataTable" width="100%">
                            <tr>
                                <th><?= __('Add to order?') ?></th>
                                <th><?= __('Product Name') ?></th>
                                <th><?= __('Stock available') ?></th>
                                <th><?= __('Quantity') ?></th>
                            </tr>

                            <?php foreach ( $itemss as $item) :?>
                            <tr>
                                <td><?= $this->Form->control('items.'.$item->id.'.id', ['type' => 'checkbox', 'hiddenField' => false ,  'value' => $item->id,'label'=>false]) ?></td>
                                <td><?= h($item->name) ?></td>
                                <td><?= h($item->item_quantity) ?></td>
                                <td><?= $this->Form->control('items.'.$item->id.'._joinData.line_quantity') ?></td>
                                <?php endforeach; ?>
                            </tr>

                        </table>

                        <fieldset>

                            <?php
                            echo $this->Form->control('date',['label'=>'order date']);
                            echo $this->Form->control('customer_id', ['options' => $customers]);
                            ?>
                        </fieldset>
                    </div>

                    <br>

                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>

                </div></div>   </div></div>
        </div>
        <h4 class="heading"><?= __('Actions') ?></h4>
        <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class'=>'btn btn-primary']) ?>

        </aside>
    </div>


</div></div>


</div>















