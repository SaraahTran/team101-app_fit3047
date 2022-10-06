<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $orders
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


<legend><?= __('Add Item') ?></legend>
<div class="row">


    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">

            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Item</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class = "modal-body">
                    <?= $this->Form->create($item) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->control('name',['label'=>'Item name']);
                        echo $this->Form->control('item_quantity');
                        echo $this->Form->control('item_price',['label'=>'item price($)']);
                        echo $this->Form->control('quantity_threshold',['label'=>'Inventory Alert Threshold']);
                        echo $this->Form->control('description',['label'=>'Item description','rows'=>5]);
                        echo $this->Form->control('category_id',['label'=>'Item category']);
//                        echo $this->Form->control('orders_id', ['options' => $orders]);
                        ?>
                    </fieldset>
                    </fieldset>
                    <br>

                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>

                </div></div>

        </div>
        <h4 class="heading"><?= __('Actions') ?></h4>
        <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class'=>'btn btn-primary']) ?>

        </aside>
    </div>


</div></div>


</div>
