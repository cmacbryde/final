<html >
    <head>
        <link rel="stylesheet" type="text/css" href="online-order.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="stylesheet2.css" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>Reservations</title>
        <style>
            a { text-align: center;}
            .dropdowns {display: inline-block;}
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
    <script>
        // function Location(name, startTime, endTime)
		// {
		// 	this.name = name;
		// 	this.startTime = startTime;
        //     this.endTime = endTime;
		// }

		// locationsArray = new Array(
		// 	new Location("Seattle, WA", 11, 9),
		// 	new Location("Medford, MA", 10, 9),
		// 	new Location("Danville, CA", 11, 10),
		// 	new Location("Extra1", 12, 8),
		// 	new Location("Extra2", 11, 11)
		// );

        function validate() {
            let isValid = true;

            
            var email = document.getElementById("email").value;
            let email_valid = email.includes("@");
            if (!email_valid || email == ""){
                alert("Enter a valid email.");
                isValid = false;
            }
            if (document.getElementById("submit").value == "Find Reservation") {
                return isValid;
            } 
            // let phone_num = false;
            var name = document.getElementById("name");
            
            var phone = document.getElementById("phone").value;
            let location = document.getElementById("location");
            let day = document.getElementById("day");
            let time = document.getElementById("time");
            let num_ppl = document.getElementById("num_ppl");

            let phone_length = 0;
			for (let i = 0; i < phone.length; i++) {
				if (phone[i] >= '0' && phone[i] <= '9') {
					phone_length++;
				}
			}
            console.log(phone_length);
			// let email_valid = email.includes("@");
            
            // for (let i = 0; i < phone.length; i++) {
			// 	if (email[i] == "@") {
			// 		email_valid = true;
			// 	}
			// }

            if (name.value == "") 
            {
                alert("Enter a valid name.");
                isValid = false;
            } else if (phone_length != 11 && phone_length != 10)
            {
                alert("Enter valid phone number.");
                isValid = false;
            } else if (location.value == "") {
                alert("Please select a location for the reservation.");
                isValid = false;
            } else if (day.value == "") {
                alert("Please select a day for the reservation.");
                isValid = false;
            } else if (time.value == "") {
                alert("Please select a time for the reservation.");
                isValid = false;
            } else if (num_ppl.value == "") {
                alert("Please select a number of people for the reservation.");
                isValid = false;
            }

            if (isValid) {
                // alert("Your reservation has been made at our " + location.value + 
                // " location for " + num_ppl.value + " at " + time.value + " on " + 
                // day.value + ". A confirmation has been sent to " + email + 
                // ". We will see you there!");
                // db_insert();
                // console.log("VALID");
                return true;
            }
            return false;
        }

        function otherResType() {
            console.log("hello");
            if (document.getElementById("submit").value == "Find Reservation") {
                console.log("hello  11");
                let name = document.getElementsByClassName("name");
                name[0].style = "display: block;";
                name[1].style = "display: block;";

                let phone = document.getElementsByClassName("phone");
                phone[0].style = "display: block;";
                phone[1].style = "display: block;";

                let location = document.getElementById("location");
                location.style = "display: block;";

                let day = document.getElementById("day");
                day.style = "display: block;";

                let time = document.getElementById("time");
                time.style = "display: block;";

                let num_ppl = document.getElementById("num_ppl");
                num_ppl.style = "display: block;";

                document.getElementById("res_type_button").value = "Find Previously Made Reservation";

                document.getElementById("submit").value = "Make Reservation";

                let form = document.getElementsByClassName("reservation_form");
                form[0].action = 'res_store.php';
                // form[0].onsubmit = 'return validate()';
            } else {
                console.log("hello  22");
                let name = document.getElementsByClassName("name");
                name[0].style = "display: none;";
                name[1].style = "display: none;";

                let phone = document.getElementsByClassName("phone");
                phone[0].style = "display: none;";
                phone[1].style = "display: none;";

                let location = document.getElementById("location");
                location.style = "display: none;";

                let day = document.getElementById("day");
                day.style = "display: none;";

                let time = document.getElementById("time");
                time.style = "display: none;";

                let num_ppl = document.getElementById("num_ppl");
                num_ppl.style = "display: none;";

                document.getElementById("res_type_button").value = "Make New Reservation";

                document.getElementById("submit").value = "Find Reservation";

                let form = document.getElementsByClassName("reservation_form");
                form[0].action = 'res_find.php';
                // form[0].onsubmit = 'return validate2.0()';


            }
			// address[1].style = "display: none;";
        }

        // function locationSelect(loc) {

        // }

    </script>
    <div class="container">
        <h1>RESERVATIONS</h1>
    <!-- <form action='email_to_find.php' method='post' onsubmit='return true'>
        <a><input type = 'submit' value = 'Find Previously Made Reservation' /></a>
    </form> -->

    <a><input type = "submit" id="res_type_button" value = "Find Previously Made Reservation" onclick="otherResType()"/></a>



    <form class='reservation_form' action='res_store.php' method='post' onsubmit='return validate()'>
        </br>
        <label for="name" class="name">Name*:</label>
        <input type="text" id="name" name="name" class="name" >

        <label for="email">Email*:</label>
        <input type="text" id="email" name="email" >

        <label for="phone" class="phone">Phone*:</label>
        <input type="text" id="phone" name="phone" class="phone" placeholder="XXX-XXX-XXXX">

		<!-- <p class="userInfo"><label>First Name:</label> <input type="text"  name='fname' /></p>
		<p class="userInfo"><label>Last Name*:</label>  <input type="text"  name='lname' /></p> -->

        <!-- location, time, number of ppl dropdown -->

		<!-- <p class="userInfo"><label>Phone*:</label> <input type="text"  name='phone' /></p> -->
        <!-- <h3>Location*</h3> -->
        </br></br>
        <!--<div id="payment-input"> 
        <div class='dropdowns'> -->

        <select id="location" name="location" >
            <option value="">Select Location</option>
            <option id="0" value="Seattle, WA" onclick="locationSelect(0)">Seattle, WA</option>
            <option id="1" value="Medford, MA" onclick="locationSelect(1)">Medford, MA</option>
            <option id="2" value="Danville, CA" onclick="locationSelect(2)">Danville, CA</option>
            <option id="3" value="Los Altos, CA" onclick="locationSelect(3)">Los Altos, CA</option>
            <option id="4" value="Kuala Lumbr, Malaysia" onclick="locationSelect(4)">Kuala Lumbr, Malaysia</option>
        </select>
        <!-- </div> -->
        <!-- <script>
            // var t= "";
			document.write("<select name='location' size='1'>");
			for (let j=0; j<=locationsArray.length; j++) {
            // var name = locationsArray[j].name;
            document.write("<option>")
            document.write(locationsArray[j].name);
            document.write("</option>")
            }

			// t += "<option>"  + "</option>";

            document.write("</select>");
        </script> -->
        <!-- <h3>Day of the Week (reservations are only allowed one week in advance)*</h3> -->
        <div class='dropdowns'>
        <select id="day" name="day" >
            <option value="">Select Day of the Week (only allowed one week in advance)</option>
            <option id="Sunday" value="Sunday" onclick="daySelect(0)">Sunday</option>
            <option id="Monday" value="Monday" onclick="daySelect(1)">Monday</option>
            <option id="Tuesday" value="Tuesday" onclick="daySelect(2)">Tuesday</option>
            <option id="Wednesday" value="Wednesday" onclick="daySelect(3)">Wednesday</option>
            <option id="Thursday" value="Thursday" onclick="daySelect(4)">Thursday</option>
            <option id="Friday" value="Friday" onclick="daySelect(5)">Friday</option>
            <option id="Saturday" value="Saturday" onclick="daySelect(6)">Saturday</option>
        </select>
        </div>
        <!-- <h3>Time*</h3> -->
        <div class='dropdowns'>
        <select id="time" name="time" >
            <option value="">Select Time</option>
            <option id="0" value="11" onclick="timeSelect(0)">11</option>
            <option id="1" value="12" onclick="timeSelect(1)">12</option>
            <option id="2" value="1" onclick="timeSelect(2)">1</option>
            <option id="3" value="2" onclick="timeSelect(3)">2</option>
            <option id="4" value="3" onclick="timeSelect(4)">3</option>
            <option id="5" value="4" onclick="timeSelect(4)">4</option>
            <option id="6" value="5" onclick="timeSelect(4)">5</option>
            <option id="7" value="6" onclick="timeSelect(4)">6</option>
            <option id="8" value="7" onclick="timeSelect(4)">7</option>
            <option id="9" value="8" onclick="timeSelect(4)">8</option>
            <option id="10" value="9" onclick="timeSelect(4)">9</option>
            <option id="11" value="10" onclick="timeSelect(4)">10</option>
        </select>
        </div>
        <!-- <script>
            // should get selected location and then give time range for that one
			document.write("<select name='time' size='1'>");
			for (let j=0; j<=locationsArray.length; j++) {
            document.write("<option>")
            document.write(locationsArray[j].name);
            document.write("</option>")
            }

			// t += "<option>"  + "</option>";

            document.write("</select>");
        </script> -->
        <!-- <h3>Number of People*</h3> -->
         <div class='dropdowns'>
        <select id="num_ppl" name="num_ppl" >
            <option value="">Select Number of People</option>
            <option id="0" value="1" onclick="numPplSelect(0)">1</option>
            <option id="1" value="2" onclick="numPplSelect(1)">2</option>
            <option id="2" value="3" onclick="numPplSelect(2)">3</option>
            <option id="3" value="4" onclick="numPplSelect(3)">4</option>
            <option id="4" value="5" onclick="numPplSelect(4)">5</option>
            <option id="5" value="6" onclick="numPplSelect(4)">6</option>
        </select>
        </div>
        </br>
        <!-- </div> -->

        
        <!-- <script>
            // var t= "";
			document.write("<select name='num_ppl' size='1'>");
			for (let j=0; j<=20; j++) {
            // var name = locationsArray[j].name;
            document.write("<option>")
            document.write(j);
            document.write("</option>")
            }

			// t += "<option>"  + "</option>";

            document.write("</select>");
        </script> -->
		<!-- <table border="0" cellpadding="3">
			<tr>
			</tr>
			<script>

				var s = "";
				for (i=0; i< menuItems.length; i++)
				{
					s += "<tr>";
					s += td(makeSelect("quan" + i, 0, 10),"selectQuantity");
					s += td(menuItems[i].name, "itemName");
					s += td("$" +menuItems[i].cost.toFixed(2), "cost");
					s += td("$<input type='text' name='cost'/>", "totalCost");
					s+= "</tr>";
				}
				document.writeln(s);
			</script>
		</table>
		<p class="subtotal totalSection"><label>Subtotal</label>: 
		$ <input type="text"  name='subtotal' id="subtotal" />
		</p>
		<p class="tax totalSection"><label>Mass tax 6.25%:</label>
		$ <input type="text"  name='tax' id="tax" />
		</p>
		<p class="total totalSection"><label>Total:</label> $ <input type="text"  name='total' id="total" />
		</p> -->

		<input type = "submit" id="submit" value = "Make Reservation" /> 


        <!-- When submit, say if valid and if so output, you have a reservation for {} at our {} location next {} at {}, we will send a confirmation to your email:  
        onclick="validate()" -->

	</form>
    </div>
    <!--<form action='email_to_find.php' method='post' onsubmit='return true'>
        <a><input type = 'submit' value = 'Find Previously Made Reservation' /></a>
    </form>" -->
    <br>
    <br>
    <br>
<footer class="footer">
    &copy; 2023 copyright Lisa's Steakhouse
</footer>
    

</body>
</html> 
