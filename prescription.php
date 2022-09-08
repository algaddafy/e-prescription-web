<?php
session_start();
include "includes/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {   ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/dselect.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
                        <h2 class="card-title">Make A Prescription</h2>
                        <small class="btn btn-outline-danger disabled">* If your informations are not update. Update from Dashboard.</small>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                            <?php } ?>
                            <?php
                            //$sql3 = "SELECT * FROM users JOIN patients ON users.user_id = patients.user_id WHERE users.user_id= {$_SESSION['user_id']}";
                            //"SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}
                            //$res_all = mysqli_query($conn, $sql3);
                            //if (mysqli_num_rows($res_all) > 0) {
                            //while ($rows_all = mysqli_fetch_assoc($res_all)) { 
                            ?>

                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="pres_date">Date: </label>
                                        <input type="date" class="form-control" id="dob" name="pres_date">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="patient">Patient:</label>
                                        <select name="patient_id" id="select_box">
                                            <option value="">Patient</option>
                                            <?php $sql = "SELECT * FROM users WHERE role = 'patient'";
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
                                        <label for="pharmacy_name">Pharmacy:</label>
                                        <select name="pharmacy_name" class="form-control">
                                            <option value="">Pharmacy</option>
                                            <?php $sql = "SELECT * FROM pharmacy";
                                            $res = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                    <option value=" <?php echo $rows["pharmacy_name"]; ?>">
                                                        <?php echo $rows["pharmacy_name"]; ?>
                                                    </option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="medicine_name">Medicine:</label>
                                        <select name="medicine_name[]" class="selectpicker form-control" multiple data-live-search="true" id="select_box">
                                            <?php $sql = "SELECT * FROM medicine";
                                            $res = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                    <option value=" <?php echo $rows["medicine_name"]; ?>">
                                                        <?php echo $rows["medicine_name"]; ?>
                                                    </option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 offset-md-4 pt-2">
                                    <div class="form-group text-center">
                                        <label for="medicine_id">Lab Test:</label>
                                        <select name="lab_test_name[]" class="selectpicker form-control" multiple data-live-search="true" id="select_box">
                                            <?php $sql = "SELECT * FROM lab_test";
                                            $res = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                    <option value=" <?php echo $rows["lab_test_name"]; ?>">
                                                        <?php echo $rows["lab_test_name"]; ?>
                                                    </option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // }
                            // } else {
                            //     echo "Data not found.";
                            // } 
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="advice">Advice:</label>
                                        <textarea cols="3" name="advice" rows="3" id="advice" class="form-control" placeholder="Highlight the patient's problems and solutions."></textarea>
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

                $pres_date = mysqli_real_escape_string($conn, $_POST['pres_date']);
                $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
                $doctor_user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
                $pharmacy_name = mysqli_real_escape_string($conn, $_POST['pharmacy_name']);
                foreach ($_POST["medicine_name"] as $medi) {
                    $medicine_name .= $medi . ', ';
                }
                // $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
                foreach ($_POST["lab_test_name"] as $lab_test) {
                    $lab_test_name .= $lab_test . ', ';
                }
                // $lab_test_name = mysqli_real_escape_string($conn, $_POST['lab_test_name']);
                $advice = mysqli_real_escape_string($conn, $_POST['advice']);


                $query = "SELECT doctor_id FROM doctors WHERE user_id='$doctor_user_id'";
                $result1 = mysqli_query($conn, $query) or die("Query faild.");
                $got_d_id_fetch = mysqli_fetch_assoc($result1);
                $got_doctor_id = $got_d_id_fetch['doctor_id'];


                if (empty($pres_date)) {
                    header("Location: add_appoinment.php?error=Date is Required");
                } elseif (empty($patient_id)) {
                    header("Location: add_appoinment.php?error=Patient is Required");
                } elseif (empty($pharmacy_name)) {
                    header("Location: add_appoinment.php?error=Pharmacy Name is Required");
                } elseif (empty($medicine_name)) {
                    header("Location: add_appoinment.php?error=Medicine is Required");
                } elseif (empty($advice)) {
                    header("Location: add_appoinment.php?error=Symptoms is Required");
                } else {
                    $query1 = "INSERT INTO prescription (pres_date,patient_id,doctor_id,pharmacy_name,medicine_name,lab_test_name,advice) VALUE ('$pres_date','$patient_id','$got_doctor_id','$pharmacy_name','$medicine_name','$lab_test_name','$advice')";
                    $result = mysqli_query($conn, $query1) or die("Query Failed.");

                    if ($result) { ?>
                        <script>
                            window.location.href = "prescription.php?error=Prescription made successfully.";
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
        $(document).ready(function() {
            $('.my-select').selectpicker();
        });
    </script>
<?php } else {
    header("Location: login.php");
} ?>