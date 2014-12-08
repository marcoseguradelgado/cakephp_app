<h2>Consulta Registros del personal</h2>
<table id="recordsConsult">
    <thead>
        <tr>
            <th>Nombre empleado</th>
            <th>UUID</th>
            <th>Registro</th>
            <th>dia</th>
            <th>hora</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nombre empleado</th>
            <th>UUID</th>
            <th>Registro</th>
            <th>dia</th>
            <th>hora</th>
        </tr>
    </tfoot>
    <!-- Here's where we loop through our $records array, printing out User info -->
    <tbody>
    <?php foreach ($records as $record): ?>
        <tr>
            <td><?php echo $record['e']['nameEmployee']; ?></td>
            <td><?php echo $record['r']['uuid']; ?></td>
            <td>
                <?php
                if ($record['r']['type'] == 'in')
                    echo 'Entrada';
                else
                    echo 'Salida';
                ?>
            </td>
            <td>
                <?php echo $record['r']['date']; ?>
            </td>
            <td>
                <?php echo $record['r']['hour']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>