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
  </head>
  <body>
    <!-- topbar-->
    <ul class="topnav" id= "main">
      <li class="right"><a href="logout.php">Logout</a></li>
    </ul>

    <!-- sidebar-->
      <div class="sidenav">
        <img src = "uitm.jpg"/>
        <a href="dashboard.php" class = "btn "> Dashboard</a>
        <a href="attendance.php" class = "btn active">Attendance</a>
        <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
          <i class = "fa fa-caret-down"></i>
        </a>
        <div class = "dropdown-container" >
          <a href= "createevent.php" style= "text-align: left;font-size: 18px;">Create events</a>
          <a href= "vieweventdem.php" style= "text-align: left;font-size: 18px;">View events</a>
        </div>
      </div>

    <!-- content -->
    <p class = "content"><b>Select which event you organize</b></p>
    <input type="text" class = "searchbar"id="mySearch" onkeyup="myFunction()" placeholder="Search" title="Type in a category" style = "margin-left: 1400px;">
      <a href = "#">
        <i class="fa fa-fw fa-search"></i>
      </a>
    <br />


    <!-- table -->
    <table class="table table-bordered" id= "tablemeow">
      <thead>
        <tr>
          <th>Event Name</th>
          <th>Date</th>
          <th>Time Start</th>
          <th>Time End</th>
          <th>Take Attendance</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("connection.php");
        $clubcode = $_SESSION['clubCode'];
        $sql = "SELECT * from events WHERE eventstatus = '2' AND clubCode = '".$clubcode."' ORDER BY eventdate";
        $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<form action = 'coupon.php' method = 'post' target = '_blank'>";
            echo "<tr>";
            echo "<td>".$row["eventname"]."</td>";
            echo "<td>".$row["eventdate"]."</td>";
            echo "<td>".$row["timestart"]."</td>";
            echo "<td>".$row["timeend"]."</td>";
            echo "<input type = 'hidden' name = 'eventcode' value = '".$row['eventcode']."' />";
            echo "<input type = 'hidden' name = 'meritE' value = '".$row['meritE']."' />";
            echo "<td><button>Enter</button></td>";
            echo "</tr>";
            echo "</form>";

          }
          ?>
      </tbody>
    </table>

<!-- script -->
<script>
  /* search bar */
  function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }

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
