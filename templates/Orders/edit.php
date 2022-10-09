<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 * @var string[]|\Cake\Collection\CollectionInterface $items
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







<legend><?= __('Edit Order') ?></legend>


<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Order</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>

        <div class="card-body">

            <?= $this->Form->create($order) ?>
            <fieldset>

                <?php
                echo $this->Form->control('date');
                echo $this->Form->control('total',['label'=>'order total($)']);
                echo $this->Form->control('customer_id', ['options' => $customers]);
                //                        echo $this->Form->control('items_id', ['options' => $items]);
                ?>
            </fieldset>
        </div>
        <div class = "modal-footer">
            <?= $this->Form->button(__('Submit'),['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>


<div class="row">
    <aside class="column">

        <h4 class="heading"><?= __('Actions') ?></h4>
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $order->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
        ) ?>

        <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
    </aside>


</div>


