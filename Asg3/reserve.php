<html>
<head>
<title>Reserve A Ride</title>
</head>
<body>
    <H1>Reserve A Ride</H1>
    <form name="form" method="post">
    Ride Number: <input type="text" name="rideID" size="29"/><br>
    Name: <input type="text" name="riderName" size="29"/><br>
    Contact: <input type="text" name="riderNumber" size="29"/><br>


<?php
// set server access variables
$host = "localhost";
$user = "jnewsome";
$pass = "jn";
$db = "jnewsome";
$mysqli = new mysqli($host, $user, $pass, $db);

// check for connection errors
if (mysqli_connect_errno()) {
    die("Unable to connect!");
}
echo "<input type='submit' id='search-submit' value='submit' /><br>";

$rideID=@$_POST["rideID"];
$riderName=@$_POST["riderName"];
$riderNumber=@$_POST["riderNumber"];

$query1 = "SELECT rideID, seatsNum FROM `driver_information`";

if ($result = $mysqli->query($query1)) {
    // see if any rows were returned
    if ($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
            if ($row[0] == $rideID) {
                if ($row[1] < 1) {
                    echo "Not enough seats left";
                }
                else {
                    if ($riderName != null && $riderNumber != null && $rideID != null) {
                        $stmt = $mysqli->prepare("INSERT INTO rider_information
                                    (riderName, riderNumber, rideID) 
                                    VALUES (?, ?, ?)");
                        $stmt->bind_param('ssi', $riderName, $riderNumber, $rideID);
                        $stmt->execute();
                        $idSet = $row[0];
                        $stmt = $mysqli->prepare("UPDATE driver_information SET seatsNum = seatsNum - 1 WHERE rideID = ?");
                        $stmt->bind_param('s', $idSet);
                        $stmt->execute();
                    }
                }
            }
        }
            echo "</tr>";
	}
		unset($_POST);
}








$mysqli->close();

?>

</body>
</html> 