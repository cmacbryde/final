<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Find Reservation</title>
<style>

.receipt {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  font-family: Arial, sans-serif;
}

.header h1 {
  text-align: center;
  font-size: 24px;
  margin-top: 0;
}

.order-info {
  margin-bottom: 20px;
}

.items li {
  list-style-type: none;
  margin-bottom: 10px;
}

.total p {
  font-size: 18px;
  margin: 0;
}

</style>
</head>

<body>
	<?php 

      $server = "localhost"; // your server
        $userid = "umpd7uxy09r60"; // your user id
        $pw = "x2?141Bj$54x"; // your pw
        $db= "dbg3nscxgbaklt"; // your database
        // Create connection
        $conn = new mysqli($server, $userid, $pw );
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        //select the database
        $conn->select_db($db);

        $sql = "DELETE FROM reservations WHERE Name='".$_POST['name']."' AND Email='".$_POST['email']."' AND Time='".$_POST['time'].
        "' AND Day='".$_POST['day']."' AND Location='".$_POST['location']."' AND Phone='".$_POST['phone']."' AND People='".$_POST['people']."'";
        // echo "<h1>".$sql."</h1>";
        $result = $conn->query($sql);

        echo "<h1>Your reservation has been deleted</h1>";
        
      // echo "<h1>testing name ".$_POST['name']."</h1>";
      // echo "<h1>testing name ".$_POST['email']."</h1>";
      // echo "<h1>testing name ".$_POST['time']."</h1>";
      // echo "<h1>testing name ".$_POST['day']."</h1>";
      // echo "<h1>testing name ".$_POST['location']."</h1>";
      // echo "<h1>testing name ".$_POST['phone']."</h1>";
      // echo "<h1>testing name".$_POST['people']."</h1>";

?>

<a href="home.html">
      <input type="submit" value = "Return to Home Page"/>
    </a> 
	</form>
    </br>
    <a href="reservations.php">
      <input type="submit" value = "Return to Reservations Page"/>
    </a>
</body>
</html>
  
