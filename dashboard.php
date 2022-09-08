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
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    </head>

    <body>

        <?php include "includes/sidebar.php" ?>

        <div class="main">

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            } elseif (isset($_REQUEST['updated'])) {
                echo '<div class="alert alert-success" role="alert"> Your Information Updated Successful.</div>';
            }

            ?>
            <div class="row mt-2">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body">
                                        <?php $sql = "SELECT COUNT(*) as 'counts' FROM users WHERE role = 'patient'";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($rows = mysqli_fetch_assoc($res)) { ?>

                                                <h3><?php echo $rows['counts'] ?></h3>

                                        <?php }
                                        } ?>
                                        <span class="text-muted">Patients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body">
                                        <?php $sql = "SELECT COUNT(*) as 'counts' FROM users WHERE role = 'doctor'";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($rows = mysqli_fetch_assoc($res)) { ?>

                                                <h3><?php echo $rows['counts'] ?></h3>

                                        <?php }
                                        } ?>
                                        <span class="text-muted">Doctors</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                </div>
            </div>

            <?php include "includes/show_user.php" ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.table').DataTable();
            });
        </script>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>