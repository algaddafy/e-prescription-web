<?php
session_start();
include "includes/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {   ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Doctor</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            } ?>

            <section>
                <div class="container pt-5" id="registration">
                    <h2 class="text-center">Create A Doctor Account</h2>
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
                                $department = mysqli_real_escape_string($conn, $_POST['department']);
                                $doctor_degree = mysqli_real_escape_string($conn, $_POST['doctor_degree']);
                                $doctor_age = mysqli_real_escape_string($conn, $_POST['doctor_age']);
                                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                                $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                                $role = 'doctor';

                                if (empty($first_name)) {
                                    header("Location: add_doctor.php?error=First Name is Required");
                                } elseif (empty($last_name)) {
                                    header("Location: add_doctor.php?error=Last Name is Required");
                                } elseif (empty($email)) {
                                    header("Location: add_doctor.php?error=Email is Required");
                                } elseif (empty($phone)) {
                                    header("Location: add_doctor.php?error=Phone is Required");
                                } elseif (empty($username)) {
                                    header("Location: add_doctor.php?error=Username is Required");
                                } elseif (empty($department)) {
                                    header("Location: add_doctor.php?error=Department is Required");
                                } elseif (empty($doctor_degree)) {
                                    header("Location: add_doctor.php?error=Doctor Degree is Required");
                                } elseif (empty($doctor_age)) {
                                    header("Location: add_doctor.php?error=Doctor Age is Required");
                                } elseif (empty($gender)) {
                                    header("Location: add_doctor.php?error=Gender is Required");
                                } elseif (empty($password)) {
                                    header("Location: add_doctor.php?error=Password is Required");
                                } else {
                                    $query = "SELECT username FROM users WHERE username='$username' AND role='doctor'";
                                    $result1 = mysqli_query($conn, $query) or die("Query faild.");

                                    $count = mysqli_num_rows($result1);
                                    if ($count > 0) { ?>
                                        <script>
                                            window.location.href = "add_doctor.php?error=Username Already Exists.";
                                        </script>

                                        <?php } else {

                                        $query1 = "INSERT INTO users (first_name,last_name,email,phone,username,password,role) 
VALUE ('$first_name','$last_name','$email','$phone','$username','$password','$role')";
                                        $result = mysqli_query($conn, $query1) or die("Query Failed.");

                                        if ($result) {
                                            $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
                                            $result1 = mysqli_query($conn, $query) or die("Query faild.");

                                            $row = mysqli_fetch_assoc($result1);

                                            $last_id = $row['user_id'];

                                            $query2 = "INSERT INTO doctors (user_id,department,doctor_degree,doctor_age,gender) VALUE ('$last_id','$department','$doctor_degree','$doctor_age','$gender')";
                                            $result = mysqli_query($conn, $query2) or die("Query Failed.");
                                        ?>
                                            <script>
                                                window.location.href = "add_doctor.php?error=Doctor Add successful.";
                                            </script>

                            <?php
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
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold pl-2">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold pl-2">Department</label>
                                    <input type="text" class="form-control" placeholder="Department" name="department">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold pl-2">Doctor Degree</label>
                                    <input type="text" class="form-control" placeholder="Doctor Degree" name="doctor_degree">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold pl-2">Doctor Age</label>
                                    <input type="text" class="form-control" placeholder="Doctor Age" name="doctor_age">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Doctor:</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
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
            </section>

        </div>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>