<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name= "db_theroamroom";

$connection = new mysqli ($server_name, $username, $password, $db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $toast = "";

  if (!$connection->connect_error) {
    if ($_POST['form_type'] == 'contact') {
        $stmt = $connection->prepare("INSERT INTO tbl_contactus(name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"]);
        $toast = $stmt->execute() ? "contact_success" : "contact_error";
    }
    elseif ($_POST['form_type'] == 'booking') {
        $stmt = $connection->prepare("INSERT INTO tbl_booking(bookname, bookemail, destination, passenger, date, payment) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $_POST["bookname"], $_POST["bookemail"], $_POST["destination"], $_POST["passenger"], $_POST["date"], $_POST["payment"]);
        $toast = $stmt->execute() ? "booking_success" : "booking_error";
    }
    elseif ($_POST['form_type'] == 'review') {
        $stmt = $connection->prepare("INSERT INTO tbl_reviews(reviewerName, reviewText) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST["reviewerName"], $_POST["reviewText"]);
        $toast = $stmt->execute() ? "review_success" : "review_error";
    }
  } else {
      $toast = "db_error";
  }

  // Redirect to avoid resubmission
  header("Location: " . $_SERVER['PHP_SELF'] . "?toast=" . $toast);
  exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-black text-light">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-gradient bg-black navbar-dark fs-5 sticky-top">
  <div class="container-fluid">
    <img src="images/The Roam Room Logo.jpg" alt="Logo" class="navbar-brand" style="width: 60px; height: 60px; border-radius: 250px">
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
          <a class="nav-link" href="#reviews">Reviews</a>
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

<!--Banner Section-->
<div class="row mt-3 mb-3">
  <div class="col-md-4">
    <img src="images/Banner1.png" alt="Banner Image" class="img-fluid">
  </div>
  <div class="col-md-4">
    <img src="images/Banner2.png" alt="Banner Image" class="img-fluid">
  </div>
  <div class="col-md-4">
    <img src="images/The Roam Room Banner.jpg" alt="Banner Image" class="img-fluid">
  </div>
</div>

  <!--Itinerary Accordion-->
  <section id="itinerary">
    <div class="container card pt-3 pb-3 text-white" style="background-color: #430E18">
    <div class="d-flex justify-content-between align-items-center pb-2">
      <h2 class="mb-0 ms-2 fw-bold card-header">Itinerary</h2>
      <a href="#booknow" class="btn btn-red btn-dark me-1">Book Now</a>
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
    <div class="card container flex-column mt-5 mb-3 text-white" style="background-color: #430E18">
        <h2 class="card-header form mt-2 pt-2 fw-bold">Book Now</h2>
        <form class="card-body" action="index.php" method="POST" id="bookingForm">
        <input type="hidden" name="form_type" value="booking">
        <label for="bookname">Name: </label>
        <input type="text" id="bookname" name="bookname" class="form-control mb-3" placeholder="Enter your name" required>
        <label for="bookemail">Email: </label>
        <input type="email" id="bookemail" name="bookemail" class="form-control mb-3" placeholder="Enter your email" required>
        <label for="email">Phone Number: </label>
        <input type="tel" id="phone" name="phone" class="form-control mb-3" placeholder="Enter your phone number" required>
        <label for="subject" id="subject">Travel Destination: </label>
        <select class="form-select mb-3" id="destination" name="destination" required>
          <option selected>Select a destination</option>
          <option value="Turkey">Turkey</option>
          <option value="Thailand">Italy</option>
          <option value="France">France</option>
          <option value="Bali">Bali</option>
        </select>
        <label for="passenger">Number of Travelers: </label>
        <input type="number" id="passenger" name="passenger" class="form-control mb-3" min="1" max="10" placeholder="Enter number of travelers" required>
        <label for="date">Travel Date: </label>
        <input type="date" id="date" name="date" class="form-control mb-3">
        <label for="payment">Payment Method: </label>
        <select class="form-select mb-3" id="payment" name="payment">
          <option selected>Select a payment method</option>
          <option value="Bank Transfer">Bank Transfer</option>
          <option value="Pay on Arrival">Pay on Arrival</option>
        </select>
        <button type="submit" class="btn btn-dark btn-red mb-5">Submit</button>
        <button type="reset" class="btn btn-secondary mb-5">Reset</button>
        </form>
    </div>
    </section>

    <!--Gallery Section-->
<section id="gallery"></section>
  <div class="container card mt-5 mb-3 col-md-12 text-white" style="background-color: #430E18">
    <h2 class="mb-4 mt-4 fw-bold card-header">Gallery</h2>
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
    <div class="card container flex-column mt-5 mb-3 text-white" style="background-color: #430E18">
        <h2 class="card-header form mt-2 pt-2">Contact Us</h2>
        <form class="card-body" action="index.php" method="POST">
        <input type="hidden" name="form_type" value="contact">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" class="form-control mb-3">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" class="form-control mb-3">
        <label for="subject" id="subject">Subject: </label>
        <input type="text" id="subject" name="subject" class="form-control mb-3">
        <label for="message">Message: </label>
        <textarea class="form-control mb-3" id="message" name="message" rows="4" placeholder="Your message here..."></textarea>
        <button type="submit" class="btn btn-dark btn-red mb-3">Submit</button>
        <button type="reset" class="btn btn-secondary mb-3">Reset</button>
        </form>
    </div>
    </section>

    <!--Reviews Section-->
    <section id="reviews">
    <div class="container card mt-5 mb-3 text-white p-4" style="background-color: #430E18">
      <h2 class="mb-4">Reviews</h2>
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">"The Roam Room made my trip to Turkey unforgettable! The itinerary was well-planned and the customer service was exceptional."</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h5 class="card-title">Jane Smith</h5>
              <p class="card-text">"I had an amazing experience booking my trip to Italy. The team was very helpful and the accommodations were top-notch!"</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h5 class="card-title">Alice Johnson</h5>
              <p class="card-text">"Bali was a dream come true! The Roam Room provided excellent recommendations for activities and the hotel was perfect."</p>
            </div>  
          </div>
        </div>
      </div>
      <div>
          <h5 class="mb-3">Leave a Review</h5>
          <div class="mb-3">
            <form id="reviewForm" class="form" action="index.php" method="POST">
            <input type="hidden" name="form_type" value="review">
            <label for="reviewerName" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="reviewerName" name="reviewerName" required>
            <label for="reviewText" class="form-label">Your Review</label>
            <textarea class="form-control" id="reviewText" name="reviewText" rows="3" required></textarea>
            <button type="submit" class="btn btn-dark btn-red mt-2">Submit Review</button>
        </form>
        </div>
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

  <!-- Toast Notification -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;">
  <div id="successToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">✅ Submitted successfully!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>

  <div id="errorToast" class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">❌ Something went wrong!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const urlParams = new URLSearchParams(window.location.search);
  const toastType = urlParams.get("toast");

  if (toastType) {
    let toastEl = null;

    if (toastType.includes("success")) {
      toastEl = document.getElementById("successToast");
    } else {
      toastEl = document.getElementById("errorToast");
    }

    if (toastEl) {
      const toast = new bootstrap.Toast(toastEl);
      toast.show();
    }
  }
});
</script>

</body>
</html>