<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersCategory[]|\Cake\Collection\CollectionInterface $customersCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Новая связь'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Список категорий'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersCategories index large-9 medium-8 columns content">
    <h3><?= __('Связи') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id', ['label' => 'Поставщик']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id', ['label' => 'Категория']) ?></th>
                <th scope="col" class="actions"><?= __('Действия') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersCategories as $customersCategory): ?>
            <tr>
                <td><?= $this->Number->format($customersCategory->id) ?></td>
                <td><?= $customersCategory->has('customer') ? $this->Html->link($customersCategory->customer->name, ['controller' => 'Customers', 'action' => 'view', $customersCategory->customer->id]) : '' ?></td>
                <td><?= $customersCategory->has('category') ? $this->Html->link($customersCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $customersCategory->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Открыть'), ['action' => 'view', $customersCategory->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['action' => 'edit', $customersCategory->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $customersCategory->id], ['confirm' => __('Удалить запись # {0}?', $customersCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Первая')) ?>
            <?= $this->Paginator->prev('< ' . __('Предыдущая')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Следующая') . ' >') ?>
            <?= $this->Paginator->last(__('Последняя') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Страница {{page}} из {{pages}}, показано {{current}} записи(ей) из {{count}}')]) ?></p>
    </div>
</div>
