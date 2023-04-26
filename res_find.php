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

        //run a query
        $sql = "SELECT * FROM reservations";
        $result = $conn->query($sql);
        $index = 0;
        //get results
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if ($row["Email"] == $_POST['email'])
                {
                    echo "<form action='res_delete.php' method='post' onsubmit='return true'>";
                    $index++;
                    echo "<div class='receipt'>";
                    echo "<div class='header'>";
                    echo "<h1>Reservation ".$index."</h1>";
                    echo "</div>";
                    echo "<div class='order-info'>";
                    echo "<h2>Reservation Information</h2>";
                    echo "<p><strong>Name: </strong>" . $row['Name'] . "</p>";
                    echo "<p><strong>Email: </strong>" . $row['Email'] . "</p>";
                    echo "</div>";
                    echo "<div class='items'>";
                    // echo "<h2>Items Ordered</h2>";
                    echo "<ul>";
                    echo "<li>Time: " . $row['Time'] . "</li>";
                    echo "<li>Day: " . $row['Day'] . "</li>";
                    echo "<li>Location: " . $row['Location'] . "</li>";
                    echo "</ul>";
                    echo "<a><input type = 'submit' value = 'Delete Reservation' /></a>";
                    echo "<input type='text' name='name' value='".$row['Name']."' style='display: none;'>";
                    echo "<input type='text' name='email' value='".$row['Email']."' style='display: none;'>";
                    echo "<input type='text' name='time' value='".$row['Time']."' style='display: none;'>";
                    echo "<input type='text' name='day' value='".$row['Day']."' style='display: none;'>";
                    echo "<input type='text' name='location' value='".$row['Location']."' style='display: none;'>";
                    echo "<input type='text' name='phone' value='".$row['Phone']."' style='display: none;'>";
                    echo "<input type='text' name='people' value='".$row['People']."' style='display: none;'>";
                    echo "</div>";
                    // echo "<div class='total'>";
                    // echo "<h2>Total</h2>";
                    // echo "<p> Subtotal: $" . $row['subtotal'] . "</p>";
                    // echo "<p> Tax: $" . $row['tax'] . "</p>";
                    // echo "<p style='font-weight:bold'> Total: $" . $row['total'] . "</p>";
                    // echo "</div>";
                    echo "</div>";
                    // $str = "<h1>".$row["Email"]." ".$row["Name"]." ".$row["Time"]." ";
                    // $str .= $row["Day"]." ".$row["Location"]."</h1>";
                    // // $str .= "<th>".$row["Item4"]."</th>"."<th>".$row["Item5"]."</th>";
                    // // $str .= "<th>".$row["Item6"]."</th>"."<th>".$row["Item7"]."</th>"."</tr>";
                    // echo $str;
                    
                    echo "</form>";
                }
            }
        }

        if ($index == 0) {
            echo "<h1>There was no reservation found for ".$_POST['email']."</h1>";
            
        }
        echo "<form action='reservations.php' method='post' onsubmit='return true'>
                <a><input type = 'submit' value = 'Find Different Reservation' /></a>
                  </form>";

        //close the connection
        $conn->close();
    ?>
</body>
</html>
