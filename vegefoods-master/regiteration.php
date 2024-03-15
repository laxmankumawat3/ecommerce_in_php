<?php 
include("navbar.php");
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
     <!-- Include jQuery library -->
     <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    border: 1px solid #ccc;
    margin: 4rem 15rem;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    margin-bottom: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    text-align: center;
    background-color: #82ae46;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: darkblue;
}

small {
    display: block;
    margin-top: 5px;
    color: #666;
}

    </style>
</head>
<body>
<center><h1>Registretion</h1></center>
<form id="registrationForm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone No:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        <small>Format: 1234567890</small>
    </div>

    <button type="submit" name="submit">Register</button>
</form>

</body>
</html>



<?php 
include("footer.php");

?>

<script>
    $(document).ready(function() {
        $("#registrationForm").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var mobileNo = $("#phone").val();

            $.ajax({
                type: "post",
                url: "handleregi.php",
                data: {
                    name: name,
                    email: email,
                    mobileNo: mobileNo
                },
                success: function(response) {
                    console.log("User registered successfully", response);
                    window.location.href = "login.php";
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    });
</script>