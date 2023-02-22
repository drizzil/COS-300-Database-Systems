<html>
<head>
<title>Medal Count</title>
</head>
<body>
<H1>Medal Count</H1>
<?php

$host = "localhost";
$user = "jnewsome";
$pass = "jn";
$db = "jnewsome";
$mysqli = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    die("Unable to connect!");
}

$query = "SELECT country, country_rank, count(*) FROM event_rank group by country, country_rank;";

if ($result = $mysqli->query($query)) {
    if ($result->num_rows > 0) {
        echo "<table cellpadding=10 border=1>";
		echo "<tr>";
        echo "<th>Country</th>";
		echo "<th>Gold</th>";
		echo "<th>Silver</th>";
        echo "<th>Bronze</th>";
        echo "<th>Total</th>";
		echo "</tr>";
        $summary[0] = 'none';
        $summary[1] = 0;
        $summary[2] = 0;
        $summary[3] = 0;
        while($row = $result->fetch_array()) {
            if($summary[0] === $row[0] || $summary[0] === 'none') {
                $summary[0] = $row[0];
                $summary[$row[1]] = $row[2];
            } else {
                echo "<tr>";
                echo "<td>".$summary[0]."</td>";
                echo "<td>".$summary[1]."</td>";
                echo "<td>".$summary[2]."</td>";
                echo "<td>".$summary[3]."</td>";
                echo "<td>".($summary[1]+$summary[2]+$summary[3])."</td>";
                echo "</tr>";
                $summary[0] = $row[0];
                $summary[1] = 0;
                $summary[2] = 0;
                $summary[3] = 0;
                $summary[$row[1]] = $row[2];
            }
        }
        echo "<tr>";
        echo "<td>".$summary[0]."</td>";
        echo "<td>".$summary[1]."</td>";
        echo "<td>".$summary[2]."</td>";
        echo "<td>".$summary[3]."</td>";
        echo "<td>".($summary[1]+$summary[2]+$summary[3])."</td>";
        echo "</tr>";
        echo "</table>";
    }
    else {
        echo "No rows found!";
    }
    $result->close();
}
else {
    echo "Error in query: $query. ".$mysqli->error;
}
$mysqli->close();

?>
</body>
</html> 