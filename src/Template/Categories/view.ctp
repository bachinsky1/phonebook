<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Изменить категорию'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Удалить категорию'), ['action' => 'delete', $category->id], ['confirm' => __('Удалить запись # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('Список категорий'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новая категория'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Список поставщиков'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Новый поствщик'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Название') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Связанные поставщики') ?></h4>
        <?php if (!empty($category->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Имя') ?></th>
                <th scope="col"><?= __('Фамилия') ?></th>
                <th scope="col"><?= __('Телефоны') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col" class="actions"><?= __('Действия') ?></th>
            </tr>
            <?php foreach ($category->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->name) ?></td>
                <td><?= h($customers->surname) ?></td>
                <td><?= h($customers->phones) ?></td>
                <td><?= h($customers->emails) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Открыть'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Удалить запись # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
