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

      .profile-header {
          text-align: center;
          margin-bottom: 30px;
          position: relative;
      }

      .image {
          width: 200px;
          height: 200px;
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

      .edit-profile-btn {
          position: absolute;
          top: 10px;
          right: 10px;
          padding: 10px 20px;
          font-size: 1em;
          color: #fff;
          background-color: #007bff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }

      .edit-profile-btn:hover {
          background-color: #0056b3;
      }

      .profile-content h2 {
          font-size: 1.5em;
          border-bottom: 2px solid #f0f0f0;
          padding-bottom: 10px;
          margin-top: 30px;
      }

      .profile-content p, .profile-content ul {
          line-height: 1.6;
      }

      .profile-content ul {
          list-style-type: disc;
          margin-left: 20px;
      }

      .bookings {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .booking-entry {
            background-color: #fdfdfd;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .booking-entry:hover {
            transform: scale(1.02);
        }
        .booking-entry p {
            margin: 5px 0;
            color: #555;
        }
        .booking-entry p strong {
            font-weight: bold;
            color: #333;
        }
        .booking-entry p.price {
            color: #28a745;
            font-weight: bold;
        }
        .booking-entry p.rooms {
            color: #007bff;
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
              $about=$result["about"];
              $interest1= $result["interest1"];
              $interest2= $result["interest2"];
              $interest3= $result["interest3"];
              echo "<div class='userdetails'>";
              echo "<div class='profile-header'>";
              echo "<img src='$image' height='185px' width='185px' class='image'> <br>";
              echo " <h2 class='profile_name'>$username </h2>";
              echo "<p class='profile_tagline'>$bio</p>";
              echo '<a href="editprofile.php"><input type="submit" class="edit-profile-btn" value="Edit  your profile"/></a>';
              echo "</div>";
              echo "<div class='profile-content'>";
              echo "<h2>About me</h2>";
              echo "<p>$about</p>";             
              echo "<h2>Travel Interest</h2>";
              echo "<ul> <li> $interest1 </li> <li> $interest2 </li> <li> $interest3 </li> </ul>  "; 
              echo "<h3>My Bookings</h3>";
              echo "<div class='bookings'>";
              $q = "SELECT * FROM hotelbooking WHERE userid = (SELECT userid FROM users WHERE username= '$username')";
              $res = mysqli_query($con, $q);
              if ($res) {
                  while ($row = mysqli_fetch_row($res)) {
                      echo "<div class='booking-entry'>";
                      echo "<h4>Hotel Booking </h4>";
                      echo "<p>Hotel Name: " . $row[2] . "</p>";
                      echo "<p>Check-in Date: " . $row[3] . "</p>";
                      echo "<p>Check-out Date: " . $row[4] . "</p>";
                      echo "<p> Number of Adults: " . $row[5] . "</p>";
                      echo "<p> Number of Children: " . $row[6] . "</p>";
                      echo "<p>Rooms: " . $row[7] . "</p>";
                      echo "<p>Stars: " . $row[8] . "</p>";
                      echo "</div>";
                  }
              }
              $q2 = "SELECT * FROM carbooking WHERE userid = (SELECT userid FROM users WHERE username= '$username')";
              $res2 = mysqli_query($con, $q2);
              if ($res2) {
                  while ($row = mysqli_fetch_row($res2)) {
                      echo "<div class='booking-entry'>";
                      echo "<h4>Car Booking </h4>";
                      echo "<p>Car Name: " . $row[2] . "</p>";
                      echo "<p>Max Seat : " . $row[3] . "</p>";
                      echo "<p>Price: " . $row[4] . "</p>";
                      echo "<p>PickUp Date: " . $row[5] . "</p>";
                      echo "<p>DropOff Date: " . $row[6] . "</p>";
                      echo "<p>PickUP Time: " . $row[7] . "</p>";
                      echo "<p>DropOff Time: " . $row[8] . "</p>";
                      echo "</div>";
                  }
              }
              $q3 = "SELECT * FROM flightbooking WHERE userid = (SELECT userid FROM users WHERE username= '$username')";
              $res3 = mysqli_query($con, $q3);
              if ($res3) {
                  while ($row = mysqli_fetch_row($res3)) {
                      echo "<div class='booking-entry'>";
                      echo "<h4>Flight Booking </h4>";
                      echo "<p>Flight Name: " . $row[2] . "</p>";
                      echo "<p>Airport Name : " . $row[3] . "</p>";
                      echo "<p>Check-in Date: " . $row[4] . "</p>";
                      echo "<p>Check-out Date: " . $row[5] . "</p>";
                      echo "<p>Number of adults: " . $row[6] . "</p>";
                      echo "<p>Number of children " . $row[7] . "</p>";
                      echo "</div>";
                  }
              }
              echo "</div>";              
              echo "</div>";     
              echo "</div>";
              ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- <script src="scripts.js"></script> -->
</body>
</html>