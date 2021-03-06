<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">

            
            <?php if (is_null($this->request->session()->read('Auth.User.role'))) : ?>
                <li><?= $this->Html->link(__('Вход'), 
                                ['controller' => 'Users', 
                                'action' => 'login']) ?></h1></li>
            <?php else:  ?>
                <?php if (($this->request->session()->read('Auth.User.role')) == 'admin') : ?>
                    <li><?= $this->Html->link(__('Добавить пользователя'), 
                                    ['controller' => 'Users', 
                                    'action' => 'add']) ?></li>   
                    <li><?= $this->Html->link(__('Очистить БД'), 
                                    ['controller' => 'Service', 
                                    'action' => 'clear']) ?></li>
                    <li><?= $this->Html->link(__('Импорт'), 
                                    ['controller' => 'Service', 
                                    'action' => 'import']) ?></li>
                    <li><?= $this->Html->link(__('Экспорт'), 
                                    ['controller' => 'Service', 
                                    'action' => 'export']) ?></li>
                <?php endif;  ?>
                    <li><?= $this->Html->link(__('Поставщики'), 
                                    ['controller' => 'Customers', 
                                    'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Категории'), 
                                    ['controller' => 'Categories', 
                                    'action' => 'index']) ?></h1></li>
                    <li><?= $this->Html->link(__('Выход (' . $this->request->session()->read('Auth.User.username') . ')' ), 
                                ['controller' => 'Users', 
                                'action' => 'logout']) ?></h1></li>

            <?php endif;  ?>

                <li><a href="https://github.com/bachinsky1/phonebook" target="_blank">github.com</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
