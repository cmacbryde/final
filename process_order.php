<html>
<head>
    <title>Online Order Receipt</title>
</head>
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

<?php 
// establish connection info
$server = "localhost";
$userid = "umpd7uxy09r60";
$pw = "x2?141Bj$54x";
$db = "dbg3nscxgbaklt";

// Create connection
$conn = new mysqli($server, $userid, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$receipt_number = rand(1,100);
$receipt = $_POST['receipt'];
$subtotal = $_POST['total'];
$tax = number_format($subtotal * 0.0625, 2);
$total = number_format($tax + $subtotal, 2);

echo "<div class='receipt'>";
echo "<div class='header'>";
echo "<h1>Receipt</h1>";
echo "</div>";
echo "<div class='order-info'>";
echo "<h2>Order Information</h2>";
echo "<p><strong>Name: </strong>" . $name . "</p>";
echo "<p><strong>Email: </strong>" . $email . "</p>";
echo "<p><strong>Receipt Number: </strong>" . $receipt_number . "</p>";
echo "</div>";
echo "<div class='items'>";
echo "<h2>Items Ordered</h2>";
echo "<ul>";
echo "<li>" . $receipt . "</li>";
echo "</ul>";
echo "</div>";
echo "<div class='total'>";
echo "<h2>Total</h2>";
echo "<p> Subtotal: $" . $subtotal . "</p>";
echo "<p> Tax: $" . $tax . "</p>";
echo "<p style='font-weight:bold'> Total: $" . $total . "</p>";
echo "</div>";
echo "</div>";

$sql = "INSERT INTO online_order (name, email, number, receipt, subtotal, tax, total) VALUES ('" . $name . "', '" . $email . "', '" . $receipt_number . "', '" . $receipt . "', '" . $subtotal . "', '" . $tax . "', '" . $total . "')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>

</html>
