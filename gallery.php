<html >
    <head>
        <link rel="stylesheet" type="text/css" href="stylesheet2.css" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>Gallery</title>
    </head>
    <style>
        body {
            background-color: black;   
        }

        h1 {
            text-align: center;
            color: rgb(255, 255, 255);
            margin-bottom: 30px;
            font-size: 45px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .gallery-item {
            width: 300px;
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }
    </style>
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
    
    <h1>GALLERY</h1>
    <div class="gallery">
    
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

        $sql = "SELECT * FROM gallery";
        $result = mysqli_query($conn, $sql);

        // check Connection
        if (!$result) {
            die("Error");
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='gallery-item'>";
            echo "<img src='". $row[image] ."'>";
            echo "</div>";
        }

        mysqli_close($conn);
    ?>
    </div>

    <script>
        const galleryItems = document.querySelectorAll(".gallery-item");
        galleryItems.forEach(item => {
            item.addEventListener("click", () => {
                const imgSrc = item.querySelector("img").src;
            });
        });
    </script>
    <br><br><br><br><br><br><br>
    
<footer class="footer">
    &copy; 2023 copyright Lisa's Steakhouse
</footer>

</body>
</html>
