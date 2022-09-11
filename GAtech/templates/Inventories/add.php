<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 * @var \Cake\Collection\CollectionInterface|string[] $items
 */
$formTemplate = [
    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/>'
];

$this->Form->setTemplates($formTemplate);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Inventories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventories form content">
            <?= $this->Form->create($inventory) ?>
            <fieldset>
                <legend><?= __('Add Inventory') ?></legend>
                <?php
                    echo $this->Form->control('items_id', ['options' => $items]);
                    echo $this->Form->control('items_quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
