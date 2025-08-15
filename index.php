<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>The Roam Room</title>
</head>
<body class="bg-dark text-light">
  <div>
    <h1 class="text-center mb-3 mt-3">The Roam Room</h1>
  </div>
  <!--Accordion-->
    <div class="container card pt-3 pb-3 text-white" style="background-color: #430E18">
        <h2 class="pb-2">Itinerary</h2>
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="card container flex-column mt-5 mb-5">
        <h2 class="card-header form">Form</h2>
        <form class="card-body" action="Practice.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" class="form-control mb-3">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" class="form-control mb-3">
        <label for="phone" id="phone">Phone: </label>
        <input type="tel" id="phone" name="phone" class="form-control mb-3">
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
        <button type="reset" class="btn btn-secondary mb-5">Reset</button>

        </form>
    </div>
    
    <div>
        <video autoplay controls loop width="600" height="400" class="d-block mx-auto">
            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</body>
</html>

<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name= "db_practice";

$connection = new mysqli ($server_name, $username, $password, $db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name= $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

if ($connection)
{
    echo "Connected successfully";
    if (!empty($name) && !empty($email) && !empty($phone))
    {
        $stmt = $connection->prepare("INSERT INTO tbl_practice(name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        if ($stmt->execute())
            {
                echo "<br><br>Data inserted successfully";
                echo "<br>Name: ". $name . "<br> Email: ". $email . "<br> Phone: " . $phone;
            };

        $select = $connection->prepare("SELECT * FROM tbl_practice");
        if ($select->execute()) {
            $result = $select->get_result();
            echo "<br><br>Data retrieved successfully";
            if ($result->num_rows >0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "<br> Name: " . $row["name"] . "<br> Email: " . $row["email"] . "<br> Phone: " . $row["phone"];
                }
            }
        }

    }
}
}
?>