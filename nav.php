<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include_once "systemGeneration/MySession.php" ?>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white english ms-5 text-center" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end pr-5" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item ms-5">
                        <a class="nav-link active text-white english" aria-current="page" href="#">NEWS</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link text-white english" href="filterpost.php?sid=1">Politic</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link text-white english" href="filterpost.php?sid=2">Wars</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link text-white english" href="filterpost.php?sid=3">IT NEWS</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link text-white english" href="filterpost.php?sid=4">Social</a>
                    </li>
                </ul>
                <div class="dropdown ms-5 mr-5">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if (checkSession("username")) {
                            echo getSession("username");
                        } else {
                            echo "Member";
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        if (checkSession("username")) {
                            echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
                        } else {
                            echo "<li><a class='dropdown-item' href='register.php'>Register</a></li>
                        <li><a class='dropdown-item' href='login.php'>Login</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>