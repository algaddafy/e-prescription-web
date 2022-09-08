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
    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">
            <h2 class="text-center text-black">Patients</h2>

            <div class="content-body">
                <section id="patient-profile">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Medical History</h2>
                                    <div class="table-responsive">
                                        <table class="table patient-wrapper">
                                            <tbody>
                                                <tr>
                                                    <th> Dr. Phil Gray </th>
                                                    <th> Dentist </th>
                                                    <th> 15/10/18 </th>
                                                    <th> 58th Street, Manhattan, NYC </th>
                                                    <th> Hospital Visit </th>
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>test</td>
                                                    <td>test</td>
                                                    <td>test</td>
                                                    <td>test</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>