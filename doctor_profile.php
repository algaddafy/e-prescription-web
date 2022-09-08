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

            <?php if (isset($_REQUEST['deleted'])) {
                echo '<div class="alert alert-danger" role="alert"> User Deleted successful.</div>';
            } ?>
            <div class="container">
                <div class="main-body pt-4">
                    <?php
                    $get_info = "SELECT * FROM users JOIN doctors USING(user_id) WHERE users.user_id = {$_SESSION['user_id']}";

                    $select_info = mysqli_query($conn, $get_info);

                    while ($row = mysqli_fetch_assoc($select_info)) {

                    ?>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3 offset-md-3">
                                <div class="card border-danger text-danger">
                                    <div class="card-body">
                                        <div class="align-items-center text-center">
                                            <div class="mt-3">
                                                <h4>Username: <?php echo $row["username"]; ?></h4>
                                                <p class="text-secondary mb-1"><?php echo $row["phone"]; ?></p>
                                                <p class="text-muted font-size-sm"><?php echo $row["email"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["first_name"] . " " . $row["last_name"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Department</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["department"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Doctor Degree</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["doctor_degree"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Doctor Age</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["age"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Gender</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["gender"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date of birth</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row["dob"]; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <a class="btn btn-info" href="edit_user.php?edit_id=<?php echo $row['user_id'] ?>">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>

        </div>

    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>