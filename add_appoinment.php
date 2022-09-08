<?php
session_start();
include "includes/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {   ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Appoinment</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/dselect.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            } ?>
            <section>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Book An Appointment</h2>
                        <small class="btn btn-outline-danger disabled">* If your informations are not update. Update from Dashboard.</small>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                                <?php }
                            $sql3 = "SELECT * FROM users JOIN patients ON users.user_id = patients.user_id WHERE users.user_id= {$_SESSION['user_id']}";
                            //"SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}
                            $res_all = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($res_all) > 0) {
                                while ($rows_all = mysqli_fetch_assoc($res_all)) { ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name: </label>
                                                <input type="text" value="<?php echo $rows_all["first_name"]; ?>" class="form-control" placeholder="First Name" required="" id="firstname" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name: </label>
                                                <input type="text" value="<?php echo $rows_all["last_name"]; ?>" class="form-control" placeholder="Last Name" id="lastname" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth: </label>
                                                <input type="date" value="<?php echo $rows_all["dob"]; ?>" class="form-control" id="dob" name="dob" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="doctor">Doctor:</label>
                                                <select name="doctor_user_id" id="select_box">
                                                    <option value="">Doctor</option>
                                                    <?php $sql = "SELECT * FROM users WHERE role = 'doctor'";
                                                    $res = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                            <option value=" <?php echo $rows["user_id"]; ?>">
                                                                <?php echo $rows["first_name"] . " " . $rows["last_name"]; ?>
                                                            </option>

                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="age">Age: </label>
                                                <input type="text" value="<?php echo $rows_all["age"]; ?>" class="form-control" id="age" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="app_date">Appointment Date:</label>
                                                <input type="date" class="form-control" id="app_date" name="app_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email: </label>
                                                <input type="email" value="<?php echo $rows_all["email"]; ?>" class="form-control" name="email" id="email" placeholder="Enter Email" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Contact Number:</label>
                                                <input type="phone" value="<?php echo $rows_all["phone"]; ?>" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number" disabled>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } else {
                                echo "Data not found.";
                            } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="symptoms">Tell Us About Your Symptoms:</label>
                                        <textarea cols="3" name="symptoms" rows="3" id="symptoms" class="form-control" placeholder="Tell us about problems you are facing"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto">
                                <button type="submit" name="submit" class="btn btn-outline-success mr-1">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <?php

            if (isset($_POST['submit'])) {

                include "includes/db_conn.php";

                $doctor_user_id = mysqli_real_escape_string($conn, $_POST['doctor_user_id']);
                $app_date = mysqli_real_escape_string($conn, $_POST['app_date']);
                $symptoms = mysqli_real_escape_string($conn, $_POST['symptoms']);


                $query = "SELECT doctor_id FROM doctors WHERE user_id='$doctor_user_id'";
                $result1 = mysqli_query($conn, $query) or die("Query faild.");
                $got_d_id_fetch = mysqli_fetch_assoc($result1);
                $got_doctor_id = $got_d_id_fetch['doctor_id'];


                $query2 = "SELECT patient_id FROM patients WHERE user_id='{$_SESSION['user_id']}'";
                $result2 = mysqli_query($conn, $query2) or die("Query faild.");
                $got_p_id_fetch = mysqli_fetch_assoc($result2);
                $got_patient_id = $got_p_id_fetch['patient_id'];


                if (empty($doctor_user_id)) {
                    header("Location: add_appoinment.php?error=Doctor is Required");
                } elseif (empty($app_date)) {
                    header("Location: add_appoinment.php?error=Appoinment Date is Required");
                } elseif (empty($symptoms)) {
                    header("Location: add_appoinment.php?error=Symptoms is Required");
                } else {
                    $query1 = "INSERT INTO appointments (doctor_id,patient_id,app_date,symptoms) VALUE ('$got_doctor_id','$got_patient_id','$app_date','$symptoms')";
                    $result = mysqli_query($conn, $query1) or die("Query Failed.");

                    if ($result) { ?>
                        <script>
                            window.location.href = "add_appoinment.php?error=Appoinment send successfully.";
                        </script>
            <?php
                    }
                }
            }

            ?>


        </div>
    </body>

    </html>
    <script>
        var select_box_element = document.querySelector('#select_box');

        dselect(select_box_element, {
            search: true
        });
    </script>
<?php } else {
    header("Location: login.php");
} ?>