<html>
<head>
<title>Enter Ride Criteria</title>
</head>
<body>
    <H1>Enter Ride Criteria</H1>
    <form name="form" method="post">
    Church: <input type="text" name="church" size="29"/><br>
    Ride On: <input type="date" name="rideDate" size="29"/><br>

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

$church=@$_POST["church"];
$date=@$_POST["rideDate"];


$query1 = "SELECT * FROM `driver_information` WHERE churchName = '".$church."' AND daysDriving = '".$date."'";
$query2 = "SELECT * FROM `driver_information` WHERE churchName = '".$church."'";
$query3 = "SELECT * FROM `driver_information` WHERE daysDriving = '".$date."'";
$query4 = "SELECT * FROM `driver_information`";

if ($church != null && $date != null) {
    if ($result = $mysqli->query($query1)) {
        // see if any rows were returned
        if ($result->num_rows > 0) {
            echo "<table cellpadding=10 border=1>";
            echo "<tr>";
            echo "<th>Ride Number</th>";
            echo "<th>Driver</th>";
            echo "<th>Driver's Number</th>";
            echo "<th>Seats Left</th>";
            echo "<th>Time Leaving</th>";
            echo "<th>Meeting Location</th>";
    
            echo "</tr>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "</tr>";
            }
            unset($_POST);
        }
    }
}
else if ($church != null && $date == null) {
    if ($result = $mysqli->query($query2)) {
        // see if any rows were returned
        if ($result->num_rows > 0) {
            echo "<table cellpadding=10 border=1>";
            echo "<tr>";
            echo "<th>Ride Number</th>";
            echo "<th>Driver</th>";
            echo "<th>Driver's Number</th>";
            echo "<th>Seats Left</th>";
            echo "<th>Time Leaving</th>";
            echo "<th>Meeting Location</th>";
            echo "<th>Date</th>";
    
            echo "</tr>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td>" . $row[7] . "</td>";
                echo "</tr>";
            }
            unset($_POST);
        }
    }
}
else if ($church == null && $date != null) {
    if ($result = $mysqli->query($query3)) {
        // see if any rows were returned
        if ($result->num_rows > 0) {
            echo "<table cellpadding=10 border=1>";
            echo "<tr>";
            echo "<th>Ride Number</th>";
            echo "<th>Driver</th>";
            echo "<th>Driver's Number</th>";
            echo "<th>Church Name</th>";
            echo "<th>Seats Left</th>";
            echo "<th>Time Leaving</th>";
            echo "<th>Meeting Location</th>";
    
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
                echo "</tr>";
            }
            unset($_POST);
        }
    }
}
else if ($church == null && $date == null) {
    if ($result = $mysqli->query($query4)) {
        // see if any rows were returned
        if ($result->num_rows > 0) {
            echo "<table cellpadding=10 border=1>";
            echo "<tr>";
            echo "<th>Ride Number</th>";
            echo "<th>Driver</th>";
            echo "<th>Driver's Number</th>";
            echo "<th>Church Name</th>";
            echo "<th>Seats Left</th>";
            echo "<th>Time Leaving</th>";
            echo "<th>Meeting Location</th>";
            echo "<th>Date</th>";
    
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
}







$mysqli->close();

?>

</body>
</html> 