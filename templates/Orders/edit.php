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


<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <legend><?= __('Edit Order') ?></legend>
                </div>
                <div class = "modal-body">
                    <?= $this->Form->create($order) ?>
                    <fieldset>
                        <legend><?= __('Edit Order') ?></legend>
                        <?php
                        echo $this->Form->control('date');
                        echo $this->Form->control('total');
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
    </div>
</div>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
            ) ?>

        </div>
        <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
    </aside>


</div>



