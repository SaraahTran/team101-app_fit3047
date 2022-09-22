<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
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


<legend><?= __('Add Quote') ?></legend>
<div class="row">


    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">

            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Quote</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class = "modal-body">
                    <?= $this->Form->create($quote,['type'=>'file']) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->control('quote_amount');
                        echo $this->Form->control('order_id', ['options' => $orders]);
                        ?>
                    </fieldset>
                    <br>

                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>

                </div></div>

        </div>
        <h4 class="heading"><?= __('Actions') ?></h4>
        <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class'=>'btn btn-primary']) ?>

        </aside>
    </div>


</div></div>


</div>



