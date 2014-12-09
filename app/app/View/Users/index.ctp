<h2>Usuarios administrativos</h2>
<table id="ConsultTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Acciones</th>
            <th>Creado</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Acciones</th>
            <th>Creado</th>
        </tr>
    </tfoot>
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