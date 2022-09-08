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

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            } ?>
            <section>
                <div class="content-body">
                    <div id="doctors-list">
                        <div class="row">
                            <?php $sql = "SELECT * FROM users JOIN patients USING(user_id) WHERE role = 'patient'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) { ?>
                                    <div class=" col-xl-3 col-lg-4 col-md-6 pb-3">
                                        <div class="card" style="height: 300px;">
                                            <img src="img/patient.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                            <div class="card-body">
                                                <h6 class="card-title font-large-1 mb-1 text-center"><?php echo $rows["first_name"] . " " . $rows["last_name"]; ?></h6>
                                                <p class="font-small-3 mb-0 text-center"><?php echo $rows["phone"]; ?></p>
                                                <p class="font-small-3 mb-0 text-center"><?php echo $rows["blood_group"]; ?></p>
                                                <p class="font-small-3 text-center"><?php echo $rows["gender"]; ?></p>
                                                <p class="font-small-3 mb-0 text-center"><?php echo $rows["email"]; ?></p>
                                                <p class="card-text card font-medium-1 text-center mb-0"><?php echo $rows["dob"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
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