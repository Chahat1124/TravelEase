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
    
    .carousel-inner .carousel-item {
      transition: transform 1s ease-in-out, opacity 1s ease-in-out; 
    }
    
    .custom-nav .nav-link {
      color: black; 
    }
    .carousel-item {
      height: 350px;
    }
    .custom-card {
     height: 100%; 
   }
    .custom-card .card-img-top {
    height: 200px; 
    object-fit: cover; 
    }
    .custom-card:hover {
     transform: scale(1.05);
     }
    .custom-card {
    height: 100%; }
   .custom-card .card-img-top {
     height: 200px; 
     object-fit: cover; 
        }
    .card:hover{
        transform: scale(1.05);
    }
    .why-choose-us {
    text-align: center;
    padding: 50px 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin: 50px auto;
    max-width: 1200px;
}

.why-choose-us h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #333;
}

.features-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.feature {
    background-color: #fafafa;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 20px;
    width: 250px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}

.feature:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.feature h3 {
    font-size: 1.5em;
    color: #007bff;
    margin-bottom: 10px;
    
}

.feature p {
    color: #666;
    font-size: 1em;
    line-height: 1.5;
}

.footer {
    background-color: #333;
    color: #fff;
    padding: 40px 20px;
    margin-top: 50px;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 2000px;
    margin: 0 auto;
}

.footer-column {
    flex: 1;
    min-width: 200px;
    margin: 10px;
}

.footer-column h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #ffd700;
}

.footer-column p, .footer-column ul, .footer-column li {
    margin: 0;
    padding: 0;
    list-style: none;
}

.footer-column ul {
    padding: 0;
}

.footer-column li {
    margin: 8px 0;
}

.footer-column a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-column a:hover {
    color: #ffd700;
}

.social-icons {
    display: flex;
}

.social-icons a {
    margin-right: 10px;
}

.social-icons svg {
    width: 30px;
    height: 30px;
    margin-right: 10px;
    fill: #fff;
    transition: transform 0.3s, fill 0.3s;
}

.social-icons svg:hover {
    transform: scale(1.1);
    fill: #ffd700; 
}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
}

