<html>
<head>
<title>Enter Ride Info</title>
</head>
<body>
    <H1>Enter Ride Info</H1>
    <form name="form" method="post">
    Name: <input type="text" name="name" size="30"/><br>
    Contact: <input type="text" name="contact" size="28"/><br>
    Church: <input type="text" name="church" size="29"/><br>
    Number of seats:
        <input type="number" name="seats" size="20"/><br>
        <label for="seats"></label>
    Time leaving: <input type="time" name="time" size="40"/><br>
    Meeting location: 
        <input type="radio" id="Mac Circle" name="circle" value="Mac Circle"/>
        <label for="Mac Circle">Mac Circle</label>
        <input type="radio" id="Carter Circle" name="circle" value="Carter Circle"/>
        <label for="Carter Circle">Carter Circle</label><br>


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




$date = new DateTime();
$DofW = $date->format('w');
//get the number of days until Sunday
$interval = 7 - $DofW;
$date->add(new DateInterval('P'.$interval.'D'));
echo "<input type='checkbox' id='date1' name='date1' value='Yes'/>";
echo "<label for='date1'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date1']) && 
   $_POST['date1'] == 'Yes') 
{
    $date1n = $date->format("Y-m-d");
}
$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date2' name='date2' value='Yes'/>";
echo "<label for='date2'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date2']) && 
   $_POST['date2'] == 'Yes') 
{
    $date2n = $date->format("Y-m-d");
}
$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date3' name='date3' value='Yes'/>";
echo "<label for='date3'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date3']) && 
   $_POST['date3'] == 'Yes') 
{
    $date3n = $date->format("Y-m-d");
}

$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date4' name='date4' value='Yes'/>";
echo "<label for='date4'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date4']) && 
   $_POST['date4'] == 'Yes') 
{
    $date4n = $date->format("Y-m-d");
}

$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date5' name='date5' value='Yes'/>";
echo "<label for='date5'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date5']) && 
   $_POST['date5'] == 'Yes') 
{
    $date5n = $date->format("Y-m-d");
}

$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date6' name='date6' value='Yes'/>";
echo "<label for='date6'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date6']) && 
   $_POST['date6'] == 'Yes') 
{
    $date6n = $date->format("Y-m-d");
}
$date->add(new DateInterval('P7D'));
echo "<input type='checkbox' id='date7' name='date7' value='Yes'/>";
echo "<label for='date7'>".$date->format("Y-m-d")."</label><BR>";
if(isset($_POST['date7']) && 
   $_POST['date7'] == 'Yes') 
{
    $date7n = $date->format("Y-m-d");
}
echo "<input type='submit' id='search-submit' value='submit' /><br>";




$name=@$_POST["name"];
$contact=@$_POST["contact"];
$church=@$_POST["church"];
$seat=@$_POST["seats"];
$time=@$_POST["time"];
$circle=@$_POST["circle"];
$date1=@$_POST["date1"];
$date2=@$_POST["date2"];
$date3=@$_POST["date3"];
$date4=@$_POST["date4"];
$date5=@$_POST["date5"];
$date6=@$_POST["date6"];
$date7=@$_POST["date7"];


if ($date1 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date1n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date1n);
        $stmt->execute();
    }
}
if ($date2 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date2n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date2n);
        $stmt->execute();
    }
}
if ($date3 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date3n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date3n);
        $stmt->execute();
    }
}
if ($date4 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date4n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date4n);
        $stmt->execute();
    }
}
if ($date5 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date5n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date5n);
        $stmt->execute();
    }
}
if ($date6 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date6n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date6n);
        $stmt->execute();
    }
}
if ($date7 == true) {
    if ($name != null && $contact != null && $church != null && $seat != null && $time != null && $circle != null && $date7n!= null) {
        $stmt = $mysqli->prepare("INSERT INTO driver_information
            (driverName, driverNumber, churchName, seatsNum, timeLeaving, meetingLocation, daysDriving) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisss', $name, $contact, $church, $seat, $time, $circle, $date7n);
        $stmt->execute();
    }
}


$mysqli->close();

?>
</body>
</html> 