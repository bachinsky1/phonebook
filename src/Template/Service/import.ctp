<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Действия') ?></li>
        <li><?= $this->Html->link(__('Импорт'), ['controller' => 'Service', 'action' => 'import']) ?></li>
        <li><?= $this->Html->link(__('Экспорт'), ['controller' => 'Service', 'action' => 'export']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <fieldset>
        <legend><?= __('Импорт') ?></legend>

        <?php 

        echo $this->Form->create(null,  ['type' => 'file'], ['url' => ['controller' => 'Customers', 'action' => 'import']]);
        echo $this->Form->file('file');
        echo $this->Form->button(__('Выгрузить', true));
        echo $this->Form->end();
        ?>
    </fieldset>
<div>