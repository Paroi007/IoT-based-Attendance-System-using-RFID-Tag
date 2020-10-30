<?php
session_start();
    //Connect to database
    require'connectDB.php';
//**********************************************************************************************

    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");

    $Tarrive = mktime(13,30,00);
    $TimeArrive = date("H:i:sa", $Tarrive);
//**********************************************************************************************   
    $Tleft = mktime(13,40,00);
    $Timeleft = date("H:i:sa", $Tleft);

    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }

    $_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Logs</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "load-users.php"
        }).done(function(data) {
        $('#cards').html(data);
      });
    },3000);
  });
</script>
<style>
body {background-image:url("image/u1.jpg");background-repeat:no-repeat;background-attachment:fixed;
	  background-position: top right;
	  background-size: cover;}

header .head h1 {font-family:aguafina-script;text-align: center;color:#ddd;}
header .head img {float: left;}
header .opt {float: right;margin: -100px 20px 0px 0px}
header .opt a {text-decoration: none;font-family:cursive;text-align: center;font-size:20px;color:red;margin-right: 15px}
header .opt a:hover {opacity: 0.8;cursor: pointer;}
header .opt #inp {padding:3px;margin:0px 0px 0px 33px;background-color:#00A8A9;font-family:cursive;font-size:16px; opacity: 0.6;color:red;}
header .opt #inp:hover {background-color: #00A8A9; opacity: 0.8;}
header .opt input {padding-left:5px;margin:2px 0px 3px 20px;border-radius:7px;border-color: #A40D0F ;background-color:#8E8989; color: white;}
header .opt p {font-family:cursive;text-align: left;font-size:19px;color:#f2f2f2;}
.export {margin: 0px 0px 10px 20px; background-color:#900C3F ;font-family:cursive;border-radius: 7px;width: 145px;height: 28px;color: #FFC300; border-color: #581845;font-size:17px}
.export:hover {cursor: pointer;background-color:#C70039}
#table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
     opacity: 0.6;
}

#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:nth-child(odd){background-color: #f2f2f2;opacity: 0.9;}

#table tr:hover {background-color: #ddd; opacity: 0.8;}

#table th {
	 opacity: 0.6;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00A8A9;
    color: white;
}
</style>
</head>
<body>
<header >

<?php
if (isset($_POST["submit1"])) {
  # code...
  $id = $_POST["type"];
  $_SESSION["id"] = $id;
  // echo $id;
}
?>

	<div class="head">
		<!-- <img src="image/rfid1.jpg" width="80" height="80"> -->
		<h1 style="color: black;">I0T Based RFID<br>Attendance System</h1>
	</div>	        

	<div class="opt">
		<table border="0">
      <br>
			<tr>
				<td><br><a href="AddCard.php">Add a new Student
                      <img src="image/add.png" style="margin:10px 20px -5px 10px" width="30" title="Add"></a>
                      <br><br>
                    <a href="home.php">Select Course</a></td>
        <!-- <td> -->
    
  <!-- </td> -->
				<td><p style="color: black;">Select the date log:
				<form method="POST" action="">
					<input type="date" name="date"><br>
					<input type="submit" name="seldate" value="Select Date" id="inp">
				</form>
				</p></td>
			</tr>
		</table>
	</div>
</header>
<h2 style="margin-left: 15px;">
<?php
if ($_SESSION["id"] == 1) {
  # code...
  echo "Course Name: Computer Networks Lab (A)";
  echo "<br>";
  echo "Course Code: CSE 324";
} elseif ($_SESSION["id"] == 2) {
  # code...
  echo "Course Name: Computer Networks Lab (B)";
  echo "<br>";
  echo "Course Code: CSE 324";
} elseif ($_SESSION["id"] == 3) {
  # code...
  echo "Course Name: Computer Networks Lab (C)";
  echo "<br>";
  echo "Course Code: CSE 324";
}
?>
</h2>
<h2 style="margin-left: 15px;">
  Time to arrive :<?php echo $TimeArrive?><br>
  Time to leave :<?php echo $Timeleft?>
</h2>


<form method="post" action="export.php">
  <input type="submit" name="export" class="export" value="Export to Excel" />
</form>
<div id="cards" class="cards">
</div>
</body>
</html>
