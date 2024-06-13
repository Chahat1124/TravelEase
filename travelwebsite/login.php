<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
    if(!$con)
    {
        echo "failed to connect to database";
        die();
    }
    $invalidCredentials = false;
    if (isset($_POST["submit"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $q = "SELECT * FROM users WHERE username = '$username' AND pwd = '$password'";
      
        $res = mysqli_query($con, $q);
            if (mysqli_num_rows($res) == 0)
            {
                $invalidCredentials=true;
            }
            else
            {
                $_SESSION["username"]=$username;
                $_SESSION["pwd"]=$password;
                header("Location: /travelwebsite/home.php");         
            }
    }
    else echo mysqli_error($con);
    mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            text-align: left;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            color: #777;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

 </style>

</head>
<body>
<div class="container">
        <h2>Login to Your Account</h2>
        <form id="login-form"  method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="submit"  value="Login">
        </form>
        <p>Don't have an account? <a href="signup.php">Create one</a></p>
    </div>
    <?php if ($invalidCredentials): ?>
    <script>
        alert("Invalid credentials!");
    </script>
    <?php endif; ?>
</body>
</html>

