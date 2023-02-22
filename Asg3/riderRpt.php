<html>
<head>
<title>Rider Report</title>
</head>
<body>
    <H1>Rider Report</H1>
    <form name="form" method="post">
    Riders's Name: <input type="text" name="rider" size="29"/><br>

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

$rider=@$_POST["rider"];

$query = "SELECT * FROM driver_information, rider_information 
            WHERE rider_information.riderName = '".$rider."' 
            AND driver_information.rideID = rider_information.rideID";

if ($result = $mysqli->query($query)) {
    // see if any rows were returned
    if ($result->num_rows > 0) {
        echo "<table cellpadding=10 border=1>";
        echo "<tr>";
        echo "<th>Ride Number</th>";
        echo "<th>Driver's Number</th>";
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
            echo "<td>" . $row[1] . "</td>";
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





$mysqli->close();

?>

</body>
</html> 