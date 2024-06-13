<?php
    session_start();
    if (!isset($_SESSION["username"]))
   {
    header("Location: /travelwebsite/login.php");
   }
   $username = $_SESSION["username"];
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
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .custom-nav .nav-link {
      color: black; 
    }
    
main {
    padding: 20px;
    max-width: 800px;
    margin: 20px auto;
    background: #ffffff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    color: #35424a;
    margin-top: 0;
}

ul {
    padding-left: 20px;
}

ul li {
    margin-bottom: 10px;
}

footer {
    text-align: center;
    padding: 1px;
    background: #35424a;
    color: #ffffff;
    position: fixed;
    bottom: 0;
    width: 100%;
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
 
     <main>
        <section class="about-us">
            <h2>Welcome to TravelEase!</h2>
            <p>At TravelEase, we believe that travel is more than just visiting new places—it's about experiencing the world in all its diversity and beauty. Our mission is to inspire and enable travelers to explore the globe with confidence, curiosity, and a deep sense of adventure.</p>
            
            <h3>Who We Are</h3>
            <p>Founded by a team of passionate travelers and adventure enthusiasts, TravelEase is a comprehensive travel resource dedicated to providing you with the best tools, tips, and inspiration for your journeys. Whether you're a seasoned globetrotter or a first-time explorer, we're here to guide you every step of the way.</p>
            
            <h3>Our Values</h3>
            <ul>
                <li><strong>Passion for Travel:</strong> Our love for exploring new destinations drives everything we do. We strive to share our enthusiasm and knowledge with our community.</li>
                <li><strong>Authenticity:</strong> We value genuine experiences that allow you to connect with local cultures, people, and environments.</li>
                <li><strong>Sustainability:</strong> We are committed to promoting responsible travel practices that respect and preserve the natural world and local communities.</li>
                <li><strong>Innovation:</strong> We continually seek out new technologies and ideas to enhance your travel planning and experiences.</li>
            </ul>
            
            <h3>What We Offer</h3>
            <ul>
                <li><strong>Travel Guides:</strong> Detailed guides to destinations around the world, filled with insider tips, must-see attractions, and hidden gems.</li>
                <li><strong>Itineraries:</strong> Customized travel itineraries tailored to different interests, from adventure and wellness to culture and cuisine.</li>
                <li><strong>Travel Tips:</strong> Practical advice on everything from packing and budgeting to navigating local customs and staying safe.</li>
                <li><strong>Community Stories:</strong> Inspiring stories and travel experiences shared by our vibrant community of travelers.</li>
                <li><strong>Booking Tools:</strong> User-friendly tools to help you find and book flights, accommodations, tours, and more at the best prices.</li>
            </ul>
            
            <h3>Our Team</h3>
            <p>Our team is composed of travel writers, photographers, and industry experts who are all dedicated to helping you make the most of your travels. With firsthand experience in destinations across the globe, we bring you reliable and up-to-date information to enhance your adventures.</p>
            
            <h3>Join Our Community</h3>
            <p>At TravelEase, we believe that travel is a journey best shared. Join our community of fellow travelers on social media and our blog, where you can exchange tips, share your own travel stories, and find inspiration for your next adventure.</p>
            
            <h3>Contact Us</h3>
            <p>We love hearing from our readers! Whether you have a travel question, need trip advice, or want to share your own travel experiences, feel free to reach out to us at <a href="mailto:contact@travelease.com">contact@travelease.com</a>.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 TravelEase. All rights reserved.</p>
    </footer>
</body>
</html>     