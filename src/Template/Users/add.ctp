<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Новый пользователь') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'user' => 'User']
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Добавить пользователя')); ?>
<?= $this->Form->end() ?>
</div>