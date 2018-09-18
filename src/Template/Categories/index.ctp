<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Новая категория'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Категории') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Название']) ?></th>
                <th scope="col" class="actions"><?= __('Действия') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= h($category->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Открыть'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $category->id], ['confirm' => __('Удалить запись # {0}?', $category->id)]) ?>
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
