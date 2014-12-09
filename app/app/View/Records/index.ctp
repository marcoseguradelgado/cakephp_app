<h2>Consulta Registros del personal</h2>
<div class="searchTable">
    <label>Fecha minima:</label>
    <input type="date" id="min" name="min" value="2014-11-01">
</div>
<div class="searchTable">
    <label>Fecha maxima:</label>
    <input type="date" id="max" name="max" value="2014-11-30">
</div>
<table id="recordsConsult">
    <thead>
    <tr>
        <th>Nombre empleado</th>
        <th>UUID</th>
        <th>Registro</th>
        <th>Dia</th>
        <th>Tiempo entrada</th>
        <th>Tiempo salida</th>
        <th>Horas</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
        <th>Nombre empleado</th>
        <th>UUID</th>
        <th>Registro</th>
        <th>Dia</th>
        <th>Tiempo entrada</th>
        <th>Tiempo salida</th>
        <th>Horas</th>
    </tr>

    <tr>
        <th  class="totalRows" colspan="7" style="text-align:right">Total de horas:</th>
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

                $types = explode(",", $record[0]['type']);
                if (isset($types[1]))
                    echo 'Entrada/Salida';
                else
                    echo 'Entrada';
                ?>
            </td>
            <td>
                <?php echo $record['r']['date']; ?>
            </td>
            <td>
                <?php
                $hours = explode(",", $record[0]['hour']);
                echo $in = $hours[0]; ?>
            </td>
            <td>
                <?php if (isset($hours[1]))
                    echo $out = $hours[1];
                else if (isset($types[1]))
                    echo $out = $hours[0];
                else
                    echo $out = "00:00";
                ?>
            </td>
            <td><?php

                if ($out == "00:00") {
                    echo "0";
                } else {
                    $in = explode(":", $in);
                    $inInt = (intval($in[0]) * 60) + intval($in[1]);

                    $out = explode(":", $out);
                    $outInt = (intval($out[0]) * 60) + intval($out[1]);

                    echo round(($outInt - $inInt) / 60, 2);
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>