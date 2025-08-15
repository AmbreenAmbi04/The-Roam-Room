<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name= "db_practice";

$connection = new mysqli ($server_name, $username, $password, $db_name);

//Contact Us Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name= $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

if ($connection)
{
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message))
    {
        $stmt = $connection->prepare("INSERT INTO tbl_contactus(name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        if ($stmt->execute())
        {
            //Redirect to avoid duplicate submissions
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit;
            echo "<script>alert('Message sent successfully!');</script>";
        }
        else
        {
            echo "<script>alert('Error sending message. Please try again.');</script>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>The Roam Room</title>
    <link rel="icon" href="images/The Roam Room Logo.jpg" type="image/icon">
</head>
<body class="bg-black text-light">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-gradient bg-black navbar-dark fs-5">
  <div class="container-fluid">
    <img src="images/The Roam Room Logo.jpg" alt="Logo" class="navbar-brand" style="width: 80px; height: 80px; border-radius: 250px">
    <a class="navbar-brand fs-3" href="#">The Roam Room</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#itinerary">Itinerary</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#booknow">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#aboutus">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contactus">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!--Itinerary Accordion-->
  <section id="itinerary">
    <div class="container card pt-3 pb-3 text-white" style="background-color: #430E18">
    <div class="d-flex justify-content-between align-items-center pb-2">
      <h2 class="mb-0 ms-2">Itinerary</h2>
      <a href="booknow" class="btn btn-primary me-1">Book Now</a>
    </div>
  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Turkey
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>7 Days Itinerary</strong><br>
        <ul>
          <li><strong>Day 1: </strong>Arrival in Istanbul</li>
          <li><strong>Day 2: </strong>Explore Istanbul - Hagia Sophia, Blue Mosque, Topkapi Palace</li>
          <li><strong>Day 3: </strong>Day trip to Cappadocia - Hot air balloon ride</li>
          <li><strong>Day 4: </strong>Visit Pamukkale - Thermal pools and ancient ruins</li>
          <li><strong>Day 5: </strong>Ephesus - Ancient city tour</li>
          <li><strong>Day 6: </strong>Relax at a beach resort in Antalya</li>
          <li><strong>Day 7: </strong>Departure from Istanbul</li>
        </ul><br>
        <strong>Best Time to Visit: </strong>April–June, September–October<br>
        <strong>Starting Price: </strong>$1,200 per person (flights excluded)
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Italy
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>7 Days Itinerary</strong><br>
    <ul>
      <li><strong>Day 1: </strong>Arrival in Rome – Colosseum night view</li>
      <li><strong>Day 2: </strong>Rome – Vatican City, Trevi Fountain, Spanish Steps</li>
      <li><strong>Day 3: </strong>Florence – Duomo, Uffizi Gallery, Ponte Vecchio</li>
      <li><strong>Day 4: </strong>Tuscany – Wine tasting & countryside tour</li>
      <li><strong>Day 5: </strong>Venice – Gondola ride, St. Mark’s Basilica</li>
      <li><strong>Day 6: </strong>Amalfi Coast – Positano & Capri</li>
      <li><strong>Day 7: </strong>Departure from Naples</li>
    </ul><br>
    <strong>Best Time to Visit: </strong>April–June, September–October<br>
    <strong>Starting Price: </strong>$1,700 per person (flights excluded)
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        France
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>7 Days Itinerary</strong><br>
    <ul>
      <li><strong>Day 1: </strong>Arrival in Paris – Eiffel Tower evening view</li>
      <li><strong>Day 2: </strong>Explore Paris – Louvre Museum, Notre-Dame, Seine River Cruise</li>
      <li><strong>Day 3: </strong>Day trip to Versailles – Palace & Gardens</li>
      <li><strong>Day 4: </strong>Train to Lyon – Gourmet food tour</li>
      <li><strong>Day 5: </strong>Provence – Lavender fields and villages</li>
      <li><strong>Day 6: </strong>French Riviera – Nice & Monaco</li>
      <li><strong>Day 7: </strong>Departure from Nice</li>
    </ul><br>
    <strong>Best Time to Visit: </strong>April–June, September–October<br>
    <strong>Starting Price: </strong>$1,800 per person (flights excluded)
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
        Bali
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>7 Days Itinerary</strong><br>
    <ul>
      <li><strong>Day 1: </strong>Arrival in Denpasar – Relax at Seminyak Beach</li>
      <li><strong>Day 2: </strong>Ubud – Monkey Forest, Rice Terraces, Art Markets</li>
      <li><strong>Day 3: </strong>Temple Tour – Tanah Lot, Uluwatu, and Kecak Dance</li>
      <li><strong>Day 4: </strong>Mount Batur sunrise trek & hot springs</li>
      <li><strong>Day 5: </strong>Snorkeling at Nusa Penida</li>
      <li><strong>Day 6: </strong>Relaxation day – Spa & beach club</li>
      <li><strong>Day 7: </strong>Departure from Denpasar</li>
    </ul><br>
    <strong>Best Time to Visit: </strong>April–October<br>
    <strong>Starting Price: </strong>$1,000 per person (flights excluded)
    </div>
  </div>
</div>
</div>
  </section>

  <!--Book Now Form-->
    <section id="booknow">
    <div class="card container flex-column mt-5 mb-3">
        <h2 class="card-header form mt-2 pt-2">Book Now</h2>
        <form class="card-body" action="index.php" method="POST" id="bookingForm">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" class="form-control mb-3" placeholder="Enter your name" required>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" class="form-control mb-3" placeholder="Enter your email" required>
        <label for="email">Phone Number: </label>
        <input type="tel" id="phone" name="phone" class="form-control mb-3" placeholder="Enter your phone number" required>
        <label for="subject" id="subject">Travel Destination: </label>
        <select class="form-select mb-3" id="destination" name="destination" required>
          <option selected>Select a destination</option>
          <option value="turkey">Turkey</option>
          <option value="thailand">Italy</option>
          <option value="france">France</option>
          <option value="bali">Bali</option>
        </select>
        <label for="passenger">Number of Travelers: </label>
        <input type="number" id="passenger" name="passenger" class="form-control mb-3" min="1" max="10" placeholder="Enter number of travelers" required>
        <label for="date">Travel Date: </label>
        <input type="date" id="date" name="date" class="form-control mb-3">
        <select class="form-select mb-3" id="payment" name="payment">
          <option selected>Select a payment method</option>
          <option value="bank">Bank Transfer</option>
          <option value="poa">Pay on Arrival</option>
        </select>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
        <button type="reset" class="btn btn-secondary mb-5">Reset</button>
        </form>
    </div>
    </section>

    <!--Gallery Section-->
<section id="gallery"></section>
  <div class="container card mt-5 mb-3 col-md-12">
    <h2 class="mb-4">Gallery</h2>
    <div class="row">
      <!--Row 1-->
      <!--Image 1-->
      <div class="col-md-4 mb-3">
        <img src="images/hagia-sofia.jpeg" class="img-fluid rounded" alt="Hagia Sophia" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Hagia Sophia, Istanbul</p>
      </div>
      <!--Image 2-->
      <div class="col-md-4 mb-3">
        <img src="images/cappadocia.jpg" class="img-fluid rounded" alt="Cappadocia" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Cappadocia, Turkey</p>
      </div>
      <!--Image 3-->
      <div class="col-md-4 mb-3">
        <img src="images/hagia.png" class="img-fluid rounded" alt="Hagia Sophia Interior" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Hagia Sophia Interior, Istanbul</p>
      </div>
    </div>
      <!--Row 2-->
      <!--Image 1-->
    <div class="row">
      <div class="col-md-4 mb-3">
        <img src="images/rome.jpg" class="img-fluid rounded" alt="Rome" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Colosseum, Rome</p>
      </div>
      <!--Image 2-->
      <div class="col-md-4 mb-3">
        <img src="images/vatican.jpg" class="img-fluid rounded" alt="Vatican City" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Vatican City, Italy</p>
      </div>
      <!--Image 3-->
      <div class="col-md-4 mb-3">
        <img src="images/tuscany.jpg" class="img-fluid rounded" alt="Tuscany" style="height:300px; width:100%; object-fit:cover;">
      <p class="image-caption text-center mt-2 fs-5">Tuscany Wine Tasting, Italy</p>
      </div>
    </div>
      <!--Row 3-->
      <!--Image 1-->
    <div class="row">
      <div class="col-md-4 mb-3">
        <img src="images/paris.jpg" class="img-fluid rounded" alt="Eifel Tower, Paris" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Eifel Tower, Paris</p>
      </div>
      <!--Image 2-->
      <div class="col-md-4 mb-3">
        <img src="images/louvre.jpg" class="img-fluid rounded" alt="Louvre Museum" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Louvre Museum, France</p>
      </div>
      <!--Image 3-->
      <div class="col-md-4 mb-3">
        <img src="images/seine.jpg" class="img-fluid rounded" alt="Seine River Cruise" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Seine River Cruise, France</p>
      </div>
    </div>
    <!--Row 4-->
      <!--Image 1-->
    <div class="row">
      <div class="col-md-4 mb-3">
        <img src="images/ubud.jpg" class="img-fluid rounded" alt="Ubud" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Ubud, Bali</p>
      </div>
      <!--Image 2-->
      <div class="col-md-4 mb-3">
        <img src="images/mount-batur.jpg" class="img-fluid rounded" alt="Mount Batur" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Mount Batur, Bali</p>
      </div>
      <!--Image 3-->
      <div class="col-md-4 mb-3">
        <img src="images/denpasar.jpg" class="img-fluid rounded" alt="Denpasar" style="height:300px; width:100%; object-fit:cover;">
        <p class="image-caption text-center mt-2 fs-5">Denpasar, Bali</p>
      </div>
    </div>
</div>
</section>

<!-- About Us Section -->
<section id="aboutus">
  <div class="container card mt-5 mb-3 text-white p-4" style="background-color: #430E18">
    <h2 class="mb-4">About Us</h2>
    <p class="lead">
      Welcome to <strong>The Roam Room</strong> – your gateway to unforgettable adventures!
    </p>
    <div class="mt-4">
      <p>
        At <strong>The Roam Room</strong>, we believe travel is more than just visiting places – it’s about 
        experiencing cultures, creating memories, and discovering yourself along the way. Our mission 
        is to connect passionate travelers with breathtaking destinations, curated itineraries, 
        and hassle-free booking services.
      </p>
      <p>
        Whether you dream of wandering through ancient streets, basking on sun-kissed beaches, 
        or exploring hidden gems off the beaten path, we’ve got you covered. From the first click 
        on our website to the moment you return home, we ensure your journey is smooth, exciting, 
        and uniquely yours.
      </p>
      <p>
        With our trusted travel partners, competitive deals, and a love for exploration, 
        we turn your travel dreams into reality — one adventure at a time.
      </p>
      <p class="fw-bold mt-4">
        The world is waiting. Let’s roam together. 🌍✈️
      </p>
    </div>
  </div>
</section>

  
    <!--Contact Us Form-->
    <section id="contactus">
    <div class="card container flex-column mt-5 mb-3">
        <h2 class="card-header form mt-2 pt-2">Contact Us</h2>
        <form class="card-body" action="index.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" class="form-control mb-3">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" class="form-control mb-3">
        <label for="subject" id="subject">Subject: </label>
        <input type="text" id="subject" name="subject" class="form-control mb-3">
        <label for="message">Message: </label>
        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your message here..."></textarea>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
        <button type="reset" class="btn btn-secondary mb-5">Reset</button>
        </form>
    </div>
    </section>
    <!--Footer-->
  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2023 The Roam Room. All rights reserved.</p>
    <p class="mb-0">Follow us on:
      <a href="#" class="text-white">Facebook</a> |
      <a href="#" class="text-white">Instagram</a> |
      <a href="#" class="text-white">Twitter</a>
    </p>
  </footer>
</body>
</html>