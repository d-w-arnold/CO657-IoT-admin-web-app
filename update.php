<?php

include 'top.html';

include 'service.php';

function checkboxResult($toPost) {
    if (strcmp($toPost, 'on')) {
        return 0;
    } else {
        return 1;
    }
}

function checkPrimaryKey($dbhandle) {
    $sql = "SELECT * FROM iot WHERE mac='".$_POST['mac']."'";
    $stmt = $dbhandle->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() == 0)
    {
        die("Bluetooth Device: ".$_POST['mac']." does not exist");
    }
}

if (isset($_POST['submit'])) {
    @checkPrimaryKey($dbhandle);
    $sql = "UPDATE iot SET mac='".$_POST['mac']."', name='".$_POST['name']."', living_room='".@checkboxResult($_POST['living_room'])."', bedroom='".@checkboxResult($_POST['bedroom'])."', kitchen='".@checkboxResult($_POST['kitchen'])."' WHERE mac='".$_POST['mac']."'";
    $statement = $dbhandle->prepare($sql);
    $statement->execute();
    echo "Bluetooth Device: ".$_POST['mac']." updated!";
}

?>

<h3>Update</h3>
<form method="post">
    <label for="mac">Bluetooth MAC Address (IPv6: e.g. ??:??:??:??:??:??)</label>
    <input type="text" name="mac" id="mac">
    <label for="name">Device Name</label>
    <input type="text" name="name" id="name">
    <label for="living_room">Living Room</label>
    <input type="checkbox" name="living_room" id="living_room">
    <label for="bedroom">Bedroom</label>
    <input type="checkbox" name="bedroom" id="bedroom">
    <label for="kitchen">Kitchen</label>
    <input type="checkbox" name="kitchen" id="kitchen">
    <div><input type="submit" name="submit" value="Submit"></div>
</form>

<?php include 'bottom.html'; ?>

