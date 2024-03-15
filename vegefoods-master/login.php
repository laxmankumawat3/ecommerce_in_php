<?php
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    <center>
        <h1>log IN</h1>
    </center>
    <form id="registrationForm" method="post" >
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
    </div> -->

        <button type="submit" name="submit">Login</button>
    </form>

</body>

</html>


<?php
include("footer.php");
?>

<script>

    $(document).ready(function(){
        $('#registrationForm').submit(function(event){
            event.preventDefault();

            var email = $('#email').val();

            $.ajax({
                type :'post',
                url : "handlelogin.php",
                data : {
                    email : email,
                },
                success:function(response){
                    console.log("login success", response);
                    window.location.href = "index.php";
                },
                error:function(response){
                    console.log("error while login", response);
                }
            })
        })
    })
</script>