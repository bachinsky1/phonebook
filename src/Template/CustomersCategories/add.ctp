<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersCategory $customersCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Список связей'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Список категория'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($customersCategory) ?>
    <fieldset>
        <legend><?= __('Добавить связь') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers, 'label' => 'Поставщик']);
            echo $this->Form->control('category_id', ['options' => $categories, 'label' => 'Категория']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Сохранить')) ?>
    <?= $this->Form->end() ?>
</div>
