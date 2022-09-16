<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs view content">
            <h3><?= h($job->id) ?></h3>
            <table>
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
