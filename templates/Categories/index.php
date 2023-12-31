<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */

//echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="categories index content">
    
    <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="button float-right btn btn-primary"><i
            class="fas fa-solid fa-plus fa-sm text-white-50"></i> New Category</a>
    <h3><?= __('Categories') ?></h3>




    <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('name') ?></th>
                    <th><?= h('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td><?= h($category->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $category->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['class' => 'btn btn-primary btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

>
    <div class="paginator">

        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>
</div>
