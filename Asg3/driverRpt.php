<html>
<head>
<title>Driver Report</title>
</head>
<body>
    <H1>Driver Report</H1>
    <form name="form" method="post">
    Driver's Name: <input type="text" name="driver" size="29"/><br>

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

$driver=@$_POST["driver"];

$query1 = "SELECT * FROM `driver_information` WHERE driverName = '".$driver."'";
$query2 = "SELECT rider_information.rideID, rider_information.riderName, rider_information.riderNumber
            FROM rider_information, driver_information
            WHERE driver_information.driverName = '".$driver."'
            AND driver_information.rideID = rider_information.rideID
            ORDER BY `rider_information`.`rideID` ASC";

if ($result = $mysqli->query($query1)) {
    // see if any rows were returned
    if ($result->num_rows > 0) {
        echo "<table cellpadding=10 border=1>";
        echo "<tr>";
        echo "<th>Ride Number</th>";
        echo "<th>Driver's Number</th>";
        echo "<th>Church Name</th>";
        echo "<th>Seats Left</th>";
        echo "<th>Time Leaving</th>";
        echo "<th>Meeting Location</th>";
        echo "<th>Date Driving</th>";

        echo "</tr>";
		while ($row = $result->fetch_array()) {
			echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";
            echo "<td>" . $row[5] . "</td>";
            echo "<td>" . $row[6] . "</td>";
            echo "<td>" . $row[7] . "</td>";
            echo "</tr>";
		}
		unset($_POST);
	}
}

if ($result1 = $mysqli->query($query2)) {
    // see if any rows were returned
    if ($result1->num_rows > 0) {
        echo "<table cellpadding=10 border=1>";
        echo "<tr>";
        echo "<th>RideID</th>";
        echo "<th>Rider's Name</th>";
        echo "<th>Rider's Number</th>";

        echo "</tr>";
        while ($row1 = $result1->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row1[0] . "</td>";
            echo "<td>" . $row1[1] . "</td>";
            echo "<td>" . $row1[2] . "</td>";
            echo "</tr>";
        }
        unset($_POST);
    }
}






$mysqli->close();

?>

</body>
</html> 