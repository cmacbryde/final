<html > 
    <head>
        <link rel="stylesheet" type="text/css" href="online-order.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="stylesheet2.css" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>Online Order</title>
    </head>
<body>
<nav class="navbar">
    <a href="home.html"><img id="logo" src="logo2.png" alt=""></a>
    <ul class="nav">
        <li><a href="home.html">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="locations.html">Locations</a></li>
        <li><a href="onlineorder.php">Order Online</a></li>
        <li><a href="reservations.php">Reservations</a></li>
    </ul>
    <ul class="nav-mobile">
        <li><a href="home.html">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="locations.html">Locations</a></li>
        <li><a href="onlineorder.php">Order Online</a></li>
        <li><a href="reservations.php">Reservations</a></li>
    </ul>

</nav>
<br><br><br><br><br><br><br>
    <div class="container">
    <form method="post" action="prev_order.php" onsubmit="return getEmail()">
        <label style='display:none'>Email Entered in Alert:</label>
        <input type='text' id='alert_value' name='alert_value' style='display:none'>
        <input type="submit" value="Find Previous Online Order Receipt Here">
    </form>
    <div class="top-total" style="align:right;position: absolute;top:150;right:170;color:black;">
        <p class="top" id="top" style="align:right"></p>    
    </div>
    <form method="post" action="process_order.php" onsubmit="return validateForm()">
        <h1>ORDER ONLINE</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>
            <tbody>

<?php

// establish connection info
$server = "localhost";
$userid = "umpd7uxy09r60";
$pw = "x2?141Bj$54x";
$db = "dbg3nscxgbaklt";

// Create connection
$conn = new mysqli($server, $userid, $pw);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// select database
$conn->select_db($db);

$sql = "SELECT * FROM menu_items";
$result = mysqli_query($conn, $sql);

// check Connection
if (!$result) {
    die("Error");
}

echo "<tr>";
echo "<th class='type'></th>";
echo "<th class='type' id='Appetizers'>Appetizers</th>";
echo "<th class='type'></th>";
echo "<th class='type'></th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['name'] == "Caesar Salad") {
        echo "<tr>";
        echo "<th class='type'></th>";
        echo "<th class='type'>Soups and Salads</th>";
        echo "<th class='type'></th>";
        echo "<th class='type'></th>";
        echo "</tr>";
    } else if ($row['name'] == "Classic Burger") {
        echo "<tr>";
        echo "<th class='type'></th>";
        echo "<th class='type'>Burgers</th>";
        echo "<th class='type'></th>";
        echo "<th class='type'></th>";
        echo "</tr>";
    } else if ($row['name'] == "Tri-tip") {
        echo "<tr>";
        echo "<th class='type'></th>";
        echo "<th class='type'>Steaks</th>";
        echo "<th class='type'></th>";
        echo "<th class='type'></th>";
        echo "</tr>";
    } else if ($row['name'] == "Brownie Sundae") {
        echo "<tr>";
        echo "<th class='type'></th>";
        echo "<th class='type'>Desserts</th>";
        echo "<th class='type'></th>";
        echo "<th class='type'></th>";
        echo "</tr>";
    }
    
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td> $" . $row['price'] . "</td>";
    echo "<td><button name='add'>Add</button></td>";
    echo "</tr>";
}

mysqli_close($conn);

?>
</tbody>
</table>
        <br>
        <h4>Check Out</h4>
        <br>
        <div class="cart">
            <h2>Cart</h2>
            <div class="cart-items"></div>
            <div class="cart-total"></div>
        </div>
        <br>
        <form class="info">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email">

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">

            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment" required>
                <option value="">Select Payment Method</option>
                <option id="credit" value="credit" onclick="displayPayment(0)">Credit Card</option>
                <option id="debit" value="debit" onclick="displayPayment(1)">Debit Card</option>
            </select>

            <div id="payment-input">
                
                <label for="number">Card Number:</label>
                <input type="text" id="number" placeholder="XXXXXXXXXXXXXXXX" name="card-number" required>

                <label for="date">Expiration Date:</label>
                <input type="text" id="date" placeholder="MM/YY" name="expiration-date" required>
                
                <label for="code">Security Code:</label>
                <input type="text" id="code" placeholder="XXXX" name="security-code" required>

                <input type="submit" value="Place Order">
            </div>
            <label style='display:none'>Total:</label>
            <input type='text' id='total' name='total' style='display:none'>
            <label style='display:none'>Receipt:</label>
            <input type='text' id='receipt' name='receipt' style='display:none'>
        </form>
    </div>
