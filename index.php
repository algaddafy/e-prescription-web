<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>E-Doctor</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">E-Doctor</a>

        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <header class="jumbotron back-image" style="background-image:url(img/Banner1.jpeg);">
        <div class="mainHeading">
            <h1 class="text-uppercase text-danger font-weight-bold">Welcome to E-DOCTOR</h1>
            <h4> <i>Patient's Happiness is our Aim</i></h4>
            <a href="login.php" class="btn btn-success mr-4">Login</a>
            <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
        </div>
    </header>

    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">Our Services</h3>
            <p>
                During the times of this worldwide pandemic, it is imperative that we stay at home and maintain social distancing.However, what about consulting with doctors when you need them?To cater to your medical needs, we have launched our online tele-consultation services, which allows you to consult the specialist of your choice through online.Now you can take your service online by doing Registration.
            </p>
        </div>
    </div>

    <?php include('UserRegistration.php') ?>

    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Our Happy Patients</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6">

                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="img/avatar/1.png" class="img-fluid" style="border-radius:100px;" alt="avt1">
                            <h4 class="card-title">Nirob Hasan</h4>
                            <p class="card-text">This online care platform is one of the best site in Asia and that was one of the best choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">

                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="img/avatar/2.png" class="img-fluid" style="border-radius:100px;" alt="avt2">
                            <h4 class="card-title">Atik Sahriar</h4>
                            <p class="card-text">This online care platform is one of the best site in Asia and that was one of the best choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">

                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="img/avatar/3.png" class="img-fluid" style="border-radius:100px;" alt="avt3">
                            <h4 class="card-title">Rashedul Islam</h4>
                            <p class="card-text">This online care platform is one of the best site in Asia and that was one of the best choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">

                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="img/avatar/4.png" class="img-fluid" style="border-radius:100px;" alt="avt4">
                            <h4 class="card-title">Eyamin Ahmed</h4>
                            <p class="card-text">This online care platform is one of the best site in Asia and that was one of the best choice.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="Contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">

            <?php include('contactform.php') ?>

            <div class="col-md-4 text-center">

                <strong>Dhaka:</strong><br>
                Notun Bazar,<br>
                Badda, Gulshan<br>
                Postal Code - 1212<br>
                Phone: +8801632030573<br>
                <a href="#" target="_blank">www.nirobhasan.com</a><br>
                <br> <br>
                <strong>Narayanganj:</strong><br>
                Chashara,<br>
                Sahid, Minar<br>
                Postal Code - 1400<br>
                Phone: +8801741158857<br>
                <a href="#" target="_blank">www.nirobhasan.com</a><br>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-10">

                    <span class="pr-2">Follow Us: </span>
                    <a href="https://www.facebook.com/justnirob/" style="text-decoration: none;color:white;" target="_blank">E-Doctor</a>
                </div>
                <div class="col-md-2 text-right">

                    <small>Develop by NRA &copy; 2022</small>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>