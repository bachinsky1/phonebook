<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Form->postLink(
                __('Удалить'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Удалить запись # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Все поставщики'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Все категории'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Новая категория'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Изменить реквизиты поставщика') ?></legend>
        <?php
            echo $this->Form->control('name', ['label'=>'Имя']);
            echo $this->Form->control('surname', ['label'=>'Фамилия']);
            echo $this->Form->control('phones', ['label'=>'Телефоны (через запятую)']);
            echo $this->Form->control('emails', ['label'=>'Emails (через запятую)']);
            echo $this->Form->control('categories._ids', ['options' => $categories, 'label'=>'Связанные категории']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Сохранить')) ?>
    <?= $this->Form->end() ?>
</div>
