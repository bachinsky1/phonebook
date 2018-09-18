<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Редактировать поставщика'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Удалить поставщика'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новый поставщик'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Список категорий'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Имя') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Фамилия') ?></th>
            <td><?= h($customer->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Телефоны') ?></th>
            <td><?= h($customer->phones) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= h($customer->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Связанные категории') ?></h4>
        <?php if (!empty($customer->categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Название') ?></th>
                <th scope="col" class="actions"><?= __('Действия') ?></th>
            </tr>
            <?php foreach ($customer->categories as $categories): ?>
            <tr>
                <td><?= h($categories->id) ?></td>
                <td><?= h($categories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Открыть'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Удалить запись # {0}?', $categories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
