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
    $sql = "DELETE FROM iot WHERE mac='".$_POST['mac']."'";
    $statement = $dbhandle->prepare($sql);
    $statement->execute();
    echo "Bluetooth Device: ".$_POST['mac']." removed!";
}

?>

<h3>Remove</h3>
<form method="post">
    <label for="mac">Bluetooth MAC Address (IPv6: e.g. ??:??:??:??:??:??)</label>
    <input type="text" name="mac" id="mac">
    <div><input type="submit" name="submit" value="Submit"></div>
</form>

<?php include 'bottom.html'; ?>

