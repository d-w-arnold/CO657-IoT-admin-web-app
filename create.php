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
    if($stmt->rowCount() > 0)
    {
        die("Bluetooth Device: ".$_POST['mac']." already exists");
    }
}

if (isset($_POST['submit'])) {
    @checkPrimaryKey($dbhandle);
    $new_user = array(
        "mac" => $_POST['mac'],
        "name" => $_POST['name'],
        "living_room" => @checkboxResult($_POST['living_room']),
        "bedroom" => @checkboxResult($_POST['bedroom']),
        "kitchen" => @checkboxResult($_POST['kitchen'])
    );
    $sql = sprintf(
        "INSERT INTO iot (%s) values (%s)",
        implode(", ", array_keys($new_user)),
        ":" . implode(", :", array_keys($new_user))
    );
    $statement = $dbhandle->prepare($sql);
    $statement->execute($new_user);
    echo "Bluetooth Device: ".$_POST['mac']." created!";
}

?>

<h3>Create</h3>
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
