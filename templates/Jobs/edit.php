<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
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



<legend><?= __('Edit Job') ?></legend>


<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Job</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>

        <div class="card-body">

            <div class = "modal-body">
                <?= $this->Form->create($job) ?>
                <fieldset>
                    <?php

                    echo $this->Form->control('job_price');
                    echo $this->Form->control('job_time',['label'=>'job due date and time']);
                    echo $this->Form->control('job_duration',['label'=>'job duration($)']);
                    echo $this->Form->control('job_desc',['label'=>'job description','rows'=>5]);
                    echo $this->Form->control('job_status',['label'=>'job status']);
                    ?>
                </fieldset>
            </div>
            <br>
            <div class = "modal-footer">
                <?= $this->Form->button(__('Submit'),['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>

<aside class="column">

        <h4 class="heading"><?= __('Actions') ?></h4>
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $job->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
        ) ?>


    <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
</aside>




