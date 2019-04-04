<html>
<head>
  <title>AARMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <style>
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab,.active {
  background-color: #ccc;
}


/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the search box inside the navigation bar */
.tab input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

.geomap{
  text-align: center;
}

.rack1{
  border: 10px solid blue;
  width: 300px;
  padding: 5px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

.rack2{
  border: 10px solid gray;
  width: 300px;
  padding: 5px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

.rack3{
  border: 10px solid blue;
  width: 300px;
  padding: 5px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

#items1{
  border: 5px solid black;
  width: 300px;
  padding: 25px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

#items2{
  border: 5px solid black;
  width: 300px;
  padding: 25px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

#items3{
  border: 5px solid black;
  width: 300px;
  padding: 25px;
  margin: 25px;
  text-align: center;
  border-radius: 25px;
}

.dot {
  height: 25px;
  width: 25px;
  background-color: red;
  border-radius: 50%;
  display: inline-block;
}

table, th, td {
  border: 1px solid black;
  text-align: center;
}

table.center{
  margin-left: auto;
  margin-right: auto;
}

.square {
  position: relative;
  width: 10%;
  text-align: center;
  align-content: center;
}

.square:after {
  content: ""; 
  display: block;
  padding-bottom: 100%;
  align-content: center;
}

.content {
  position: absolute;
  width: 100%;
  height: 100%;
  text-align: center;
  align-content: center;
}

.all-items{
  text-align: center;
  color: blue;
  font: Times, sans-serif, inherit;
}

#filters{
  float: right;
  color: blue;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

.reload{
  float: right;
  font: Times;
  color: blue;
  font-size: 17px;
  margin-left: 10px;
  margin-right: 10px;
}
</style>
</head>
<?php
header("refresh: 3600;");
$to = "nwcaswell@gmail.com";
$subject = "RFID Asset Management System";
//The following message should be a format for any changed items, if doable, to be sent in an email to an administrator. 
$message = <<<EOF
<html>
<head>
<title>RFID Asset Management Update</title>
</head>
<body>
<p>All items and tags are up to date</p>
</body>
</html>
EOF;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <notifier@aarms.com>' . "\r\n";
//$headers .= 'Cc: administrator@aarms.com' . "\r\n";

if(mail($to,$subject,$message,$headers) == true){
 // echo "Email sent successfully";
}

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
?>
<body>
  <div class="header">
    <h1 align="center">General Dynamics A.A.R.M.S.</h1>
</div>
<!-- Tab links -->

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'GeoMap')">GeoMap</button>
  <button class="tablinks" onclick="openCity(event, 'Filters')">Filters</button>
  <form>
   <!-- <input type="text" name="search" placeholder="filter"> -->
    <input type="text" id="myInput" onkeyup="myFunction()" name="valueToSearch" placeholder="Search for items..">
    <select id="filters">
      <option value="ID">ID (Default)</option>
      <option value="Serial">Serial Number</option>
      <option value="RFID">RFID Number</option>
      <option value="Gov_Tag">Government Tag</option>
      <option value="Location">Location</option>
      <option value="Last_Access">Last Access</option>
      <option value="Current_Access">Current Access</option>
    </select>
  </form>
</div>

<!-- Tab content -->
<div id="GeoMap" class="tabcontent">
  <h1> Geo Map of Lab </h1>
<div class="container">
  <div class="row">
    <div class="rack1 square"> 
      <div class="content">
        Rack 1
      </div>
    </div>
    <div class="rack2 square">
      <div class="content">
        Rack 2
      </div>
    </div>
 </div>

</div>
</div>

<div id="Filters" class="tabcontent">
</div>
</div>

<div class="all-items"><h2>All Items</h2></div>
<table id="myTable" class="center">
 <tr>
   <th>ID</th><br>
   <th>Serial Number</th>
   <th> RFID Number</th>
   <th> Government Tag</th>
   <th> Location</th><br> <!--Not sure if this needs to be here, not sure how it got here -->
   <th> Last Access</th>
   <th> Current Access</th>
 </tr>
   <?php 
  $servername = "sql9.freemysqlhosting.net";
  $username = "sql9274501";
  $password = "prU3lkXDec";
  $db_name =  "sql9274501";
  $sql = "SELECT * FROM items";
   $link = mysqli_connect($servername, $username, $password, $db_name);
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    //exit();
  }
    $result = mysqli_query($link, "SELECT * FROM items", MYSQLI_USE_RESULT);
?>
   <?php while($row = $result->fetch_assoc()):?>
   <tr>
     <th><?php echo $row['ID']?></th>
     <th><?php echo $row['SERIAL_NUMBER']?></th>
     <th><?php echo $row['RFID_NUMBER']?></th>
     <th><?php echo $row['GOVERNMENT_TAG']?></th>
     <th><?php echo $row['LOCATION']?></th>
     <th><?php echo $row['LAST_ACCESS']?></th>
     <th><?php echo $row['CURRENT_ACCESS']?></th>
   </tr>
  <?php endwhile; ?>
</table>
<script>
    
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  var select = document.getElementById("filters").value; //for select dropdown list
  console.log(select);
  var filt0 = 0;
  switch(select){
    case "ID":
      filt0 = 0;
      break;
    case "Serial":
      filt0 = 1;
      break;
    case "RFID":
      filt0 = 2;
      break;
    case "Gov_Tag":
      filt0 = 3;
      break;
    case "Location":
      filt0 = 4;
      break;
    case "Last_Access":
      filt0 = 5;
      break;
    case "Current_Access":
      filt0 = 6;
      break;
    default:
      filt0 = 0;
      break;
  }

  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("th")[filt0];//[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function autoUpdate(){
  document.location.reload(true);
}
</script>
<button class="reload" onclick="autoUpdate()">Update</button>
</body>
</html>