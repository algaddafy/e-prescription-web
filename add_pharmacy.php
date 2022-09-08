<?php
session_start();
include "includes/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {   ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Pharmacy</title>
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
                    <h2 class="text-center">Add a pharmacy</h2>
                    <div class="row mt-4 mb-4">
                        <div class="col-md-6 offset-md-3">


                            <?php

                            if (isset($_POST['submit'])) {

                                include "includes/db_conn.php";

                                $pharmacy_name = mysqli_real_escape_string($conn, $_POST['pharmacy_name']);

                                if (empty($pharmacy_name)) {
                            ?>
                                    <script>
                                        window.location.href = "add_pharmacy.php?error=Pharmacy Name is Required.";
                                    </script>

                                    <?php
                                } else {

                                    $query1 = "INSERT INTO pharmacy (pharmacy_name) 
VALUE ('$pharmacy_name')";
                                    $result = mysqli_query($conn, $query1) or die("Query Failed.");

                                    if ($result) {
                                    ?>
                                        <script>
                                            window.location.href = "add_pharmacy.php?error=Pharmacy Add successful.";
                                        </script>

                            <?php
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
                                    <label for="fname" class="font-weight-bold pl-2">Pharmacy Name</label>
                                    <input type="text" class="form-control" placeholder="Pharmacy Name" name="pharmacy_name">
                                </div>
                                <button type="submit" class="btn btn-danger mt-2 btn-block shadow-sm font-weit-ghbold" name="submit">Add a pharmacy</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col-md-6 offset-md-3">
                            <div class="table-responsive shadow-lg p-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Pharmacy ID</th>
                                            <th>Pharmacy Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT * FROM pharmacy";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                <tr>
                                                    <td><?php echo $rows['pharmacy_id']; ?></td>
                                                    <td><?php echo $rows['pharmacy_name']; ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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