<?php
  include ("connection.php");
    session_start();
  /*  $eventname = $_POST['eventname'];
    $eventvenue = $_POST['eventvenue'];
    $eventdate = $_POST['eventdate'];
    $timestart =  date("H:i", strtotime("$_POST[timestart]"));
    $timeend = date("H:i", strtotime("$_POST[timeend]"));*/
    $merit = $_POST['eventmerit'];
    $couponq = $_POST['couponq'];

  /*  $sql = "INSERT INTO events (eventname, eventvenue, eventdate, timestart, timeend, merit, couponq, eventstatus, clubCode) VALUES
    ('".$eventname."', '".$eventvenue."','".$eventdate."','".$timestart."','".$timeend."','".$merit."','".$couponq."','".$eventstatus."', '".$clubCode."')";*/
    $sql = "UPDATE events SET merit = $merit, couponq = $couponq WHERE eventcode = $_SESSION['eventcode']";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('Event Accepted.');window.location='dashboard.php';</script>";
 ?>
