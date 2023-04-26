<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Previous Online Order</title>
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
        $sql = "SELECT * FROM online_order";
        $result = $conn->query($sql);
        $index = 0;
        
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if ($row['email'] == $_POST['alert_value'])
                {
                    echo "<div class='receipt'>";
                    echo "<div class='header'>";
                    echo "<h1>Receipt</h1>";
                    echo "</div>";
                    echo "<div class='order-info'>";
                    echo "<h2>Order Information</h2>";
                    echo "<p><strong>Name: </strong>" . $row['name'] . "</p>";
                    echo "<p><strong>Email: </strong>" . $row['email'] . "</p>";
                    echo "<p><strong>Receipt Number: </strong>" . $row['number'] . "</p>";
                    echo "</div>";
                    echo "<div class='items'>";
                    echo "<h2>Items Ordered</h2>";
                    echo "<ul>";
                    echo "<li>" . $row['receipt'] . "</li>";
                    echo "</ul>";
                    echo "</div>";
                    echo "<div class='total'>";
                    echo "<h2>Total</h2>";
                    echo "<p> Subtotal: $" . $row['subtotal'] . "</p>";
                    echo "<p> Tax: $" . $row['tax'] . "</p>";
                    echo "<p style='font-weight:bold'> Total: $" . $row['total'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    $index++;
                }
            }
        }

        if ($index == 0) {
            echo "<h1>There was no order found for " . $_POST['email'] . "</h1>";
            
        }
        $conn->close();
    ?>
</body>
</html>
