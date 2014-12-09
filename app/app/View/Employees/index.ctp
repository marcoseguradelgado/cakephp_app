<h2>Empleados</h2>

<table id="ConsultTable">
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
                echo $this->Html->link('Editar',array('action' => 'edit', $employee['Employee']['IdEmployee']));
                ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>