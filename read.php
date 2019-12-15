<?php

include 'top.html';

include 'service.php';

// Run the SQL query, and print error message if it fails.
$sql = "SELECT * FROM iot";
$query = $dbhandle->prepare($sql);
if ($query->execute() === false) {
    die('Error Running Query: '.implode($query->errorInfo(), ' '));
}
// Put the results into a nice big associative array
$results = $query->fetchAll();

function ticked($rowCol)
{
    if ($rowCol == 1) {
        echo 'Yes';
    } else {
        echo 'No';
    }
}

?>

<h3>Read</h3>
<table border="1">
    <thead>
    <tr>
        <th>
            <div>Bluetooth MAC Address</div>
        </th>
        <th>
            <div>Device Name</div>
        </th>
        <th>
            <div>Living Room</div>
        </th>
        <th>
            <div>Bedroom</div>
        </th>
        <th>
            <div>Kitchen</div>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $row) : ?>
        <tr>
            <td>
                <?php echo $row['mac'] ?>
            </td>
            <td>
                <?php echo $row['name'] ?>
            </td>
            <td>
                <?php ticked($row['living_room']) ?>
            </td>
            <td>
                <?php ticked($row['bedroom']) ?>
            </td>
            <td>
                <?php ticked($row['kitchen']) ?>
            </td>
        </tr>
    <?php endforeach ?>
    <?php if (sizeof($results) == 0) {?>
    <tr>
        <td style="text-align: center; padding: 10px 0" colspan="6">
            <?php echo "No data found"; ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<h4>Key:</h4>
<p>Yes - smart home light will be turned on</p>
<p>No - smart home light will NOT be turned on</p>

<?php include 'bottom.html'; ?>
