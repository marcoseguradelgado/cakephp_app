<h1>Empleados</h1>
<p><?php echo $this->Html->link('Agregar empleado', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>UUID</th>
        <th>Acciones</th>
    </tr>

    <!-- Here's where we loop through our $employees array, printing out Employee info -->

    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?php echo $employee['Employee']['IdEmployee']; ?></td>
            <td>
                <?php
                echo $employee['Employee']['nameEmployee'];
                ?>
            </td>
            <td><?php echo $employee['Employee']['uuid']; ?></td>
            <td>
                <?php
                echo $this->Form->postLink(
                    'Remover',
                    array('action' => 'delete', $employee['Employee']['IdEmployee']),
                    array('confirm' => 'Esta seguro de eliminar este empleado?')
                );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>