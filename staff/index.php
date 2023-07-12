<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>VATSIM Saudi Arabia | Staff</title>
  <meta name="description" content="The staff members of VATSIM Saudi Arabia.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta property="og:title" content="VATSIM Saudi Arabia | Staff">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<!-- The mother container !-->
<div class="container-fluid bg-dark bg-gradient min-vh-100 d-flex" style="flex-direction: column; justify-content: space-between;">

  <!-- First row in the grid system !-->
  <div class="row bg-dark">
    <!-- The row contains 1 column that spans the whole 12 units in the grid !-->
    <div class="col-md-12">
      <!-- The column contains a navbar using <nav> html element for SEO !-->
      <nav class="navbar navbar-expand-md align-content-center">
        <ul class="navbar-nav align-items-center fs-5">
          <li class="nav-item">
            <a class="navbar-brand nav-link" href="/">
              <img class="img-fluid" style="width: 7%;" src="../img/vACC_Logo_white_1.png" alt="VATSIM Saudi Arabia Logo">
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="policiesDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">Policies</a>
            <ul class="dropdown-menu" aria-labelledby="policiesDropdown">
              <li><a class="dropdown-item" href="/policies/VATSIM_Saudi_Arabia_GDPR_Policy_2023.pdf">GDPR Policy</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">HQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/staff">Staff</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Charts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Login</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 text-white text-center fs-1">
      Our Dedicated Team Members
    </div>
  </div>

  <!-- Third row in the grid system !-->
  <div class="row justify-content-center">
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'savacc_db';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
      die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }

    $query = "SELECT * FROM savacc_db.staff_members";
    $result = $mysqli->query($query);

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 rounded-2 bg-dark shadow-lg p-0 m-5">
          <div class="card border-0">
            <img src="<?php echo $row['image_url'];?>" class="card-img-top" alt="No Image">
          </div>
          <div class="card-body text-white mt-3 p-2">
            <h5 class="card-title"><?php echo $row['name'];?> - <?php echo $row['position'];?></h5>
            <p class="card-text"><?php echo $row['job_title'];?><br><?php echo $row['job_description'];?></p>
          </div>
        </div>
    <?php
      }
      $result->free();
    } else {
      echo 'Error executing query: ' . $mysqli->error;
    }

    $mysqli->close();
    ?>
  </div>

  <!-- Fourth row in the grid system !-->
  <div class="row text-white fs-6 fw-lighter justify-content-center align-items-center flex-grow-1 bg-dark">
    <div class="col-md-5">
      © VATSIM Saudi Arabia Technology Department <?php echo date('Y'); ?> - All rights reserved - techsupport@saudivacc.net
    </div>
  </div>

</div>

</body>

</html>
