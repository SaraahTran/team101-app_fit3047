<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */

$formTemplate = [
'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
'input' => '<input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/>'
];

$this->Form->setTemplates($formTemplate);
?>











<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <legend><?= __('Add Job') ?></legend>
                </div>
                <div class = "modal-body">
                    <?= $this->Form->create($job) ?>
                    <fieldset>
                        <legend><?= __('Add Job') ?></legend>
                        <?php
                        echo $this->Form->control('job_desc');
                        echo $this->Form->control('job_price');
                        echo $this->Form->control('job_time');
                        echo $this->Form->control('job_duration');
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
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>
    </aside>

</div>




