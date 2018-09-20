
<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Введите ваш логин и пароль') ?></legend>
        <p>Добавлен простенький RBAC. 
        Админ имеет доступ ко всем контроллерам и экшенам. Юзер может только просматривать записи</p>
        <p>Админ:admin/admin</p>
        <p>Юзер:user/user</p>
        
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->button(__('Поехали !!!')); ?>
    </fieldset>

<?= $this->Form->end() ?>
</div>