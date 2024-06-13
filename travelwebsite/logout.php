<?php
        session_start();
        if(isset($_POST['submit']))
        {
            session_destroy();
            header('Location: /travelwebsite/login.php');
        }
        $username = $_SESSION["username"];
        $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
        $res = mysqli_query($con, "SELECT profile_picture FROM userprofile WHERE userid = (SELECT userid FROM users WHERE username = '$username')");                
        $result= mysqli_fetch_assoc($res);
        $image=$result["profile_picture"];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flight booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .custom-nav .nav-link {
      color: black; 
    }
    body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .userdetails {
          max-width: 800px;
          margin: 50px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .profile-header {
          text-align: center;
          margin-bottom: 30px;
          position: relative;
      }

      .profile-picture {
          width: 150px;
          height: 150px;
          border-radius: 50%;
          object-fit: cover;
          margin-bottom: 20px;
      }

      .profile-name {
          font-size: 2em;
          margin: 0;
      }

      .profile-tagline {
          font-size: 1.2em;
          color: #777;
      }
      ::placeholder
           {
            color:aliceblue;
            opacity:0.8;
            font-family: monospace;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
           }
           
           input[type="submit"]
           {
              background-color:lightskyblue;
              width: 120px;
              padding: 10px;
              border-radius: 10em;
              color:black;
           }

        </style>
       <script>
function getConfirmation() {
    var confirmLogout = confirm("Do you really want to logout?");
    console.log("haanjii"); 
    if (confirmLogout) {
        console.log("okokok");
    } else {
        alert("Log-out canceled!");
    }
    return confirmLogout;
}

</script>
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
              $about=$result["about"];
              $interest1= $result["interest1"];
              $interest2= $result["interest2"];
              $interest3= $result["interest3"];
              echo "<div class='userdetails'>";
              echo "<div class='profile-header'>";
              echo "<img src='$image' height='185px' width='185px' class='image'> <br>";
              echo " <h2 class='profile_name'>$username </h2>";
              echo "<p class='profile_tagline'>$bio</p>";
              echo "</div>";
              ?>
               <form method="post" action="logout.php" onsubmit= "getConfirmation()">
                  <center><input type= "submit" class="btn btn-primary"  value="log out" name="submit"></center>
                   </form>

      <script src="flight.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>