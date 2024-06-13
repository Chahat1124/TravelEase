<?php
      session_start();
      if (!isset($_SESSION["username"]))
      {
      header("Location: /travelwebsite/login.php");
      }

      $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
      if(!$con)
      {
          echo "failed to connect to database";
          die();
      }
      mysqli_close($con);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car booking</title>
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
        .booking-container {
            max-width: 1200px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 450px;
        }
        .booking-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-submit:hover {
            background: #0056b3;
        }
        .class-selection {
            position: absolute;
            top: 10px;
            right: 10px;
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
      <div class="booking-container">
        <h2>Car Booking</h2>
        <form id="search3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Destination">Pick-up Point:</label>
                    <input type="text" placeholder="delhi" id="dest1" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="dropoff">Drop-off Point:</label>
                    <input type="text" id="dest2" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start">Start day:</label>
                    <input type="text" placeholder="yyyy-mm-dd" id="start" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="end">End day:</label>
                    <input type="text" placeholder="yyyy-mm-dd" id="end" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pickup">Pick-up time:</label>
                    <input type="time" id="picktime" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="droptime">Drop-off time:</label>
                    <input type="time" id="droptime" class="form-control">
                </div>
            </div>
            <button type="submit" id="btn3" class="btn-submit">Search</button>
        </form>
    </div>
    
    <div id="results"></div>
     <script src="car.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>