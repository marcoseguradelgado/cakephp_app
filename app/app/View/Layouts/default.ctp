<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'RESP');
?>
<!DOCTYPE html>
<html>
    <head>
    <?php echo $this->Html->charset(); ?>
        <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
        </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('cake.generic');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->Html->css('jquery.dataTables');
    echo $this->Html->script('jquery');
    echo $this->Html->script('jquery.dataTables');
    echo $this->Html->script('custom');
    echo $this->fetch('script');
    ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo $this->Html->link(
                $this->Html->image('m_qxdev.jpg', array('alt' => $cakeDescription, 'border' => '0')),
                '/',
                array('target' => '', 'escape' => false, 'id' => 'm-qxdev')
            ); ?></h1>

                <h1 class="title"><span>RESP</span> - Registro de Entradas y Salidas del Personal</h1>
        <?php
        if ($user = $this->Session->read('Auth.User')) {
            echo $this->Html->link($user['username']. ' / logout', '/users/logout', array('class' => 'logout'));
        }
        ?>
            </div>
            <div id="content">
                <?php if ($this->Session->read('Auth.User')) {?>
                    <nav>
                        <div id="nav">
                            <ul>
                                <li><?php echo $this->Html->link('Inicio', '/'); ?></li>
                                <li><?php echo $this->Html->link('Usuarios administrativos', '/users/'); ?>
                                    <ul>
                                        <li><?php echo $this->Html->link('Consultar', '/users/'); ?></li>
                                        <li><?php echo $this->Html->link('Agregar', '/users/add/'); ?></li>
                                    </ul>
                                </li>
                                <li><?php echo $this->Html->link('Empleados', '/employees/'); ?>
                                    <ul>
                                        <li><?php echo $this->Html->link('Consultar', '/employees/'); ?></li>
                                        <li><?php echo $this->Html->link('Agregar', '/employees/add/'); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                <?php } ?>
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
            </div>
        </div>
<?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
