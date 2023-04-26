<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Receipt</title>
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

input[type="submit"] {
    background-color: #812509;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-sizing: border-box;
    margin: 0;
    vertical-align: top;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    color: #812509;
    background-color: #f3d0c6;
}


</style>
</head>

<body>
    
	<form class='res_store_form' action='home.html' method='post' onsubmit='return true'>
    
	<?php 
        //establish connection info for menu database
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
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $num_ppl = $_POST['num_ppl'];

        //run a query
        $sql = "SELECT * FROM reservations";
        $result = $conn->query($sql);
        $num_res = 0;
        //get results
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if (($row["Location"] == $_POST['location']) && ($row["Time"] == $_POST['time']) && ($row["Day"] == $_POST['day']))
                {
                    $num_res++;
                    
                }
            }
        }

        if ($num_res > 1) {
          echo "<div class='receipt'>";
          echo "<div class='header'>";
          echo "<h1>There are already two reservations at our ".$location." location at this time, please choose a different day or time.</h1>";
          echo "</div>";
          echo "</div>";
        } else {

          $sql = "INSERT INTO reservations (Name, Email, Phone, Location, Day, Time, People) VALUES ('".$name."', '".$email."', '".$phone."', '".$location."', '".$day."', '".$time."', '".$num_ppl."')";

          $result = $conn->query($sql);

          echo "<div class='receipt'>";
          echo "<div class='header'>";
          echo "<h1>Reservation Information".$index."</h1>";
          echo "</div>";
          echo "<div class='order-info'>";
          // echo "<h2>Reservation Information</h2>";
          echo "<p><strong>Name: </strong>" . $name . "</p>";
          echo "<p><strong>Email: </strong>" . $email . "</p>";
          echo "<p><strong>Phone: </strong>" . $phone . "</p>";
          echo "</div>";
          echo "<div class='items'>";
          // echo "<h2>Items Ordered</h2>";
          echo "<ul>";
          echo "<li>Location: " . $location . "</li>";
          echo "<li>Day: " . $day . "</li>";
          echo "<li>Time: " . $time . "</li>";
          echo "<li>Number of People: " . $num_ppl . "</li>";
          echo "</ul>";
          echo "</div>";
          // echo "<div class='total'>";
          // echo "<h2>Total</h2>";
          // echo "<p> Subtotal: $" . $row['subtotal'] . "</p>";
          // echo "<p> Tax: $" . $row['tax'] . "</p>";
          // echo "<p style='font-weight:bold'> Total: $" . $row['total'] . "</p>";
          // echo "</div>";
          echo "</div>";

          // echo "<h1>Your reservation has been made at our ".$location.
          //      " location for ".$num_ppl." at ".$time." on ".$day.". A confirmation has been sent to ".$email. 
          //      ". We will see you there!</h1>";

          // foreach ($_POST as $key => $value) {
          //     echo "<h1>".$key."  ".$value.</h1>";
          // }
        }
    ?>
    <input type = "submit" value = "Return to Home Page" /> 
	</form>
    </br>
    <a href="reservations.php">
      <input type="submit" value = "Return to Reservations Page"/>
    </a>

</body>
</html>
