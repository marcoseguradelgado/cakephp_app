<h1>Usuarios</h1>
<p><?php echo $this->Html->link('Agregar usuario', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Acciones</th>
        <th>Creado</th>
    </tr>

    <!-- Here's where we loop through our $Users array, printing out User info -->

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td>
                <?php
                echo $user['User']['username'];
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink(
                    'Remover',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Esta seguro de eliminar este usuario?')
                );
                ?>
            </td>
            <td>
                <?php echo $user['User']['created']; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>