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
    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'button float-right btn btn-primary']) ?>
    <h3><?= __('Jobs') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('job_name') ?></th>
                    <th><?= h('job_desc') ?></th>
                    <th><?= h('job_price') ?></th>
                    <th><?= h('job_time') ?></th>
                    <th><?= h('job_duration') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= $this->Number->format($job->id) ?></td>
                    <td><?= h($job->job_name) ?></td>
                    <td><?= h($job->job_desc) ?></td>
                    <td><?= $this->Number->format($job->job_price) ?></td>
                    <td><?= h($job->job_time) ?></td>
                    <td><?= $this->Number->format($job->job_duration) ?></td>
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
