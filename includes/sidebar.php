<div class="sidebar d-print-none">
    <?php if ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'doctor' or $_SESSION['role'] == 'patient') { ?>
        <h1><button type="button" class="btn btn-light"><a href="index.php">HOMEPAGE</a></button></h1>
        <h2><?= $_SESSION['role'] ?></h2>
        <div>
            <img src="img/<?= $_SESSION['role'] ?>.png" class="card-img-top" alt="admin image">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <?= $_SESSION['first_name'] ?>
                </h5>
            </div>
        </div>
    <?php } ?>
    <ul class="nav">

        <?php if ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'doctor' or $_SESSION['role'] == 'patient') { ?>

            <li>
                <a href="dashboard.php">
                    <i class="fas fa-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-procedures"></i>
                    <span>Patient</span>
                </a>

                <?php if ($_SESSION['role'] == 'patient') { ?>
                    <div href="#" class="sub-menu">
                        <a href="patient_profile.php">Patient Profile</a>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'doctor') { ?>
                    <div href="#" class="sub-menu">
                        <a href="patient_list.php">Patients List</a>
                    </div>
                <?php } ?>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-stethoscope"></i>
                    <span>Doctor</span>
                </a>
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <div class="sub-menu">
                        <a href="add_doctor.php">Doctor Add</a>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['role'] == 'doctor') { ?>
                    <div href="#" class="sub-menu">
                        <a href="doctor_profile.php">Doctor Profile</a>
                    </div>
                <?php } ?>

                <div href="#" class="sub-menu">
                    <a href="doctor_list.php">Doctors List</a>
                </div>
            </li>
            <li>
                <?php if ($_SESSION['role'] == 'patient') { ?>
                    <a href="#">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointment</span>
                    </a>
                    <div href="#" class="sub-menu">
                        <a href="add_appoinment.php">Add Appointment</a>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'doctor') { ?>
                    <a href="#">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointment</span>
                    </a>
                    <div href="#" class="sub-menu">
                        <a href="appoinment_list.php">Appointment list</a>
                    </div>
                <?php } ?>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-prescription"></i>
                    <span>Prescription</span>
                </a>
                <?php if ($_SESSION['role'] == 'doctor') { ?>
                    <div href="#" class="sub-menu">
                        <a href="prescription.php">Make Prescription</a>
                    </div>
                <?php } ?>
                <div href="#" class="sub-menu">
                    <a href="prescription_list.php">Prescription List</a>
                </div>
            </li>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <span>Pharmacy</span>
                    </a>
                    <div href="#" class="sub-menu">
                        <a href="add_pharmacy.php">Add Pharmacy</a>
                    </div>
                    <div href="#" class="sub-menu">
                        <a href="add_medicine.php">Add Medicine</a>
                    </div>
                </li>
                <li>
                    <a href="add_lab_test.php">
                        <i class="fas fa-vial"></i>
                        <span>Add Lab Test</span>
                    </a>
                </li>
                <li>
                    <a href="help_line.php">
                        <i class="fas fa-question-circle"></i>
                        <span>Help Line</span>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="includes/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
    </ul>
</div>
<?php } ?>