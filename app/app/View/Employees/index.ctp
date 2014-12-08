<h2>Empleados</h2>

<table id="recordsConsult">
    <thead>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>UUID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>UUID</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
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
                )." / ".$this->Form->postLink(
                    'Editar',
                    array('action' => 'edit', $employee['Employee']['IdEmployee']));
                ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>