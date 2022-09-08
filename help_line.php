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

            <div class="p-3">
                <?php
                $sql = "SELECT * FROM help_line;";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) { ?>
                    <div id="examples">
                        <h1 class="display-4 fs-1 text-center">Help Line</h1>
                        <div class="d-print-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Help. ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['help_id'] ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows["phone"]; ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['message'] ?></td>
                                            <td><?= $rows['exact_time'] ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                    </div>
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