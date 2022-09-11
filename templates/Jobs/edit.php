<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>


<div class="row">
    <div class="column-responsive column-80">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <legend><?= __('Edit Job') ?></legend>
                </div>
                <div class = "modal-body">
                    <?= $this->Form->create($job,['type'=>'file']) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->control('job_desc');
                        echo $this->Form->control('job_price');
                        echo $this->Form->control('job_time');
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
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class'=>'d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
            ) ?>

        </div>
        <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
    </aside>


</div>


