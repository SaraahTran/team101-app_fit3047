<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>



<legend><?= __('View Category') ?></legend>



<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View Category</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

            </div>
        </div>




        <div class="card-body">

            <div class = "modal-body">

                <table class="table table-bordered" id="dataTable" width="100%">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($category->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($category->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ID') ?></th>
                        <td><?= $this->Number->format($category->id) ?></td>
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
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
        </div>
    </aside>

</div>


