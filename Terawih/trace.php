<?php
session_start();
if ( !isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
  header("Location: index.php");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href= "styledashboardsidebar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  </head>
  <body>
    <!-- topbar-->
    <ul class="topnav" id= "main">
      <li class="right"><a href="logout.php">Logout</a></li>
    </ul>

    <!-- sidebar-->

    <?php if ($_SESSION['userlevelid']== 1){ ?>
      <div class="sidenav">
        <img src = "uitm.jpg"/>
        <a href="dashboard.php" class = "btn "> Dashboard</a>
        <a href="attendance.php" class = "btn">Attendance</a>
        <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
          <i class = "fa fa-caret-down"></i>
        </a>
        <div class = "dropdown-container" >
          <a href= "createevent.php" style= "text-align: left;font-size: 18px;">Create events</a>
          <a href= "viewevent.php" style= "text-align: left;font-size: 18px;">View events</a>
        </div>
      </div>
    <?php } ?>

    <?php if ($_SESSION['userlevelid']== 2){ ?>
      <div class="sidenav" id = "myDIV">
        <img src = "uitm.jpg"/>
        <a href="dashboard.php" class = "btn"> Dashboard</a>
        <a href="clubs.php" class = "btn">Clubs</a>
        <a href="studentinfo.php" class = "btn">Student Info</a>
        <a class= "dropdown-btn btn active" style = "font-size: 25px;">Events
          <i class = "fa fa-caret-down"></i>
        </a>
        <div class = "dropdown-container" >
          <a class = "btn" href= "viewevent.php" style= "text-align: left;font-size: 18px;">View events</a>
          <a class = "btn" href= "pendingevent.php" style= "text-align: left;font-size: 18px;">Pending events</a>
        </div>
        <a href="report.php" class = "btn">Report</a>
      </div>
    <?php } ?>

    <!-- content -->
    <p class = "content"><b>View events</b></p>
    <br />

    <!-- table view event -->
    <table class="table table-bordered" id= "tablemeow">
      <thead>
        <tr>
          <th>Event Name</th>
          <th>Date</th>
          <th>Time Start</th>
          <th>Time End</th>
          <th>Status </th>
          <th><span class="glyphicon glyphicon-check"></span></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("connection.php");

        $sql = "SELECT * from events ORDER BY eventname";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
        {
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<tr>
              <td><a>".$row["eventname"]."</a></td>
              <td>".$row["eventdate"]."</td>
              <td>".$row["timestart"]."</td>
              <td>".$row["timeend"]."</td>
              <td>".$row["eventstatus"]."</td>
            </tr>";
          }
        }
          ?>
      </tbody>
    </table>

<!-- script -->
<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++)
  {
    dropdown[i].addEventListener("click", function()
    {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block")
      {
        dropdownContent.style.display = "none";
      }
      else
      {
        dropdownContent.style.display = "block";
      }
      });
  }
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
