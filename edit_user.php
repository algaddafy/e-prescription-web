<?php
session_start();
include "includes/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {   ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Update User Informations</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">

            <?php if (isset($_REQUEST['updated'])) {
                echo '<div class="alert alert-danger" role="alert"> User Updated successful.</div>';
            } ?>
            <section>
                <div class="card">
                    <div class="card-header">
                        <?php if ($_REQUEST['edit_id'] == 1) {
                            echo "<h2 class='card-title'>You can't update Admin Info.</h2>";
                        } else {
                            echo "<h2 class='card-title'>Update informations</h2>";
                        } ?>

                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_REQUEST['edit_id'])) {
                            $Rcvd_id =  $_REQUEST['edit_id'];

                            $sql_test = "SELECT * FROM users WHERE role = 'doctor'";
                            $comming_info = mysqli_query($conn, $sql_test);
                            $row_test = mysqli_fetch_assoc($comming_info);

                            if ($Rcvd_id == $row_test['user_id']) {
                                $get_info = "SELECT * FROM users JOIN doctors USING(user_id) WHERE users.user_id = $Rcvd_id";
                            } else {
                                $get_info = "SELECT * FROM users JOIN patients ON users.user_id = patients.user_id WHERE users.user_id = $Rcvd_id";
                            }


                            $select_info = mysqli_query($conn, $get_info);

                            while ($row = mysqli_fetch_assoc($select_info)) {

                        ?>
                                <form action="" class="shadow-lg p-4" method="POST">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="username">Username: </label>
                                                <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name: </label>
                                                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" placeholder="First Name" id="first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name: </label>
                                                <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control" placeholder="Last Name" id="lastname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth: </label>
                                                <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" id="dob">
                                            </div>
                                        </div>
                                        <!-- <?php //if ($row['role'] == 'patient') { 
                                                ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="blood_group">Blood Group:</label>
                                                    <select name="blood_group" id="blood_group" class="form-control">
                                                        <?php
                                                        // if (!empty($row['blood_group'])) { 
                                                        ?>
                                                            <option>
                                                                <?php //echo $row["blood_group"]; 
                                                                ?>
                                                            </option>

                                                        <?php //} else { 
                                                        ?>
                                                            <option value="">Blood Group</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>


                                                        <?php //} 
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                        <?php //} 
                                        ?> -->

                                        <?php if ($row['role'] == 'patient') { ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address: </label>
                                                    <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" placeholder="Address" id="age">
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <?php if ($row['role'] == 'doctor') { ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address: </label>
                                                    <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" placeholder="Address" id="age">
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <?php if ($row['role'] == 'patient') { ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="age">Age: </label>
                                                    <input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control" placeholder="Your age" id="age">
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($row['role'] == 'doctor') { ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="age">Age: </label>
                                                    <input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control" placeholder="Your age" id="age">
                                                </div>
                                            </div>
                                        <?php } ?>


                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender:</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <?php
                                                    if (!empty($row['gender'])) { ?>
                                                        <option>
                                                            <?php echo $row["gender"]; ?>
                                                        </option>

                                                    <?php } else { ?>

                                                        <option value="">Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email: </label>
                                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" name="email" id="email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Contact Number:</label>
                                                <input type="number" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="updating_hidden_id" value="<?php echo $Rcvd_id; ?>">
                                    <div class="card-footer ml-auto">
                                        <center><button type="submit" name="submit" class="btn btn-outline-success mr-1">Submit</button></center>
                                    </div>
                                </form>
                        <?php
                            }
                        }

                        ?>

                    </div>
                </div>
            </section>

        </div>
        <?php
        if (isset($_REQUEST['submit'])) {
            $username = $_REQUEST['username'];
            $first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $hidden_id = $_REQUEST['updating_hidden_id'];

            $dob = $_REQUEST['dob'];
            $gender = $_REQUEST['gender'];
            $age = $_REQUEST['age'];

            $address = $_REQUEST['address'];

            $doctor_age = $_REQUEST['age'];
            $gender = $_REQUEST['gender'];

            // $update_query = "UPDATE users  SET username='$username', first_name = '$first_name', last_name = '$last_name', email='$email', phone='$phone' WHERE user_id=$hidden_id";

            // $update_query = "UPDATE patients p JOIN users u ON p.user_id = u.user_id SET u.username='$username', u.first_name = '$first_name', u.last_name = '$last_name', u.email='$email', u.phone='$phone', p.blood_group = '$blood_group', p.dob = '$dob', p.gender = '$gender', p.age = '$age' WHERE p.user_id=$hidden_id";

            $update_query = "UPDATE patients p JOIN users u ON p.user_id = u.user_id SET p.dob = '$dob', p.gender = '$gender', p.age = '$age', address = '$address' WHERE p.user_id=$hidden_id";
            $update_query2 = "UPDATE users SET username='$username', first_name = '$first_name', last_name = '$last_name', email='$email', phone='$phone' WHERE user_id=$hidden_id";
            $update_query3 = "UPDATE doctors d JOIN users u ON d.user_id = u.user_id SET d.age = '$doctor_age', d.dob = '$dob', d.gender = '$gender', address = '$address' WHERE d.user_id=$hidden_id";

            // $update_query = "UPDATE patients p JOIN users u ON p.user_id = u.user_id SET p.blood_group = '$blood_group', p.dob = '$dob', p.gender = '$gender', p.age = '$age' WHERE p.user_id=$hidden_id";

            $final_update_query = mysqli_query($conn, $update_query);
            $final_update_query2 = mysqli_query($conn, $update_query2);
            $final_update_query3 = mysqli_query($conn, $update_query3);


            if ($final_update_query) {
        ?>
                <script>
                    window.location.href = "dashboard.php?updated";
                </script>
            <?php
            } elseif ($final_update_query2) {
            ?>
                <script>
                    window.location.href = "dashboard.php?updated";
                </script>
            <?php
            } elseif ($final_update_query3) {
            ?>
                <script>
                    window.location.href = "dashboard.php?updated";
                </script>
            <?php
            } else {

                // header("location: dashboard.php?updated");
            ?>
                <script>
                    window.location.href = "dashboard.php?updated";
                </script>
        <?php
            }
        }
        ?>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>