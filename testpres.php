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
            <form action="" method="POST">
                <select class="selectpicker" multiple data-live-search="true" name="framework[]" id="select_box">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </select>
                <input type="submit" name="submit" id="">
            </form>
            <?php
            if (isset($_REQUEST['submit'])) {
                foreach ($_POST["framework"] as $row) {
                    $framework .= $row . ', ';
                }
                echo " <br> " . $framework;
            }
            ?>


        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('.my-select').selectpicker();
        });
    </script>

    </html>
<?php } else {
    header("Location: login.php");
} ?>