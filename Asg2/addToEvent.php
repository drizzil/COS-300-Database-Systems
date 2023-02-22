<html>
<head>
<title>Add Student to Event</title>
</head>
<body>
<H1>Add Student to Event</H1>

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

$query1 = "SELECT name AS stuName FROM EA_STUDENT;";
$query2 = "SELECT event_name FROM EA_EVENT;";

// Choose a student

echo "<form action='#' method='post'>";
echo "Choose a student:";
echo "<select name = 'someName'>";
echo "<option value=null>Student</option>";

if ($result = $mysqli->query($query1)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo "<option value = '{$row['stuName']}'>{$row['stuName']}</option>";
        }
    }
}
echo "</select>";

// Choose an event
echo "<BR>";
echo "Choose an event:";

echo "<form action='#' method='post'>";
echo "<select name = 'someEvent'>";
echo "<option value=null>Event</option>";

if ($result = $mysqli->query($query2)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo "<option value = '{$row['event_name']}'>{$row['event_name']}</option>";
        }
    }
}
echo "</select>";
echo "<BR>";
echo "<input    type ='submit' 
                name='submit' 
                value='Submit' />";

if(isset($_POST['submit'])){
    $selectName = $_POST["someName"];
    $selectEvent = $_POST["someEvent"];
    echo "<BR>";
    echo "<BR>";
    echo "<BR>";
    echo "You have selected: " .$selectName." and ".$selectEvent;


    $query1sel = "SELECT id FROM EA_STUDENT WHERE name = '".$selectName."';";
    $query2sel = "SELECT id FROM EA_EVENT WHERE event_name = '".$selectEvent."';";

    if ($result = $mysqli->query($query1sel)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $stuID = $row[0];
            }
        }
        else {
            $stuID = null;
            echo "<BR>";
            echo "No name selected!";
        }
        $result->close();
    }
    else {
        echo "Error in query: $query1sel. ".$mysqli->error;
    }

    if ($result = $mysqli->query($query2sel)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $eveID = $row[0];
            }
        }
        else {
            $eveID = null;
            echo "<BR>";
            echo "No event selected!";
        }
        $result->close();
    }
    else {
        echo "Error in query: $query2sel. ".$mysqli->error;
    }

    echo "<BR>";
    echo "<BR>";
    // echo $query1id;
    echo "<BR>";
    // echo $query2id;
    echo "<BR>";
    echo "<BR>";

    // $c = mysqli_connect("localhost","jnewsome","jn");
    // mysqli_select_db("EA_ATTEND", "jnewsome");

    $hasName = strlen($selectName) > 0;
    $hasEvent = strlen($selectEvent) > 0;

    if ($eveID != null || $stuID != null) {
        if ($hasName && $hasEvent) {
            
            $stmt = $mysqli->prepare("INSERT INTO EA_ATTEND(event_id, student_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $con, $ani);

            $con = $eveID;
            $ani = $stuID;
            $stmt->execute();

            // execute query
            //echo "<br>".$query."<br>";
        }
    }
}

$mysqli->close();

?>

</body>
</html> 