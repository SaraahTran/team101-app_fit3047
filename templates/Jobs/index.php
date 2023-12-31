<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

//echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="jobs index content">
    <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="button float-right btn btn-primary"><i
            class="fas fa-solid fa-plus fa-sm text-white-50"></i> New Job</a>
    <h3><?= __('Jobs') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('job name') ?></th>
                    <th><?= h('job description') ?></th>
                    <th><?= h('Done?') ?></th>
                    <th><?= h('job price($)') ?></th>
                    <th><?= h('job due date and time') ?></th>
                    <th><?= h('job duration') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= $this->Number->format($job->id) ?></td>
                    <td><?= h($job->job_name) ?></td>
                    <td><?= h($job->job_desc) ?></td>
                    <?php if ($job->job_status == 1):?>
                        <td><?= h('Done') ?></td>
                    <?php endif; ?>
                    <?php  if($job->job_status == 0):?>
                        <td class="actions"><?= $this->Form->postLink(__('Doing'), ['action' => 'done', $job->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]);?></td>
                    <?php endif; ?>
                    <td><?= $this->Number->format($job->job_price),'$' ?></td>
                    <td><?= h($job->job_time) ?></td>
                    <td><?= $this->Number->format($job->job_duration),'  day' ?></td>


                    <td class="actions">

                        <?= $this->Html->link(__('View'), ['action' => 'view', $job->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['class' => 'btn btn-primary btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

</script>
