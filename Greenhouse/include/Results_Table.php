<?php include './include/paginationConnection.php';?>
<table cellspacing="1" cellpadding="1">
    <tr2>
        <th>ID</th>
        <th>Date/Time</th>
        <th>Moisture Levels (%)</th>
        <th>Ligth Levels</th>
        <th>Temp(&deg;C)</th>
        <th>Humidity</th>
    </tr2>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['timestamp']; ?></td>
        <td><?php echo $row['moisture']; ?></td>
        <td><?php echo $row['LightIntensity']; ?></td>
        <td><?php echo $row['Temperature']; ?></td>
        <td><?php echo $row['Humidity']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include 'PaginationTable.php';?>
