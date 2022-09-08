<?php

if (isset($_POST['submit'])) {

  include "includes/db_conn.php";

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  if (empty($name) && empty($phone) && empty($email) && empty($message)) { ?>
    <script>
      window.location.href = "index.php?error=Some Information is Required.#Contact";
    </script>
    <?php
  } else {

    $query1 = "INSERT INTO help_line (name,phone,email,message) 
VALUE ('$name','$phone','$email','$message')";
    $result = mysqli_query($conn, $query1) or die("Query Failed.");

    if ($result) { ?>
      <script>
        window.location.href = "index.php?error=Message Send successfully.#Contact";
      </script>
<?php
    }
  }
}


?>

<div class="col-md-8">
  <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
      <?= $_GET['error'] ?>
    </div>
  <?php } ?>
  <form action="" method="POST">
    <input type="text" class="form-control" name="name" placeholder="Name"><br>
    <input type="text" class="form-control" name="phone" placeholder="Phone"><br>
    <input type="email" class="form-control" name="email" placeholder="Email"><br>
    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
    <input type="submit" class="btn btn-primary" value="Send" name="submit"><br><br>
  </form>
</div>