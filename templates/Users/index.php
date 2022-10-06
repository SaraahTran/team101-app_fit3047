<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>




<div class="customers index content">
    <?= $this->Html->link(__('Create New User'), ['action' => 'add'], ['class' => 'button float-right btn btn-primary']) ?>
<h3><?= __('Users') ?></h3>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
        <tr>
            <th><?= h('id') ?></th>
            <th><?= h('username') ?></th>
            <th><?= h('email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>

        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-primary btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">

    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

</script>
</div>