<br/><br/><br/><br/><br/>
    <script>
        let cart = [];
        let total = 0;
        var item;
        let index = 0;

        const paymentType = document.getElementById("payment");
        const paymentInput = document.getElementById("payment-input");
        paymentInput.style.display = "none";

        paymentType.addEventListener("change", () => {
            if (paymentType.value == "credit" || paymentType.value == "debit") {
                paymentInput.style.display = "block";
            } else {
                paymentInput.style.display = "none";
            }
        });

        function getEmail()
        {
            var email = prompt("Please enter your email address:");
            document.getElementsByName("alert_value")[0].value = email;
            
            if (email == "") {
                alert("Please enter a valid email.");
                return false;
            }
            
            return true;
        }

        function validateForm()
        {
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var phone = document.getElementById("address");
            var address = document.getElementById("address");
            var pattern = /^\d{10}$/;

            var isValid = true;
    
            if (total == 0) {
                alert("Order at least one item!");
                isValid = false;
            } else if (name.value == "") {
                alert("Enter a valid name.");
                isValid = false;
            } else if (email.value == "") {
                alert("Enter a valid email.");
                isValid = false;
            } else if (phone.value == ""){
                alert("Enter valid phone number.");
                isValid = false;
            } else if (address.value == "") {
                alert("Enter a valid address.");
                isValid = false;
            } else if (payment.value == "") {
                alert("Please select a payment method.");
                isValid = false;
            } else if (number.value.length != 16) {
                alert("Please enter a valid card number.");
                isValid = false;
            } else if (date.value.length != 5) {
                alert("Please enter card expiration date.");
                isValid = false;
            } else if (code.value.length != 4) {
                alert("Please enter card code.");
                isValid = false;
            }
            return isValid;
        }

        // Get all "add" buttons
        const addButtons = document.getElementsByName("add");

        // Add event listener to each "add" button
        for (let i = 0; i < addButtons.length; i++) {
            addButtons[i].addEventListener("click", function() {
                event.preventDefault();
                // Get item details
                const name = this.parentNode.parentNode.children[0].textContent;
                const price = parseFloat(this.parentNode.parentNode.children[2].textContent.replace("$", ""));
    
                let cartItem = cart.find((c) => c.item === name);
                if (cartItem) {
                    cartItem.quantity++;
                } else {
                    cart.push({ item: name, quantity: 1, price: price});
                }
    
                // Update cart display
                const cartItemsDiv = document.querySelector(".cart-items");
                cartItemsDiv.innerHTML = "";
                for (let i = 0; i < cart.length; i++) {
                    const cartItemDiv = document.createElement("div");
                    cartItemDiv.textContent = cart[i].quantity + " " + cart[i].item;
                    cartItemsDiv.appendChild(cartItemDiv);
                }
                document.getElementsByName("receipt")[0].value = cartItemsDiv.innerHTML;

                // Update total
                total += price;
                const cartTotalDiv = document.querySelector(".cart-total");
                cartTotalDiv.textContent = "Total: $" + total.toFixed(2);

                const top_total = document.getElementById("top");
                top_total.textContent = "Cart Total: $" + total.toFixed(2);

                document.getElementsByName("total")[0].value = total.toFixed(2);
            });
        }


    </script>
<footer class="footer">
    &copy; 2023 copyright Lisa's Steakhouse
</footer>

</body>
</html> 
