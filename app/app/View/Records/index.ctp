<p>Consulta Registros del personal</p>
<table>
    <tr>
        <th>UUID</th>
        <th>Registro</th>
        <th>dia</th>
        <th>hora</th>
    </tr>

    <!-- Here's where we loop through our $records array, printing out User info -->

    <?php foreach ($records as $record): ?>
        <tr>
            <td><?php echo $record['Record']['uuid']; ?></td>
            <td>
                <?php
                if ($record['Record']['type'] == 'in')
                    echo 'Entrada';
                else
                    echo 'Salida';
                ?>
            </td>
            <td>
                <?php echo $record['Record']['date']; ?>
            </td>
            <td>
                <?php echo $record['Record']['hour']; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>