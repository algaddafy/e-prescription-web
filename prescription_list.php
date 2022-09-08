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
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            }
            ?>
            <div class="p-3">
                <?php
                if ($_SESSION['role'] == 'admin') {
                    $sql = "SELECT * FROM prescription JOIN doctors ON (prescription.doctor_id=doctors.doctor_id)";
                    $res = mysqli_query($conn, $sql);
                } elseif ($_SESSION['role'] == 'doctor') {
                    $sql = "SELECT * FROM prescription JOIN doctors ON (prescription.doctor_id=doctors.doctor_id) WHERE doctors.user_id = {$_SESSION['user_id']}";
                    $res = mysqli_query($conn, $sql);
                } else {
                    $sql = "SELECT * FROM prescription JOIN patients ON (prescription.patient_id=patients.user_id) WHERE patients.user_id = {$_SESSION['user_id']}";
                    $res = mysqli_query($conn, $sql);
                }

                if (mysqli_num_rows($res) > 0) { ?>
                    <div id="examples">
                        <h1 class="display-4 fs-1 text-center">Prescriptions</h1>
                        <div class="d-print-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Pr. ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Doctors</th>
                                        <th scope="col">Patients</th>
                                        <th scope="col">Pharmacy</th>
                                        <th scope="col">Medicines</th>
                                        <th scope="col">Lab Tests</th>
                                        <th scope="col">Advice</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['prescription_id'] ?></th>
                                            <td><?= $rows['pres_date'] ?></td>
                                            <?php $sql1 = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
                                            $res1 = mysqli_query($conn, $sql1);
                                            $row1 = mysqli_fetch_assoc($res1) ?>

                                            <td><?= $row1["first_name"] . " " . $row1["last_name"]; ?></td>

                                            <?php $sql1 = "SELECT * FROM users JOIN prescription WHERE user_id = prescription.patient_id AND prescription.prescription_id = {$rows['prescription_id']}";
                                            $res1 = mysqli_query($conn, $sql1);
                                            $row1 = mysqli_fetch_assoc($res1) ?>

                                            <td><?= $row1["first_name"] . " " . $row1["last_name"]; ?></td>
                                            <td><?= $rows['pharmacy_name'] ?></td>
                                            <td><?= $rows['medicine_name'] ?></td>
                                            <td><?= $rows['lab_test_name'] ?></td>
                                            <td><?= $rows['advice'] ?></td>
                                            <td>
                                                <button class="btn btn-outline-info btn-sm" onclick="printContent('examples')"><i class="fa fa-download"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                    </div>
            </div>
    </body>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>

    </html>
<?php } else {
    header("Location: login.php");
} ?>