.footer-bottom p {
    margin: 0;
    color: #bbb;
}
h1 {
            color: #ff6600;
            text-align: center;
            font-size: 4em;
            background: linear-gradient(to right, #ffcc00, #ff6600);
            -webkit-background-clip: text; 
            color: transparent;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
            padding: 2px;
            border-radius: 10px;
        }

    .footer-column {
        margin: 20px 0;
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
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img1.jpeg" class="d-block w-100" width="200" height="310">
      </div>
      <div class="carousel-item">
        <img src="./im2.jpeg" class="d-block w-100" width="200" height="310">
      </div>
      <div class="carousel-item">
        <img src="./img3.jpeg" class="d-block w-100" width="200" height="310">
      </div>
      <div class="carousel-item">
        <img src="./img4.jpeg" class="d-block w-100" width="200" height="310">
      </div>
      <div class="carousel-item">
        <img src="./img5.jpeg" class="d-block w-100"width="200" height="310">
      </div>
    </div>
  </div>
  <h1>WELCOME TO TravelEase</h1>
  <div class="container my-5">
  <h2 class="mb-4">Our Top Holiday Destinations</h2>
  <div id="workingHolidayCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./h1.jpeg" class="card-img-top" alt="Australia">
              <div class="card-body">
                <h5 class="card-title">Australia</h5>
                <p class="card-text">A vast and diverse continent renowned for its unique wildlife, stunning natural landscapes, and laid-back culture.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./h2.jpeg" class="card-img-top" alt="Japan">
              <div class="card-body">
                <h5 class="card-title">Switzerland</h5>
                <p class="card-text">A picturesque Alpine nation famed for its neutrality, luxury watches, and world-class chocolate.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./h3.jpeg" class="card-img-top" alt="China">
              <div class="card-body">
                <h5 class="card-title">Thailand</h5>
                <p class="card-text">A Southeast Asian gem celebrated for its vibrant street life, tropical beaches, and rich cultural heritage.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./h4.jpeg" class="card-img-top" alt="Germany">
              <div class="card-body">
                <h5 class="card-title">Norway</h5>
                <p class="card-text">A Scandinavian paradise known for its breathtaking fords, Northern Lights, and high quality of life.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  </div>
</div><br>
<h2 class="mb-4">Best Airlines</h2>
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="./f1.jpeg"  height="150px" width="150px"alt="Card image cap">  
  </div>
  <div class="card">
    <img class="card-img-top" src="./f2.jpeg" height="150px" width="150px"alt="Card image cap">
  </div>
  <div class="card">
    <img class="card-img-top" src="./f3.jpeg"  height="150px" width="150px" alt="Card image cap">
  </div>
  <div class="card">
    <img class="card-img-top" src="./f4.jpeg"  height="150px" width="150px"alt="Card image cap">  
  </div>
  <div class="card">
    <img class="card-img-top" src="./f5.jpeg" height="150px" width="150px"alt="Card image cap">
  </div>
</div>
<div class="container my-5">
  <h2 class="mb-4">Our Top Services</h2>
  <div id="workingHolidayCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./pic1.jpeg" class="card-img-top" alt="Australia">
              <div class="card-body">
                <h5 class="card-title">EASY PAYMENT MODE </h5>
                <p class="card-text">A seamless and secure transactions online or in-store.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./pic2.jpeg" class="card-img-top" alt="Japan">
              <div class="card-body">
                <h5 class="card-title">BOOK A FLIGHT</h5>
                <p class="card-text">An efficient online platform for comparing and reserving airline tickets to destinations worldwide.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./pic3.jpeg" class="card-img-top" alt="China">
              <div class="card-body">
                <h5 class="card-title">BOOK A HOTEL</h5>
                <p class="card-text">An accessible portal to find and reserve accommodations, ranging from budget to luxury stays, around the globe.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card custom-card">
              <img src="./pic4.jpeg" class="card-img-top" alt="Germany">
              <div class="card-body">
                <h5 class="card-title">RENT A CAR</h5>
                <p class="card-text"> A convenient service to rent vehicles from a variety of providers for short or long-term use.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>
<h2 class="mb-4">Top Reviews</h2>
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="./r2.jpeg"  height="150px" width="150px"alt="Card image cap">  
  </div>
  <div class="card">
    <img class="card-img-top" src="./r1.jpeg" height="150px" width="150px"alt="Card image cap">
  </div>
  <div class="card">
    <img class="card-img-top" src="./r3.jpeg"  height="150px" width="150px" alt="Card image cap">
  </div>
  <div class="card">
    <img class="card-img-top" src="./r4.jpeg"  height="150px" width="150px"alt="Card image cap">  
  </div>
  <div class="card">
    <img class="card-img-top" src="./r5.jpeg" height="150px" width="150px"alt="Card image cap">
  </div>
  <section class="why-choose-us">
        <h2>Why People Choose Us</h2>
        <div class="features-container">
            <div class="feature">
                <h3>Affordable Prices</h3>
                <p>We offer the best prices for travel packages and accommodations, ensuring you get the best value for your money.</p>
            </div>
            <div class="feature">
                <h3>Expert Guides</h3>
                <p>Our experienced guides ensure you have an enriching and enjoyable travel experience, providing you with insights and tips.</p>
            </div>
            <div class="feature">
                <h3>24/7 Support</h3>
                <p>We are available around the clock to assist you with any questions or concerns, ensuring a smooth travel experience.</p>
            </div>
            <div class="feature">
                <h3>Secure Booking</h3>
                <p>Our secure booking system ensures your personal information is protected, allowing you to book with confidence.</p>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Sector 62, Noida , Uttar Pradesh , India</p>
                <p>Email: info@travelease.com</p>
                <p>Phone: 8404480184</p>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="hotel.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-icons">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                  </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                  </svg>
                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
              </svg>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 TravelEase. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
