<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersCategory $customersCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Изменить связь'), ['action' => 'edit', $customersCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Удалить связь'), ['action' => 'delete', $customersCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('Список связей'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новая связь'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Список категорий'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersCategories view large-9 medium-8 columns content">
    <h3><?= h($customersCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Поставщик') ?></th>
            <td><?= $customersCategory->has('customer') ? $this->Html->link($customersCategory->customer->name, ['controller' => 'Customers', 'action' => 'view', $customersCategory->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Категория') ?></th>
            <td><?= $customersCategory->has('category') ? $this->Html->link($customersCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $customersCategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customersCategory->id) ?></td>
        </tr>
    </table>
</div>
