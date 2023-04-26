<html>
<head>
<meta charset = "utf-8">
<title>Menu</title>
    <link rel="stylesheet" type="text/css" href="stylesheet2.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<style>
.subNav a {
    color: black;
    text-decoration: none;
}
.subNav a:hover {
    cursor: pointer;
    color: #812509;
}
h1 {
    text-align: center;
    color: black;
    margin-bottom: 30px;
    font-size: 45px;
}
h2 {
    text-align: center;
    text-shadow: darkolivegreen;
    font-size: 32pt;
    color: #000000
}
h3 {
    color: #000000;
}
h5 {
    opacity: 50%;
    color: #000000;
}
.subNav {
    text-align: center;
    font-size: 20pt;
}
table {
    text-align:center;
    color: rgb(0, 0, 0);
    width: 55%;
    margin-left: auto;
    margin-right: auto;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
table.center {
    margin-left: auto;
    margin-right: auto;
}

body {
    background-color:rgb(255, 255, 255);
}
.a:link {
    color:black;
    font-size: 20pt;
}
</style>
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
<br/><br/><br/><br/><br/><br/><br/>
    <h1>MENU</h1>
        <nav class = "subNav">
        <a href= "#Appetizers">Appetizers | </a><a href ="#Soups">Soups & Salads | </a><a href ="#Burgers">Burgers | </a><a href ="#Steaks">Steaks | </a><a href ="#Desserts">Desserts</a><br /><br />
    </nav>
    <div class ="content">
        <section id="Appetizers">
            <img src="appetizers2.jpg" width=100%>
            <br><br><br><br><br>
            <h2>Appetizers</h2>
            <table class = "center">
            <?php

            function debug_to_console($data) {
                $output = $data;
                if (is_array($output))
                    $output = implode(',', $output);

                echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
            }

            $server = "localhost";
            $userid = "umpd7uxy09r60";
            $pw = "x2?141Bj$54x";
            $db = "dbg3nscxgbaklt";

            // Create connection
            $conn = new mysqli($server, $userid, $pw );

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                
            //select the database
            $conn->select_db($db);
            
            $sql = "SELECT * FROM appetizers";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $iterator = 0;
                echo "<table><tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($iterator % 2 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td>"."<strong>".$row["Name"]." -- $".$row["Price"]."</strong>"."<br />"."<br />".$row["Description"]."</td>";
                    $iterator++;
                }
                if ($iterator % 2 == 0) {
                    echo "</td></td>";
                }
                echo "</tr></table><br><br><br><br>";
            } else {
                echo "No results";
            }
            $conn->close();
            ?>
            </table>
            </section>
            
            <section id="Soups">
            <br><br><br><br><br>
            <img src="salad2.jpg" width=100%>
            <br><br><br><br><br>
            <h2>Soups & Salads</h2>
            <table class = "center">
            <?php


            $server = "localhost";
            $userid = "umpd7uxy09r60";
            $pw = "x2?141Bj$54x";
            $db = "dbg3nscxgbaklt";

            // Create connection
            $conn = new mysqli($server, $userid, $pw );

            // Check crgb(43, 21, 21)ction
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                
            //select the database
            $conn->select_db($db);
            
            $sql = "SELECT * FROM Soups";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $iterator = 0;
                echo "<table><tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($iterator % 2 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td>"."<strong>".$row["Name"]." -- $".$row["Price"]."</strong>"."<br />"."<br />".$row["Description"]."</td>";
                    $iterator++;
                }
                if ($iterator % 2 == 0) {
                    echo "</td></td>";
                }
                echo "</tr></table>";
            } else {
                echo "No results";
            }
            $conn->close();
            ?>
        </table>
        </section>

        <section id="Burgers">
            <br><br><br><br><br>
            <img src="burger.jpg" width=100%>
            <br><br><br><br><br>
            <h2>Burgers</h2>
            <table class = "center">
            <?php


            $server = "localhost";
            $userid = "umpd7uxy09r60";
            $pw = "x2?141Bj$54x";
            $db = "dbg3nscxgbaklt";

            // Create connection
            $conn = new mysqli($server, $userid, $pw );

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                
            //select the database
            $conn->select_db($db);
            
            $sql = "SELECT * FROM Burgers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $iterator = 0;
                echo "<table><tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($iterator % 2 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td>"."<strong>".$row["Name"]." -- $".$row["Price"]."</strong>"."<br />"."<br />".$row["Description"]."</td>";
                    $iterator++;
                }
                if ($iterator % 2 == 0) {
                    echo "</td></td>";
                }
                echo "</tr></table>";
            } else {
                echo "No results";
            }
            $conn->close();
            ?>
        </table>
        </section>

        <section id="Steaks">
            <br><br><br><br><br>
            <img src="steak_menu2.jpg" width=100%>
            <br><br><br><br><br>
            <h2>Steaks</h2>
            <table class = "center">
            <?php


            $server = "localhost";
            $userid = "umpd7uxy09r60";
            $pw = "x2?141Bj$54x";
            $db = "dbg3nscxgbaklt";

            // Create connection
            $conn = new mysqli($server, $userid, $pw );

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                
            //select the database
            $conn->select_db($db);
            
            $sql = "SELECT * FROM Steaks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $iterator = 0;
                echo "<table><tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($iterator % 2 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td>"."<strong>".$row["Name"]." -- $".$row["Price"]."</strong>"."<br />"."<br />".$row["Description"]."</td>";
                    $iterator++;
                }
                if ($iterator % 2 == 0) {
                    echo "</td></td>";
                }
                echo "</tr></table>";
            } else {
                echo "No results";
            }
            $conn->close();
            ?>
        </table>
        </section>

        <section id="Desserts">
            <br><br><br><br><br>
            <img src="dessert2.jpg" width=100%>
            <br><br><br><br><br>
            <h2>Desserts</h2>
            <table class = "center">
            <?php


            $server = "localhost";
            $userid = "umpd7uxy09r60";
            $pw = "x2?141Bj$54x";
            $db = "dbg3nscxgbaklt";

            // Create connection
            $conn = new mysqli($server, $userid, $pw );

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                
            //select the database
            $conn->select_db($db);
            
            $sql = "SELECT * FROM Desserts";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $iterator = 0;
                echo "<table><tr>";

                while ($row = $result->fetch_assoc()) {
                    if ($iterator % 2 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td>"."<strong>".$row["Name"]." -- $".$row["Price"]."</strong>"."<br />"."<br />".$row["Description"]."</td>";
                    $iterator++;
                }
                if ($iterator % 2 == 0) {
                    echo "</td></td>";
                }
                echo "</tr></table>";
            } else {
                echo "No results";
            }
            $conn->close();
            ?>
        </table><br /><br />
        </section>
        <footer class="footer">
            &copy; 2023 copyright Lisa's Steakhouse
        </footer>
        
    </body>
</html>
