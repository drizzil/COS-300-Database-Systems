<html>
<head>
<title>Attendance Report</title>
</head>
<body>
<H1> Attendance Report </H1>
<H1>Select which events / students you want on the report</H1>

<?php
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
$query3 = "SELECT event_date FROM EA_EVENT ORDER BY event_date ASC;";

// Choose a student

echo "<form action='#' method='post'>";
echo "Choose a student:";
echo "<select name = 'someName'>";
echo "<option value=null>All Students</option>";

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
echo "<option value=null>All Events</option>";

if ($result = $mysqli->query($query2)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo "<option value = '{$row['event_name']}'>{$row['event_name']}</option>";
        }
    }
}
echo "</select>";

// Choose a start date
echo "<BR>";
echo "Begin Date:";

echo "<form action='#' method='post'>";
echo "<select name = 'someBegin'>";
echo "<option value=null>yyyy / mm / dd</option>";

if ($result = $mysqli->query($query3)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo "<option value = '{$row['event_date']}'>{$row['event_date']}</option>";
        }
    }
}
echo "</select>";

// Choose an end date
echo "<BR>";
echo "End Date:";

echo "<form action='#' method='post'>";
echo "<select name = 'someEnd'>";
echo "<option value=null>yyyy / mm / dd</option>";

if ($result = $mysqli->query($query3)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo "<option value = '{$row['event_date']}'>{$row['event_date']}</option>";
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
    $selectBegin = $_POST["someBegin"];
    $selectEnd = $_POST["someEnd"];
    echo "<BR>";
    echo "<BR>";
    echo "<BR>";
    // echo "You have selected: " .$selectName." and ".$selectEvent. " and ".$selectBegin. " and ".$selectEnd;
    if ($selectName == 'null') {
        echo "All Students";
        echo "<BR>";
    }
    else {
        echo "Student: ".$selectName;
        echo "<BR>";
    }
    if ($selectEvent == 'null') {
        echo "All Events";
        echo "<BR>";
    }
    else {
        echo "Event: ".$selectEvent;
        echo "<BR>";
    }
    if ($selectBegin == 'null') {
        echo "Begin Date: None";
        echo "<BR>";
    }
    else {
        echo "Begin Date: ".$selectBegin;
        echo "<BR>";
    }
    if ($selectEnd == 'null') {
        echo "End Date: None";
        echo "<BR>";
    }
    else {
        echo "End Date: ".$selectEnd;
        echo "<BR>";
    }

}
echo "<BR>";
if ($selectName == 'null' && $selectEvent == 'null' && $selectBegin == 'null' && $selectEnd == 'null') {
    $query = "SELECT name, event_name, event_date 
                FROM EA_STUDENT, EA_EVENT, EA_ATTEND 
                WHERE student_id = EA_STUDENT.id 
                AND event_id = EA_EVENT.id;";
}
elseif ($selectName != 'null' && $selectEvent != 'null' && $selectBegin != 'null' && $selectEnd != 'null') {
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
// Only 1 null
elseif ($selectName == 'null' && $selectEvent != 'null' && $selectBegin != 'null' && $selectEnd != 'null') {
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName != 'null' && $selectEvent == 'null' && $selectBegin != 'null' && $selectEnd != 'null') {
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName != 'null' && $selectEvent != 'null' && $selectBegin == 'null' && $selectEnd != 'null') {
    $selectBegin = "1111-01-01";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName != 'null' && $selectEvent != 'null' && $selectBegin != 'null' && $selectEnd == 'null') {
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}

// All null but 1
elseif ($selectName != 'null' && $selectEvent == 'null' && $selectBegin == 'null' && $selectEnd == 'null') {
    $selectBegin = "1111-01-01";
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName == 'null' && $selectEvent != 'null' && $selectBegin == 'null' && $selectEnd == 'null') {
    $selectBegin = "1111-01-01";
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName == 'null' && $selectEvent == 'null' && $selectBegin != 'null' && $selectEnd == 'null') {
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName == 'null' && $selectEvent == 'null' && $selectBegin == 'null' && $selectEnd != 'null') {
    $selectBegin = "1111-01-01";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}

// Half null

elseif ($selectName != 'null' && $selectEvent != 'null' && $selectBegin == 'null' && $selectEnd == 'null') {
    $selectBegin = "1111-01-01";
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName != 'null' && $selectEvent == 'null' && $selectBegin != 'null' && $selectEnd == 'null') {
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName != 'null' && $selectEvent == 'null' && $selectBegin == 'null' && $selectEnd != 'null') {
    $selectBegin = "1111-01-01";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND name = '".$selectName."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}


elseif ($selectName == 'null' && $selectEvent != 'null' && $selectBegin != 'null' && $selectEnd == 'null') {
    $selectEnd = "9999-12-31";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}
elseif ($selectName == 'null' && $selectEvent != 'null' && $selectBegin == 'null' && $selectEnd != 'null') {
    $selectBegin = "1111-01-01";
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_name = '".$selectEvent."'
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}

elseif ($selectName == 'null' && $selectEvent == 'null' && $selectBegin != 'null' && $selectEnd != 'null') {
    $query = "SELECT name, event_name, event_date 
                FROM EA_EVENT, EA_STUDENT, EA_ATTEND 
                WHERE EA_ATTEND.student_ID=EA_STUDENT.id 
                AND EA_ATTEND.event_ID=EA_EVENT.id 
                AND event_date BETWEEN '".$selectBegin."' AND '".$selectEnd."';";
}

if ($result = $mysqli->query($query)) {
    // see if any rows were returned
    if ($result->num_rows > 0) {
        echo "<table cellpadding=10 border=1>";
        echo "<tr>";
        echo "<th>Student</th>";
        echo "<th>Event</th>";
        echo "<th>EventDate</th>";
        echo "</tr>";
		while ($row = $result->fetch_array()) {
			echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "</tr>";
		}
		unset($_POST);
	}
}

?>

</body>
</html> 