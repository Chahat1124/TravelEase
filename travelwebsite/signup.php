<?php
 session_start();
    $con = mysqli_connect("localhost" ,"root" ,"Chahat@2003","travelwebsite");

    if(!$con)
    {
        echo "failed";
        die();
    }
    $flg=false;
    $chh=false;
    if(isset($_POST["submit"]))
    {
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $check= "SELECT * FROM users WHERE username = '$username'";
        $res = mysqli_query($con, $check);
        if (mysqli_num_rows($res) > 0) {
            $chh =true;
        }
        else{
        $q="INSERT INTO `users` ( `username`, `email`, `pwd`) VALUES ('$username', '$email', '$password')" ;
        $result=mysqli_query($con,$q);
        $bio = 'Hello!!';
        $about = 'Travel Enthusiast';
        $int1 = 'food lover';
        $int2 = 'wonderlust';
        $int3 = 'travel and blogg';
        $profile_pic = '/connecthub/socialbook_img/images/feeling.png';
        if($result){
            $last_id = mysqli_insert_id($con);
            $q2="INSERT INTO userprofile(userid,profile_picture, bio, about, interest1, interest2, interest3) VALUES ($last_id ,'$profile_pic','$bio','$about', '$int1','$int2','$int3')";
            mysqli_query($con,$q2);
            $_SESSSION["username"]=$username;
            header("Location: home.php");
        }  
        $flg=true;
    }
}
    mysqli_close($con);

?>
<html>
    <head>
        <title>Signup page</title>
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

input[type="text"], input[type="password"], input[type="email"] {
    padding: 7px;
    margin-bottom: 11px;
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
        <h2>Create Your Account</h2>
        <form id="signup-form" method="post" action="signup.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit"  name="submit" value="Create">
        </form>
        <p>Do you  have an existing  account? <a href="login.php">login</a></p>
    </div>
    <?php if ($flg): ?>
    <script>
        alert("Successfully created");
    </script>
    <?php endif; ?>
    <?php if ($chh): ?>
    <script>
        alert("Account already exist");
    </script>
    <?php endif; ?>
    </body>
</html>