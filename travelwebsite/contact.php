<?php
      session_start();
    if (!isset($_SESSION["username"]))
    {
    header("Location: /travelwebsite/login.php");
    }

    $con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");
    if (!$con) {
        die("Failed to connect to database: " . mysqli_connect_error());
    }
    $flg=false;
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];


        $stmt = $con->prepare("SELECT userid FROM users WHERE username = ? AND email = ?");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $stmt->bind_result($userid);
        $stmt->fetch();
    $stmt->close();

    if ($userid) {
        // Insert feedback
        $stmt = $con->prepare("INSERT INTO feedback (username, email, userid, msg) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $userid, $message);
        $result = $stmt->execute();

        if ($result) {
            $flg=true;
        } 
        $stmt->close();
    } else {
        echo "User not found.";
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Travel Website</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .contact-form {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
        }
        .contact-info {
            background: #e9ecef;
            padding: 30px;
            border-radius: 10px;
        }
        .contact-section {
            padding: 60px 0;
        }
        .map {
            border: none;
            width: 100%;
            height: 300px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .custom-nav .nav-link {
            color: black; 
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
 

    <div class="container contact-section">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="contact-form">
                    <h3>Contact Us</h3>
                    <form method="post" action="contact.php">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email(registered)</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message"  rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit"  name="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="contact-info">
                    <h3>Get in Touch</h3>
                    <p><strong>Address:</strong> Sector 62, Noida , Uttar Pradesh , India</p>
                    <p><strong>Phone:</strong> 8404480184</p>
                    <p><strong>Email:</strong> info@travelease.com</p>
                    <p><strong>Follow Us:</strong></p>
                    <a href="#" class="btn btn-primary btn-sm mr-1">Facebook</a>
                    <a href="#" class="btn btn-primary btn-sm mr-1">Twitter</a>
                    <a href="#" class="btn btn-primary btn-sm">Instagram</a>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-12">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14008.77419981924!2d77.3538184!3d28.6308741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce56555555555%3A0x5555555555555555!2sSector%2062%2C%20Noida%2C%20Uttar%20Pradesh%20201309%2C%20India!5e0!3m2!1sen!2sus!4v1689263849124!5m2!1sen!2sus" allowfullscreen></iframe>
            </div>
        </div> 
    </div>
    <?php if ($flg): ?>
    <script>
        alert(" Feedback successfully sent!!");
    </script>
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
