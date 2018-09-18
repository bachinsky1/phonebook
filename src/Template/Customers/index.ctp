<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Все категории'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Поставщики') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Имя']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('surname', ['label' => 'Фамилия']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('phones', ['label' => 'Телефоны']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails', ['label' => 'Emails']) ?></th>
                <th scope="col" class="actions"><?= __('Действия') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->surname) ?></td>
                <td><?= h($customer->phones) ?></td>
                <td><?= h($customer->emails) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Открыть'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $customer->id], ['confirm' => __('Удалить запись # {0}?', $customer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Первая')) ?>
            <?= $this->Paginator->prev('< ' . __('Сюда')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Туда') . ' >') ?>
            <?= $this->Paginator->last(__('Последняя') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Страница {{page}} из {{pages}}, показано {{current}} записи(ей) из {{count}}')]) ?></p>
    </div>
</div>
