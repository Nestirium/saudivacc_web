<!doctype html>
<html lang="en">

<head>

  <?php include '../commons/metas.php'; ?>

  <title>VATSIM Saudi Arabia | Staff</title>
  <meta name="description" content="The staff members of VATSIM Saudi Arabia.">
  <meta property="og:title" content="VATSIM Saudi Arabia | Staff">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

</head>

<body class="bg-dark">

<?php include '../commons/header.php'; ?>

<!-- The mother container !-->
<div class="container-fluid">

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

</div>

  <?php include '../commons/footer.php'; ?>

</body>

</html>
