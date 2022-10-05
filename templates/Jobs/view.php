<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>





<legend><?= __('View Job') ?></legend>



<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View Job</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>




        <div class="card-body">

            <div class = "modal-body">
                <h3><?= h($job->id) ?></h3>
                <table class="table table-bordered" id="dataTable" width="100%">
                    <tr>
                        <th><?= __('Job Desc') ?></th>
                        <td><?= h($job->job_desc) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($job->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Job Price') ?></th>
                        <td><?= $this->Number->format($job->job_price) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Job Duration') ?></th>
                        <td><?= $this->Number->format($job->job_duration) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Job Time') ?></th>
                        <td><?= h($job->job_time) ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <aside class="column">

        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>

        </div>


    </aside>

</div>








