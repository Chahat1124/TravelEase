<?php
      session_start();
    
      if (!isset($_SESSION["username"]))
      {
        header("Location: /travelwebsite/login.php");
        exit();
      }


      $username = $_SESSION["username"];
      $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
      $res = mysqli_query($con, "SELECT profile_picture FROM userprofile WHERE userid = (SELECT userid FROM users WHERE username = '$username')");                
      $result= mysqli_fetch_assoc($res);
      if(isset($_POST["submit"]))
         {
        $bio=$_POST["bio"];
        $res="UPDATE  userprofile  SET bio='$bio' WHERE userid=(SELECT userid FROM users WHERE username = '$username') ";
        if(!mysqli_query($con,$res))
        {
            die();
        }
    }
        else{
            echo mysqli_error($con);
        }

    if(isset($_POST["submitAb"]))
        {
        $about=$_POST["about"];
        $res="UPDATE  userprofile  SET about='$about' WHERE userid=(SELECT userid FROM users WHERE username = '$username') ";
        if(!mysqli_query($con,$res))
        {
            die();
        }
        }
        else{
            echo mysqli_error($con);
        }

    if(isset($_POST["submit1"]))
    {
        $int1=$_POST["interest1"];
        $res="UPDATE  userprofile  SET interest1='$int1' WHERE userid=(SELECT userid FROM users WHERE username = '$username') ";
        if(!mysqli_query($con,$res))
        {
            die();
        }
        }
        else{
        echo mysqli_error($con);
        }

        if(isset($_POST["submit2"]))
        {
        $int2=$_POST["interest2"];
        $res="UPDATE  userprofile  SET interest2='$int2' WHERE userid=(SELECT userid FROM users WHERE username = '$username') ";
        if(!mysqli_query($con,$res))
        {
        die();
        }
        }
        else{
        echo mysqli_error($con);
        }

        if(isset($_POST["submit3"]))
        {
        $int3=$_POST["interest3"];
        $res="UPDATE  userprofile  SET interest3='$int3' WHERE userid=(SELECT userid FROM users WHERE username = '$username') ";
        if(!mysqli_query($con,$res))
        {
        die();
        }
        }
        else{
        echo mysqli_error($con);
        }

      if (isset($_POST["submitDp"]))
    {
        $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        if ($check !== false)
        {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            if(move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file))
            {
                $query = "UPDATE userprofile SET profile_picture = '$target_file' WHERE userid = (SELECT userid FROM users WHERE username = '" . $_SESSION["username"] . "');";
                mysqli_query($con, $query);
            }
        }
    }

    $res = mysqli_query($con, "SELECT profile_picture FROM userprofile WHERE userid = (SELECT userid FROM users WHERE username = '$username')");                   
    $result= mysqli_fetch_assoc($res);
    $image=$result["profile_picture"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
    <style>
    
    .custom-nav .nav-link {
      color: black; 
    }
    body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f0f0f0;
      }

      .userdetails {
          max-width: 800px;
          margin: 50px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    
      
      input[type="text"]
           {
              background: transparent;
              width: 250px;
              height:40px;
              border-radius: 2%;
              margin-top:20px;
              cursor:cursor;
              color:black;
              border-radius: 10em;
              border: 2px solid grey;
              padding: 7px;
              text-align: center;
           }
           ::placeholder
           {
            color:black;
            opacity:0.8;
            font-family: Arial, sans-serif;
           }
    
           .container{
            margin-left: 1px;
            margin-top: 3px;
           }
           input[type="submit"]
           {
              width: 80px;
              padding: 6px;
              margin-left: 2px;
              margin-right: 70px;
              border-radius: 10em;
              color:white;
           }
           #profilepic {
        display: none;
       }

       label[for="profilepic"] {
        border: 2px solid grey;
        background: transparent;
        font-size: 15px;
        padding: 10px;
        margin-left: 2px;
        border-radius: 10em;
        cursor:cursor;
        width: 250px;
       }
           .image {
          width: 200px;
          height: 200px;
          border-radius: 50%;
          object-fit: cover;
          margin-bottom: 20px;
          
      }
</style>
</head>
<body>
<ul class="nav nav-tabs custom-nav">
    <div class="d-flex">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="flight.php">Flight-booking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hotel.php">Hotel-booking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="car.php">Car-booking</a>
      </li>
    </div>
    <div class="ml-auto d-flex">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
    </div>
  </ul>  
<div class="right">
            <?php
                   $username = $_SESSION["username"];
                   $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
                   $res = mysqli_query($con, "SELECT * FROM userprofile WHERE userid = (SELECT userid FROM users WHERE username = '$username')");                
                   $result= mysqli_fetch_assoc($res);
                   $image=$result["profile_picture"];
                   $bio=$result["bio"];
                   echo "<div class= 'container'>";
                   echo "<img src='$image' height='185px' width='185px' class='image'> <br>";
                   echo " Username-: $username <br>";
                   echo " CurrentBio-: $bio <br>";
                   echo "</div>";
                   ?>
                    <form method="post" action="editprofile.php" enctype="multipart/form-data">
                     
                      <input type="text" name="bio" placeholder="Edit your bio">
                      <input type="submit" name="submit" class="btn btn-primary" value="Edit">

                    
                      <input type="text" name="about" placeholder="Edit ur about">
                      <input type="submit" name="submitAb" class="btn btn-primary" value="Edit"><br><br>

                     
                      <input type="text" name="interest1" placeholder="Edit ur first interest">
                      <input type="submit" name="submit1" class="btn btn-primary" value="Edit">

                   
                      <input type="text" name="interest2" placeholder="Edit ur second interest">
                      <input type="submit" name="submit2" class="btn btn-primary" value="Edit">

                   
                      <input type="text" name="interest3" placeholder="Edit ur third interest">
                      <input type="submit" name="submit3"  class="btn btn-primary"value="Edit"><br><br>

                      <input type="file" id="profilepic" name="profilepic"  value="Choose your new profile picture">
                      <label for="profilepic" >Choose your profile pic</label>
                      <input type="submit" name="submitDp" class="btn btn-primary" value="Edit">
                    </form>

            
            </div>
</body>