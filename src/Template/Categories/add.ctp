<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Список категория'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Новая категория') ?></legend>
        <?php
            echo $this->Form->control('name', ['label'=>'Название']);
            echo $this->Form->control('customers._ids', ['options' => $customers, 'label'=>'Связанные поставщики']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Сохранить')) ?>
    <?= $this->Form->end() ?>
</div>
