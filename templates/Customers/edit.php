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


<legend><?= __('Edit Customer') ?></legend>


    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">

            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>

                </div>
            </div>

            <div class="card-body">

                <div class = "modal-body">
                    <?= $this->Form->create($customer) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('cust_name');
                        echo $this->Form->control('cust_email');
                        ?>
                    </fieldset>
                </div><br>

                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>

            </div>
        </div>

</div>

    <aside class="column">

            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class'=>'btn btn-primary']
            ) ?>

        <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
    </aside>



