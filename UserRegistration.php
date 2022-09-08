<div class="container pt-5" id="registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">


      <?php

      if (isset($_POST['signup'])) {

        include "includes/db_conn.php";

        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $role = 'patient';

        if (empty($first_name)) {
          header("Location: index.php?error=First Name is Required.#registration");
        } elseif (empty($last_name)) {
          header("Location: index.php?error=Last Name is Required.#registration");
        } elseif (empty($email)) {
          header("Location: index.php?error=Email is Required.#registration");
        } elseif (empty($phone)) {
          header("Location: index.php?error=Phone is Required.#registration");
        } elseif (empty($username)) {
          header("Location: index.php?error=Username is Required.#registration");
        } elseif (empty($password)) {
          header("Location: index.php?error=Password is Required.#registration");
        } else {

          $query = "SELECT username FROM users WHERE username='$username' AND role='patient'";
          $result1 = mysqli_query($conn, $query) or die("Query faild.");

          $count = mysqli_num_rows($result1);
          if ($count > 0) {
            header("Location: index.php?error=Username Already Exists.");
          } else {
            $query1 = "INSERT INTO users (first_name,last_name,email,phone,username,password,role) 
VALUE ('$first_name','$last_name','$email','$phone','$username','$password','$role')";
            $result = mysqli_query($conn, $query1) or die("Query Failed.");

            if ($result) {
              $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
              $result1 = mysqli_query($conn, $query) or die("Query faild.");

              $row = mysqli_fetch_assoc($result1);

              $last_id = $row['user_id'];

              $query2 = "INSERT INTO patients (user_id) VALUE ('$last_id')";
              $result = mysqli_query($conn, $query2) or die("Query Failed.");

              header("Location: login.php?error=Registration is successful.#registration");
            }
          }
        }
      }


      ?>


      <form action="" class="shadow-lg p-4" method="POST">
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $_GET['error'] ?>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="fname" class="font-weight-bold pl-2">First Name</label>
          <input type="text" class="form-control" placeholder="First Name" name="first_name">
        </div>
        <div class="form-group">
          <label for="lname" class="font-weight-bold pl-2">Last Name</label>
          <input type="text" class="form-control" placeholder="Last Name" name="last_name">
        </div>
        <div class="form-group">
          <label for="phone" class="font-weight-bold pl-2">Phone</label>
          <input type="text" class="form-control" placeholder="Phone Number" name="phone">
        </div>
        <div class="form-group">
          <label for="email" class="font-weight-bold pl-2">Email</label>
          <input type="email" class="form-control" placeholder="Email" name="email">
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="username" class="font-weight-bold pl-2">Username</label>
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
          <label for="pass" class="font-weight-bold pl-2">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-danger mt-2 btn-block shadow-sm font-weit-ghbold" name="signup">Sign Up</button>
      </form>
    </div>
  </div>
</div>