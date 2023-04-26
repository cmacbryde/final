<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Show Orders</title>
	<style>
		table, th, td {
			border: 1px solid black; color: black;
		}
        body {background-color: #84b2fa;}
	</style>
</head>

<body>
    <form action='res_find.php' method='post' onsubmit='return validate()'>
        <label>Enter Email Address to find reservation:</label><input type='text' name='email_to_find'>
        <a><input type = 'submit' value = 'Find Reservation' /></a>
    </form>
    <script>
        function validate() {
            var email = document.getElementById("email_to_find").value;
            let email_valid = email.includes("@");
            if (email == "" || !email_valid ) {
                alert("please enter a valid email address");
                //goes to other thing
                console.log("not valid");
                return false
            } else {
                return true;
            }
            
        }
    </script>
